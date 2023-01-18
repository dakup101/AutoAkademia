import { AjaxUrl } from "../helpers";
import termsAddToCartHandle from "./terms-add-to-cart";

export default function loadTermsModule(page, number){
    const termsWrap = document.querySelector(".terms-module");
    if (!termsWrap) return;
    const termsLoader = document.querySelector(".terms-loading");
    console.log("--- Load Terms Init ---")

    termsLoader.classList.remove("loaded");
    const data = new FormData();
    data.append('action', 'terms_html');
    data.append('page', page);
    data.append('number', number);

    fetch(AjaxUrl, {
        method: "POST",
        body: data,
        credentials: "same-origin"
    })
    .then(response => response.text())
    .then(text => {
        termsWrap.innerHTML = text;
        hadnlePagination();
        termsLoader.classList.add("loaded");
        console.log("--- Load Terms End ---");
        const module = document.querySelector(".terms-module");
        if (module) {
            termsAddToCartHandle();
        }
    })

}

function hadnlePagination(){
    const paginationButtons = document.querySelectorAll(".terms-page");
    if (!paginationButtons) return;

    Array.from(paginationButtons).forEach(btn => {
        let btnPage = parseInt(btn.getAttribute("data-page"));
        btn.addEventListener("click", (ev) => {
            ev.preventDefault();
            if (!isNaN(btnPage)) loadTermsModule(btnPage, 1);
        })
    })
}