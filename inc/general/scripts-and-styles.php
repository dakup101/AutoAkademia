<?php

function starter_scripts() {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js', false, NULL, true );
    wp_enqueue_script( 'jquery' );
}
add_action( 'wp_enqueue_scripts', 'starter_scripts' );

add_action('wp_enqueue_scripts', 'load_styles_and_scripts');

function load_styles_and_scripts() {
  wp_enqueue_style('style-main', get_template_directory_uri() . '/dist/stylesheets/main.css', array(), '1.1.0', 'all');
  wp_enqueue_script('slick', get_template_directory_uri() . '/dist/js/slick.min.js', false, NULL, true);
  wp_enqueue_script('main', get_template_directory_uri().'/dist/js/main.js', false, '1.1.0', true);
}