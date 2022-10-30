@extends('layouts.app')

@section('content')
<section class="d-flex">
    @include('partials.sidebar')
    <div class="content-section pb-5">
        @if(count($categories) > 0)
        <div class="form-article d-flex flex-column">
            <h2 class="mb-3">Edit Your Content</h2>
            <form method="POST" action="/article/update/{{$article->id}}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <span class="mb-3">
                    <label for="title" class="form-label">Title of articles</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Tell your title" name="title" value="{{$article->title}}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </span>
                <span>
                    <label for="content" class="form-label mt-3">Category</label>
                    <select class="form-select" name="category_id">
                        @foreach($categories as $c)
                        <option value="{{$c->id}}" {{ ($c->id == $article->category_id ? 'selected' : '') }}>{{$c->name}}</option>
                        @endforeach
                    </select>
                </span>
                <span class="mb-3">
                    <label for="content" class="form-label mt-3">Content</label><br>
                    <img src="{{ asset('storage/' . $article->image) }}" alt="" width="300">
                    <input class="form-control mb-3 @error('image') is-invalid @enderror" type="file" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" rows="3" placeholder="Tell your content" name="content">{{$article->content}}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </span>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn text-white mt-3">Submit</button>
                </div>
            </form>
        </div>
        @else
        <div class="alert alert-info w-100" role="alert">
            Please add your category first!
        </div>
        @endif
    </div>
</section>
@endsection