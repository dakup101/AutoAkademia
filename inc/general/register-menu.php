<?php
/*************** MENU ***************/
add_action( 'init', 'register_menu' );
function register_menu() {
  register_nav_menus(array(
    'nav-top' => esc_html__('Menu Główne', 'AutoAkademia'),
    'footer-menu' => esc_html__('Menu w stopce', 'AutoAkademia'),
    'courses-menu' => esc_html__('Kursy w stopce', 'AutoAkademia'),
  ));
}
?>
