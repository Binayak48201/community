<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // public function profile()
    // {
    //     // return 'profile';
    //     return view('profile.index');
    // }
    public function __invoke()
    {
        $activities =
            Activities::with('subject')
            ->latest()
            ->where('user_id', auth()->id())
            ->get()
            ->groupBy(function ($activity) {
                return $activity->created_at->format('Y-m-d');
            });
        return view('profile.profile', compact('activities'));
    }

    //     public function __invoke(User $user)
    //     {
    //         $activities = Activities::actvities($user);

    // //          return $activities;
    //         return view('profile.profile', compact('activities','user'));
    //     }

    public function test()
    {
        return view('profile.activity.test');
    }
}
