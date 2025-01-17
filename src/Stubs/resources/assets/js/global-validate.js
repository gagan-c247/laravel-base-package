$(document).ready(function () {
    $.validator.setDefaults({
        errorElement: "span",
    });
    // method for validphone
    $.validator.addMethod(
        "validPhone",
        function (value, element) {
            // Initialize intl-tel-input instance for the element
            const iti = window.intlTelInputGlobals.getInstance(element);
            return this.optional(element) || (iti && iti.isValidNumber());
        },
        validationMessages.global.validPhone
    );
    // method for valida password
    $.validator.addMethod(
        "alphanumeric",
        function (value, element) {
            console.log("Validating alphanumeric for:", value); // Debugging log
            // Ensure the value is a combination of letters and numbers
            return (
                this.optional(element) ||
                /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d!@#$%^&*()_+=[\]{};':",.<>?/|\\`~-]*$/.test(
                    value
                )
            );
        },
        "Password should contain letters and numbers."
    );
    $.validator.setDefaults({
        errorPlacement: function (error, element) {
            console.log(element); // This will log the element causing the validation error
            if (element.attr("type") === "radio") {
                error.insertAfter(element.parent().parent()); // Place error message after the radio button's parent element
            } else if (element.hasClass("select2-hidden-accessible")) {
                error.insertAfter(element.next(".select2-container"));
            } else if (element.hasClass("ckeditor")) {
                error.insertAfter(element.next(".ck-editor"));
            } else if (element.attr("name") == "image") {
                error.insertAfter(".image-upload-action");
            } else {
                error.insertAfter(element); // Default behavior for other elements
            }
        },
    });
    $.validator.addMethod(
        "filesize",
        function (value, element, param) {
            if (element.files && element.files.length > 0) {
                return element.files[0].size <= param;
            }
            return true;
        },
        validationMessages.global.fileSize2MB
    );

    // Set global rules for phone field
    $.validator.addClassRules("phone", {
        validPhone: true,
    });
    $.validator.addMethod("strongPassword", function (value, element) {
        return (
            this.optional(element) ||
            /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+=[\]{};':",.<>?/|\\`~-])[A-Za-z\d!@#$%^&*()_+=[\]{};':",.<>?/|\\`~-]*$/.test(
                value
            )
        );
    });
    $.validator.addMethod(
        "filesize",
        function (value, element, param) {
            if (element.files && element.files.length > 0) {
                console.log(
                    "File selected: " + element.files[0].size + " bytes"
                );
                return element.files[0].size <= param;
            }
            return true; // If no file is selected, skip validation
        },
        validationMessages.global.fileSize2MB
    );
    $.validator.addMethod(
        "noSpecialChars",
        function (value, element) {
            return this.optional(element) || /^[a-zA-Z0-9\s]+$/.test(value);
        },
        validationMessages.global.noSpecialChars
    );
    $.validator.addMethod(
        "noSpaces",
        function (value, element) {
            return this.optional(element) || /^\S+$/.test(value);
        },
        validationMessages.global.noSpaces
    );
});
