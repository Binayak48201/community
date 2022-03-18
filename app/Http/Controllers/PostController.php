<?php

namespace App\Http\Controllers;

use App\inspection\Spam;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $posts = $this->getPosts($category);

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|\Illuminate\Http\Response
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
    public function store(Spam $spam)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id'
        ]);

//        $spam->detect(request('body'));

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
     * @param Post $post
     * @param \App\Models\Category $category
     * @return Application|Factory|View|\Illuminate\Http\Response
     */
    public function show(Category $category, Post $post)
    {
        $key = sprintf("users.%s.visits.%s", auth()->id(), $post->id);

        cache()->forever($key, Carbon::now());

        $post->increment('visits');

        return view('posts.show', [
            'post' => $post->load('user'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return Application|Factory|View
     */
    public function edit(Category $category, Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Category $category, Post $post)
    {
        $post->update([
            'category_id' => request('category_id'),
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect($post->path);
    }


    /**
     * @param Category $category
     * @param Post $post
     */
    public function destroy(Category $category, Post $post)
    {
        if ($post->user_id != auth()->id()) {
            abort(403);
        }

//        $this->authorize('delete', $post);

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
        } elseif (request('search')) {
            $post->where('title','like','%' . request('search') . '%');
        } else {
            $post->latest();
        }

        return $post->paginate(5);
    }
}

