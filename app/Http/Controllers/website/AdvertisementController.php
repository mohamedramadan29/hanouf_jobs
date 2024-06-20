<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\admin\Advertisment;

class AdvertisementController extends Controller
{
    public function index()
    {
        $advs = Advertisment::all();
        return view('website.jobs', compact('advs'));
    }

    public function job_details()
    {
        return view('website.job-detail');
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
