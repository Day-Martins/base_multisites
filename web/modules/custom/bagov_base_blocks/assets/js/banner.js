jQuery(document).ready(function ($) {
  
  jQuery('.banner-carrossel-bagov').each(function() {
    var id = jQuery(this).attr('id');
    var e = '#' + jQuery(this).attr('id');
    var _autoplay = jQuery(e).attr('data-autoplay');
    var _autoplaySpeed = jQuery(e).attr('data-speed');
    var _fade = jQuery(e).attr('data-fade');
    var _appendArrows = jQuery(e).attr('data-append-arrows');
    var _dots = jQuery(e).attr('data-dots');
    var _slidesToShow = jQuery(e).attr('data-slides-show');
    var _slidesToScroll = jQuery(e).attr('data-slides-scroll');
    var _rows = jQuery(e).attr('data-rows');

    carrossel = jQuery(e).slick({
      arrows: true,
      infinite: true,
      lazyLoad: 'ondemand',
      speed: 300,
      dots: parseInt(_dots) ? true : false,
      rows: parseInt(_rows),
      slidesToShow: parseInt(_slidesToShow),
      slidesToScroll: parseInt(_slidesToScroll),
      fade: parseInt(_fade) ? true : false,
      autoplay: parseInt(_autoplay) ? true : false,
      autoplaySpeed: parseInt(_autoplaySpeed),
      cssEase: 'linear',
      responsive: [
        {
          breakpoint: 480,
          settings: {
            rows: 1,
            slidesToShow: 1,
            slidesToScroll: 1,
            centerMode: true,
            
          }
        }
      ]
    });

    if(parseInt(_appendArrows) == 1) {
      carrossel.slick('setOption', {
        appendArrows: $('.' + id + '-append-arrows')  
      }, true);
    }
  });

});