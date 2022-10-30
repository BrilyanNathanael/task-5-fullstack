@extends('layouts.app')

@section('content')
<section class="d-flex">
    @include('partials.sidebar')
    <div class="content-section pb-5">
        <h1 class="trending-title">List of articles</h1>
        <div class="list">
            <div class="articles d-flex pt-4 flex-wrap justify-content-between">
                @foreach($articles as $a)
                @include('partials.cards-article')
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection