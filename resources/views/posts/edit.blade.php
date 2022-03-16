@extends('layouts.app')

@section('content')
    <main id="tt-pageContent" class="tw-bg-deep-black/5">
        <div class="container py-4" style="background: white;">
            <div class="tt-wrapper-inner">
                <h1 class="tt-title-border">
                     Update Post
                </h1>
                <form class="form-default form-create-topic" method="POST" action="{{ $post->path }}">
                    @method('PATCH')
                    @include('posts.form',[
                         'buttonText' => 'Update Post'
                     ])
                </form>
            </div>
        </div>
    </main>
@endsection
