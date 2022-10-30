@extends('layouts.app')

@section('content')
<section class="d-flex">
    @include('partials.sidebar')
    <div class="content-section pb-5">
        <div class="form-article d-flex flex-column">
            <h2 class="mb-3">Edit Category</h2>
            <form method="POST" action="/category/update/{{$oldCategory->id}}" class="mb-3">
                @csrf
                @method('put')
                <span class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Category Name" name="name" value="{{$oldCategory->name}}">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </span>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn text-white mt-3">Submit</button>
                </div>
            </form>
            <h2 class="mt-2">Your Categories</h2>
            @if(count($categories) > 0)
            @include('category.categories')
            <div class="d-flex justify-content-center">
                {!! $categories->links() !!}
            </div>
            @else
            <div class="alert alert-info w-100" role="alert">
                You have no category yet...
            </div>
            @endif
        </div>
    </div>
</section>

@endsection