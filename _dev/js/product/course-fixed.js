export default function courseFixedHandle(){
    let fixedBar = document.querySelector('.course-fixed');
    if (!fixedBar) return;

    window.addEventListener("scroll", courseFixedScroll);
}

function courseFixedScroll(){
   let anchorDesktop = document.querySelector('#courseFixedAnchorDesktop'),
       anchorMobile = document.querySelector('#courseFixedAnchorMobile'),
       fixedBar = document.querySelector('.course-fixed'),
       windowWidth = window.innerWidth,
       anchorDesktopBounding = anchorDesktop.getBoundingClientRect(),
       anchorMobileBounding = anchorMobile.getBoundingClientRect();

    if (windowWidth < 991){
        if (anchorMobileBounding.bottom <= (window.innerHeight || document.documentElement.clientHeight)){
            fixedBar.classList.add("show");
        }
        else{
            fixedBar.classList.remove("show");
        }
        return;
    }
    if (anchorDesktopBounding.bottom <= (window.innerHeight || document.documentElement.clientHeight)){
        fixedBar.classList.add("show");
    }
    else{
        fixedBar.classList.remove("show");
    }
}