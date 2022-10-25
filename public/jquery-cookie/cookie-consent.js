$(function() {
    // Check cookie 
    if ($.cookie('missvee') != "accepted") {
        // $('#cookieAcceptBar').show();
        $('#cookieModal').modal('show');
    }
    // Assign cookie on click
    $('#cookieAcceptBarConfirm').on('click',function(){
        $.cookie('missvee', 'accepted', {
          path: "/",
          secure: false,
          expires: 365,
          testing: true,
          domain: '.missveefamouslook.store'
        });
        $('#cookieModal').modal('hide');
    });
    $('.close-modal').on('click',function(){
        $('#cookieModal').modal('hide');
    });
});
