<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Advertisment;
use App\Models\admin\City;
use App\Models\admin\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class CompanyController extends Controller
{
    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;

    public function register(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            $username = $this->CustomeSlug($data['name']);
            $checkUsername = Company::where('username', $username)->count();
            if ($checkUsername > 0) {
                return redirect()->back()->withErrors([' اسم الشركة متواجد من قبل من فضلك ادخل اسم جديد  '])->withInput();
            }
            $rules = [
                'name' => 'required',
                'email' => 'required|email|unique:companies,email|max:150',
                'mobile' => 'required|numeric|unique:companies,mobile|digits_between:8,16',
                'password' => 'required|min:8',
                'confirm_password' => 'required|same:password'
            ];
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
            ];

            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $company = Company::create([
                'name' => $data['name'],
                'username' => $username,
                'email' => $data['email'],
                'mobile' => $data['mobile'],
                'password' => Hash::make($data['password']),
                'wherelisting' => $data['wherelisting'],
            ]);
            ////////////////////// Send Confirmation Email ///////////////////////////////
            ///
            $email = $data['email'];

            $MessageDate = [
                'name' => $data['name'],
                "email" => $data['email'],
                'mobile' => $data['mobile'],
                'code' => base64_encode($email)
            ];
            Mail::send('website.mails.CompanyActivationEmail', $MessageDate, function ($message) use ($email) {
                $message->to($email)->subject(' تفعيل الحساب الخاص بك  ');
            });

            DB::commit();
            return $this->success_message('تم انشاء الحساب بنجاح من فضلك فعل حسابك من خلال البريد المرسل  ⚡️');

        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }

    // Active User Email
    public function CompanyConfirm($email)
    {
        $email = base64_decode($email);
        // check if this email exist in users or not
        $user_details = Company::where('email', $email)->first();
        $userCount = Company::where('email', $email)->count();
        if ($userCount > 0) {
            if ($user_details->email_confirm == 1) {
                //$message = 'تم تفعيل البريد الالكتروني بالفعل ! سجل دخولك الان ';
                // return redirect('login')->with('Error_Message', $message);
                return redirect('login')->withErrors([' تم تفعيل البريد الالكتروني بالفعل ! سجل دخولك الان  '])->withInput();
            } else {
                // Update User Status
                Company::where('email', $email)->update(['email_confirm' => 1]);
                // Redirect User To Login/ Regitser Page With Message
                $message = 'تم تفعيل البريد الالكتروني الخاص بك يمكنك تسجيل الدخول الان ';
                return redirect('login')->with('Success_message', $message);
            }
        } else {
            abort(404);
        }

    }

    /////////////// Login ///////////////
    ///
    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                $data = $request->all();
                $rules = [
                    'email' => 'required|email',
                    'password' => 'required'
                ];
                $messages = [
                    'email.required' => '  من فضلك ادخل البريد الالكتروني   ',
                    'email.email' => ' من فضلك ادخل بريد الكتروني صحيح  ',
                    'password.required' => ' من فضلك ادخل كلمة المرور ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                if (Auth::guard('company')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                    if (Auth::guard('company')->user()->email_confirm == 0) {
                        Auth::guard('company')->logout();
                        return Redirect::back()->withInput()->withErrors('  من فضلك يجب تفعيل الحساب الخاص بك اولا  ');
                    }
                    return \redirect('company/dashboard');
                } else {
                    return Redirect::back()->withInput()->withErrors('لا يوجد حساب بهذه البيانات  ');
                }

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        if (Auth::guard('company')->user()) {
            return \redirect('company/dashboard');
        }

    }

    public function index()
    {
        return view('website.companies.dashboard');
    }

    public function update_info(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $company = Company::where('id', Auth::guard('company')->user()->id)->first();
                $id = $company['id'];
                $rules = [
                    'name' => 'required',
                    'email' => 'required|email|unique:companies,email,' . $id . '|max:150',
                    'mobile' => 'required|numeric|unique:companies,mobile,' . $id . '|digits_between:8,16',
                ];
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
                    'logo.image' => 'الملف يجب أن يكون صورة.',
                    'logo.mimes' => 'الصورة يجب أن تكون بصيغة:  webp , jpg , jpeg, png.',
                    'logo.max' => 'حجم الصورة يجب ألا يتجاوز 4 ميجابايت.'
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }


                if ($request->hasFile('logo')) {
                    try {
                        $filename = $this->saveImage($request->file('logo'), public_path('assets/uploads/companies'));
                        /// Delete old image
                        if ($company['logo'] != null && $company['logo'] != '') {
                            unlink($company['logo'], public_path('assets/uploads/companies/' . $company['logo']));
                        }

                        $company->update([
                            'logo' => $filename,
                        ]);
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'The logo failed to upload: ' . $e->getMessage())->withInput();
                    }
                }
                $company->update([
                    'name' => $data['name'],
                    'email' => $data['email'],
                    'mobile' => $data['mobile'],
                    'info' => $data['info'],
                ]);
                return $this->success_message(' تم تعديل البيانات بنجاح !  ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }

    public function add_job(Request $request)
    {
        $citizen = City::all();
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                // dd($data);
                $work_type = implode(',', $data['work_type']);
                $language = implode(',', $data['language']);
                $rules = [
                    'company_id' => 'required',
                    'nationality' => 'required',
                    'sex' => 'required',
                    'city' => 'required',
                    'available_work_from_another_place' => 'required',
                    'job_name' => 'required',
                    'work_type' => 'required',
                    'experience' => 'required',
                    'language' => 'required',
                    'language_level' => 'required',
                    'profession_specialist' => 'required',
                    'notification_timeslot' => 'required',
                    'salary' => 'required',
                    'description' => 'required',
                    'title' => 'required',
                    'title_name' => 'required',
                ];
                $messages = [
                    'nationality.required' => ' من فضلك حدد الجنسية  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }
                $advertiesment = new Advertisment();

                $advertiesment->create([
                    'company_id' => $data['company_id'],
                    'nationality' => $data['nationality'],
                    'sex' => $data['sex'],
                    'city' => $data['city'],
                    'available_work_from_another_place' => $data['available_work_from_another_place'],
                    'job_name' => $data['job_name'],
                    'work_type' => $work_type,
                    'experience' => $data['experience'],
                    'language' => $language,
                    'language_level' => $data['language_level'],
                    'profession_specialist' => $data['profession_specialist'],
                    'notification_timeslot' => $data['notification_timeslot'],
                    'salary' => $data['salary'],
                    'description' => $data['description'],
                    'title' => $data['title'],
                    'title_name' => $data['title_name'],
                ]);
                return $this->success_message('  تم اضافة الاعلان بنجاح   ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

        return view('website.companies.add_job', compact('citizen'));
    }

    public function jobs()
    {
        $jobs = Advertisment::where('company_id',Auth::guard('company')->user()->id)->get();

        return view('website.companies.jobs',compact('jobs'));
    }

    public function delete_job($id)
    {
        try {

            $job = Advertisment::findOrFail($id);
          //  dd($job);
            if(Auth::guard('company')->user()->id == $job['company_id']){
                $job->delete();
                return $this->success_message(' تم حذف الوظيفة بنجاح  ');
            }else{
                return $this->Error_message(' لا يمكنك حذف هذة الوظيفة  ');
            }


        }catch (\Exception $e){
            return $this->exception_message($e);
        }
    }

    public function chat()
    {
        return view('website.companies.chat');
    }

    public function job_users()
    {
        return view('website.companies.job-users');
    }

    public function plans()
    {
        return view('website.companies.plan');
    }

    public function change_password()
    {
        return view('website.companies.change-password');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
