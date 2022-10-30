@extends('layouts.app')

@section('content')
<section class="d-flex">
    @include('partials.sidebar')
    <div class="content-section pb-5">
        <h1 class="trending-title mb-4">
            <img src="{{ asset('/asset/trending.png')}}" alt="" width="30">
            NEW ON BLOOG.
        </h1>
        <div class="trending d-flex">
            @if(count($newArticle) > 0)
            @foreach($newArticle as $na)
                @include('partials.cards')
            @endforeach
            @else
            <div class="alert alert-info w-100" role="alert">
                There is no new articles here...
            </div>
            @endif
        </div>
        <hr>
        <div class="list">
            <div class="categories pt-3 pb-2">
                <a href="/home" class="{{ (empty(request('category')) ? 'active' : '') }}">All</a>
                @foreach($allCategories as $c)
                @if(!empty(request('category')))
                <a href="/home?category={{$c->id}}" class="{{ ($c->id == request('category') ? 'active' : '') }}">{{$c->name}}</a>
                @else
                <a href="/home?category={{$c->id}}">{{$c->name}}</a>
                @endif
                @endforeach
            </div>
            <div class="articles d-flex pt-4 flex-wrap justify-content-between">
                @if(count($articles) > 0)
                @foreach($articles as $a)
                    @include('partials.cards-article')
                @endforeach
                @else
                <div class="alert alert-info w-100" role="alert">
                    There is no articles here...
                </div>
                @endif
            </div>

            <div class="d-flex justify-content-center">
                {!! $articles->appends(['category' => request('category')])->links() !!}
            </div>
        </div>
    </div>
</section>

@endsection