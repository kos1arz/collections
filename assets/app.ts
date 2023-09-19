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
import "bootstrap-select/dist/js/bootstrap-select.min.js";
import "bootstrap-select/dist/css/bootstrap-select.min.css";
import "./js/carousel.ts";

// const $ = require("jquery");

// $(document).ready(() => {
//   $(".selectpicker").selectpicker();

//   $('.selectpicker[data-live-search="true"]').on(
//     "input",
//     ".bs-searchbox input",
//     function (this: JQuery<HTMLInputElement>) {
//       const select = $(this)
//         .closest(".bootstrap-select")
//         .prev("select.selectpicker");
//       const options = select.find("option");
//       const searchText = $(this).val().toLowerCase();
//       let matchCount = 0;
//       const limit = parseInt(select.data("limit"), 10) || 5;

//       options.each(function () {
//         // @ts-ignore
//         const optionText = $(this).text().toLowerCase();

//         if (optionText.indexOf(searchText) !== -1 && matchCount < limit) {
//           // @ts-ignore
//           $(this).show();
//           matchCount++;
//         } else {
//           // @ts-ignore
//           $(this).hide();
//         }
//       });

//       select.selectpicker("refresh");
//     }
//   );
// });
