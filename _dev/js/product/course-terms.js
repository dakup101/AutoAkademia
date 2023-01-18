import { AjaxUrl } from "../helpers";
import { cartItemAddTerm, cartItemsAddToCart, cartItemsRemoveFromCart } from "../cartItem";
import { loadAddons } from "./course-addons";

const termsWrap = document.querySelector(".course-terms-content");
const addonsWrap = document.querySelector(".course-addons-content")
const termsLoader = document.querySelector(".course-terms-loading");
const cartStatus = document.querySelector(".course-terms-header-status");

export default async function loadCourseTerms(page, number, courseID){
    if (!termsWrap) return;
    console.log("--- Load Course Terms Init ---")
    termsLoader.classList.remove("loaded");
    const data = new FormData();
    data.append('action', 'terms_html');
    data.append('page', page);
    data.append('number', number);
    data.append('course', courseID);
    await fetch(AjaxUrl, {
        method: "POST",
        body: data,
        credentials: "same-origin"
    })
    .then(response => response.text())
    .then(text => {
        termsWrap.innerHTML = text;
        hadnlePagination(courseID);
        handleBtns(courseID);
        termsLoader.classList.add("loaded");
        console.log("--- Load Course Terms End ---");
    })

}

function hadnlePagination(courseID){
    const paginationButtons = document.querySelectorAll(".terms-page");
    if (!paginationButtons) return;

    Array.from(paginationButtons).forEach(btn => {
        let btnPage = parseInt(btn.getAttribute("data-page"));
        btn.addEventListener("click", (ev) => {
            ev.preventDefault();
            if (!isNaN(btnPage)) loadCourseTerms(btnPage, 1, courseID);
        })
    })
}

async function handleBtns(courseID){
    let btns = document.querySelectorAll(".terms-btn-reserve");
    Array.from(btns).forEach(btn => {
        btn.addEventListener("click", async (ev) => {
            let termID = ev.currentTarget.getAttribute("data-term");
            termsLoader.classList.remove("loaded");
            await cartItemAddTerm(termID);
            cartStatus.classList.remove("hidden");
            termsWrap.classList.add("hidden");
            addonsWrap.classList.remove("hidden");
            let addons =  await loadAddons(courseID);
            addonsWrap.innerHTML = addons;
            termsLoader.classList.add("loaded");
            handleAddons();
        })
    })
}

export async function handleAddons(){
    let addons = document.querySelectorAll(".course-addons-item");
    if (!addons) return;
    Array.from(addons).forEach((addon) => {
        let chkbox = addon.querySelector(".addon-chkbox");
        chkbox.addEventListener("change", async () => {
            if (chkbox.checked){
                addon.classList.add("loading");
                await cartItemsAddToCart(chkbox.value, null)
                .then((response) => {
                    chkbox.setAttribute("data-cart-key", response);
                });
                addon.classList.remove("loading");
                addon.classList.add("added-to-cart")
                setTimeout(()=>{
                    addon.classList.remove("added-to-cart");
                    setTimeout(()=>{
                        addon.classList.add("cart-labeled");
                    }, 200)
                }, 2000)
            }
            else{
                addon.classList.add("loading");
                await cartItemsRemoveFromCart(chkbox.getAttribute("data-cart-key"))
                .then((response) => {
                    chkbox.removeAttribute("data-cart-key");
                });
                addon.classList.remove("loading");
                addon.classList.add("removed-from-cart")
                setTimeout(()=>{
                    addon.classList.remove("removed-from-cart");
                    setTimeout(()=>{
                        addon.classList.remove("cart-labeled");
                    }, 250)
                }, 2000)
            }
        })
    })
}