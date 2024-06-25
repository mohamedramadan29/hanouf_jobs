<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Advertisment;
use App\Models\admin\City;
use App\Models\admin\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    use Message_Trait;
    use Slug_Trait;
    use Upload_Images;

    public function index()
    {
        return view('website.users.dashboard');
    }

    function register(Request $request)
    {
        if ($request->isMethod('post')) {
            try {
                DB::beginTransaction();
                $data = $request->all();
                $username = $this->CustomeSlug($data['name']);
                $checkUsername = User::where('username', $username)->count();
                if ($checkUsername > 0) {
                    return redirect()->back()->withErrors([' اسم المستخدم متواجد من قبل من فضلك ادخل اسم جديد  '])->withInput();
                }
                $rules = [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email|max:150',
                    'mobile' => 'required|numeric|unique:users,mobile|digits_between:8,16',
                    'password' => 'required|min:8',
                    'confirm_password' => 'required|same:password'
                ];
                $messages = [
                    'name.required' => 'من فضلك ادخل  الاسم',
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

                $user = User::create([
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
                Mail::send('website.mails.UserActivationEmail', $MessageDate, function ($message) use ($email) {
                    $message->to($email)->subject(' تفعيل الحساب الخاص بك  ');
                });

                DB::commit();
                return $this->success_message('تم انشاء الحساب بنجاح من فضلك فعل حسابك من خلال البريد المرسل  ⚡️');

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        return view('website.register');
    }

    // Active User Email
    public function UserConfirm($email)
    {
        $email = base64_decode($email);
        // check if this email exist in users or not
        $user_details = User::where('email', $email)->first();
        $userCount = User::where('email', $email)->count();
        if ($userCount > 0) {
            if ($user_details->email_confirm == 1) {
                //$message = 'تم تفعيل البريد الالكتروني بالفعل ! سجل دخولك الان ';
                // return redirect('login')->with('Error_Message', $message);
                return redirect('login')->withErrors([' تم تفعيل البريد الالكتروني بالفعل ! سجل دخولك الان  '])->withInput();
            } else {
                // Update User Status
                User::where('email', $email)->update(['email_confirm' => 1]);
                // Redirect User To Login/ Regitser Page With Message
                $message = 'تم تفعيل البريد الالكتروني الخاص بك يمكنك تسجيل الدخول الان ';
                return redirect('login')->with('Success_message', $message);
            }
        } else {
            abort(404);
        }

    }

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
                if (Auth::attempt(['email' => $data['email'], 'password' => $data['password']])) {
                    if (Auth::user()->email_confirm == 0) {
                        Auth::logout();
                        return Redirect::back()->withInput()->withErrors('  من فضلك يجب تفعيل الحساب الخاص بك اولا  ');
                    }
                    return \redirect('user/dashboard');
                } else {
                    return Redirect::back()->withInput()->withErrors('لا يوجد حساب بهذه البيانات  ');
                }

            } catch (\Exception $e) {
                return $this->exception_message($e);
            }
        }
        if (Auth::user()) {
            return \redirect('user/dashboard');
        }
        return view('website.login');
    }

    public function update_info(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $user = User::where('id', Auth::user()->id)->first();
                $id = $user['id'];
                $rules = [
                    'name' => 'required',
                    'email' => 'required|email|unique:users,email,' . $id . '|max:150',
                    'mobile' => 'required|numeric|unique:users,mobile,' . $id . '|digits_between:8,16',
                ];
                if ($request->hasFile('logo')) {
                    $rules['logo'] = 'image|mimes:jpg,png,jpeg|max:4096'; // max:4096 لتحديد حجم الملف بالكيلوبايت (4MB)
                }
                $messages = [
                    'name.required' => 'من فضلك ادخل الاسم ',
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
                        $filename = $this->saveImage($request->file('logo'), public_path('assets/uploads/users'));
                        /// Delete old image
                        if ($user['logo'] != null && $user['logo'] != '') {
                            unlink($user['logo'], public_path('assets/uploads/users/' . $user['logo']));
                        }

                        $user->update([
                            'logo' => $filename,
                        ]);
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'The logo failed to upload: ' . $e->getMessage())->withInput();
                    }
                }
                $user->update([
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

    public function update_data(Request $request)
    {
        $citizen = City::all();
        $user = User::where('id',Auth::id())->first();
        try {

            if ($request->isMethod('post')) {
                $data = $request->all();
                // dd($data);
                $work_type = implode(',', $data['work_type']);
                $language = implode(',', $data['language']);
                $rules = [
                    'nationality' => 'required',
                    'sex' => 'required',
                    'city' => 'required',
                    'can_placed_from_to_another' => 'required',
                    'job_name' => 'required',
                    'work_type' => 'required',
                    'experience' => 'required',
                    'language' => 'required',
                    'language_level' => 'required',
                    'profession_specialist' => 'required',
                    'notification_timeslot' => 'required',
                    'salary' => 'required',
                ];
                $messages = [
                    'nationality.required' => ' من فضلك حدد الجنسية  ',
                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }

                $user->update([
                    'nationality' => $data['nationality'],
                    'sex' => $data['sex'],
                    'city' => $data['city'],
                    'can_placed_from_to_another' => $data['can_placed_from_to_another'],
                    'job_name' => $data['job_name'],
                    'work_type' => $work_type,
                    'experience' => $data['experience'],
                    'language' => $language,
                    'language_level' => $data['language_level'],
                    'profession_specialist' => $data['profession_specialist'],
                    'notification_timeslot' => $data['notification_timeslot'],
                    'salary' => $data['salary'],
                ]);
                return $this->success_message('  تم تعديل البيانات الخاصة بك بنجاح  !!  ');
            }
        }catch (\Exception $e){
            return $this->exception_message($e);
        }
        return view('website.users.update-data',compact('user','citizen'));
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

                if (Hash::check($data['old_password'], Auth::user()->password)) {
                    $user = User::where('id', Auth::user()->id)->first();
                    $user->update([
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
        return view('website.users.change-password');
    }

    public function alerts()
    {
        return view('website.users.alerts');
    }

    function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
