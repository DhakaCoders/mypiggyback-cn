(function($) {


/*Google Map Style*/
var CustomMapStyles  = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":20}]},{"featureType":"road.highway","elementType":"geometry.fill","stylers":[{"color":"#ffffff"},{"lightness":17}]},{"featureType":"road.highway","elementType":"geometry.stroke","stylers":[{"color":"#ffffff"},{"lightness":29},{"weight":.2}]},{"featureType":"road.arterial","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":18}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"color":"#ffffff"},{"lightness":16}]},{"featureType":"poi","elementType":"geometry","stylers":[{"color":"#f5f5f5"},{"lightness":21}]},{"featureType":"poi.park","elementType":"geometry","stylers":[{"color":"#dedede"},{"lightness":21}]},{"elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"},{"lightness":16}]},{"elementType":"labels.text.fill","stylers":[{"saturation":36},{"color":"#333333"},{"lightness":40}]},{"elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"geometry","stylers":[{"color":"#f2f2f2"},{"lightness":19}]},{"featureType":"administrative","elementType":"geometry.fill","stylers":[{"color":"#fefefe"},{"lightness":20}]},{"featureType":"administrative","elementType":"geometry.stroke","stylers":[{"color":"#fefefe"},{"lightness":17},{"weight":1.2}]}]

var windowWidth = $(window).width();
$('.navbar-toggle').on('click', function(){
  $('#mobile-nav').slideToggle(300);
});
  
  
//matchHeightCol
if($('.mHc').length){
  $('.mHc').matchHeight();
};
if($('.mHc1').length){
  $('.mHc1').matchHeight();
};
if($('.mHc2').length){
  $('.mHc2').matchHeight();
};
if($('.mHc3').length){
  $('.mHc3').matchHeight();
};
if($('.mHc4').length){
  $('.mHc4').matchHeight();
};
if($('.mHc5').length){
  $('.mHc5').matchHeight();
};


//$('[data-toggle="tooltip"]').tooltip();

//banner animation
$(window).scroll(function() {
  var scroll = $(window).scrollTop();
  $('.page-banner-bg').css({
    '-webkit-transform' : 'scale(' + (1 + scroll/2000) + ')',
    '-moz-transform'    : 'scale(' + (1 + scroll/2000) + ')',
    '-ms-transform'     : 'scale(' + (1 + scroll/2000) + ')',
    '-o-transform'      : 'scale(' + (1 + scroll/2000) + ')',
    'transform'         : 'scale(' + (1 + scroll/2000) + ')'
  });
});


if($('.fancybox').length){
$('.fancybox').fancybox({
    //openEffect  : 'none',
    //closeEffect : 'none'
  });

}


/**
Responsive on 767px
*/

// if (windowWidth <= 767) {
  $('.toggle-btn').on('click', function(){
    $(this).toggleClass('menu-expend');
    $('.toggle-bar ul').slideToggle(500);
  });


// }



// http://codepen.io/norman_pixelkings/pen/NNbqgG
// https://stackoverflow.com/questions/38686650/slick-slides-on-pagination-hover


/**
Slick slider
*/
if( $('.responsive-slider').length ){
    $('.responsive-slider').slick({
      dots: true,
      infinite: false,
      autoplay: true,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 4,
      slidesToScroll: 1,
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });
}


/*var swiper = new Swiper('.catagorySlider', {
    slidesPerView: 1,
    loop: true,
    navigation: {
      nextEl: '.catagorySlider-arrows .swiper-button-next',
      prevEl: '.catagorySlider-arrows .swiper-button-prev',
    },
    breakpoints: {
       639: {
        slidesPerView: 2,
        spaceBetween: 0,
      },
      991: {
        slidesPerView: 3,
        spaceBetween: 0,
      },
      1199: {
        loop: false,
        slidesPerView: 4,
        spaceBetween: 0,
      },
      1920: {
        loop: false,
        slidesPerView: 4,
        spaceBetween: 0,
      },
    }
  });*/

if( $('#mapID').length ){
var latitude = $('#mapID').data('latitude');
var longitude = $('#mapID').data('longitude');

var myCenter= new google.maps.LatLng(latitude,  longitude);
function initialize(){
    var mapProp = {
      center:myCenter,
      mapTypeControl:true,
      scrollwheel: false,
      zoomControl: true,
      disableDefaultUI: true,
      zoom:7,
      streetViewControl: false,
      rotateControl: true,
      mapTypeId:google.maps.MapTypeId.ROADMAP,
      styles: CustomMapStyles
      };

    var map= new google.maps.Map(document.getElementById('mapID'),mapProp);
    var marker= new google.maps.Marker({
      position:myCenter,
        //icon:'map-marker.png'
      });
    marker.setMap(map);
}
google.maps.event.addDomListener(window, 'load', initialize);

}


/* BS form Validator*/
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();



if( $('.fl-tabs').length ){
  $('div.fl-tabs button').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('div.fl-tabs button').removeClass('current');
    $('.fl-tab-content').removeClass('current');

    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
  });
}


