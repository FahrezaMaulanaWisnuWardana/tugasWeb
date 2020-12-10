$(document).ready(function() {
  $(window).resize(function(){
    ($(window).width() > 768)?$("#sidebar").removeClass("active"):'';
  })
  $(window).scroll(function(){
    var scroll = $(window).scrollTop()
    if (scroll > 200) {
      $("#navbar").addClass('position-fixed')
    }else{
      $("#navbar").removeClass('position-fixed')
    }
  })
  $("#sidebarCollapse").on("click", function() {
    $("#sidebar").addClass("active");
  });

  $("#sidebarCollapseX").on("click", function() {
    $("#sidebar").removeClass("active");
  });

  $("#sidebarCollapse").on("click", function() {
    if ($("#sidebar").hasClass("active")) {
      $(".overlay").addClass("visible");
    }
  });

  $("#sidebarCollapseX").on("click", function() {
    $(".overlay").removeClass("visible");
  });

});