<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FavoritesController extends Controller
{
    public function store(Reply $reply)
    {
        $reply->favorite();

        return redirect()->back();
    }

    public function storePost(Post $post)
    {
        $post->favourite();
        return redirect()->back()->withSuccess('Post Has Been Liked');
    }
}