if (windowWidth <= 767) {
  if( $('.piggybackSlider').length ){
    $('.piggybackSlider').slick({
      dots: true,
      infinite: false,
      autoplay: false,
      autoplaySpeed: 4000,
      speed: 700,
      slidesToShow: 1,
      slidesToScroll: 1,
    });
  }
}

if( $('div.vcl-tabs').length ){
  $('div.vcl-tabs button').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('div.vcl-tabs .vcl-tab-link').removeClass('current');
    $('.vcl-tab-content').removeClass('current');

    $(this).parent().addClass('current');
    $("#"+tab_id).addClass('current');
  });
}



if( $('.testimonialSlider').length ){
  $('.testimonialSlider').slick({
    dots: true,
    infinite: false,
    autoplay: false,
    autoplaySpeed: 4000,
    speed: 700,
      fade: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    customPaging: function (slider, i) {
      console.log(slider);
      return  (i + 1);
    }
  });
}

if (windowWidth >= 767){
  if( $('.Vehicle-left-bg').length ){
    var conWidth = $('.container').width();

    var OutConLft = (windowWidth - conWidth)/2;
    var VclRtWidth = $('.vcl-right-wrap').outerWidth();
    var VclLefBgOuter = OutConLft + VclRtWidth;
    var VclLefBg = windowWidth - VclLefBgOuter;
    $('.Vehicle-left-bg').css("width",VclLefBg);
  }
}

$(window).resize(function() { 
  var window2Width = $(window).width();
  var conWidth = $('.container').width();

  var OutConLft = (window2Width - conWidth)/2;
  var VclRtWidth = $('.vcl-right-wrap').outerWidth();
  var VclLefBgOuter = OutConLft + VclRtWidth;
  var VclLefBg = window2Width - VclLefBgOuter;
  $('.Vehicle-left-bg').css("width",VclLefBg);
});

if (windowWidth <= 767) {
  $('.xs-hamburger').on('click', function(e){
    $('.hdr-menu').slideToggle(500);
    $(this).toggleClass('cross-icon');
  });

  $('li.menu-item-has-children > a').on('click', function(e){
    e.preventDefault();
    $(this).parent().toggleClass('sub-menu-arrow');
    $(this).next().slideToggle(300);

  });
}

if (windowWidth <= 767){
  if( $('.VclTabSlider').length ){
    $('.VclTabSlider').slick({
      centerMode: true,
      dots: true,
      speed: 700,
      autoplaySpeed: 4000,
      autoplay: false,
      centerPadding: '70px',
      slidesToShow: 1,
      customPaging: function (slider, i) {
        console.log(slider);
        return  (i + 1);
      },
      responsive: [
      {
        breakpoint: 768,
        settings: {
          centerMode: true,
          centerPadding: '70px',
          slidesToShow: 1
        }
      }
      ]
    });
  }
}



if( $('.contact-map').length ){
  var conWidth = $('.container').width();

  var OutConRgt = (windowWidth - conWidth)/2;
  var VclLftWidth = $('.contat-frm-wrp').outerWidth();
  var VclRtBgOuter = OutConRgt + VclLftWidth;
  var VclRtBg = windowWidth - VclRtBgOuter;
  $('.contact-map').css("width",VclRtBg);
}

$(window).resize(function() { 
  var window2Width = $(window).width();
  var conWidth = $('.container').width();

  var OutConRgt = (window2Width - conWidth)/2;
  var VclLftWidth = $('.contat-frm-wrp').outerWidth();
  var VclRtBgOuter = OutConRgt + VclLftWidth;
  var VclRtBg = window2Width - VclRtBgOuter;
  $('.contact-map').css("width",VclRtBg);
});





  if( $('.counter').length ){
    $('.counter').counterUp({
      delay: 10,
      time: 2000
    });
  }
  
/* account */
$('div.mp-tabs button').click(function(){
    var tab_id = $(this).attr('data-tab');

    $('div.mp-tabs button').removeClass('current');
    $('.mp-tab-content').removeClass('current');

    $(this).addClass('current');
    $("#"+tab_id).addClass('current');
});


