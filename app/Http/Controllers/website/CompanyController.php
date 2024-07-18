<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Advertisment;
use App\Models\admin\City;
use App\Models\admin\Company;
use App\Models\admin\Jobsname;
use App\Models\admin\Specialist;
use App\Models\User;
use App\Models\website\Joboffer;
use App\Notifications\SendUnaccepedOfferToUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
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


    public function forget_password(Request $request)
    {
        if
        ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $email = $data['email'];
            $company = Company::where('email', $email)->count();
            if ($company > 0) {
                ////////////////////// Send Forget Mail To Company  ///////////////////////////////
                ///
                DB::beginTransaction();
                $email = $data['email'];
                $MessageDate = [
                    'code' => base64_encode($email)
                ];
                Mail::send('website.mails.CompanyChangePasswordMail', $MessageDate, function ($message) use ($email) {
                    $message->to($email)->subject(' رابط تغير كلمة المرور ');
                });
                DB::commit();
                return $this->success_message(' تم ارسال رابط تغير كلمة المرور علي البريد الالكتروني  ');
            } else {
                return Redirect::back()->withErrors(['للاسف لا يوجد حساب بهذة البيانات ']);
                // return $this->Error_message(' للاسف لا يوجد حساب بهذة البيانات  ');
            }
        }
        return view('website.forget-password');
    }

    public function change_forget_password(Request $request, $email)
    {
        $email = base64_decode($email);
        return view('website.company-change-password', compact('email'));
    }

    public function update_forget_password(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            $email = $data['email'];
            //dd($data);
            $companycount = Company::where('email', $email)->count();
            if ($companycount > 0) {
                ////////// Start Change Password
                $company = Company::where('email', $email)->first();
                $rules = [
                    'password' => 'required',
                    'confirm_password' => 'required|same:password'
                ];
                $messages = [
                    'password.required' => ' من فضلك ادخل كلمة المرور  ',
                    'confirm_password.required' => ' من فضلك اكد كلمة المرور ',
                    'confirm_password.same' => ' من فضلك يجب تاكيد كلمة المرور بنجاح '
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }
                $company->update([
                    'password' => Hash::make($data['password']),
                ]);
                return redirect()->to('login')->with('Success_message', '   تم تعديل كلمة المرور بنجاح سجل ذخولك الان ');
            } else {
                return Redirect::back()->withErrors(['للاسف لا يوجد حساب بهذة البيانات ']);
            }
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
        $JobsNames = Jobsname::all();
        $specialists = Specialist::all();
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
                ];
                $messages = [
                    'nationality.required' => ' من فضلك حدد الجنسية  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }
                $advertiesment = new Advertisment();
                $adv_slug = $this->CustomeSlug($data['title']);
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
                    'slug' => $adv_slug,
                    'job_requirements' => $data['job_requirements'],
                    'job_experience' => $data['job_experience'],
                    'job_advantage' => $data['job_advantage'],
                    'job_needed' => $data['job_needed']
                ]);
                return $this->success_message('  تم اضافة الاعلان بنجاح من فضلك انتظر التفعيل من الادارة !!  ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

        return view('website.companies.add_job', compact('citizen', 'specialists', 'JobsNames'));
    }

    public function jobs()
    {
        $jobs = Advertisment::where('company_id', Auth::guard('company')->user()->id)->get();

        return view('website.companies.jobs', compact('jobs'));
    }

    public function update_job(Request $request, $id)
    {
        $JobsNames = Jobsname::all();
        $specialists = Specialist::all();
        $adv = Advertisment::findOrFail($id);
        if ($adv['company_id'] != Auth::guard('company')->user()->id) {
            return \redirect('404');
        }
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
                ];
                $messages = [
                    'nationality.required' => ' من فضلك حدد الجنسية  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }
                $adv->update([
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
                    'job_requirements' => $data['job_requirements'],
                    'job_experience' => $data['job_experience'],
                    'job_advantage' => $data['job_advantage'],
                    'job_needed' => $data['job_needed'],
                    'status' => 0,
                ]);
                return $this->success_message('  تم تعديل الاعلان بنجاح من فضلك انتظر التفعيل من الادارة !!  ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('website.companies.update-job', compact('adv', 'citizen', 'specialists', 'JobsNames'));
    }

    public function delete_job($id)
    {
        try {

            $job = Advertisment::findOrFail($id);
            //  dd($job);
            if (Auth::guard('company')->user()->id == $job['company_id']) {
                $job->delete();
                return $this->success_message(' تم حذف الوظيفة بنجاح  ');
            } else {
                return $this->Error_message(' لا يمكنك حذف هذة الوظيفة  ');
            }


        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
    }


    /////////// Show Job Offers //////
    ///
    public function talent_offers($id)
    {
        $adv = Advertisment::where('id', $id)->first();
        /////// Check This Company Has This Adv Or Not
        ///
        if (isset($adv)) {
            $company_id = $adv['company_id'];
            if (Auth::guard('company')->id() == $company_id) {
                $offers = Joboffer::with('user')->where('adv_id', $id)->paginate(5);

                $count_offers = Joboffer::where('adv_id', $id)->count();

                //////////////// Update red In Notification Table
                ///
                $notifications = DB::table('notifications')
                    ->where('notifiable_id', $company_id)
                    ->where('type', 'App\Notifications\NewOfferRequestToCompanyJob')->update(['read_at' => now()]);
                return view('website.companies.talent-offers', compact('offers', 'adv', 'count_offers'));
            } else {
                abort('404');
            }
        } else {
            abort('404');
        }


    }

    //////////// Unaccepted Offer
    ///
    public function offer_unaccepted($id)
    {
        try{
            $offer = Joboffer::findOrFail($id);

            // Get The User
            $user_id = $offer['user_id'];
            $user = User::where('id',$user_id)->get();
            $adv_id = $offer['adv_id'];
            $adv = Advertisment::where('id',$adv_id)->first();
            $adv_slug = $adv['slug'];
            $adv_name = $adv['title'];
            ///////// Update Offer Table To Refused
            $offer->update([
                'offer_status'=>'مرفوض'
            ]);

            ///////// Send Notification To User For Refused

            Notification::send($user,new SendUnaccepedOfferToUser($user_id,$adv_id,$adv_slug,$adv_name));

            return $this->success_message(' تم رفض العرض من المتقدم  ');

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

    public function change_password(Request $request)
    {

        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $rules = [
                    'old_password' => 'required',
                    'new_password' => 'required|min:8',
                    'confirm_password' => 'required|same:new_password'
                ];
                $messages = [
                    'old_password.required' => ' من فضلك ادخل كلمة المرور القديمة ',
                    'new_password.min' => ' من فضلك ادخل كلمة مرور قوية اكثر من 8 احرف وارقام ',
                    'confirm_password.same' => 'من فضلك اكد كلمة المرور بشكل صحيح ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withInput()->withErrors($validator);
                }

                if (Hash::check($data['old_password'], Auth::guard('company')->user()->password)) {
                    $company = Company::where('id', Auth::guard('company')->id())->first();
                    $company->update([
                        'password' => Hash::make($data['new_password'])
                    ]);
                    return $this->success_message(' رائع !! تم تعديل كلمة المرور بنجاح  ');
                } else {
                    return Redirect::back()->withInput()->withErrors(['  كلمة المرور القديمة غير صحيحة !!!!!  ']);
                }

            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('website.companies.change-password');
    }

    public function logout()
    {
        Auth::guard('company')->logout();
        return Redirect::to('/');
    }
}
