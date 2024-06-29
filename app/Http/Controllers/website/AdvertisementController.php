<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\admin\Advertisment;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advs = Advertisment::with('company')->get();

        return view('website.jobs', compact('advs'));
    }

    public function job_details($id,$slug)
    {
        $adv = Advertisment::with('company')->where('id',$id)->first();
       // dd($adv);
        return view('website.job-detail',compact('adv'));
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
