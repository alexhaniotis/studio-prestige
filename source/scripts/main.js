//= require modernizr/modernizr
//= require jquery
//= require wow
//= require smoothstate

$(document).ready(function() {

  $(".preloader").delay(2000).fadeOut("slow");

  var wow = new WOW(
    {
      boxClass: 'wow',
      animateClass: 'animated',
      mobile: false,
    }
  );
  wow.init();

});
