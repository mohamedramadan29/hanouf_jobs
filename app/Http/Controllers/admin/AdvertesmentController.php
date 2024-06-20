<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\Message_Trait;
use App\Http\Traits\Slug_Trait;
use App\Http\Traits\Upload_Images;
use App\Models\admin\Advertisment;
use App\Models\admin\City;
use App\Models\admin\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdvertesmentController extends Controller
{

    use Message_Trait;
    use Upload_Images;
    use Slug_Trait;

    public function index()
    {
        $advertisements = Advertisment::with('company')->get();
        return view('admin.advertisements.index', compact('advertisements'));
    }

    public function store(Request $request)
    {
        $companies = Company::all();
        $citizen = City::all();
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
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
                    'status' => 'required',
                ];
                $messages = [

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
                    'status' => $data['status'],
                ]);
                return $this->success_message('  تم اضافة الاعلان بنجاح   ');
            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('admin.advertisements.store', compact('companies', 'citizen'));
    }

    public function update(Request $request, $id)
    {
        $adv = Advertisment::findOrFail($id);
        $companies = Company::all();
        $citizen = City::all();
        try {
            if ($request->isMethod('post')) {
                $data = $request->all();
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
                    'status' => 'required',
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
                    'status' => $data['status'],
                ]);
                return $this->success_message(' تم تعديل الاعلان بنجاح  ');

            }
        } catch (\Exception $e) {
            return $this->exception_message($e);
        }
        return view('admin.advertisements.update', compact('companies', 'citizen', 'adv'));
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
}
