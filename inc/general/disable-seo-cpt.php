<?php
// Remove wpseo_meta from Terms and SignUps
function my_remove_wp_seo_meta_box() {
	remove_meta_box('wpseo_meta', 'terms', 'normal');
    remove_meta_box('wpseo_meta', 'signups', 'normal');
}
add_action('add_meta_boxes', 'my_remove_wp_seo_meta_box', 100);