<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke()
    {
        return $activities =
            Activities::with('subject')
                ->latest()
                ->where('user_id', auth()->id())
                ->get()
                ->groupBy(function ($activity) {
                    return $activity->created_at->format('Y-m-d');
                });
        return view('profile.profile', compact('activities'));
    }
}
