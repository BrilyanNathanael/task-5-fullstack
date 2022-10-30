<div class="modal fade" id="deleteBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center border-0 pe-5 ps-5">
            <h5><b>Are you sure you want to delete this?</b></h5>
            <div class="d-flex pt-3">
                <form action="/category/delete/{{$ctg->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <button id="btnDelete" class="border-0 btn" type="submit">
                        Yes, Delete
                    </button>
                </form>
                <button class="btn btn-success ms-2" onclick="modalAction('deleteBackdrop');">Cancel</button>
            </div>
        </div>
        <div class="modal-footer border-0">
        </div>
    </div>
    </div>
</div>