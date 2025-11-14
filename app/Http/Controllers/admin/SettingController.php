<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\admin\Setting;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\AboutContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class SettingController extends Controller
{
    use Message_Trait;
    use Upload_Images;
    public function update(Request $request)
    {
        $setting = Setting::first();
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required',
                'address' => 'required|string',
                'description' => 'required|string',
                'logo' => 'image|mimes:jpg,png,jpeg,webp',
                'favicon' => 'image|mimes:jpg,png,jpeg,webp',
            ];
            $messages = [
                'name.required' => ' من فضلك ادخل اسم الموقع  ',
                'email.required' => ' من فضلك ادخل الايميل  ',
                'email.email' => ' من فضلك ادخل بريد الكتوني صحيح  ',
                'phone.required' => ' من فضلك ادخل رقم الهاتف  ',
                // 'phone.numeric' => ' من فضلك ادخل رقم الهاتف صحيح  ',
                'address.required' => ' من فضلك ادخل العنوان  ',
                'description.required' => ' من فضلك ادخل وصف الموقع  ',
                'logo.image' => ' من فضلك ادخل صورة الموقع  ',
                'favicon.image' => ' من فضلك ادخل صورة الموقع  ',
            ];
            $validator = Validator::make($data, $rules, $messages);
            if ($validator->fails()) {
                return Redirect::back()->withInput()->withErrors($validator);
            }

            $setting->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'description' => $data['description'],
                'facebook' => $data['facebook'],
                'twitter' => $data['twitter'],
                'instagram' => $data['instagram'],
                'youtube' => $data['youtube'],
                'linkedin' => $data['linkedin'],
                'whatsapp' => $data['whatsapp'],
            ]);

            if ($request->hasFile('logo')) {
                ######## Delete Old Logo
                $oldLogo = public_path('assets/uploads/setting/' . $setting['logo']);
                if (file_exists($oldLogo)) {
                    unlink($oldLogo);
                }
                $filename = $this->saveImage($request->file('logo'), public_path('assets/uploads/setting'));
                $setting->update([
                    'logo' => $filename,
                ]);
            }
            if ($request->hasFile('favicon')) {
                ######## Delete Old Favicon
                $oldFavicon = public_path('assets/uploads/Setting/' . $setting['favicon']);
                if (file_exists($oldFavicon)) {
                    unlink($oldFavicon);
                }
                $filename = $this->saveImage($request->file('favicon'), public_path('assets/uploads/setting'));
                $setting->update([
                    'favicon' => $filename,
                ]);
            }
            return $this->success_message(' تم تحديث الاعدادات بنجاح  ');
        }

        return view('admin.main-setting.update', compact('setting'));
    }

    #################### Start Update Content ####################

    public function updateContent(Request $request)
    {
        $content = AboutContent::first();
        if ($request->isMethod('post')) {
            $data = $request->all();

            if ($request->hasFile('hero_image')) {
                ######## Delete Old Logo
                $oldhero_image = public_path('assets/uploads/contents/' . $content['hero_image']);
                if (file_exists($oldhero_image)) {
                    @unlink($oldhero_image);
                }
                $hero_image = $this->saveImage($request->file('hero_image'), public_path('assets/uploads/contents'));
                $content->update([
                    'hero_image' => $hero_image,
                ]);
            }

            ################## About Image

            if ($request->hasFile('about_image')) {
                ######## Delete Old Logo
                $oldabout_image = public_path('assets/uploads/contents/' . $content['about_image']);
                if (file_exists($oldabout_image)) {
                    @unlink($oldabout_image);
                }
                $about_image = $this->saveImage($request->file('about_image'), public_path('assets/uploads/contents'));
                $content->update([
                    'about_image' => $about_image,
                ]);
            }


            $content->update([
                'hero_title' => $data['hero_title'],
                'hero_desc' => $data['hero_desc'],
                'about_title' => $data['about_title'],
                'about_section' => $data['about_section'],

                'job_step1_title' => $data['job_step1_title'],
                'job_step1_desc' => $data['job_step1_desc'],

                'job_step2_title' => $data['job_step2_title'],
                'job_step2_desc' => $data['job_step2_desc'],

                'job_step3_title' => $data['job_step3_title'],
                'job_step3_desc' => $data['job_step3_desc'],

                'exper_step1_title' => $data['exper_step1_title'],
                'exper_step1_desc' => $data['exper_step1_desc'],

                'exper_step2_title' => $data['exper_step2_title'],
                'exper_step2_desc' => $data['exper_step2_desc'],

                'exper_step3_title' => $data['exper_step3_title'],
                'exper_step3_desc' => $data['exper_step3_desc'],


            ]);
            return $this->success_message(' تم التعديل بنجاح  ');
        }
        return view('admin.main-setting.update-content', compact('content'));
    }
    ################### End Update Content #######################
}
