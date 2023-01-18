const toggleBurgerMenu = () => {
  const burger = document.querySelector(".header__burger");
  const menu = document.querySelector(".header__mobile-menu-container");
  const menuActiveClass = "header__mobile-menu-container--active";
  const closeButton = document.querySelector(".header__mobile-menu-close");
  if (!burger) return;

  burger.addEventListener("click", (e) => {
    e.preventDefault();
    {
      import(/* webpackChunkName: "print" */ "../modal/fadeIn").then(
        (module) => {
          const fadeElementIn = module.default;
          fadeElementIn(menu, menuActiveClass, true);
        }
      );
    }
  });
  closeButton.addEventListener("click", (e) => {
    if (menu.classList.contains(menuActiveClass)) {
      import(/* webpackChunkName: "print" */ "../modal/fadeOut").then(
        (module) => {
          const fadeElementOut = module.default;
          fadeElementOut(menu, menuActiveClass, true);
        }
      );
    }
  });

  window.addEventListener("resize", (e) => {
    if (window.innerWidth > 1200) {
      if (menu.classList.contains(menuActiveClass)) {
        import(/* webpackChunkName: "print" */ "../modal/fadeOut").then(
          (module) => {
            const fadeElementOut = module.default;
            fadeElementOut(menu, menuActiveClass, true);
          }
        );
      }
    }
  });
};

export default toggleBurgerMenu;
