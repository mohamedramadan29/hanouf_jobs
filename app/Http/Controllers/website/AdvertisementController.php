<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\admin\Advertisment;
use App\Models\admin\City;
use App\Models\website\Joboffer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advs = Advertisment::with('company')->orderBy('id', 'desc')->paginate('10');
        return view('website.jobs', compact('advs'));
    }

    public function job_details($id, $slug)
    {
        $adv = Advertisment::with('company','jobs_names','specialist')->where('id', $id)->first();

        ////////// Check If This Job Has Cover Letter From This Auth User Not No
        ///
        $offers = Joboffer::where(['adv_id'=>$adv['id'],'user_id'=>Auth::id()])->count();
        $CountAllOffers = Joboffer::count();
        $CityName = City::where('id',$adv['city'])->first();
        ///// When Open Make The Notification Read
        if (Auth::user()) {
            $notification_id = DB::table('notifications')->where('data->adv_id', $id)->where('notifiable_id', Auth::id())->pluck('id')->first();
            DB::table('notifications')->where('id', $notification_id)->update([
                'read_at' => now()
            ]);
        } else {
            $notification_id = DB::table('notifications')->where('data->adv_id', $id)->where('notifiable_id', Auth::guard('company')->id())->pluck('id')->first();
            DB::table('notifications')->where('id', $notification_id)->update([
                'read_at' => now()
            ]);
        }

        ///////////

        return view('website.job-detail', compact('adv','offers','CountAllOffers','CityName'));
    }

    public function talents()
    {
        return view('website.talents');
    }

    public function talent_details()
    {
        return view('website.talent-details');
    }
}
