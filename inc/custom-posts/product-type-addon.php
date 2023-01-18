<?php
// Create Product Type
add_action( 'init', 'register_addon_product_type' );

function register_addon_product_type() {
  class WC_Product_Addon extends WC_Product {
    public function __construct($product) {
      $this->product_type = 'addon';
      parent::__construct( $product );
    }
  }
}

// Add product type to select
add_filter( 'product_type_selector', 'add_addon_product_type' );

function add_addon_product_type( $types ) {
  $types[ 'addon' ] = __( 'Dodatek', 'autoakademia_wc' );
  
  return $types;
}


function addon_custom_js() {

  if ('product' != get_post_type()) :
      return;
  endif;
  ?>
<script type='text/javascript'>
jQuery(document).ready(function() {
    jQuery('#general_product_data .general').addClass('show_if_addon').show();
    jQuery('#general_product_data .pricing').addClass('show_if_addon').show();
    jQuery('.product_data_tabs .general_tab').addClass('show_if_addon').show();
});
</script>
<?php

}

add_action('admin_footer', 'addon_custom_js');