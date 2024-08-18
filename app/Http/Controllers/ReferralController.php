<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Referral;
use App\Models\Point;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ReferralController extends Controller
{
    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->referral_code = str::random(10);
        $user->save();

        if ($request->input('referral_code')) {
            $referrer = User::where('referral_code', $request->input('referral_code'))->first();
            if ($referrer) {
                $referral = new Referral();
                $referral->user_id = $referrer->id;
                $referral->referred_user_id = $user->id;
                $referral->save();

                $point = new Point();
                $point->user_id = $referrer->id;
                $point->points = 50;
                $point->save();

                $point = new Point();
                $point->user_id = $user->id;
                $point->points = 50;
                $point->save();
            }
        }

        return redirect()->route('home');
    }

    public function trackReferral(Request $request)
    {
        $referrer = User::where('referral_code', $request->input('referral_code'))->first();
        if ($referrer) {
            $referral = new Referral();
            $referral->user_id = $referrer->id;
            $referral->referred_user_id = auth()->user()->id;
            $referral->save();

            $point = new Point();
            $point->user_id = $referrer->id;
            $point->points = 50;
            $point->save();

            $point = new Point();
            $point->user_id = auth()->user()->id;
            $point->points = 50;
            $point->save();
        }

        return redirect()->route('home');
    }
}