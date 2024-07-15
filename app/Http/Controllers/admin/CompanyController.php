<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Company;
use App\Models\admin\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;

    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
    }

    public function store(Request $request)
    {
        $plans = Plan::where('status', '1')->get();
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $username = $this->CustomeSlug($data['name']);
                $checkUsername = Company::where('username', $username)->count();
                if ($checkUsername > 0) {
                    return Redirect::back()->withInput()->withErrors(['اسم الشركة متواجد من قبل من فضلك ادخل اسم جديد ']);
                }
                $rules = [
                    'name' => 'required',
                    'email' => 'required|email|unique:companies,email|max:150',
//                    'mobile' => 'required|numeric|unique:companies,mobile|min:8|max:16',
                    'mobile' => 'required|numeric|unique:companies,mobile|digits_between:8,16',
                    'password' => 'required|min:8',
                    'confirm_password' => 'required|same:password'
                ];
                // التحقق من وجود الصورة وإضافة قواعد التحقق الخاصة بها
                if ($request->hasFile('logo')) {
                    $rules['logo'] = 'image|mimes:jpg,png,jpeg|max:4096'; // max:4096 لتحديد حجم الملف بالكيلوبايت (4MB)
                }
                $messages = [
                    'name.required' => 'من فضلك ادخل اسم الشركة',
                    'email.required' => 'من فضلك ادخل البريد الالكتروني ',
                    'email.unique' => 'البريد الالكتروني مستخدم بالفعل ',
                    'email.email' => 'من فضلك ادخل بريد الكتروني بشكل صحيح ',
                    'email.max' => 'من فضلك ادخل بريد الكتروني اقل من 150 حرف ',
                    'mobile.required' => 'رقم الهاتف مطلوب.',
                    'mobile.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط.',
                    'mobile.unique' => 'رقم الهاتف مسجل بالفعل.',
                    'mobile.digits_between' => 'يجب أن يكون رقم الهاتف بين 8 و 16 رقمًا.',
                    'password.required' => 'من فضلك ادخل كلمة المرور ',
                    'password.min' => ' من فضلك ادخل كلمة مرور قوية اكثر من 8 احرف وارقام ',
                    'confirm_password.same' => 'من فضلك اكد كلمة المرور بشكل صحيح ',
                    'logo.image' => 'الملف يجب أن يكون صورة.',
                    'logo.mimes' => 'الصورة يجب أن تكون بصيغة:  webp , jpg , jpeg, png.',
                    'logo.max' => 'حجم الصورة يجب ألا يتجاوز 4 ميجابايت.'
                ];

                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                // حفظ الصورة إذا كانت موجودة
                $filename = null;
                if ($request->hasFile('logo')) {
                    try {
                        $filename = $this->saveImage($request->file('logo'), public_path('assets/uploads/companies'));
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'The logo failed to upload: ' . $e->getMessage())->withInput();
                    }
                }

                //$company = new Company();
                $company = Company::create([
                    'name' => $data['name'],
                    'username' => $username,
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],
                    'password' => Hash::make($data['password']),
                    'info' => $data['info'],
                    'plan_selected' => $data['plan_selected'],
                    'wherelisting' => $data['wherelisting'],
                    'logo' => $filename,
                ]);

                return $this->success_message('تم اضافة الشركة بنجاح');
            }

        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('admin.companies.store', compact('plans'));
    }

    ////////////////////////// start update
    ///
    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);
        $plans = Plan::where('status', '1')->get();
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $username = $this->CustomeSlug($data['name']);
                $checkUsername = Company::where('username', $username)->where('id', '!=', $id)->count();
                if ($checkUsername > 0) {
                    return Redirect::back()->withInput()->withErrors(['اسم الشركة متواجد من قبل من فضلك ادخل اسم جديد ']);
                }
                $rules = [
                    'name' => 'required',
                    'email' => 'required|email|unique:companies,email,' . $id . '|max:150',
                    'mobile' => 'required|numeric|unique:companies,mobile,' . $id . '|digits_between:8,16',
                ];
                if ($request->password != '') {
                    $rules['password'] = 'required|min:8';
                    $rules['confirm_password'] = 'required|same:password';
                }
                // التحقق من وجود الصورة وإضافة قواعد التحقق الخاصة بها
                if ($request->hasFile('logo')) {
                    $rules['logo'] = 'image|mimes:jpg,png,jpeg|max:4096'; // max:4096 لتحديد حجم الملف بالكيلوبايت (4MB)
                }
                $messages = [
                    'name.required' => 'من فضلك ادخل اسم الشركة',
                    'email.required' => 'من فضلك ادخل البريد الالكتروني ',
                    'email.unique' => 'البريد الالكتروني مستخدم بالفعل ',
                    'email.email' => 'من فضلك ادخل بريد الكتروني بشكل صحيح ',
                    'email.max' => 'من فضلك ادخل بريد الكتروني اقل من 150 حرف ',
                    'mobile.required' => 'رقم الهاتف مطلوب.',
                    'mobile.numeric' => 'رقم الهاتف يجب أن يكون أرقام فقط.',
                    'mobile.unique' => 'رقم الهاتف مسجل بالفعل.',
                    'mobile.digits_between' => 'يجب أن يكون رقم الهاتف بين 8 و 16 رقمًا.',
                    'password.required' => 'من فضلك ادخل كلمة المرور ',
                    'password.min' => ' من فضلك ادخل كلمة مرور قوية اكثر من 8 احرف وارقام ',
                    'confirm_password.same' => 'من فضلك اكد كلمة المرور بشكل صحيح ',
                    'logo.image' => 'الملف يجب أن يكون صورة.',
                    'logo.mimes' => 'الصورة يجب أن تكون بصيغة:  webp , jpg , jpeg, png.',
                    'logo.max' => 'حجم الصورة يجب ألا يتجاوز 4 ميجابايت.'
                ];

                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                // حفظ الصورة إذا كانت موجودة
                $filename = null;
                if ($request->hasFile('logo')) {
                    try {
                        $filename = $this->saveImage($request->file('logo'), public_path('assets/uploads/companies'));
                        /// Delete old image
                        unlink($company['logo'], public_path('assets/uploads/companies/' . $company['logo']));
                        $company->update([
                            'logo' => $filename,
                        ]);
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'The logo failed to upload: ' . $e->getMessage())->withInput();
                    }
                }

                if ($request->password != '') {
                    $company->update([
                        'password' => Hash::make($data['password']),
                    ]);
                }
                $company->update([
                    'name' => $data['name'],
                    'username' => $username,
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],

                    'info' => $data['info'],
                    'plan_selected' => $data['plan_selected'],
                    'wherelisting' => $data['wherelisting'],
                ]);

                return $this->success_message('تم تحديث الشركة بنجاح');
            }

        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('admin.companies.update', compact('plans', 'company'));
    }

    public function delete($id)
    {
        try {
            $company = Company::findOrFail($id);
            $company->delete();
            return $this->success_message('تم حذف الشركة بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }
}
