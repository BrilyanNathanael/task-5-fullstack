<div class="top-bar d-flex p-4">
    <a href="/" class="logo">
        <h4 class="mb-0">Bloog.</h4>
    </a>
    @auth
    <form action="search" method="GET">
    @else
    <form action="search" method="GET" data-bs-toggle="modal" data-bs-target="#signInBackdrop">
    @endauth
        <div style="border: 1px solid #DDD;" class="search-input p-2">
            <img src="{{ asset('asset/search.png') }}" width="20" class="me-1" onclick="clickSearch();"/>
            <input style="border: none;" placeholder="Search..." name="title" value="{{ (!empty($input) ? $input : '') }}" autocomplete="off"/>
            @auth
            <button style="display: none;" type="submit" id="search"></button>
            @else
            <button style="display: none;" type="button" id="search" class="border-0" data-bs-toggle="modal" data-bs-target="#signInBackdrop"></button>
            @endauth
        </div>
    </form>
    <div class="navs-list">
        @auth
            <p class="mb-0">{{Auth::user()->name}}</p>
        @else
        <button type="button" class="item bg-white border-0 me-4" data-bs-toggle="modal" data-bs-target="#signInBackdrop" id="signInBtn">
            Sign In
        </button>
        <button type="button" class="get-started border-0" data-bs-toggle="modal" data-bs-target="#registerBackdrop" id="registerBtn">
            Get Started
        </button>
        @endauth
    </div>
</div>