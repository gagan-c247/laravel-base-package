$(document).ready(function () {
    $(".theme-color").on("change", function () {
        var colorValue = $(this).val(); // Get the selected color value
        var name = $(this).attr("name"); // Get the name of the color input field

        // Create FormData object and append color value
        var formData = new FormData();
        formData.append(name, colorValue); // Add the color value to FormData

        $.ajax({
            url: "/admin/update-settings", // The route where the data should be sent
            method: "POST",
            data: formData, // Send FormData
            processData: false, // Don't let jQuery process the data
            contentType: false, // Don't set the content type (FormData will handle it)
            success: function (response) {
                toastr.success(response.message, "Success", {
                    iconClass: "success",
                });
            },
            error: function (xhr, status, error) {
                toastr.error(response.error, "Error", {
                    iconClass: "error",
                });
            },
        });
    });
    // this is for deleting the website setting logo and favicon
    $(".delete-avatar.delete-setting span").click(function () {
        var key = "";
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                var formData = new FormData();
                key = $(this).parent().data("key");
                formData.append("key", key);
                $.ajax({
                    url: "/admin/delete-settings",
                    method: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        toastr.success(response.message, "Success", {
                            iconClass: "success",
                        });
                        if (key == "favicon") {
                            $("#faviconPreview").css(
                                "background-image",
                                "url(/admin/images/default-logo.jpg)"
                            );
                        }
                        if (key == "logo") {
                            $("#logoPreview").css(
                                "background-image",
                                "url(/admin/images/default-logo.jpg)"
                            );
                        }
                    },
                    error: function (xhr, status, error) {
                        toastr.error(response.error, "Error", {
                            iconClass: "error",
                        });
                    },
                });
            }
        });
    });
    $("#changePassword").click(function () {
        $.ajax({
            url: "/admin/change-password",
            method: "GET",
            success: function (response) {
                $("#changePasswordModal .modal-content").html(response);
                passwordToggle();
                updatePasswordValidations();
                submitUpdatedPassword();
                $("#changePasswordModal").modal("show");
            },
        });
    });
});
function submitUpdatedPassword() {
    $("#updatePasswordForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        if ($(this).valid()) {
            $.ajax({
                url: $(this).attr("action"),
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (response) {
                    $("#changePasswordModal").modal("hide");
                    toastr.success(response.message, "Success", {
                        iconClass: "success",
                    });
                },
                error: function (xhr) {
                    // Clear any existing validation errors
                    $(".invalid-feedback").remove();
                    $(".is-invalid").removeClass("is-invalid");

                    // Check if there are validation errors
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;

                        // Loop through the errors and display them
                        for (var field in errors) {
                            var input = $(`[name="${field}"]`);
                            input.addClass("is-invalid");

                            // Create error message element and append it
                            var errorMessage = `<span class="error invalid-feedback">${errors[field][0]}</span>`;
                            input.after(errorMessage);
                        }
                    } else {
                        alert(
                            "An unexpected error occurred. Please try again."
                        );
                    }
                },
            });
        }
    });
}
