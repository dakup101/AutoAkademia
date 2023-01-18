<?php
add_action('init', 'get_product_data');

function get_product_data() {
    add_action( 'wp_ajax_nopriv_get_product_data', 'get_product_data_handle' );
    add_action( 'wp_ajax_get_product_data', 'get_product_data_handle' );
}

function get_product_data_handle() {
    global $woocommerce;
    $course_id = isset($_POST['course_id']) && !empty($_POST['course_id']) ? $_POST['course_id'] : null;
    if (!$course_id){
        echo json_encode(array("err" => true));
        wp_die();
    }
    $course = wc_get_product($course_id);
    $resp = array(
        "name" => $course->get_name(),
        "price" => !empty($course->get_sale_price()) ? $course->get_sale_price() : $course->get_regular_price(),
        "short_desc" => $course->get_short_description(),
        "img" => get_the_post_thumbnail_url($course->get_id()),
    );
    echo json_encode($resp);
    wp_die();
}