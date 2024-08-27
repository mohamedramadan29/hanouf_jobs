<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Company;
use App\Models\website\Joboffer;
use App\Notifications\NewOfferRequestToCompanyJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class jobOfferController extends Controller
{
    use Message_Trait;
    use Upload_Images;

    public function add_offer(Request $request)
    {
        $data = $request->all();

        // dd($data);
        $rules = [
            'adv_id' => 'required',
            'company_id' => 'required',
            'cover_letter' => 'required|min:50',
        ];

        if ($request->hasFile('cover_files')) {
            $rules['cover_files.*'] = 'required|mimes:pdf,doc,docx|max:51200'; // 51200KB = 50MB
        }


        $messages = [
            'cover_letter.required' => ' من فضلك ادخل خطاب التوظيف   ',
            'cover_letter.min' => ' اقل عدد من الحروف في الخطاب 50 حرف  ',
            'cover_files.*.mimes' => ' من فضلك حدد الملفات بشكل صحيح من نوع : pdf,doc,docx  ',
            'cover_files.*.max' => ' اقصي حجم للملف  50 ميجا  ',
        ];

        $validator = Validator::make($data, $rules, $messages);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }

        $fileImages = [];

        if ($request->hasFile('cover_files')) {
            foreach ($request->file('cover_files') as $file) {
                $filePath = $file->store('uploads/JobOfferFiles', 'public');
                $fileImages[] = $filePath;
               // $fileImages[] = $this->saveImage($file, public_path('assets/uploads/JobOfferFiles'));
            }
        }

        $fileImages = json_encode($fileImages); // إذا كنت ترغب في تخزين المسارات في قاعدة البيانات كـ JSON


        $newOffer = new Joboffer();
        $newOffer->create([
            'adv_id' => $data['adv_id'],
            'user_id' => Auth::id(),
            'company_id' => $data['company_id'],
            'cover_letter' => $data['cover_letter'],
            'cover_files' => $fileImages,
        ]);
        ///////// Send Notification Not Company You Have New Offer From Employer
        ///
        $company = Company::where('id',$data['company_id'])->get();
        $compan_id = $data['company_id'];
        $adv_title = $data['adv_title'];
        $adv_id = $data['adv_id'];
        Notification::send($company,new NewOfferRequestToCompanyJob($compan_id,$adv_title,$adv_id));
        return $this->success_message(' تم اضافة العرض الخاص بك بنجاح  ');

    }
}
