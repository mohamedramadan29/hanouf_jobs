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

class SocialLoginController extends Controller
{

    public function redirect(Request $request)
    {
        $type = $request->query('type', 'user');

        // dd($type);
        session(['login_type' => $type]);

        return Socialite::driver('google')->redirect();
    }

    public function callback()
    {
        $provider = 'google';
        try {
            $type = session('login_type', 'user');

            if ($type === 'user') {
                $user_provider = Socialite::driver($provider)->user();
                //  dd($user_provider);
                $user_from_db = User::where('email', $user_provider->getEmail())->first();
                //dd($user);
                if ($user_from_db) {
                    Auth::login($user_from_db);
                    return redirect()->route(route: 'user.dashboard');
                }


                ///////// Check If This Email In Company OR Not
                $company = Company::where('email', $user_provider->getEmail())->first();
                if ($company) {
                    return Redirect::route(route: 'login')->withErrors([' البريد الالكتروني مستخدم بالفعل في حساب  الشركات  ']);
                    //  return Redirect::back()->withErrors([' البريد الالكتروني مستخدم بالفعل في تسجيل الشركات  ']);
                }

                $username = $this->generateuniqueusername($user_provider->name);
                $user = User::create([
                    'name' => $user_provider->name,
                    'username' => $username,
                    'email' => $user_provider->email,
                    // 'google_token' => $user_provider->token,
                    'password' => Hash::make(Str::random(8)),
                    'email_confirm' => 1,
                ]);
                Auth::login($user);
                return redirect()->route('user.dashboard');
            } else {
                $company_provider = Socialite::driver($provider)->user();
                $company_from_db = Company::where('email', $company_provider->getEmail())->first();
                //dd($user);
                if ($company_from_db) {
                    // Auth::login($company_from_db);
                    Auth::guard('company')->login($company_from_db);
                    return redirect()->route(route: 'company.dashboard');
                }
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
            }
        } catch (\Exception $e) {
            return $e;
            //return redirect()->route('login');
        }
    }

    public function generateuniqueusername($name)
    {
        $username  = Str::slug($name);
        $count = 1;
        while (User::where('username', $username)->exists()) {
            $username = $username . $count++;
        }
        return $username;
    }
}
