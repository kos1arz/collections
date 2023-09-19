import "./owl.carousel.js";

$(document).ready(function () {
  (<any>$("#recipeCarousel")).carousel({
    interval: 10000,
  });

  $("#recipeCarousel.carousel .carousel-item").each(function () {
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

  (<any>$("#recipeCarousel2")).carousel({
    interval: 10000,
  });

  $("#recipeCarousel2.carousel .carousel-item").each(function () {
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

  if ($(".brands_slider").length) {
    var brandsSlider = $(".brands_slider");

    (brandsSlider as any).owlCarousel({
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

  if ($(".brands_slider").length) {
    var brandsSlider = $(".brands_slider");

    (brandsSlider as any).owlCarousel({
      loop: true,
      autoplay: true,
      autoplayTimeout: 1000,
      nav: false,
      dots: false,
      autoWidth: true,
      items: 8,
      margin: 45,
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

  $(".contact-tab-collapse").click(function () {
    if ($(this).hasClass("open")) {
      $(this).removeClass("open");
    } else {
      $(this).addClass("open");
    }
  });
});
