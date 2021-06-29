@extends('layouts.master')
@section('title', config('app.name') ." | Edit post")
@section('body')
<div class="col-md-8 mx-auto">

  <div class="card text-dark border-0 content_editor">
    <h5 class="card-header mx-n0"> Edit this post</h5>
    <form method="POST" action="{{ route('updatepost', $article->title_slug)}}" class="card-body text-dark">
      @csrf
      @method("PUT")
      <div class="row">
        <div class="col-6">
          @error('title')
          <div class=" invalid-feedback d-block">{{ $message }}</div>
          @enderror
          <input type="text" name="title" class="form-control" placeholder="Title of your post"
            value="{{ $article->title }}">
        </div>

        <div class="col-6">
          @error('cat_id')
          <div class="invalid-feedback d-block">{{ $message }}</div>
          @enderror
          <select name="cat_id" class=" form-control">
            <option value=""> select a category</option>
            @foreach ($categories as $category)
            @if ($category->id == $article->cat_id)
            <option value="{{$category->id}}" selected>{{$category->category}}</option>
            @continue
            @endif
            <option value="{{$category->id}}">{{$category->category}}</option>
            @endforeach
          </select>
        </div>

        <div class=" col-12 mt-4">
          @error('body')
          <div class="invalid-feedback d-block">{{ $message }}</div>
          @enderror
          <textarea id="postbody" name="body" class="form-control" placeholder="Write a post"></textarea>
          <input type="submit" value="Update post" class="btn btn-success gh-btn mt-3">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="text-center my-3"><a href="{{ url()->previous() }}" style="
font-size: 14px;" class="btn btn-info text-center"> <i class="fa fa-long-arrow-left"></i> Go Back </a></div>
@endsection

@section('scripts')
@parent
<script src="/js/ckeditor.js"></script>
<script>
  ClassicEditor.create(document.querySelector("#postbody"), {
    simpleUpload: {
        // The URL the images are uploaded to.
        uploadUrl: "{{ env('APP_URL_LOCAL ') }}/api/upload"
    }
}).then(editor => {
    let article = '{!! $article->body !!}';
     let old = '{!! old('body') !!}';
   let app = old != "" ? old : article;
    editor.setData(app);
});
</script>
@endsection
