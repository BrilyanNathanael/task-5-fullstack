<div class="cards mb-4">
    @auth
    <a href="/article/detail/{{$na->id}}">
        <img src="{{ asset('/storage/' . $na->image)}}" alt="" class="cover">
    </a>
    @else
    <button class="border-0" data-bs-toggle="modal" data-bs-target="#signInBackdrop" type="button">
        <img src="{{ asset('/storage/' . $na->image)}}" alt="" class="btn-cover cover">
    </button>
    @endauth

    <div class="d-flex justify-content-between align-items-center pt-2">
        <p class="category text-uppercase mt-3 mb-2">{{$na->category->name}}</p>
        @if(request()->is('article/list') && Auth::user())
        <div class="actions-list pe-2 d-flex align-items-center">
            <a href="/article/edit/{{$na->id}}" class="me-2">
                <img src="{{ asset('/asset/edit.png') }}" alt="" width="40">
            </a>
            <button class="border-0" type="button" data-bs-toggle="modal" data-bs-target="#deleteBackdrop">
                <img src="{{ asset('/asset/trash.png') }}" alt="" width="30">
            </button>
        </div>
        @endif
    </div>
    @auth
    <a href="/article/detail/{{$na->id}}" class="text-decoration-none" style="width: fit-content;">
        <h1 class="title">{{$na->title}}</h1>
    </a>
    @else
    <button class="border-0" style="background-color: transparent;" data-bs-toggle="modal" data-bs-target="#signInBackdrop" type="button" class="bg-white">
        <h1 class="title mb-0">{{$na->title}}</h1>
    </button>
    @endauth
    <p class="desc mb-4">{{$na->content}}</p>
    <p class="author">By: {{$na->user->name}}</p>
</div>