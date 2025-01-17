<div class="modal-header">
    <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        <svg xmlns="http://www.w3.org/2000/svg" aria-hidden="true" role="img" width="1em" height="1em"
            viewBox="0 0 24 24" data-icon="mdi:times" class="iconify iconify--mdi">
            <path fill="currentColor"
                d="M19 6.41L17.59 5L12 10.59L6.41 5L5 6.41L10.59 12L5 17.59L6.41 19L12 13.41L17.59 19L19 17.59L13.41 12z">
            </path>
        </svg>
    </button>
</div>
<form method="post" id="updatePasswordForm" action="{{ route('admin.change-password') }}">
    @csrf
    <div class="modal-body">
        <div class="row gy-3">
            <div class="col-md-12">
                <div class="field">
                    <label for="oldPassword">Old Password <sup>*</sup></label>
                    <div class="password-wrapper">
                        <input type="password" id="oldPassword" name="old_password" class="form-control" />
                        <span class="password-toggle-icon">
                            <span class="iconify" data-icon="mdi:eye-off" data-inline="false"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="field">
                    <label for="newPassword">New Password <sup>*</sup></label>
                    <div class="password-wrapper">
                        <input type="password" id="newPassword" name="password" class="form-control" />
                        <span class="password-toggle-icon">
                            <span class="iconify" data-icon="mdi:eye-off" data-inline="false"></span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="field">
                    <label for="confirmPassword">Confirm Password <sup>*</sup></label>
                    <div class="password-wrapper">
                        <input type="password" id="confirmPassword" name="password_confirmation" class="form-control" />
                        <span class="password-toggle-icon">
                            <span class="iconify" data-icon="mdi:eye-off" data-inline="false"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-outline" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-secondary btn-block" id="updatePassword">Update</button>
    </div>
</form>
