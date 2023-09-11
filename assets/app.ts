/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import "./styles/main.scss";
import "./styles/font.css";
import "./styles/app.css";
import "./styles/modules/tabs.scss";

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "owl.carousel";
import "owl.carousel/dist/assets/owl.carousel.css";

// const $ = require('jquery');
// require('bootstrap');
// $("#recipeCarousel").owlCarousel({
//   interval: 10000,
// });
$(document).ready(function () {
  // $("#recipeCarousel.carousel .carousel-item").owlCarousel({
  //     loop: true,
  //     autoplay: true,
  //     autoplayTimeout: 10000,
  // });

  // $("#recipeCarousel").owlCarousel({
  //   interval: 10000,
  // });

  $("#recipeCarousel.carousel .carousel-item").each(function (
    this: HTMLElement,
    index: number,
    element: HTMLElement
  ) {
    var minPerSlide = 3;
    var next = $(this).next();
    if (!next.length) {
      next = $(this).siblings(":first");
    }
    next.children(":first-child").clone().appendTo($(this));

    for (var i = 0; i < minPerSlide; i++) {
      next = next.next();
      if (!next.length) {
        next = $(this).siblings(":first");
      }

      next.children(":first-child").clone().appendTo($(this));
    }
  });
});
/////////////////////////////////////////////////////////////////////////////////////////////////
$(document).ready(function () {
  if ($(".brands_slider").length) {
    var brandsSlider = $(".brands_slider");

    brandsSlider.owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 1000,
      nav: false,
      dots: false,
      autoWidth: true,
      items: 8,
      margin: 42,
    });

    if ($(".brands_prev").length) {
      var prev = $(".brands_prev");
      prev.on("click", function () {
        brandsSlider.trigger("prev.owl.carousel");
      });
    }

    if ($(".brands_next").length) {
      var next = $(".brands_next");
      next.on("click", function () {
        brandsSlider.trigger("next.owl.carousel");
      });
    }
  }
});
/////////////////////////////////////////////////////////////////////////////////////////////////

// // $("#recipeCarousel2").carousel({
// //   interval: 10000,
// // });

// $("#recipeCarousel2.carousel .carousel-item").each(function () {
//   var minPerSlide = 3;
//   var next = $(this).next();
//   if (!next.length) {
//     next = $(this).siblings(":first");
//   }
//   next.children(":first-child").clone().appendTo($(this));

//   for (var i = 0; i < minPerSlide; i++) {
//     next = next.next();
//     if (!next.length) {
//       next = $(this).siblings(":first");
//     }

//     next.children(":first-child").clone().appendTo($(this));
//   }
// });
