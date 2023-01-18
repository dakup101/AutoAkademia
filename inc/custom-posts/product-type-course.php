<?php
// Create Product Type
add_action( 'init', 'register_course_product_type' );

function register_course_product_type() {
  class WC_Product_Course extends WC_Product {
    public function __construct($product) {
      $this->product_type = 'course';
      parent::__construct( $product );
    }
  }
}

// Add product type to select
add_filter( 'product_type_selector', 'add_course_product_type' );

function add_course_product_type( $types ) {
  $types[ 'course' ] = __( 'Kurs', 'autoakademia_wc' );
  
  return $types;
}


function course_custom_js() {

  if ('product' != get_post_type()) :
      return;
  endif;
  ?>
<script type='text/javascript'>
jQuery(document).ready(function() {
    jQuery('#general_product_data .general').addClass('show_if_course').show();
    jQuery('#general_product_data .pricing').addClass('show_if_course').show();
    jQuery('.product_data_tabs .general_tab').addClass('show_if_course').show();
});
</script>
<?php

}

add_action('admin_footer', 'course_custom_js');