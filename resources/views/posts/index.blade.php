@extends('layouts.app')

@section('content')
    <main id="tt-pageContent" class="tt-offset-small tw-bg-deep-black/5">
        <div class="container">
            <div class="tt-topic-list">
                @include('layouts.subheader')
                @foreach($posts as $post)
                    <div class="tt-item">
                        <div class="tt-col-avatar">
                            <img src="https://s3.amazonaws.com/laracasts/images/default-square-avatar.jpg" alt=""
                                 style="height: 63px;">
                        </div>
                        <div class="tt-col-description">
                            <h6 class="tt-title">
                                <a href="{{ $post->path }}">
                                    @if(auth()->check() && !$post->hasUpdatesFor(auth()->user()))
                                        <span class="custom-red">{{ $post->title }}</span>
                                    @else
                                        {{ $post->title }}
                                    @endif
                                </a>
                            </h6>
                            <a href="/posts?by={{ $post->user->name }}">
                                {{ $post->user->name }}
                            </a>
                            <div class="row align-items-center no-gutters  hide-desktope">
                                <div class="col-11">
                                    <ul class="tt-list-badge">
                                        <li class="show-mobile">
                                            <a href="#">
                                                <span class="tt-color05 tt-badge">
                                                    {{ $post->category->title }}
                                                </span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-1 ml-auto show-mobile">
                                    <div class="tt-value">1d</div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-col-category">
                            <span class="tt-badge"
                                  style="background: {{ color() }};color: white">{{ $post->category->title }}</span>
                        </div>
                        <div class="tt-col-value tt-color-s elect hide-mobile">68</div>
                        <div class="tt-col-value hide-mobile">{{ $post->reply_count }}</div>
                        <div class="tt-col-value hide-mobile">{{ $post->visits }}</div>
                    </div>
                @endforeach
                {{ $posts->links() }}

            </div>
        </div>
    </main>
@endsection
