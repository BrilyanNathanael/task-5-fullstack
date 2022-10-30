@extends('layouts.app')

@section('content')
<section class="d-flex">
    @include('partials.sidebar')
    <div class="content-section pb-5">
        <div class="details d-flex">
            <div class="detail-article">
                <h1 class="mt-4 mb-2"><b>{{$article->title}}</b></h1>
                <p class="mb-5">{{ date_format($article->created_at, "d M Y") }} - <a href="" class="text-uppercase">{{$article->category->name}}</a></p>
                <div class="d-flex justify-content-center">
                    <img src="{{asset('storage/' . $article->image)}}" alt="" class="mb-5">
                </div>
                <p class="mb-5">{{$article->content}}</p>
            </div>
            <div class="info">
                <p class="author-info">{{$article->user->name}}</p>
                <p>Article(s): {{$countArticles}}</p>
                <p class="mt-5 mb-4"><b>More from Bloog.</b></p>
                @foreach($moreArticle as $ma)
                <div class="card-more d-flex mb-4">
                    <a href="/article/detail/{{$ma->id}}">
                        <img src="{{ asset('storage/' . $ma->image) }}" alt="">
                    </a>
                    <div class="more-desc ms-2">
                        <a href="/article/detail/{{$ma->id}}">
                            <h6>{{$ma->title}}</h6>
                        </a>
                        <p>{{ date_format($ma->created_at, 'd M Y') }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection