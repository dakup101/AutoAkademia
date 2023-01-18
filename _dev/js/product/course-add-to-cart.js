import loadCourseTerms from "./course-terms";
import { cartItem, cartItemAddCourse } from "../cartItem";

export default async function courseAddToCart(){
    let addToCartBtns = document.querySelectorAll(".btn.add-to-cart");
    if (!addToCartBtns) return;

    console.log("--- Course Terms PopUp (@courseAddToCart) ---")
    const termsPopup = document.querySelector(".course-terms-popup");
    if (!termsPopup) return;
    const termsPopUpClose = termsPopup.querySelector(".course-terms-close");

    termsPopUpClose.addEventListener("click", (ev) => {
        ev.preventDefault();
        termsPopup.classList.remove("show");
    })

    console.log("--- Course Add to Cart Loaded ---")
    Array.from(addToCartBtns).forEach(addToCartBtn => {
        addToCartBtn.addEventListener("click", (ev) => {
            ev.preventDefault();
            let courseID = addToCartBtn.getAttribute("data-product");
            loadCourseTerms(1,1,courseID);
            cartItemAddCourse(courseID);
            termsPopup.classList.add("show");
        })
    })
}

