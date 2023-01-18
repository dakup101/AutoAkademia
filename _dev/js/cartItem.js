import { AjaxUrl } from "./helpers";

export let cartItem = {
    course: null,
    term: null, 
    addons: [],
}

export function cartItemAddCourse(courseID){
    cartItem.course = courseID;
    cartItemValidate();
}

export async function cartItemAddTerm(courseTerm){
    cartItem.term = courseTerm;
    await cartItemValidate();
}

export function cartItemNullify(){
    cartItem.course = null;
    cartItem.term = null;
    cartItem.addons = [];
}

async function cartItemValidate(){
    if (!cartItem.course || !cartItem.term) return;
    console.log(cartItem);
    await cartItemsAddToCart(cartItem.course, cartItem.term)
    .then((response) => {
        console.log(response);
    });
}

export function cartItemsAddToCart(courseID, termID){
    return new Promise (async (resolve, reject) => {
        console.log("--- Cart Item - Add To Cart ---")
        const data = new FormData();
        data.append('action', 'item_add_to_cart');
        data.append('product_id', courseID);
        if (termID) data.append('term_id', termID)
        let ajax = await fetch(AjaxUrl, {
            method: "POST",
            body: data,
            credentials: "same-origin"
        })
        .then(response => response.text())
        .then(text => {
            console.log("--- Cart Item - Add To Cart End ---");
            return text;
        })
        .catch(err => {
            console.log("--- Cart Item - Add To Cart End (ERR) ---");
            console.log(err);
            return null;
        })
        if (ajax) resolve(ajax);
        else reject(null);
    })
}

export function cartItemsRemoveFromCart(cart_key){
    return new Promise (async (resolve, reject) => {
        console.log("--- Cart Item - Remove From Cart ---")
        const data = new FormData();
        data.append('action', 'item_remove_from_cart');
        data.append('cart_key', cart_key);
        let ajax = await fetch(AjaxUrl, {
            method: "POST",
            body: data,
            credentials: "same-origin"
        })
        .then(response => response.text())
        .then(text => {
            console.log("--- Cart Item - Remove From Cart End ---");
            return true;
        })
        .catch(err => {
            console.log("--- Cart Item - Remove From Cart (ERR) ---");
            console.log(err);
            return false;
        })
        if (ajax) resolve(ajax);
        else reject(null);
    })
}