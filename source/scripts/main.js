//= require modernizr/modernizr
//= require jquery
//= require wow
//= require smoothstate

$(document).ready(function() {

  var wow = new WOW(
    {
      boxClass:     'wow',      // animated element css class (default is wow)
      animateClass: 'animated', // animation css class (default is animated)
      mobile:       false,       // trigger animations on mobile devices (default is true)
      callback:     function(box) {
        // the callback is fired every time an animation is started
        // the argument that is passed in is the DOM node being animated
      }
    }
  );
  wow.init();

});
