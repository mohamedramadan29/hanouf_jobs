<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\admin\Advertisment;
use App\Models\admin\City;
use App\Models\admin\Jobsname;
use App\Models\admin\Specialist;
use App\Models\website\Joboffer;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(Request $request)
    {
        $query = Advertisment::with('company')->where('status', '1');

        if ($request->has('keyword')) {
            $keyword = $request->get('keyword');
            $query->where('title', 'like', "%{$keyword}%");
        }

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


        if ($request->has('sort')) {
            $sortOrder = $request->get('sort', 'desc');
        } else {
            $sortOrder = 'desc';
        }

        $advs = $query->orderBy('id', $sortOrder)->paginate(10);

        $jobs = Jobsname::all();
        $specialists = Specialist::all();

        return view('website.jobs', compact('advs', 'jobs', 'specialists'));
    }

    public function job_details($id, $slug)
    {

        $compelete_info = '';
        if (Auth::check()){
            $user = Auth::user();
            $name = $user['name'];
            $mobile = $user['mobile'];
            $city = $user['city'];
            $job_name = $user['job_name'];
            $profession_specialist = $user['profession_specialist'];
            $info = $user['info'];

            $compelete_info = '';
            if (empty($name) || empty($mobile) || empty($city) || empty($job_name) || empty($profession_specialist) || empty($info)) {
                $compelete_info = '  من فضلك ادخل جميع البيانات الخاصة بك بشكل صحيح لتتمكن من   التقدم الي الوظيفة ';
            }
        }


        $adv = Advertisment::with('company', 'jobs_names', 'specialist')->where('id', $id)->first();

        ////////// Check If This Job Has Cover Letter From This Auth User Not No
        ///
        $offers = Joboffer::where(['adv_id' => $adv['id'], 'user_id' => Auth::id()])->count();
        $CountAllOffers = Joboffer::count();
        $CityName = City::where('id', $adv['city'])->first();
        if (Auth::check()) {
            // تحقق من إشعار المستخدم العادي
            $notification = DatabaseNotification::where('data->adv_id', $id)
                ->where('notifiable_id', Auth::id())
                ->first();

            if ($notification) {
                $notification->markAsRead();
            }
        } else if (Auth::guard('company')->check()) {
            // تحقق من إشعار مستخدم الشركة
            $notification = DatabaseNotification::where('data->adv_id', $id)
                ->where('notifiable_id', Auth::guard('company')->id())
                ->first();

            if ($notification) {
                $notification->markAsRead();
            }
        }

        ///////////

        return view('website.job-detail', compact('adv', 'offers', 'CountAllOffers', 'CityName','compelete_info'));
    }


}
