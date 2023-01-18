<?php
function get_term_singUps_count($id){
    $object = get_post($id);
    $termin_id = $object->ID;
    $dividers = get_the_terms( $termin_id, 'terms_dividers' );
    $divider_id = $dividers[0]->term_id;
    $course_id = get_field("term_course", $termin_id);

    $signUps = new WP_Query(array(
        "post_type" => "signups",
        "meta_query" => array(
            "relation" => "AND",
            array(
                "key" => "signup_course",
                "value" => $course_id,
                "compare" => "="
            ),
            array(
                "key" => "signup_term",
                "value" => $termin_id,
                "compare" => "="
            ),
        ),
        "tax_query" => array(
            array(
                "taxonomy" => "terms_dividers",
                "field" => "id",
                "terms" => $divider_id
            ),
        ),
        "order" => "ASC",
    ));
    return $signUps->found_posts;
}