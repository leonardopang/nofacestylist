'use strict';

import { tns } from "../../../node_modules/tiny-slider/src/tiny-slider";

export default () => {
  const valid = document.querySelector('.hero-header-siema');
  if (valid) {
    const heroHeader = tns({
      container: '.hero-header-siema',
      items: 1,
      autoplay: false,
      controls: false,
      nav: true,
      center: true,
      autoWidth: true,
      autoHeight: true,
      mouseDrag: true,
      navPosition: "bottom",
    });

    /* Control */
    const arrowLeft = document.querySelector('.arrows-left')
    arrowLeft.addEventListener('click', () => heroHeader.goTo('prev'))
    const arrowRight = document.querySelector('.arrows-right')
    arrowRight.addEventListener('click', () => heroHeader.goTo('next'))
  }
}