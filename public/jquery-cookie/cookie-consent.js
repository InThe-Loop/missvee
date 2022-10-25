$(function() {
    cookiesPolicyBar();
});

function cookiesPolicyBar() {
    // Check cookie 
    if ($.cookie('missvee') != "active") $('#cookieAcceptBar').show();
    // Assign cookie on click
    $('#cookieAcceptBarConfirm').on('click',function(){
        $.cookie('missvee', 'active', {
          path: "/",
          secure: false,
          expires: 365,
          testing: true,
          domain: '.missveefamouslook.store'
        });
        $('#cookieAcceptBar').fadeOut();
    });
}
