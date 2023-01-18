import { AjaxUrl } from "../helpers";
import { handleAddons } from "../product/course-terms";
import { cartItemAddTerm, cartItemAddCourse } from "../cartItem";
import { loadAddons } from "../product/course-addons";



export default function termsAddToCartHandle(){
    console.log("--- Terms Add To Cart Start");
    const module = document.querySelector(".terms-module");
    if (!module) return;

    const popUp = document.querySelector(".course-terms-popup");
    const addonsWrap = document.querySelector(".course-addons-content");
    const termsLoader = document.querySelector(".course-terms-loading");
    const cartStatus = document.querySelector(".course-terms-header-status");

    let productName = popUp.querySelector(".product-name");
    let productImg = popUp.querySelector(".product-img");
    let productPrice = popUp.querySelector(".product-price");

    let btns = module.querySelectorAll(".terms-btn-reserve");
    if (!btns) return;

    Array.from(btns).forEach(btn => {
        btn.addEventListener("click", (ev) => {
            ev.preventDefault();
            let course = btn.getAttribute("data-course");
            let term = btn.getAttribute("data-term");
            addToCartFromTerms(course, term);
        })
    })
    console.log("--- Terms Add To Cart End");

    async function addToCartFromTerms(courseID, termID){
        popUp.classList.add("show");
    
        console.log("--- Load Product Data Start ---")
        termsLoader.classList.remove("loaded");
        const data = new FormData();
        data.append('action', 'get_product_data');
        data.append('course_id', courseID);
        let courseData = await fetch(AjaxUrl, {
                method: "POST",
                body: data,
                credentials: "same-origin"
            })
            .then(response => response.json())
            .then(json => {
                console.log("--- Load Product Data End ---");
                return json;
            })
        console.log(courseData);
        if (!courseData.err) {
            productImg.src = courseData.img;
            productName.innerHTML = courseData.name;
            productPrice.innerHTML = courseData.price + " zł";
        }
        cartItemAddCourse(courseID);
        await cartItemAddTerm(termID);
        cartStatus.classList.remove("hidden");
        addonsWrap.classList.remove("hidden");
        let addons =  await loadAddons(courseID);
        addonsWrap.innerHTML = addons;
        handleAddons();
        termsLoader.classList.add("loaded");
    }
}

