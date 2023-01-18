<?php
add_filter( 'woocommerce_order_item_get_formatted_meta_data', 'unset_specific_order_item_meta_data', 10, 2);
function unset_specific_order_item_meta_data($formatted_meta, $item){
    // Only on emails notifications
    if( is_admin() )
        return $formatted_meta;

    foreach( $formatted_meta as $key => $meta ){
        if( in_array( $meta->key, array('ID Terminu') ) )
            unset($formatted_meta[$key]);
    }
    return $formatted_meta;
}