<?php
add_action('woocommerce_thankyou', 'enroll_student', 10, 1);

function enroll_student($order_id){
    if( ! get_post_meta( $order_id, '_thankyou_action_done', true ) ) {
        $order = wc_get_order( $order_id );

        // Loop through order items
        foreach ( $order->get_items() as $item_id => $item ) {
            $product = $item->get_product();
            if ($product->get_type() == "course") {
                // User Data
                $name = $order->get_billing_first_name();
                $last_name = $order->get_billing_last_name();
                $email = $order->get_billing_email();
                $phone = $order->get_billing_phone();
                
                // Order Data
                $order_number = $order->get_order_number();
                
                // Product Data
                $course_id = $product->get_id();
                
                // Course and Signup
                $term_id = !empty($item->get_meta("ID Terminu")) ? $item->get_meta("ID Terminu") : null;
                $term_date =  !empty($item->get_meta("Data rozpoczęcia")) ? $item->get_meta("Data rozpoczęcia") : null;
                $term_date_last_day = date("Y-m-t", strtotime($term_date));
                $term_date_last_day_formated = date("Ymd", strtotime($term_date_last_day));
                // Taxonomy "Dividers" for new signups
                $args = array(
                    'taxonomy'   => 'terms_dividers',
                    'hide_empty' => false,
                    'meta_query' => array(
                         array(
                            // It's not first but last day of month :P
                            'key'       => 'first_day_of_month',
                            'value'     => $term_date_last_day_formated,
                            'compare'   => 'LIKE'
                         )
                    )
                );
                $divider = get_terms($args)[0];
                $divider_id = $divider->term_id;
                
                // Check Data and Create Signup Post
                if ($term_id && $term_date) {
                    $signup_title = date("dmY") . '_' . date("His");
                    $signup_post = array(
                        'post_title' => $signup_title,
                        'post_status' => 'publish',
                        'post_author' => 1,
                        'post_type' => 'signups'
                    );
                    $signup_id = wp_insert_post( $signup_post );
                    // Add divider tax value
                    wp_set_post_terms( $signup_id, array( $divider_id ), 'terms_dividers' );
                    
                    // Fill ACF Fields
                    update_field("signup_order_nr", $order_number, $signup_id);
                    update_field("singup_name", $name, $signup_id);
                    update_field("singup_last_name", $last_name, $signup_id);
                    update_field("signup_tel", $phone, $signup_id);
                    update_field("signup_email", $email, $signup_id);
                    update_field("signup_course", $course_id, $signup_id);
                    update_field("signup_term", $term_id, $signup_id);
                }
            }
        }
        // Flag the action as done (to avoid repetitions on reload for example)
        $order->update_meta_data( '_thankyou_action_done', true );
        $order->save();
    }
}