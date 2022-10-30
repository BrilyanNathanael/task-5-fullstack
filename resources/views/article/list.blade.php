@extends('layouts.app')

@section('content')
<section class="d-flex">
    @include('partials.sidebar')
    <div class="content-section my-list pb-5">
        <div class="started d-flex">
            <div class="add-article">
                <h4 class="mb-4">Start a new article</h4>
                <a href="/article/write" class="blank">
                    <img src="{{ asset('/asset/plus.png') }}" alt="">
                </a>
                <p class="mt-3 ms-2">Blank</p>
            </div>
            <div class="add-categories">
                <h4>Your Categories</h4>
                <div class="ctg-list pt-3">
                    @foreach($allCategories as $c)
                    <span class="me-2 mb-2">{{$c->name}}</span>
                    @endforeach
                    <a href="/category">
                        <span class="me-2 mb-2 add-ctg">
                            <img src="{{ asset('/asset/plus.png') }}" alt="" width="20">
                        </span>
                    </a>
                </div>
            </div>
        </div>
        <div class="my-articles">
            @include('partials.messages')
            <h4 class="mb-4 mt-3">My articles</h4>
            <div class="container-list d-flex flex-wrap justify-content-between">
                @if(count($articles) > 0)
                @foreach($articles as $na)
                    @include('partials.cards')
                @endforeach
                @else
                <div class="alert alert-info w-100" role="alert">
                    You have no articles yet...
                    <br>
                    <a href="/article/write" class="btn btn-info mt-3 text-white">Add Article</a>
                </div>
                @endif
            </div>
            <div class="d-flex justify-content-center">
                {!! $articles->links() !!}
            </div>
        </div>
    </div>
</section>

@if(count($articles) > 0)
@include('partials.deleteArticle')
@endif
@endsection