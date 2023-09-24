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

import "bootstrap";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap-select/dist/js/bootstrap-select.min.js";
import "bootstrap-select/dist/css/bootstrap-select.min.css";

import "select2/dist/css/select2.min.css";
import "select2";

import "./js/carousel.ts";
import "./js/datePicker.ts";

// @ts-ignore
global.$ = global.jQuery = $;
