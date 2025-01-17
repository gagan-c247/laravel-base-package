$(document).ready(function () {
    var cropper; // To hold the Cropper.js instance
    var imagePreview = document.getElementById("imagePreviewForCropper"); // The <img> element
    var fieldname = "";

    // Handle file input change event
    $(".cropper").on("change", function (e) {
        var files = e.target.files;
        fieldname = $(this).attr("name");

        if (files && files.length > 0) {
            var reader = new FileReader();
            reader.onload = function (event) {
                $("#imagePreviewForCropper").attr("src", event.target.result); // Update image preview

                $("#cropperModal").modal("show"); // Show modal
            };
            reader.readAsDataURL(files[0]); // Read the selected file
        } else {
            toastr.error("No files selected!", "Error", {
                iconClass: "error",
            });
        }
    });

    // Initialize Cropper.js when the modal is shown
    $("#cropperModal").on("shown.bs.modal", function () {
        if (cropper) {
            cropper.destroy(); // Destroy any existing Cropper instance
        }
        cropper = new Cropper(imagePreview, {
            aspectRatio: 1, // Adjust aspect ratio if required
            viewMode: 2,
            autoCropArea: 1,
            preview: ".preview", // Optional preview container
        });
    });

    // Destroy Cropper.js when modal is hidden
    $("#cropperModal").on("hidden.bs.modal", function () {
        if (cropper) {
            cropper.destroy();
            cropper = null;
        }
    });

    // Handle crop and AJAX upload
    $("#cropImage").on("click", function () {
        if (!cropper) {
            toastr.error(
                "Cropper is not initialized or no image selected!",
                "Error",
                {
                    iconClass: "error",
                }
            );
            return;
        }

        var canvas = cropper.getCroppedCanvas({
            width: 300, // Desired cropped width
            height: 300, // Desired cropped height
        });

        if (!canvas) {
            toastr.error("Failed to get cropped canvas!", "Error", {
                iconClass: "error",
            });
            return;
        }

        // Generate Base64 data
        var croppedImageBase64 = canvas.toDataURL("image/png"); // Base64 data URL

        canvas.toBlob(function (blob) {
            if (!blob) {
                toastr.error("Failed to create Blob from canvas!", "Error", {
                    iconClass: "error",
                });
                return;
            }

            var formData = new FormData();
            formData.append(fieldname, blob);

            $.ajax({
                url: "/admin/update-settings", // Your server endpoint
                method: "POST",
                data: formData,
                processData: false, // Don't process the data
                contentType: false, // Let FormData handle the content type
                success: function (response) {
                    $("#cropperModal").modal("hide"); // Hide modal on success
                    toastr.success(response.message, "Success", {
                        iconClass: "success",
                    });
                    // Update the preview using the Base64 data
                    if (fieldname === "logo") {
                        $("#logoPreview").css(
                            "background-image",
                            `url(${croppedImageBase64})`
                        );
                    }
                    if (fieldname === "favicon") {
                        $("#faviconPreview").css(
                            "background-image",
                            `url(${croppedImageBase64})`
                        );
                    }
                },
                error: function (xhr) {
                    toastr.error(
                        xhr.responseJSON?.error || "An error occurred",
                        "Error",
                        {
                            iconClass: "error",
                        }
                    );
                },
            });
        });
    });
});
