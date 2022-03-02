@extends('layouts.app')

@section('content')
    <main id="tt-pageContent" class="tt-offset-small tw-bg-deep-black/5">
        <div class="container">
            <div class="tt-topic-list">
                @include('layouts.subheader')
                @foreach ($posts as $post)
                    <div class="tt-item">

                        <div class="tt-col-description">
                            <h6 class="tt-title">
                                <a href="{{ $post->path }}">
                                    {{ $post->title }}
                                </a>
                            </h6>
                            <a href="/posts?by={{ $post->user->name }}">
                                {{ $post->user->name }}
                            </a>
                            <form action="{{ route('posts.favorites', $post->id) }}" method="post">
                                @csrf
                                <div class="tt-col-avatar">
                                    <button class="custom-button tw-flex" type="submit">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="height: 1.5rem;" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
                                        </svg>
                                        <span class="tt-text">{{ $post->favourites->count() }}</span>
                                    </button>
                                </div>
                            </form>
                            <div class="row align-items-center no-gutters  hide-desktope">
                                <div class="col-11">
                                    <ul class="tt-list-badge">
                                        <li class="show-mobile"><a href="#"><span
                                                    class="tt-color05 tt-badge">{{ $post->category->title }}</span></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-1 ml-auto show-mobile">
                                    <div class="tt-value">1d</div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-col-category"><span class="tt-color05 tt-badge">{{ $post->category->title }}</span>
                        </div>
                        <div class="tt-col-value tt-color-s elect hide-mobile">68</div>
                        <div class="tt-col-value hide-mobile">{{ $post->reply_count }}</div>
                        <div class="tt-col-value hide-mobile">{{ $post->visits }}</div>
                        <div class="tt-col-value hide-mobile">1d</div>
                        <div class="tt-col-value hide-mobile"><a href="{{ $post->path() . '/edit' }}"
                                class="btn btn-color01" type="submit">Edit</a></div>

                        <form action="{{ route('posts.destroy', $post->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="tt-col-value hide-mobile"><button class="btn btn-colorred"
                                    type="submit">Delete</button>
                            </div>
                        </form>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </main>
@endsection
