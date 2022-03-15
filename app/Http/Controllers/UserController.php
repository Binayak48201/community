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
}
