<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class athentificationController extends Controller
{
    public function loginPage()
    {
        return view ('login');
    }

    public function signupPage()
    {
        return view ('signup');
    }

    public function storeAccount(Request $request)
    {
        $existingUser = User::where('email', $request->email)->first();

        if ($existingUser) {
            return redirect(route('authentif.signup'))->with('error', 'Email is already in use. Please use a different email.');
        }
        User::create($request->all());
        return redirect(route('authentif.login'))->with('info','Your account is created successefully');
    }

    public function checkAccount(Request $request)
    {
        
        $account = [
            'email' =>$request->email,
            'password' =>$request->password
        ];
        Log::info($account);
        if (Auth::attempt($account)) {
            return redirect(route('DisplayHomePage'));
        } else {
            return back()->with('error','Invalid email or password.');
        }
    }

    public function logoutAccount()
    {
        Auth::logout();
        return redirect(route('DisplayHomePage'));
    }
}
