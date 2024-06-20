<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CompanyController extends Controller
{
    public function index()
    {
        return view('website.companies.dashboard');
    }

    public function add_job()
    {
        return view('website.companies.add_job');
    }
    public function jobs()
    {
        return view('website.companies.jobs');
    }

    public function chat()
    {
        return view('website.companies.chat');
    }

    public function job_users()
    {
        return view('website.companies.job-users');
    }
    public function plans()
    {
        return view('website.companies.plan');
    }

    public function change_password()
    {
        return view('website.companies.change-password');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}
