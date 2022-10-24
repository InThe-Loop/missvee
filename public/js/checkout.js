/**
 *  Checkout
 */
 $(function() {
    /* Get IP address */
    $.getJSON("https://ipgeolocation.abstractapi.com/v1/?api_key=705b25bd8ac0425181222609b915893f", function(data) {
        //console.log(data.ip_address);
      	let ip = data.ip_address;
      	if(ip.length > 0) {
      		$("#ip-address").html("This order form is provided in a secure environment and to help protect against fraud your current IP address <em>" + ip + "</em> is being logged. Please note that we will not store this information.");
        }
    });

    // Show hide address boxes
    $("#addr-show").on("click", function() {
        $(this).hide();
        $("#addr-hide").show();
        $("#billing-info").slideToggle();
        $("#autocomplete").attr("disabled", true);
    });
    $("#addr-hide").on("click", function() {
        $(this).hide();
        $("#addr-show").show();
        $("#billing-info").slideToggle();
        $("#autocomplete").attr("disabled", false);
    });

    // Replace the supplied `publicKey` with your own.
    // Ensure that in production you use a production public_key.
    var sdk = new window.YocoSDK({
        publicKey: 'pk_live_30401bb138ZB1kze9f74'
    });

    // Create a new dropin form instance
    var inline = sdk.inline({
        layout: "basic",
        // NB: This amount must be in cents
        amountInCents: $("#amountInCents").val(),
        currency: "ZAR"
    });

    // Mount the yoco form to take cc details
    inline.mount('#card-frame');

    // Validate all inputs
    $("#pay-button").on("click", function() {
        // Run our code when your form is submitted
        var form = document.getElementById('payment-form');
        var submitButton = document.getElementById('pay-button');
           
        // Disable the button to prevent multiple clicks while processing
        submitButton.disabled = true;
        // Add button effects
        $("#payment-error").hide();
        submitButton.classList.add("loading");
        $("#processing-payment").removeClass("hide");

        // This is the inline object we created earlier with the sdk
        inline.createToken().then(function (result) {
            // Re-enable button now that request is complete
            // (i.e. on success, on error and when auth is cancelled)
            submitButton.classList.remove("loading");
            $("#processing-payment").addClass("hide");
            
            if (result.error) {
                submitButton.disabled = false;
                const errorMessage = result.error.message;
                $("#payment-error").text("Please ensure that all required fields have been filled in.");
            }
            else {
                submitButton.disabled = false;
                let name_on_cc = $('#name_on_card').val();
                let terms = $('#agree').prop('checked');
                if (name_on_cc.length > 5 && terms === true) {
                    $("#payment-error").hide();
                    // Set token
                    const token = result;
                    $('#token').val(token.id);
                    submitButton.classList.add("success");
                    $("#email-notification").removeClass("hide");
                    form.submit();
                }
                else {
                    $("#payment-error").text("Please ensure that all required fields have been filled in.");
                }
            }
        }).catch(function (error) {
            // Re-enable button now that request is complete
            submitButton.disabled = false;
            submitButton.classList.remove("success");
            submitButton.classList.remove("loading");
            $("#processing-payment").addClass("hide");
            $("#payment-error").text("Please ensure that all required fields have been filled in.");
        });
        // Validate form fields
        $("#payment-form").validate({
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
                    required: true,
                    phoneUK: true,
                    minlength: 10,
                    maxlength: 10
                },
                autocomplete: "required",
                address: "required",
                city: "required",
                province: "required",
                postal_code: "required",
                name_on_card: {
                    required: true,
                    minlength: 5,
                    maxlength: 30
                },
                agree: {
                    required: true
                }
            },
            // Specify validation error messages
            messages: {
                email: {
                    required: "Please ensure you provide the correct email address for order notification purposes."
                },
                name: {
                    minlength: $.validator.format("At least {0} characters are required for your name."),
                    maxlength: $.validator.format("You may not enter more than {0} characters!"),
                },
                phone: {
                    required: "Please specify a telephone number where we can reach you.",
                    phoneUK: "This should be either a valid South African landline or mobile telephone number."
                },
                autocomplete: {
                    required: "VERY IMPORTANT: This field is super important to ensure that your\
                    order reaches you!\ Please type and select your address from the dropdown\
                    suggestions and the system will prepopulate all the address boxes for you.\
                    Alternatively, click the (+) plus sign above to manually enter your address."
                },
                name_on_card: {
                    required: "The name on your card is needed by your bank to validate this transaction.",
                    minlength: $.validator.format("At least {0} characters are required for the name."),
                    maxlength: $.validator.format("You may not enter more than {0} characters!"),
                },
                agree: {
                    required: "You have to read and agree to our terms and conditions. Please read them at the bottom of the page, if you haven't done so."
                }
            },
            submitHandler: function(e) {
                e.preventDefault();
            },
            errorPlacement: function(error, element) {
                if (element.attr("name") == "agree") {
                    error.appendTo("#errorToShow");
                } else {
                    error.insertAfter(element);
                }
            }
        });
    });
});
