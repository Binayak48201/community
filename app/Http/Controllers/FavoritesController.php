<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function store(Reply $reply)
    {
        $reply->favourite();
    }
}
