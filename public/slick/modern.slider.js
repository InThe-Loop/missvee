$(document).ready(function() {
    $(".Modern-Slider").slick({
        dots: true,
        speed: 500,
        autoplay: true,
        slidesToShow: 1,
        draggable: false,
        slidesToScroll: 1,
        cssEase: 'linear',
        pauseOnHover: true,
        autoplaySpeed: 3000,
        pauseOnDotsHover: true,
        nextArrow: '<button class="NextArrow"></button>',
        prevArrow: '<button class="PrevArrow"></button>',
    });
})

/* Run annimation every x seconds */
setInterval(function() {
    $('.text-anim').toggleClass('animate');
}, 2000);
