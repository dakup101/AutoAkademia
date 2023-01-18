import { AjaxUrl } from "../helpers";

export async function loadAddons(product_ID){
        console.log("--- Load Addons ---")
        const data = new FormData();
        data.append('action', 'get_product_addons');
        data.append('product_id', product_ID);
        let ajax = await fetch(AjaxUrl, {
            method: "POST",
            body: data,
            credentials: "same-origin"
        })
        .then(response => response.text())
        .then(text => {
            console.log("--- Load Addons End ---");
            return text;
        })
        .catch(err => {
            console.log(err);
            console.log("--- Load Addons End ---");
            return null;
        })
        return ajax;
}