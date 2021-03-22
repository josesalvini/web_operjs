//////////////////////////////////////////////////////  //
//    EVENTS ON DOCUMENT READY                          //
//////////////////////////////////////////////////////  //

$(document).ready(function () {
    "use strict";

    //// PRELOADER TRIGGER
    $(window).on('load', function () {
        $(".loading").animate({
            "left": "-100%"
        }, 700, function () {
            $(this).remove();
        });
    });
    
    // SHOW COLOR OPTION DIV WHEN CLICK ON THE GEAR
    $(".gear-check").on('click',(function () {
        $(".color-option").fadeToggle();
    }));
    // CHANGE THEME COLOR ON CLICK
    var colorLi = $(".color-option li");
    colorLi.on('click',function () {
        $("link[href*='color']").attr("href", $(this).attr("data-value"));
    });

    //// NAVBAR COLLAPSE
    var rNav = $(".navigation"),
    hInfo = $(".home .info"),
    home = $(".home"),
    navBtn = $(".humberger-menu"),
    navlink = $(".menu a"),
    navBtnActive = "humberger-menu-active",
    nav = $(".slide-nav"),
    navActive = "slide-nav-active",
    rNavSpan = $(".right-nav ul li i"),
    up = $(".up i"),
    body = $("html, body");
    rNav.css("top", (home.height() - rNav.height()) / 2);
    hInfo.css("top", (home.height() - hInfo.height()) / 2);
    navBtn.on("click", function() {
        $(this).toggleClass(navBtnActive);
        nav.toggleClass(navActive);
    });
    navlink.on("click", function() {
        navBtn.toggleClass(navBtnActive);
        nav.toggleClass(navActive)
    });
    //// SMOTH SCROLL
    $.scrollIt({
        topOffset: -0
    });
    // Typed JS TRIGGER
    $(".about .about-ct h3 span").typed({
        strings: ["Web designer", "UX Devloper"],
        loop: true,
        startDelay: 1e3,
        backDelay: 3e3
    });
    //// ISOTOPE TRIGGER
    var $grid = $('.work-content').isotope({
      itemSelector: '.work-item',
      stagger: 30
    });
    $(window).on('load', function(){ $grid.isotope('layout') });
    $('.filter-work').on( 'click', '.button', function() {
      var filterValue = $(this).attr('data-filter');
      $grid.isotope({ filter: filterValue });
    });
    // change is-checked class on buttons
    $('.button-group').each( function( i, buttonGroup ) {
      var $buttonGroup = $( buttonGroup );
      $buttonGroup.on( 'click', 'a', function() {
        $buttonGroup.find('.is-checked').removeClass('is-checked');
        $( this ).addClass('is-checked');
      });
    });

    //// MASONRY
    $('.work-content').isotope({
      itemSelector: '.work-caption img',
      masonry: {
        columnWidth: 0
      }
    });


    // OWL CAROUSEL TRIGGER
    $('.owl-carousel').owlCarousel({
        items: 1,
        margin: 0,
        dots: true
     });


    //// MAGNIFIC POPUP TRIGGER
    $('.modal-image').magnificPopup({
      type: 'image'
    });


    //// PARSLEY TRIGGER
    $('.cont-fo').parsley();

});