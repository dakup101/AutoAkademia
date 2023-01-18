import handleQuantityInput from "./quantity-input";

export default function handleWooCommerceEvents(){
    document.addEventListener("updated_wc_div", () => {
       handleQuantityInput();
    });
}
