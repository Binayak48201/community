@csrf
<div class="form-group">
    <div class="col-md-12 pl-0 pr-0">
        <div class="form-group">
            <label for="inputTopicTitle">Category</label>
            <select class="form-control" name="category_id">
                <option value="Select" selected>Select</option>
                @foreach($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ old('category_id') == $category->id ? 'selected' : ''}}
                        {{ $post->category_id == $category->id ? 'selected' : ''}}>
                        {{ $category->title }}
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
               value="{{ $post->title }}"
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
                                      placeholder="Lets get started">{{ $post->body }}</textarea>
        @error('body')
        <div class="custom-red">{{ $message }}</div>
        @enderror
    </div>
    <div class="row">
        <div class="col-auto ml-md-auto">
            <button type="submit" class="btn btn-secondary btn-width-lg">{{ $buttonText }}</button>
        </div>
    </div>
</div>

