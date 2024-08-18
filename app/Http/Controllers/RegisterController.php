<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->referral_code = Str::random(10); // Generate a unique referral code
        $user->save();

        // Send a welcome email or perform any other post-registration tasks

        return redirect()->route('dashboard');
    }
}