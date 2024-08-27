<?php

namespace App\Http\Controllers\admin;

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
use App\Notifications\SendJobAcceptedFromAdmin;
use App\Notifications\SendNewSujestJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdvertesmentController extends Controller
{

    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $advertisements = Advertisment::with('company', 'jobs_names')->get();
        // dd($advertisements);
        return view('admin.advertisements.index', compact('advertisements'));
    }

    public function store(Request $request)
    {
        $companies = Company::all();
        $citizen = City::all();
        $JobsNames = Jobsname::all();
        $specialists = Specialist::all();
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $language = implode(',', $data['language']);
                $rules = [
                    'company_id' => 'required',
                    'nationality' => 'required',
                    'sex' => 'required',
                    'city' => 'required',
                    'available_work_from_another_place' => 'required',
                    'job_name' => 'required',
                    'experience' => 'required',
                    'language' => 'required',
                    'language_level' => 'required',
                    'profession_specialist' => 'required',
                    'notification_timeslot' => 'required',
                    'salary' => 'required',
                    'description' => 'required',
                    'title' => 'required',
                    'status' => 'required',
                    'new_work_place' => 'required',
                    'new_work_time' => 'required',
                    'new_age' => 'required',
                ];
                $messages = [

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
                    'experience' => $data['experience'],
                    'language' => $language,
                    'language_level' => $data['language_level'],
                    'profession_specialist' => $data['profession_specialist'],
                    'notification_timeslot' => $data['notification_timeslot'],
                    'salary' => $data['salary'],
                    'description' => $data['description'],
                    'title' => $data['title'],
                    'slug' => $adv_slug,
                    'status' => $data['status'],
                    'job_requirements' => $data['job_requirements'],
                    'job_experience' => $data['job_experience'],
                    'job_advantage' => $data['job_advantage'],
                    'job_needed' => $data['job_needed'],
                    'new_work_time' => $data['new_work_time'],
                    'new_work_place' => $data['new_work_place'],
                    'new_age' => $data['new_age'],

                ]);
                return $this->success_message('  تم اضافة الاعلان بنجاح   ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('admin.advertisements.store', compact('companies', 'citizen', 'specialists', 'JobsNames'));
    }

    public function update(Request $request, $id)
    {
        $adv = Advertisment::findOrFail($id);
        $company = Company::where('id', $adv['company_id'])->get();
        //dd($company);
        $adv_id = $id;
        $company_id = $adv['company_id'];
        $title = $adv['title'];
        $slug = $adv['slug'];
        $companies = Company::all();
        $citizen = City::all();
        $JobsNames = Jobsname::all();
        $specialists = Specialist::all();
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
                $language = implode(',', $data['language']);
                $rules = [
                    'company_id' => 'required',
                    'nationality' => 'required',
                    'sex' => 'required',
                    'city' => 'required',
                    'available_work_from_another_place' => 'required',
                    'job_name' => 'required',
                    'experience' => 'required',
                    'language' => 'required',
                    'language_level' => 'required',
                    'profession_specialist' => 'required',
                    'notification_timeslot' => 'required',
                    'salary' => 'required',
                    'description' => 'required',
                    'title' => 'required',
                    'status' => 'required',
                    'new_work_place' => 'required',
                    'new_work_time' => 'required',
                    'new_age' => 'required',
                ];
                $messages = [

                ];
                $validator = Validator::make($data, $rules, $messages);
                if ($validator->fails()) {
                    return Redirect::back()->withErrors($validator)->withInput();
                }

                $adv->update([
                    'company_id' => $data['company_id'],
                    'nationality' => $data['nationality'],
                    'sex' => $data['sex'],
                    'city' => $data['city'],
                    'available_work_from_another_place' => $data['available_work_from_another_place'],
                    'job_name' => $data['job_name'],
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
                    'new_work_time' => $data['new_work_time'],
                    'new_work_place' => $data['new_work_place'],
                    'new_age' => $data['new_age'],
                ]);
                if ($data['status'] == 1) {
                    $adv->update([
                        'status' => $data['status'],
                    ]);
                    if ($adv['admin_accept_notification'] == 0) {
                        ///////// Update Accept Admin Notification
                        /// And Send Notification To Company Job Accepted In DB AND MAIL Send
                        $adv->update([
                            'admin_accept_notification' => 1,
                        ]);
                        // Send Notify To Company
                        //  Notification::send($company, new SendJobAcceptedFromAdmin($adv_id, $company_id, $title, $slug));
                        Notification::send($company, new SendJobAcceptedFromAdmin($adv_id, $company_id, $title, $slug));
                    }
                }
                /////////////////////// Send Status Confirmation Email //////////
                return $this->success_message(' تم تعديل الاعلان بنجاح  ');

            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('admin.advertisements.update', compact('companies', 'citizen', 'specialists', 'JobsNames', 'adv'));
    }

    public function delete($id)
    {
        try {
            $adv = Advertisment::findOrFail($id);
            $adv->delete();
            return $this->success_message('تم حذف الاعلان بنجاح');
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }

    }

    /////////////////// Admin Send Notification To User You Have New Job
    ///
    ///
    public function send_notification_new_job($adv_id)
    {
        //dd($adv_id);
        $id = $adv_id;
        $adv_data = Advertisment::findOrFail($adv_id);
        // Get The Important Data From The Adv
        $title = $adv_data['title'];
        $nationality = $adv_data['nationality'];
        $sex = $adv_data['sex'];
        $available_work_from_another_place = $adv_data['available_work_from_another_place'];
        $job_name = $adv_data['job_name'];
        $specialist = $adv_data['profession_specialist'];
        $slug = $adv_data['slug'];
        /////////////// Get The User Tha Have The Same Data

        $users = User::where(['nationality' => $nationality, 'job_name' => $job_name,
            'profession_specialist' => $specialist])->get();
        ////////////// Start Send Notification
        //dd($users);
        DB::beginTransaction();
        Notification::send($users, new SendNewSujestJob($id, $title, $slug));
        //////// Update The Adv row send Notification
        $adv_data->update([
            'send_notifications' => 1,
        ]);
        DB::commit();
        return $this->success_message(' تم ارسال الاشعارات بنجاح  ');
    }
}
