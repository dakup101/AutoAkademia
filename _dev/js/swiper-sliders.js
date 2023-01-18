// import Swiper JS
import Swiper, { Navigation } from "swiper";
// import Swiper styles
import "swiper/css";
import "swiper/css/pagination";

const opinionSlider = () => {
  const swiper = new Swiper(".mySwiper", {
    modules: [Navigation],
    navigation: {
      nextEl: ".swiper-button--next",
      prevEl: ".swiper-button--prev",
    },
    slidesPerView: 1,
    loop: true,
    centeredSlides: true,
    breakpoints: {
      992: {
        slidesPerView: 3,
        centeredSlides: false
      }
    }
  });
};

export default opinionSlider;
