@extends('layouts.app')

@section('content')
    <main id="tt-pageContent">
        <div class="container">
            <div class="tt-wrapper-inner">
                <h1 class="tt-title-border">
                    Edit Posts
                </h1>
                <form class="form-default form-create-topic" method="POST" action="/posts">
                    @csrf
                    <div class="form-group">
                        <div class="col-md-12 pl-0 pr-0">
                            <div class="form-group">
                                <label for="inputTopicTitle">Category</label>
                                <select class="form-control" name="category_id">
                                    <option value="">Select</option>
                                    @foreach($category as $cat)
                                    <option 
                                    {{-- {{  $category->id == old('category_id', $category->id) ? 'selected' : '' }}
                                    value="{{$category->id}}" --}}
                                    >
                                    {{ $cat->title }}
                                </option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        @error('category_id')
                        <div class="custom-red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputTopicTitle">Post Title</label>
                        <div class="tt-value-wrapper">
                            <input type="text" name="title" class="form-control" id="inputTopicTitle"
                                   value="{{ old('title') }}"
                                   placeholder="Subject of your topic">
                        </div>
                        @error('title')
                        <div class="custom-red">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="pt-editor">
                        <h6 class="pt-title">Topic Body</h6>
                        <div class="form-group">
                            <textarea name="body" class="form-control" rows="5"
                                      placeholder="Lets get started">{{ old('body') }}</textarea>
                            @error('body')
                            <div class="custom-red">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-auto ml-md-auto">
                                <button type="submit" class="btn btn-secondary btn-width-lg">Create Post</button>
                            </div>
                        </div>
                    </div>
                </form>
                {{--                @if($errors->any())--}}
                {{--                    @foreach($errors->all() as $error)--}}
                {{--                        {{$error }}--}}
                {{--                    @endforeach--}}
                {{--                @endif--}}
            </div>
        </div>
    </main>
@endsection
