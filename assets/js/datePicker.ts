import flatpickr from "flatpickr";
import monthSelectPlugin from "flatpickr/dist/plugins/monthSelect";
import "flatpickr/dist/flatpickr.min.css";
import "flatpickr/dist/plugins/monthSelect/style.css";
import { Polish } from "flatpickr/dist/l10n/pl.js";

document.addEventListener("DOMContentLoaded", function () {
  flatpickr(".date-picker", {
    locale: Polish,
    enableTime: true,
    dateFormat: "Y-m-d H:i",
  });

  flatpickr(".month-picker", {
    locale: Polish,
    dateFormat: "Y-m",
    mode: "single",
    plugins: [
      // @ts-ignore
      new monthSelectPlugin({
        shorthand: true,
        dateFormat: "m.y",
        altFormat: "F Y",
      }),
    ],
  });

  flatpickr(".year-picker", {
    locale: Polish,
    dateFormat: "Y",
  });
});
