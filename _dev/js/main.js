import { bannerSlider } from "./sliders";
import map_init from "./map/map_init";
import opinionSlider from "./swiper-sliders";
import menuScrolled from "./menu/menu-scroll";
import toggleBurgerMenu from "./menu/burger";
import locations from "./locations";
import scroll from "./scroll";
import loadTermsModule from "./terns-module/load-terms";
import courseFixedHandle from "./product/course-fixed";
import courseAddToCart from "./product/course-add-to-cart";
import handleQuantityInput from "./quantity-input";
import handleWooCommerceEvents from "./wc-events";
import { handleAddons } from "./product/course-terms";

document.addEventListener("DOMContentLoaded", function (e) {
  map_init();
  bannerSlider();
  opinionSlider();
  menuScrolled();
  toggleBurgerMenu();
  locations();
  scroll();
  // Daniel
  loadTermsModule(1,1);
  courseFixedHandle();
  courseAddToCart();
  handleQuantityInput();
  handleWooCommerceEvents();
  handleAddons();
});
