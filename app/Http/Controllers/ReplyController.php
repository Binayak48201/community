<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index(Post $post)
    {
        $posts = $post->reply()->paginate(20);

        return response()->json($posts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Category $category
     * @param Post $post
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Category $category, Post $post)
    {

        $body = request()->validate([
            'body' => 'required'
        ]);

        $post->addReply(request('body'));

        return response()->json(['data' => 'Reply Created'], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Reply $reply)
    {
        $reply->update([
            'body' => request('body')
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
//        if ($reply->user_id != auth()->id()) {
//            abort(403);
//        }

        $reply->delete();

    }
}
