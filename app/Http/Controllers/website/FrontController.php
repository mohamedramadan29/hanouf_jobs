<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Models\admin\Faq;
use App\Models\website\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    use Message_Trait;

    function contact()
    {
        return view('website.contact');
    }


    function faqs()
    {
        $faqs = Faq::all();
        $companyfaqs = Faq::where('type','شركة')->get();
        $employesfaqs = Faq::where('type','موظف')->get();
        return view('website.faqs',compact('employesfaqs','companyfaqs'));
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
                'name'=>$data['name'],
                'email'=>$data['email'],
                'phone'=>$data['phone'],
                'subject'=>$data['subject'],
                'message'=>$data['message'],
            ]);
            // Send Alert New Message Notification To Admin
            $email = 'mr319242@gmail.com';

            $MessageDate = [
                'name' => $data['name'],
                "email" => $data['email'],
                'phone' => $data['phone'],
                'subject'=>$data['subject'],
                'contact_message'=>$data['message']
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
}
