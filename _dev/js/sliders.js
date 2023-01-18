const bannerSlider = () => {
  console.log("--- BannerSlider loaded ---")
  $(".banner-slider")
    .slick({
      slidesToShow: 1,
      autoplay: false,
      dots: true,
      appendDots: ".banner-slider__controls",
      arrows: false,
    })
    .on("setPosition", function (event, slick) {
      slick.$slides.css("height", slick.$slideTrack.height() + "px");
    });

  addZeroTODots();

  function addZeroTODots() {
    const dots = document.querySelectorAll(".banner-slider__controls button");
    if (!dots) return;

    dots.forEach((dot) => {
      dot.innerText = dot.innerText.padStart(2, "0");
    });
  }
};

export { bannerSlider };
