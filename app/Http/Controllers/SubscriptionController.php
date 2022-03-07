<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function store($category, Post $post)
    {
        $post->subscribe();
    }

    public function destroy($category, Post $post)
    {
        $post->unsubscribe();
    }
}
