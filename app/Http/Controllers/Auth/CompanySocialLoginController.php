<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\admin\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class CompanySocialLoginController extends Controller
{

    public function redirect($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $company_provider = Socialite::driver($provider)->user();
            //  dd($user_provider);
            $company_from_db = Company::where('email', $company_provider->getEmail())->first();
            //dd($user);
            if ($company_from_db) {
                Auth::login($company_from_db);
                return redirect()->route(route: 'company.dashboard');
            }
            // $user_db = User::updateOrCreate([
            //     'email' => $user->email,
            //     //'google_id'=>$user->id,

            // ], [
            //     'name' => $user->name,
            //     'user_name' => Str::replace(' ', '', $user->name).time(),
            //     'email' => $user->email,
            //     'google_token' => $user->token,
            //     'password' => Hash::make(Str::random(8)),
            // ]);

            ///////// Check If This Email In Company OR Not
            $user = User::where('email', $company_provider->getEmail())->first();
            if ($user) {
                return Redirect::route(route: 'company_login')->withErrors([' البريد الالكتروني مستخدم بالفعل في حساب  الموظفين  ']);
                //  return Redirect::back()->withErrors([' البريد الالكتروني مستخدم بالفعل في تسجيل الشركات  ']);
            }

            $username = $this->generateuniqueusername($company_provider->name);
            $user = Company::create([
                'name' => $company_provider->name,
                'username' => $username,
                'email' => $company_provider->email,
                // 'google_token' => $user_provider->token,
                'password' => Hash::make(Str::random(8)),
                'email_confirm' => 1,
            ]);
           // Auth::login($user);
            Auth::guard('company')->login($user);
            return redirect()->route('company.dashboard');
        } catch (\Exception $e) {
            return $e;
            //return redirect()->route('login');
        }
    }

    public function generateuniqueusername($name)
    {
        $username  = Str::slug($name);
        $count = 1;
        while (Company::where('username', $username)->exists()) {
            $username = $username . $count++;
        }
        return $username;
    }
}
