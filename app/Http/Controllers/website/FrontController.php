<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Advertisment;
use App\Models\admin\City;
use App\Models\admin\Faq;
use App\Models\admin\Jobsname;
use App\Models\admin\Specialist;
use App\Models\admin\Terms;
use App\Models\User;
use App\Models\website\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Models\admin\Company;

class FrontController extends Controller
{
    use Message_Trait;

//    public function index()
//    {
//        return view('website.index',compact(''));
//    }
    function contact()
    {
        return view('website.contact');
    }


    function faqs()
    {
        $companyfaqs = Faq::where('type', 'شركة')->get();
        $employesfaqs = Faq::where('type', 'موظف')->get();
        return view('website.faqs', compact('employesfaqs', 'companyfaqs'));
    }

    public function terms()
    {
        $term_data = Terms::orderby('id', 'desc')->first();
        return view('website.terms', compact('term_data'));
    }

    public function employers()
    {
        $companyfaqs = Faq::where('type', 'شركة')->get();
        return view('website.employers', compact('companyfaqs'));
    }

    public function add_contact_message(Request $request)
    {
        try {
            DB::beginTransaction();
            $data = $request->all();
            // dd($data);
            $rules = [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => ['required', 'numeric', 'regex:/^\+?\d{0,15}$/'],
                'subject' => 'required',
                'message' => 'required|min:20',
            ];
            $messages = [
                'name.required' => 'من فضلك ادخل الاسم ',
                'email.required' => ' من فضلك ادخل البريد الالكتروني ',
                'email.email' => 'من فضلك ادخل بريد الكتروني صحيح ',
                'subject.required' => ' من فضلك ادخل عنوان الرسالة ',
                'message.required' => ' من فضلك ادخل رسالتك ',
                'message.min' => ' من فضلك اقل طول لنص الرسالة يجب ان يكون 20 حرف ',
                'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
                'phone.numeric' => 'رقم الهاتف يجب ان يكون صحيح يحتوي علي ارقام فقط + لا يكون اكثر من 15 رقم '
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }

            $new_message = new ContactMessage();

            $new_message->create([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'subject' => $data['subject'],
                'message' => $data['message'],
            ]);
            // Send Alert New Message Notification To Admin
            $email = env('MAIL_FROM_ADDRESS');

            $MessageDate = [
                'name' => $data['name'],
                "email" => $data['email'],
                'phone' => $data['phone'],
                'subject' => $data['subject'],
                'contact_message' => $data['message']
            ];
            Mail::send('website.mails.SendAlertNewContactMessage', $MessageDate, function ($message) use ($email) {
                $message->to($email)->subject(' لديك رسالة تواصل جديدة من صفحة تواصل معنا  ');
            });
            DB::commit();
            emotify('success', 'تم ارسال رسالتك بنجاح سوف نتواصل معك في اقرب وقت ممكن ⚡️');

            return Redirect::back();
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }


    }

    /////////// Public Details
    ///
    public function company_details($username)
    {
        $company_count = Company::where('username', $username)->count();
        if ($company_count > 0) {
            $company = Company::where('username', $username)->first();
            $advs = Advertisment::where('company_id', $company['id'])->where('status', '1')->get();
            return view('website.public-company-info', compact('company', 'advs'));
        } else {
            abort('404');
        }

    }

    public function talents(Request $request)
    {

        $query = User::with('jobs_name', 'location');

        if ($request->has('job_ids')) {
            $jobids = $request->get('job_ids');
            $query->whereIn('job_name', $jobids);
        }
        if ($request->has('special_ids')) {
            $special_ids = $request->get('special_ids');
            $query->whereIn('profession_specialist', $special_ids);
        }
        if ($request->has('nationality')) {
            $nationality = $request->get('nationality');
            $query->whereIn('nationality', $nationality);
        }
        if ($request->has('sex')) {
            $sex = $request->get('sex');
            $query->whereIn('sex', $sex);
        }
        if ($request->has('city_ids')) {
            $city_ids = $request->get('city_ids');
            $query->whereIn('city', $city_ids);
        }
        $jobs = Jobsname::all();
        $specialists = Specialist::all();
        $citizen = City::all();
        $users = $query->where('job_name','!=','')->where('profession_specialist','!=','')->where('city','!=','')->paginate(5);
        return view('website.talents', compact('users', 'jobs', 'specialists','citizen'));
    }

    public function talent_details($username)
    {
        $talent_count = User::where('username', $username)->count();
        if ($talent_count > 0) {
            $talent = User::with('jobs_name', 'location')->where('username', $username)->first();
            return view('website.talent-details', compact('talent'));
        } else {
            abort('404');
        }

    }

}
