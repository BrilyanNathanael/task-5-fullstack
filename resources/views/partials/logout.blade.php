<div class="modal fade" id="signOutBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center border-0 pe-5 ps-5">
            <h5><b>Are you sure you want to Logout?😢</b></h5>
            <div class="d-flex pt-3">
                <a href="{{ route('logout') }}" style="width: fit-content;"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" class="btn btn-danger me-2">
                    Yes, Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                <button class="btn btn-success ms-2" onclick="modalAction('signOutBackdrop');">Cancel</button>
            </div>
        </div>
        <div class="modal-footer border-0">
        </div>
    </div>
    </div>
</div>