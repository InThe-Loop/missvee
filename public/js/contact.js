/**
 *  Contact
 */
 $(function() {
    // Validate form fields
    $("#contact-form").validate({
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
            phone: {
                phoneUK: true,
                minlength: 10,
                maxlength: 10
            },
            subject: "required",
            message: {
                required: true,
                minlength: 10,
                maxlength: 500
            }
        },
        // Specify validation error messages
        messages: {
            email: {
                required: "Please ensure you provide us with the correct email address so we can reach you, if needed."
            },
            name: {
                minlength: $.validator.format("At least {0} characters are required for your name."),
                maxlength: $.validator.format("You may not enter more than {0} characters!"),
            },
            phone: {
                phoneUK: "This should be either a valid South African landline or mobile phone number."
            },
            
            subject: {
                required: "Please select a subject line."
            },
            message: {
                required: "The message will form the body of the email you send to us. Please let us know what's on your mind.",
                minlength: $.validator.format("At least {0} characters are required for the message."),
                maxlength: $.validator.format("You may not enter more than {0} characters!"),
            }
        },
        submitHandler: function(e) {
            e.preventDefault();
            e.submit();
        }
    });
});
