// Avoid `console` errors in browsers that lack a console.
(function() {
  var method;
  var noop = function () {};
  var methods = [
    'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
    'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
    'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
    'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
  ];
  var length = methods.length;
  var console = (window.console = window.console || {});

  while (length--) {
    method = methods[length];

    // Only stub undefined methods.
    if (!console[method]) {
      console[method] = noop;
    }
  }
}());

// Place any jQuery/helper plugins in here.


// Cursor

// var cursor = $(".cursor"),
//     follower = $(".cursor-follower");

// var posX = 0,
//     posY = 0;

// var mouseX = 0,
//     mouseY = 0;

// TweenMax.to({}, 0.016, {
//   repeat: -1,
//   onRepeat: function() {
//     posX += (mouseX - posX) / 9;
//     posY += (mouseY - posY) / 9;
    
//     TweenMax.set(follower, {
//         css: {    
//         left: posX - 12,
//         top: posY - 12
//         }
//     });
    
//     TweenMax.set(cursor, {
//         css: {    
//         left: mouseX,
//         top: mouseY
//         }
//     });
//   }
// });

// $(document).on("mousemove", function(e) {
//     mouseX = e.clientX;
//     mouseY = e.clientY;
// });

// $("button, input, select, option").on("mouseenter", function() {
//     cursor.addClass("active");
//     follower.addClass("active");
// });
// $("button, input, select, option").on("mouseleave", function() {
//     cursor.removeClass("active");
//     follower.removeClass("active");
// });