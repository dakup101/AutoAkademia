import toggleActiveClass from "./toggleActiveClass";

function fadeElementOut(element, activeClass, stopScrolling = false) {
  if (stopScrolling) {
    document.body.style.height = "unset";
    document.body.style.overflow = "unset";
  }
  element.animate(
    [
      { opacity: 1, transform: "translateY(0)" },
      { opacity: 0, transform: "translateY(100px)" },
    ],
    {
      duration: 300,
      fill: "forwards",
    }
  );
  setTimeout(function () {
    toggleActiveClass(element, activeClass);
  }, 300);
}

export default fadeElementOut;
