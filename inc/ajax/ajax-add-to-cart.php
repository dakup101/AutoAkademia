<?php
add_action('init', 'item_add_to_cart');

function item_add_to_cart(){
    add_action( 'wp_ajax_nopriv_item_add_to_cart', 'item_add_to_cart_handle' );
    add_action( 'wp_ajax_item_add_to_cart', 'item_add_to_cart_handle' );
}

function item_add_to_cart_handle(){
    global $woocommerce;
    $product_id = $_POST['product_id'];
    $term_id = $_POST['term_id'];
    $cartItem = $woocommerce->cart->add_to_cart( $product_id );
    if (!empty($term_id) && isset($term_id)){
        $course_term = strtotime(get_field("term_date", $term_id));
        $course_date =  date("d.m.Y", $course_term);
        $course_time = date("H:i", $course_term);
        woo_set_cartItem_data_by_key($cartItem, "course_term", $term_id);
        woo_set_cartItem_data_by_key($cartItem, "course_term_date", $course_date);
        woo_set_cartItem_data_by_key($cartItem, "course_term_time", $course_time);
    }
    if ($cartItem){
        echo $cartItem;
        wp_die();
    }
    echo "Didn't work";
    wp_die();
}

function woo_set_cartItem_data_by_key( $cart_item_key, $key, $value ) {
	$data = (array)WC()->session->get( '_custom_woo_product_data' );
	if ( empty( $data[$cart_item_key] ) ) {
		$data[$cart_item_key] = array();
	}
	$data[$cart_item_key][$key] = $value;
	WC()->session->set( '_custom_woo_product_data', $data );
}

function woo_get_cartItem_data( $cart_item_key, $key = null, $default = null ) {
	$data = (array)WC()->session->get( '_custom_woo_product_data' );
	if ( empty( $data[$cart_item_key] ) ) {
		$data[$cart_item_key] = array();
	}
	// If no key specified, return an array of all results.
	if ( $key == null ) {
		return $data[$cart_item_key] ? $data[$cart_item_key] : $default;
	}else{
		return empty( $data[$cart_item_key][$key] ) ? $default : $data[$cart_item_key][$key];
	}
}


add_action('init', 'item_remove_from_cart');

function item_remove_from_cart(){
    add_action( 'wp_ajax_nopriv_item_remove_from_cart', 'item_remove_from_cart_handle' );
    add_action( 'wp_ajax_item_remove_from_cart', 'item_remove_from_cart_handle' );
}

function item_remove_from_cart_handle(){
    global $woocommerce;
    $key = $_POST['cart_key'];
    $cartItem = $woocommerce->cart->remove_cart_item( $key );
    if ($cartItem){
        echo "Product removed";
        wp_die();
    }
    echo "Didn't work";
    wp_die();
}