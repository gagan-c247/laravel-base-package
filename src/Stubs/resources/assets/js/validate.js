$(document).ready(function () {
    // Login form validation
    $("#login-form").validate({
        rules: {
            email: {
                required: true,
                email: true, // Ensures the email is in a valid format
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                strongPassword: true, // Ensures the password is alphanumeric
            },
        },
        messages: {
            email: {
                required: validationMessages.login.email.required,
                email: validationMessages.login.email.valid,
            },
            password: {
                required: validationMessages.login.password.required,
                minlength: validationMessages.login.password.min,
                maxlength: validationMessages.login.password.max,
                strongPassword: validationMessages.global.strongPassword,
            },
        },
        submitHandler: function (form) {
            form.submit(); // Submit the form if it's valid
        },
    });

    // Forgot password form validation
    $("#forgot-password-form").validate({
        rules: {
            email: {
                required: true,
                email: true, // Ensures the email is in a valid format
            },
        },
        messages: {
            email: {
                required: validationMessages.forgot_password.email.required,
                email: validationMessages.forgot_password.email.valid,
            },
        },
        submitHandler: function (form) {
            form.submit(); // Submit the form if it's valid
        },
    });
    $("#reset-password-form").validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 15,
                strongPassword: true,
            },
            password_confirmation: {
                required: true,
                equalTo: "#password",
            },
        },
        messages: {
            email: {
                required: validationMessages.forgot_password.email.required,
                email: validationMessages.forgot_password.email.valid,
            },
            password: {
                required: validationMessages.change_password.password.required,
                minlength: validationMessages.change_password.password.min,
                maxlength: validationMessages.change_password.password.min,
                strongPassword: validationMessages.global.strongPassword,
            },
            password_confirmation: {
                required: validationMessages.change_password.password.required,
                equalTo: validationMessages.change_password.confirmation,
            },
        },
        submitHandler: function (form) {
            form.submit(); // Submit the form if it's valid
        },
    });
    // Custom alphanumeric validation method
    $("#edit-profile").validate({
        rules: {
            name: {
                required: true,
                minlength: 3,
                maxlength: 50,
                noSpecialChars: true,
            },
            email: {
                required: true,
                email: true,
            },
            contact_no: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10,
            },
            location: {
                required: true,
                minlength: 3,
                maxlength: 50,
            },
        },
        messages: {
            name: {
                required: editProfileValidations.edit_profile.name.required,
                minlength: editProfileValidations.edit_profile.name.minlength,
                maxlength: editProfileValidations.edit_profile.name.maxlength,
            },
            email: {
                required: editProfileValidations.edit_profile.email.required,
                email: editProfileValidations.edit_profile.email.email,
            },
            contact_no: {
                required:
                    editProfileValidations.edit_profile.contact_no.required,
                digits: editProfileValidations.edit_profile.contact_no.digits,
                minlength:
                    editProfileValidations.edit_profile.contact_no.minlength,
                maxlength:
                    editProfileValidations.edit_profile.contact_no.maxlength,
            },
            location: {
                required: editProfileValidations.edit_profile.location.required,
                minlength:
                    editProfileValidations.edit_profile.location.minlength,
                maxlength:
                    editProfileValidations.edit_profile.location.maxlength,
            },
        },
    });
});
function updatePasswordValidations() {
    $("#updatePasswordForm").validate({
        rules: {
            old_password: {
                required: true,
                minlength: 8,
            },
            password: {
                required: true,
                minlength: 8,
                strongPassword: true, // Use the custom alphanumeric validator
            },
            password_confirmation: {
                required: true,
                equalTo: "#newPassword",
            },
        },
        messages: {
            old_password: {
                required: "Old password field is required.",
            },
            password: {
                required: "New password field is required.",
                strongPassword: validationMessages.global.strongPassword,
            },
            password_confirmation: {
                required: "Confirm password field is required.",
                equalTo: validationMessages.change_password.confirmation,
            },
        },
    });
}
