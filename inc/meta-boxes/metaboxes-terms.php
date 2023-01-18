<?php
// Add MetaBox
function terms_signUps_metabox()
{
    add_meta_box("demo-meta-box", "Zapisy w tym terminie", "terms_signUps_metabox_markup", "terms", "normal", "default", null);
}

add_action("add_meta_boxes", "terms_signUps_metabox");

// MetaBox Content
function terms_signUps_metabox_markup($object)
{
    require_once(__DIR__ . '/metaboxes-terms-signUps-markup.php');
}