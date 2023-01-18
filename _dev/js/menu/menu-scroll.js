const menuScrolled = () => {
  const menu = document.querySelector(".header__nav");

  if (!menu) return;

  const observer = new IntersectionObserver(
    ([e]) => {
      e.target.classList.toggle(
        "header__nav--scrolled",
        e.intersectionRatio < 1
      );
    },
    {
      rootMargin: "-1px 0px 0px 0px",
      threshold: [1],
    }
  );

  observer.observe(menu);
};

export default menuScrolled;
