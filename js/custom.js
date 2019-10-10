/*------------------------------------------------------------------
Project:  ajialtabah
Version:	1.0
company:  piexlbrackt
Last change:	20/5/2019
Backend:	youssef magdi

-------------------------------------------------------------------*/

jQuery(function($) {


  // Scrolling Navigation

  $(window).scroll(function(){

    var topScroll = $(window).scrollTop();

    if(topScroll >= 50){

      $('.navbar').addClass('scroll');
      $('.navbar .navbar-nav .menu-item .nav-link').addClass('sticky-color');
    } else{
      $('.navbar').removeClass('scroll');
      $('.navbar .navbar-nav .menu-item .nav-link').removeClass('sticky-color');
    }

  });


  // Testimonials Carousel

$('.testimonials .owl-carousel').owlCarousel({
  loop:true,
  items:1,
  dots:false,
  nav:true,
  navText: ["<i class='fas fa-chevron-left'></i>","<i class='fas fa-chevron-right'></i>"],
  autoplay:true,
  autoplayTimeout:5000,
  responsiveClass:true
});

  $('.form-box #show').click(function(){
    $('.form-box .sign-up-form .pass-show').attr('type', 'text');
    $(this).css('display', 'none');
    $('.form-box #hide').css('display', 'block');
  });

  $('.form-box #hide').click(function(){
    $('.form-box .sign-up-form .pass-show').attr('type', 'password');
    $(this).css('display', 'none');
    $('.form-box #show').css('display', 'block');
  });


  $('#field_1_13 #input_1_13').change(function() {
    $('#field_1_12 #input_1_12').val($(this).val());
});

});
