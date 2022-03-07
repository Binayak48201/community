<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $posts = $this->getPosts($category);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

        Post::create([
            'user_id' => auth()->id(),
            'category_id' => request('category_id'),
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect('/posts')->with('flash', 'Post created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Post $post
     * @param \App\Models\Category $category
     * @return Application|Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Category $category, Post $post)
    {
//        return $post;

        $post->increment('visits');


        return view('posts.show', [
            'post' => $post->load('user'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Post $post
     * @return \Illuminate\Http\Response
     */
    public function update(Category $category, Post $post)
    {
        $post->update([
            'title' => request('title')
        ]);
    }


    /**
     * @param Category $category
     * @param Post $post
     */
    public function destroy(Category $category, Post $post)
    {
//        if ($post->user_id != auth()->id()) {
//            abort(403);
//        }
        $this->authorize('delete', $post);
        $post->delete();
    }

    /**
     * @param Category $category
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    private function getPosts(Category $category)
    {
        $post = Post::with('category', 'user');

        if ($category->exists) {
            $post = $category->posts();
        }

        if ($username = request('by')) {
            $user = User::where('name', $username)->firstOrFail();
            $post->where('user_id', $user->id);
        } elseif (request('popular')) {
            $post->orderBy('reply_count', 'desc');
        } elseif (request('unanswered')) {
            $post->orderBy('reply_count');
        } else {
            $post->latest();
        }

        return $post->paginate(5);
    }
}

