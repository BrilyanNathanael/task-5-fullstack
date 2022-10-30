<div class="side-bar d-flex flex-column justify-content-between">
    <div class="top d-flex flex-column">
        @auth
        <a href="/">
            @if(request()->is('/') || request()->is('home'))
            <img src="{{ asset('/asset/home-active.png')}}" alt="">
            @else
            <img src="{{ asset('/asset/home.png')}}" alt="">
            @endif
        </a>
        <a href="/article/write">
            @if(request()->is('article/write'))
            <img src="{{ asset('/asset/write-active.png')}}" alt="">
            @else
            <img src="{{ asset('/asset/write.png')}}" alt="">
            @endif
        </a>
        <a href="/article/list">
            @if(request()->is('article/list'))
            <img src="{{ asset('/asset/list-active.png')}}" alt="">
            @else
            <img src="{{ asset('/asset/list.png')}}" alt="">
            @endif
        </a>
        <a href="/category">
            @if(request()->is('category'))
            <img src="{{ asset('/asset/category-active.png')}}" alt="">
            @else
            <img src="{{ asset('/asset/category.png')}}" alt="">
            @endif
        </a>
        @else
        <button class="border-0" style="background-color: #f4f4fb;" type="button" data-bs-toggle="modal" data-bs-target="#signInBackdrop">
            <img src="{{ asset('/asset/home-active.png') }}" alt="">
        </button>
        <button class="border-0" style="background-color: #f4f4fb;" type="button" data-bs-toggle="modal" data-bs-target="#signInBackdrop">
            <img src="{{ asset('/asset/write.png') }}" alt="">
        </button>
        <button class="border-0" style="background-color: #f4f4fb;" type="button" data-bs-toggle="modal" data-bs-target="#signInBackdrop">
            <img src="{{ asset('/asset/list.png') }}" alt="">
        </button>
        <button class="border-0" style="background-color: #f4f4fb;" type="button" data-bs-toggle="modal" data-bs-target="#signInBackdrop">
            <img src="{{ asset('/asset/category.png') }}" alt="">
        </button>
        @endauth

    </div>
    @auth
    <button class="border-0" style="background-color: #f4f4fb;" type="button" data-bs-toggle="modal" data-bs-target="#signOutBackdrop">
        <img src="{{ asset('/asset/logout.png') }}" alt="">
    </button>
    @else
    <button class="border-0" style="background-color: #f4f4fb;" type="button" data-bs-toggle="modal" data-bs-target="#signInBackdrop">
        <img src="{{ asset('/asset/logout.png') }}" alt="">
    </button>
    @endauth
</div>