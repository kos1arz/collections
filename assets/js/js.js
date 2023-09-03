document.addEventListener("DOMContentLoaded", function() {

  const brandsSlider = document.querySelector('.brands_slider');

  if(brandsSlider) {
      const owlCarousel = new OwlCarousel(brandsSlider, {
          loop: true,
          autoplay: true,
          autoplayTimeout: 1000,
          nav: false,
          dots: false,
          autoWidth: true,
          items: 8,
          margin: 42,
      });

      const prev = document.querySelector('.brands_prev');
      if(prev) {
          prev.addEventListener('click', function() {
              owlCarousel.trigger('prev.owl.carousel');
          });
      }

      const next = document.querySelector('.brands_next');
      if(next) {
          next.addEventListener('click', function() {
              owlCarousel.trigger('next.owl.carousel');
          });
      }
  }

});
