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
        // إنشاء استعلام للمستخدمين مع جلب العلاقات المطلوبة
        $query = User::with('jobs_name', 'location');

        // شرط البحث على أساس المسمي الوظيفي
        if ($request->filled('job_ids')) {
            $query->where('job_name', $request->job_ids);
        }

        // شرط البحث على أساس التخصص المهني
        if ($request->filled('special_ids')) {
            $query->where('profession_specialist', $request->special_ids);
        }

        // شرط البحث على أساس المؤهل العلمي
        if ($request->filled('academy_certificate')) {
            $query->where('academy_certificate', $request->academy_certificate);
        }

        // جلب جميع القيم الضرورية لعرضها في النموذج
        $jobs = Jobsname::all();
        $specialists = Specialist::all();
        $citizen = City::all();

        // تنفيذ الاستعلام مع التصفية حسب الحقول المطلوبة
        $users = $query->where('job_name', '!=', '')->where('profession_specialist', '!=', '')->where('city', '!=', '')->paginate(5);

        // عرض النتيجة في صفحة المواهب
        return view('website.talents', compact('users', 'jobs', 'specialists', 'citizen'));
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
