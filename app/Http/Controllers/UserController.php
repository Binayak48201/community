<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function verify(User $user)
    {
        $user->verifiedAt(now());
    }

    public function avatar()
    {
        request()->validate([
            'profile_photo_path' => ['required', 'image']
        ]);

        auth()->user()->update([
            'profile_photo_path' => request()->file('profile_photo_path')->store('profile_photo_path','public')
       ]);
    }
}
