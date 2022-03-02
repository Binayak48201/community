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

        return response()->json(['data' => 'Reply Favorites'], 200);

    }

    public function destroy(Reply $reply)
    {
        $reply->unfavourite();

        return response()->json(['data' => 'Reply UnFavorites'], 200);

    }

    public function storePost(Post $post)
    {
        $post->favourite();
        return redirect()->back()->withSuccess('Post Has Been Liked');
    }
}
