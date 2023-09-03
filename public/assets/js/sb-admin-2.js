(function($) {
  "use strict"; // Start of use strict

  // Toggle the side navigation
  $("#sidebarToggle, #sidebarToggleTop").on('click', function(e) {
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Close any open menu accordions when window is resized below 768px
  $(window).resize(function() {
    if ($(window).width() < 768) {
      $('.sidebar .collapse').collapse('hide');
    };
    
    // Toggle the side navigation when window is resized below 480px
    if ($(window).width() < 480 && !$(".sidebar").hasClass("toggled")) {
      $("body").addClass("sidebar-toggled");
      $(".sidebar").addClass("toggled");
      $('.sidebar .collapse').collapse('hide');
    };
  });

  // Prevent the content wrapper from scrolling when the fixed side navigation hovered over
  $('body.fixed-nav .sidebar').on('mousewheel DOMMouseScroll wheel', function(e) {
    if ($(window).width() > 768) {
      var e0 = e.originalEvent,
        delta = e0.wheelDelta || -e0.detail;
      this.scrollTop += (delta < 0 ? 1 : -1) * 30;
      e.preventDefault();
    }
  });

  // Scroll to top button appear
  $(document).on('scroll', function() {
    var scrollDistance = $(this).scrollTop();
    if (scrollDistance > 100) {
      $('.scroll-to-top').fadeIn();
    } else {
      $('.scroll-to-top').fadeOut();
    }
  });

  // Smooth scrolling using jQuery easing
  $(document).on('click', 'a.scroll-to-top', function(e) {
    var $anchor = $(this);
    $('html, body').stop().animate({
      scrollTop: ($($anchor.attr('href')).offset().top)
    }, 1000, 'easeInOutExpo');
    e.preventDefault();
  });

})(jQuery); // End of use strict

function previewImg(){

  const cover = document.querySelector('#cover');
  const imgPreview = document.querySelector('.img-preview');

  const fileCover = new FileReader();
  fileCover.readAsDataURL(cover.files[0]);

  fileCover.onload = function(e){
      imgPreview.src= e.target.result;
  }
}
function previewBanner(){

  const image = document.querySelector('#image');
  const preview = document.querySelector('.banner-preview');

  const filebanner = new FileReader();
  filebanner.readAsDataURL(image.files[0]);

  filebanner.onload = function(e){
      preview.src= e.target.result;
  }
}
function previewkk(){

  const image = document.querySelector('#file_kk');
  const preview = document.querySelector('.label_kk');

  const file = new FileReader();
  file.readAsDataURL(image.files[0]);

  file.onload = function(e){
      // preview.style.backgroundImage = e.target.result;
      preview.style.backgroundImage = "url('" + e.target.result + "')";
  }
}
function previewakte(){

  const image = document.querySelector('#file_akte');
  const preview = document.querySelector('.label_akte');

  const file = new FileReader();
  file.readAsDataURL(image.files[0]);

  file.onload = function(e){
      // preview.style.backgroundImage = e.target.result;
      preview.style.backgroundImage = "url('" + e.target.result + "')";
  }
}
function previewfoto(){

  const image = document.querySelector('#file_foto');
  const preview = document.querySelector('.label_foto');

  const file = new FileReader();
  file.readAsDataURL(image.files[0]);

  file.onload = function(e){
      // preview.style.backgroundImage = e.target.result;
      preview.style.backgroundImage = "url('" + e.target.result + "')";
  }
}
function previewnisn(){

  const image = document.querySelector('#file_nisn');
  const preview = document.querySelector('.label_nisn');

  const file = new FileReader();
  file.readAsDataURL(image.files[0]);

  file.onload = function(e){
      // preview.style.backgroundImage = e.target.result;
      preview.style.backgroundImage = "url('" + e.target.result + "')";
  }
}
function previewserti1(){

  const image = document.querySelector('#file_serti1');
  const preview = document.querySelector('.label_serti1');

  const file = new FileReader();
  file.readAsDataURL(image.files[0]);

  file.onload = function(e){
      // preview.style.backgroundImage = e.target.result;
      preview.style.backgroundImage = "url('" + e.target.result + "')";
  }
}
function previewserti2(){

  const image = document.querySelector('#file_serti2');
  const preview = document.querySelector('.label_serti2');

  const file = new FileReader();
  file.readAsDataURL(image.files[0]);

  file.onload = function(e){
      // preview.style.backgroundImage = e.target.result;
      preview.style.backgroundImage = "url('" + e.target.result + "')";
  }
}


