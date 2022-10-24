/**
 *  Sign in
 */
 $(function() {
    // Validate form fields
    $("#signup-form").validate({
        // Specify validation rules
        rules: {
            email: {
                required: true,
                email: true
            },
            name: {
                required: true,
                minlength: 5,
                maxlength: 30
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 12,
                passChecker: true
            },
            password_confirmation: {
                required: true,
                equalTo: "#password"
            }
        },
        // Specify validation error messages
        messages: {
            email: {
                required: "Ensure that this is a working email address. This will also be used as your username to login to the website."
            },
            name: {
                required: "Please enter your full name.",
                minlength: $.validator.format("At least {0} characters are required for your name."),
                maxlength: $.validator.format("You may not enter more than {0} characters!"),
            },
            password: {
                required: "Please enter a password.",
                passChecker: "Your password must at least consist of 1 UPPERCASE, 1 lowercase letter and 1 number.",
                minlength: $.validator.format("At least {0} characters are required for the password."),
                maxlength: $.validator.format("You may not enter more than {0} characters!"),
            },
            password_confirmation: {
                required: "Please confirm your password.",
                equalTo: "Your confirmation password doesn't match your password!"
            }
        },
        submitHandler: function(e) {
            e.preventDefault();
            e.submit();
        }
    });
    $.validator.addMethod("passChecker", function(value) {
        // Must have a UPPERCASE letter
        // Have a lowercase letter
        // Have a digit
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value)
            && /[a-z]/.test(value) 
            && /\d/.test(value)
    });
});
