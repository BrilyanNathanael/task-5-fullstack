<div class="modal fade" id="registerBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="registerBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center border-0 pe-5 ps-5">
            <h5><b>Register</b></h5>
            <p class="text-secondary">Get Started!</p>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirm Password:</label>
                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
                </div>
                <button type="submit" class="btn text-white mt-1">Submit</button>
            </form>
            <p class="mt-4">Already have an Account? 
                <button type="button" class="item bg-white border-0 me-4" data-bs-toggle="modal" data-bs-target="#signInBackdrop" onclick="modalAction('registerBackdrop')">
                Sign In
                </button>
            </p>
        </div>
        <div class="modal-footer border-0">
        </div>
    </div>
    </div>
</div>