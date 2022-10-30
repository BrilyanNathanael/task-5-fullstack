@extends('layouts.app')

@section('content')
<section class="d-flex">
    @include('partials.sidebar')
    <div class="content-section pb-5">
        @if(count($categories) > 0)
        <div class="form-article d-flex flex-column">
            <h2 class="mb-3">Write Your Content</h2>
            <form method="POST" action="/article/write" enctype="multipart/form-data">
                @csrf
                <span class="mb-3">
                    <label for="title" class="form-label">Title of articles</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Tell your title" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </span>
                <span>
                    <label for="content" class="form-label mt-3">Category</label>
                    <select class="form-select @error('category') is-invalid @enderror" name="category">
                        @foreach($categories as $c)
                        <option value="{{$c->id}}">{{$c->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </span>
                <span class="mb-3">
                    <label for="content" class="form-label mt-3">Content</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <textarea class="form-control mt-3 @error('content') is-invalid @enderror" id="content" rows="3" placeholder="Tell your content" name="content">{{ old('content') }}</textarea>
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
        <div class="container">
            <h2 class="mb-3 writeContent">Write Your Content</h2>
            <div class="alert alert-info w-100" role="alert">
                Please add your category first!
                <br>
                <a href="/category" class="btn btn-info mt-3 text-white">Add Category</a>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection