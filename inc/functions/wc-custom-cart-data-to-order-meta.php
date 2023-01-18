<?php
add_action(
    'woocommerce_checkout_create_order_line_item',
    function (WC_Order_Item_Product $cartItem, string $cartItemKey, array $values): void {
        $course_date =  woo_get_cartItem_data($cartItemKey, "course_term_date");
        $course_time = woo_get_cartItem_data($cartItemKey, "course_term_time");
        $course_term = woo_get_cartItem_data($cartItemKey, "course_term");
        if (!empty($course_date)) {
            $cartItem->add_meta_data("Data rozpoczęcia", $course_date, true);
        }
        if (!empty($course_time)) {
            $cartItem->add_meta_data("Godzina", $course_time, true);
        }
        if (!empty($course_term)) {
            $cartItem->add_meta_data("ID Terminu", $course_term, true);
        }
    },
    10,
    3
);
