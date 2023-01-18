<?php
defined( 'ABSPATH' ) || exit;

global $product;

$type = $product->get_type();

switch ($type){
    case "course":
        get_template_part( "/template-parts/product/product", "course" );
        break;
    default:
        get_template_part( "/template-parts/product/product", "default" );
        break;
}