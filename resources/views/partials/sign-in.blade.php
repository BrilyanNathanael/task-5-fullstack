@if($errors->has('email'))
    <input type="hidden" value="true" id="errorMsg">
@else
    <input type="hidden" value="false" id="errorMsg">
@endif

<div class="modal fade" id="signInBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header border-0">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body d-flex flex-column align-items-center border-0 pe-5 ps-5">
            <h5><b>Sign In</b></h5>
            <p class="text-secondary">Welcome Back!</p>
            @if($errors->has('email'))
            <strong class="text-danger mb-3">These credentials do not match our records.</strong>
                <!-- <span class="invalid-feedback" role="alert">
                </span> -->
            @endif
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn text-white mt-1">Submit</button>
            </form>
            <p class="mt-4">No Account?
                <button type="button" data-bs-toggle="modal" data-bs-target="#registerBackdrop" onclick="modalAction('signInBackdrop')">
                    Get Started
                </button>
            </p>
        </div>
        <div class="modal-footer border-0">
        </div>
    </div>
    </div>
</div>