<table class="table">
  <thead class="table-dark">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($categories as $ctg)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$ctg->name}}</td>
      <td>
        <div class="actions-list pe-2 d-flex align-items-center">
            <a href="/category/edit/{{$ctg->id}}" class="me-2">
                <img src="{{ asset('/asset/edit.png') }}" alt="" width="40">
            </a>
            <button class="border-0" type="button" data-bs-toggle="modal" data-bs-target="#deleteBackdrop" style="background-color: transparent;">
                <img src="{{ asset('/asset/trash.png') }}" alt="" width="30">
            </button>
            @include('partials.deleteCategory')
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>