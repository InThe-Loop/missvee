/**
 *  Sign in
 */
 $(function() {
    // Validate form fields
    $("#signin-form").validate({
        // Specify validation rules
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 6,
                maxlength: 12
            },
        },
        // Specify validation error messages
        messages: {
            email: {
                required: "Your username/email address is required to sign you in.",
                email: "This should be the email address you used when you first signed up on the website."
            },
            password: {
                required: "Please enter a password.",
                minlength: $.validator.format("At least {0} characters are required for the password."),
                maxlength: $.validator.format("You may not enter more than {0} characters!"),
            }
        },
        submitHandler: function(e) {
            e.preventDefault();
            e.submit();
        }
    });
});
