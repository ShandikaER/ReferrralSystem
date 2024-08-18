<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard page.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Get the user's referrals
        $referrals = $user->referrals;

        // Get the user's referral earnings
        $earnings = $user->referralEarnings;

        return view('dashboard', compact('user', 'referrals', 'earnings'));
    }
}