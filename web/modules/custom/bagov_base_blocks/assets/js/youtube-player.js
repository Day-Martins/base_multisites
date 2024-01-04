jQuery(document).ready(function ($) {
    $('.yt-player').slick({
        dots: true,
        fade: true,
        cssEase: 'linear',
        appendDots: $('.img-dots-container'),
        dotsClass: 'slick-dots row',
        customPaging: function(slider, i) {             
            let el = $('.youtube-caroussel-wrap .slick-track .slick-slide[data-slick-index="'+i+'"] .img-dot').removeClass('hidden');            
            return el;
        },            
    });    
});