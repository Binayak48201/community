<?php

namespace App\Http\Controllers;

use App\inspection\Spam;
use App\Models\Category;
use App\Models\Post;
use App\Models\Reply;
use App\Notifications\MentionedUsers;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(Category $category, Post $post, Spam $spam)
    {
        if (!$this->extracted()) {
            return response()->json(['error' => 'Your are messanging too soon.'], 422);
        }
        try {
            request()->validate([
                'body' => 'required'
            ]);

            $spam->detect(request('body'));

            $reply = $post->addReply(request('body'));

            $users = [];
            if (count($reply->tagedUsers()) > 0) {
                foreach ($reply->tagedUsers() as $user) {
                    $user = User::whereName($user)->first();
                    array_push($users, $user);
                    foreach ($users as $user) {
                        $user->notify(new MentionedUsers(auth()->user(), $post));
                    }
                }
            }

            return response()->json([
                'data' => $reply->load('user')
            ]);
        } catch (\Throwable $e) {
            return response()->json(['error' => 'Your message contains spam.'], 422);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Reply $reply, Spam $spam)
    {
        try {
            request()->validate([
                'body' => 'required'
            ]);
            $spam->detect(request('body'));

            $reply->update([
                'body' => request('body')
            ]);

        } catch (\Throwable $e) {

            return response()->json(['error' => 'Your message contains spam.'], 422);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Reply $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reply $reply)
    {
        if ($reply->user_id != auth()->id()) {
            abort(403);
            if (request()->wantsJson()) {
                return response([], 204);
            }
        }

        $reply->delete();
    }

    /**
     * @param $user
     * @return bool
     */
    protected function extracted()
    {
        $lastReply = auth()->user()->fresh()->lastReply;

        if (!$lastReply) return true;

        return !$lastReply->wasJustPublished();
    }
}