$('.edit-profile-btn').on('click', function(){
  $('.profile-img-step-1').addClass('modeEdit');
  $('.profile-submit-btn.profile-edit-step-1').hide();
  $('.profile-edit-step-2').show();
});

$('#edit-profile-cancle-btn').on('click', function(){
  //$('.profile-edit-step-1').show();
  $('.profile-submit-btn.profile-edit-step-1').show();
  $('.profile-img-step-1').removeClass('modeEdit');
  $('.profile-edit-step-2').hide();
});



$('.hdr-login-profile').on('click', function(){
  $(this).toggleClass('login-btn-expend');
  $('.hdr-login-profile ul').slideToggle(300);
});

$('.humberger-menu-items > ul > li.menu-item-has-children > a').on('click', function(e){
  e.preventDefault();
  $(this).toggleClass('xs-sub-menu-expend');
  $(this).parent().find('.sub-menu').slideToggle(300);
});


if ($("#paypal_type").is(":checked")) {
    $('#paypal_payment').addClass('show-method');
}

$("#paypal_type").on('change', function(){
    if ($(this).is(":checked")) {
        $('#paypal_payment').addClass('show-method');
        $('#stripe_payment').removeClass('show-method');
    }
});
$("#stripe_type").on('change', function(){
    if ($(this).is(":checked")) {
      $('#paypal_payment').removeClass('show-method');
      $('#stripe_payment').addClass('show-method');
    }
});
    


/* oder payment*/
var circleCount1 = $(".order-payment-step-bar-radio-cntlr ul li").outerWidth();
var circleCount2 = $(".order-payment-step-bar-radio-cntlr ul li span").outerWidth(); 
var circleCount3 = (circleCount1 - circleCount2 ) / 2;
$(".line-eraser").width(circleCount3); 

$(window).resize(function() { 
  var circleCount1 = $(".order-payment-step-bar-radio-cntlr ul li").outerWidth();
  var circleCount2 = $(".order-payment-step-bar-radio-cntlr ul li span").outerWidth(); 
  var circleCount3 = (circleCount1 - circleCount2 ) / 2;
  $(".line-eraser").width(circleCount3); 
});

$('.pg-accordion-title').click(function(){
    $(this).next().slideToggle(300);
    $(this).parent().siblings().find('.pg-accordion-des').slideUp(300);
    $(this).toggleClass('pg-accordion-active');
    $(this).parent().siblings().find('.pg-accordion-title').removeClass('pg-accordion-active');
});

//alert(circleCount1);

//Steps - next, prev, status
$('.osp-btn-nxt button').on('click', function(e){
  e.preventDefault();
  var data = $(this).attr('data-next');
  var datat = $(this).attr('data-this');
  var vs = validation(datat);
  if( !vs ){
    $('#step1, #step2, #step3, #step4').hide();
    $('#'+data).show();
    activeStatus(data);
  }
});

$('.osp-btn-back button').on('click', function(e){
  e.preventDefault();
  var data = $(this).attr('data-prev');
  var datat = $(this).attr('data-this');
  var vs = validation(datat);
  if( !vs ){
    $('#step1, #step2, #step3, #step4').hide();
    $('#'+data).show();
    activeStatus(data);
  }
});

$('.ops-form-edit-btn a').on('click', function(e){
  e.preventDefault();
  var data = $(this).attr('href');
  $('#step1, #step2, #step3, #step4').hide();
  $('#'+data).show();
  activeStatus(data);
});

function activeStatus(data){
  $('.order-payment-step-bar li').removeClass('active');
  if( data == 'step1' ){
    $('li.step1li').addClass('active');
  }else if( data == 'step2' ){
    $('li.step2li').addClass('active');
  }else if( data == 'step3' ){
    $('li.step3li').addClass('active');
  }else if( data == 'step4' ){
    $('li.step4li').addClass('active');
  }
}

function validation(data){
  var step = $('#'+data);
  var err = false;
  if( step.find('.requiredt').length > 0 ){
    step.find('.requiredt').each(function(){
      var val = $(this).find('input').val();
      if( val == '' || val == null || val == undefined ){
        $(this).addClass('hasError');
        err = true;
      }else{
        $(this).removeClass('hasError');
        err = false;
      }
    });
  }
  if( step.find('.requiredta').length > 0 ){
    step.find('.requiredta').each(function(){
      var val = $(this).find('textarea').val();
      if( val == '' || val == null || val == undefined ){
        $(this).addClass('hasError');
        err = true;
      }else{
        $(this).removeClass('hasError');
        err = false;
      }
    });
  }
  return err;
}

//Steps - validation

})(jQuery);