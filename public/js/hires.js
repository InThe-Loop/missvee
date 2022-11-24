$(function() {
    // $("#hireModal").modal("show");
    // $(".close-modal").on("click", function() {
    //     $("#hireModal").modal("hide");
    // });
    $("body").on("click", '[data-toggle="modal"]', function() {
        let id = $(this).data('id');
        $.ajax({
            url: "/reservations/fetch/" + id,
            method: "GET",
            dataType: "json",
            success: function(response) {
                // console.log(response);
                $("#product-name").text(response.name);
                $("#product-price").text("R" + response.price);
                $("#product-sizes").text(response.sizes);
                $("#hire-name").val(response.name);
                $("#hire-price").val(response.price);
                $("#hire-deposit").text(parseInt(response.price) * 2);
                $("#hire-total").text(response.price);
                $("#product-desc").html(response.description);
                let whatsapp = "https://wa.me/0681037459?text=I would like to make a booking for: " + response.name + " at R" + (response.price * 2);
                $("#whatsapp").attr("href", whatsapp);

                // console.log(JSON.parse(response.images));
                let images = "", thumbs = "";
                let link = window.location.href
                let parts = link.split("/");
                let url = parts[0] + "//" + parts[2];
                $.each(JSON.parse(response.images), function( index, value ) {
                    images += '<img src="' + url + '\\storage\\' + value + '" alt="' + response.name + '" />';
                    thumbs += '<div class="img-item">\
                        <a href="#" data-id="' + (index + 1) + '">\
                            <img src="' + url + '\\storage\\' + value + '" alt="' + response.name + '" />\
                        </a>\
                    </div>';
                });
                $("#img-showcase").html(images);
                $("#img-select").html(thumbs);
            },
            error: function(xhr) {
                console.log(xhr)
            }
        });
    });

    $('[data-toggle="tooltip"]').tooltip();

    let start = moment().add(1, 'days');
    let end = moment().add(2, 'days');
    let week = moment().add(7, 'days');

    $("#range").daterangepicker({
        drops: 'up',
        endDate: end,
        maxDate: week,
        minDate: start,
        changeYear: false
    });
    $("#range").on('apply.daterangepicker', function(e, picker) {
        e.preventDefault();
        const dates = {
            "start": picker.startDate.format('MM/DD/YYYY'),
            "end": picker.endDate.format('MM/DD/YYYY')
        }
        calculateTotals(dates);
    });
    
    $("#make-reservation").on("click", function(e) {
        e.preventDefault();
        $("#reservation-form").validate({
            // Specify validation rules
            rules: {
                name: {
                    required: true,
                    minlength: 5,
                    maxlength: 50
                },
                email: {
                    email: true
                },
                phone: {
                    phoneUK: true,
                    minlength: 10,
                    maxlength: 10
                },
                address: {
                    required: true,
                    minlength: 10,
                    maxlength: 500
                },
                range: {
                    required: true,
                    maxlength: 100
                }
            },
            // Specify validation error messages
            messages: {
                name: {
                    required: "Please enter your fullname.",
                    minlength: $.validator.format("At least {0} characters are required for your name."),
                    maxlength: $.validator.format("You may not enter more than {0} characters!"),
                },
                email: {
                    email: "This is not a valid email address."
                },
                phone: {
                    required: "Please enter your telephone number so that we can reach you for confirmation.",
                    phoneUK: "This should be either a valid South African landline or mobile phone number.",
                    maxlength: $.validator.format("You may not enter more than {0} digits!")
                },
                address: {
                    required: "Please provide your residential address.",
                    minlength: $.validator.format("At least {0} characters are required for the address."),
                    maxlength: $.validator.format("You may not enter more than {0} characters!"),
                },
                range: {
                    required: "Please enter the duration you would like to hire the item for.",
                }
            },
            submitHandler: function(e) {
                e.preventDefault();
            }
        });

        if ($("#reservation-form").valid()) {
            $(".stage").show();
            $("#make-reservation").text("Making reservation. Please wait...");
            $.ajax({
                url: "/reservations/place",
                method: "POST",
                dataType: "json",
                data: {
                    _token: $("input[name='_token']").val(),
                    name: $("#name").val(),
                    email: $("#email").val(),
                    phone: $("#phone").val(),
                    address: $("#address").val(),
                    dates: $("#range").val(),
                    price: $("#hire-price").val(),
                    pname: $("#hire-name").val(),
                    total: $("#hire-total").text(),
                    days: $("#hire-days").val()
                },
                success: function(response) {
                    // console.log(response);
                    $(".stage").hide();
                    $("#make-reservation").text("Reserve item now");
                    if (response[0] == "success") {
                        $(".success-msg").slideDown();
                        $("#reference").text(response[1]);
                        $("#reservation-form").trigger("reset");
                    }
                },
                error: function(xhr) {
                    console.log(xhr)
                }
            });
        }
    });
});

function calculateTotals(dates) {
    let start = moment(dates.start, 'MM/DD/YYYY');
    let end = moment(dates.end, 'MM/DD/YYYY');
    let totalDays = end.diff(start, 'days');
    let hirePrice = $('#hire-price').val();
    let total = hirePrice * totalDays;
    $("#hire-days").val(totalDays);
    $("#hire-total").text(parseInt(total) + parseInt(hirePrice));
}
