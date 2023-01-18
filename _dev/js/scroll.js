export default () => {
  const scrollContainer = document.querySelector(".scroll");
  const scroll = document.querySelector(".scroll__progress");
  const scrollBar = document.querySelector(".scroll__progress-bar");
  const scrollBtn = document.querySelector(".scroll__text");
  let lastY;
  let initTopPos;

  if (!scrollContainer) return;

  scrollBtn.addEventListener("click", (e) => {
    e.preventDefault();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  scrollBarPos();

  window.addEventListener('scroll', scrollBarPos);

  function scrollBarPos() {
    if (window.scrollY < 200) {
      scrollContainer.style.display = "none";
    } else {
      scrollContainer.style.display = "flex";
    }
    const maxScroll =
      document.body.scrollHeight - document.documentElement.clientHeight;
    const currentScroll = window.scrollY;
    const maxProgress = scroll.offsetWidth - scrollBar.offsetWidth;

    const ratio = currentScroll / maxScroll;

    scrollBar.style.left = maxProgress * ratio + "px";
  }

  scrollBar.addEventListener("mousedown", function (e) {
    // Cursor position on screen
    lastY = e.clientY;
    // Initial scrollBar position in container
    initTopPos = parseFloat(scrollBar.style.left);
    addEventListener("mousemove", mouseDrag);
    e.preventDefault();
  });

  // Check if scrollBar is held
  function btnPressed(e) {
    if (e.buttons == 0) {
      return false;
    }
    return true;
  }

  function mouseDrag(e) {
    e.preventDefault();
    calcScroll(e);
    if (!btnPressed(e)) {
      removeEventListener("mousemove", mouseDrag);
    }
  }

  // Calculate page scroll by dragging scroll bar
  function calcScroll(e) {
    let posY = e.clientY;
    const change = posY - lastY;
    const maxProgress = scroll.offsetWidth - scrollBar.offsetWidth;
    scrollBar.style.left = initTopPos + change + "px";
    if (parseFloat(scrollBar.style.left) > maxProgress)
      scrollBar.style.left = maxProgress + "px";
    if (parseFloat(scrollBar.style.left) < 0) scrollBar.style.left = 0;

    const maxScroll =
      document.body.scrollHeight - document.documentElement.clientHeight;
    const currentScroll = window.scrollY;

    const ratio = parseFloat(scrollBar.style.left) / maxProgress;
    window.scrollTo(0, maxScroll * ratio);
  }
};
