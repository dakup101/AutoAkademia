import toggleActiveClass from "./toggleActiveClass";

function fadeElementIn(element, activeClass, stopScrolling = false) {
  toggleActiveClass(element, activeClass);

  if (stopScrolling) {
    document.body.style.height = "100vh";
    document.body.style.overflow = "hidden";
  }

  element.animate(
    [
      {
        opacity: 0,
        transform: "translateY(100px)",
      },
      {
        opacity: 1,
        transform: "translateY(0)",
      },
    ],
    {
      duration: 300,
      fill: "forwards",
    }
  );
}

export default fadeElementIn;
