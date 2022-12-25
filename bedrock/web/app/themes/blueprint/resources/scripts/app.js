import { domReady } from "@roots/sage/client";
// import videojs from "video.js";
// import Swiper from "swiper/bundle";

/**
 * app.main
 */
const main = async () => {
  // Fix vh on mobile
  ["DOMContentLoaded", "resize"].forEach((event) => {
    window.addEventListener(event, (_) => {
      const vh = window.innerHeight * 0.01;
      document.documentElement.style.setProperty("--vh", `${vh}px`);
    });
  });

  // Add tarfet _blank to all external links
  const links = document.querySelectorAll("a");
  links.forEach((link) => {
    if (link.hostname !== window.location.hostname) {
      link.target = "_blank";
    }
  });

  // Toggle burger
  const burger = document.querySelector(".burger");
  burger.addEventListener("click", (_) => {
    document.body.classList.toggle("menu-open");
  });
};

/**
 * Initialize
 *
 * @see https://webpack.js.org/api/hot-module-replacement
 */
domReady(main);
import.meta.webpackHot?.accept(main);
