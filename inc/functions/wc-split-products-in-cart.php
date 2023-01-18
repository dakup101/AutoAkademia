<?php
// 1. Split product quantities into multiple cart items
// Note: this is not retroactive - empty cart before testing
function bbloomer_split_product_individual_cart_items( $cart_item_data, $product_id ){
    $unique_cart_item_key = uniqid();
    $cart_item_data['unique_key'] = $unique_cart_item_key;
    return $cart_item_data;
}
add_filter( 'woocommerce_add_cart_item_data', 'bbloomer_split_product_individual_cart_items', 10, 2 );
// -------------------
// 2. Force add to cart quantity to 1 and disable +- quantity input
// Note: product can still be added multiple times to cart
// add_filter( 'woocommerce_is_sold_individually', '__return_true' );