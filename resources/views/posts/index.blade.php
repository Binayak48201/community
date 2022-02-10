@extends('layouts.app')

@section('content')
    <main id="tt-pageContent" class="tt-offset-small">
        <div class="container">
            <div class="tt-topic-list">
                @include('layouts.subheader')
                @foreach($posts as $post)
                    <div class="tt-item">
                        <div class="tt-col-avatar">
                            <svg class="tt-icon">
                                <use xlink:href="#icon-ava-n"></use>
                            </svg>
                        </div>
                        <div class="tt-col-description">
                            <h6 class="tt-title">
                                <a href="{{ $post->path() }}">
                                    {{ $post->title }}
                                </a>
                            </h6>
                                <a href="{{ $post->path() }}">
                                    {{ $post->user->name }}
                                </a>
                            <div class="row align-items-center no-gutters  hide-desktope">
                                <div class="col-11">
                                    <ul class="tt-list-badge">
                                        <li class="show-mobile"><a href="#"><span
                                                    class="tt-color05 tt-badge">{{ $post->category->title }}</span></a></li>
                                    </ul>
                                </div>
                                <div class="col-1 ml-auto show-mobile">
                                    <div class="tt-value">1d</div>
                                </div>
                            </div>
                        </div>
                        <div class="tt-col-category"><span class="tt-color05 tt-badge">{{ $post->category->title }}</span></div>
                        <div class="tt-col-value hide-mobile">358</div>
                        <div class="tt-col-value tt-color-s elect hide-mobile">68</div>
                        <div class="tt-col-value hide-mobile">8.3k</div>
                        <div class="tt-col-value hide-mobile">1d</div>
                        <div class="tt-col-value hide-mobile"><a href="/post/edit/{$category->slug/$posts->slug}" class="btn btn-success" type="submit">Edit</a></div>
                    </div>
                @endforeach
                {{ $posts->links() }}
            </div>
        </div>
    </main>
@endsection
