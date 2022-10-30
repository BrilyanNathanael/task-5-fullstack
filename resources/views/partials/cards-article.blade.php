<div class="cards-article d-flex mb-4">
    @auth
    <a href="/article/detail/{{$a->id}}">
        <img src="{{ asset('/storage/' . $a->image)}}" alt="">
    </a>
    @else
    <button class="border-0" data-bs-toggle="modal" data-bs-target="#signInBackdrop" type="button">
        <img src="{{ asset('/storage/' . $a->image)}}" alt="">
    </button>
    @endauth
    <div class="description-article ms-3">
        <p class="category text-uppercase mb-2">{{$a->category->name}}</p>
        @auth
        <a href="/article/detail/{{$a->id}}" class="text-decoration-none">
            <h1 class="title">{{$a->title}}</h1>
        </a>
        @else
        <button class="border-0" data-bs-toggle="modal" data-bs-target="#signInBackdrop" type="button" style="background-color: transparent;">
            <h1 class="title mb-0">{{$a->title}}</h1>
        </button>
        @endauth
        <p class="author mt-3">{{$a->user->name}}</p>
    </div>
</div>