<script>
    const validationMessages = @json(__('validation_messages'));
    const editProfileValidations = @json(__('profile'))
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://code.iconify.design/3/3.0.0/iconify.min.js"></script>
<script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/theme.js') }}"></script>
<script src="{{ asset('admin/assets/js/MultiSelect.js') }}"></script>
<script src="{{ asset('admin/assets/js/intlTelInput.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/utils.js') }}"></script>
<script src="{{ asset('admin/assets/js/toastr.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/select2.min.js') }}"></script>
<script src="{{ asset('admin/assets/js/custom.js') }}"></script>
<script src="{{ asset('admin/assets/js/jquery-validation.js') }}"></script>
<script src="{{ asset('admin/assets/js/global-validate.js') }}"></script>
<script src="{{ asset('admin/assets/js/validate.js') }}"></script>
<script src="{{ asset('admin/assets/js/sweetalert.js') }}"></script>
<script src="{{ asset('admin/assets/js/ajax.js') }}"></script>
<script src="{{ asset('admin/assets/js/cropper.js') }}"></script>
<script src="{{ asset('admin/assets/js/tooltip.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>

{{-- image crop model --}}
<div class="modal fade" id="cropperModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cropperModalLabel">Crop Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="image-container">
                    <img id="imagePreviewForCropper" src="" alt="Image Preview" style="max-width: 100%;" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" id="cropImage" class="btn btn-primary">Crop</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="globalModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

        </div>
    </div>
</div>
<div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="cropperModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

        </div>
    </div>
</div>
@include('admin.common.toastr')
</body>

</html>
