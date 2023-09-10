// import 'owl.carousel';

// export class Carousel {
//   private owlCarousel: JQuery<HTMLElement> | null = null;

//   constructor() {
//       document.addEventListener("DOMContentLoaded", () => this.onDocumentReady());
//   }

//   private onDocumentReady() {
//       const brandsSlider = document.querySelector('.brands_slider');

//       if (brandsSlider) {
//           this.owlCarousel = $(brandsSlider).owlCarousel({
//               loop: true,
//               autoplay: true,
//               autoplayTimeout: 1000,
//               nav: false,
//               dots: false,
//               autoWidth: true,
//               items: 8,
//               margin: 42,
//           });

//           const prev = document.querySelector('.brands_prev');
//           if (prev) {
//             prev.addEventListener('click', () => {
//                 if (this.owlCarousel) this.owlCarousel.trigger('prev.owl.carousel');
//             });
//           }

//           const next = document.querySelector('.brands_next');
//           if (next) {
//             next.addEventListener('click', () => {
//                 if (this.owlCarousel) this.owlCarousel.trigger('next.owl.carousel');
//             });
//           }
//       }
//   }
// }
