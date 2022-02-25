<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(User $user)
    {
        $activities = Activities::actvities($user);

//          return $activities;
        return view('profile.profile', compact('activities','user'));
    }
}
