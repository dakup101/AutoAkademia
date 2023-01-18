<?php
function wp_register_terms_post_type() {

	$labels = array(
		'name'                  => _x( 'Terminy', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Termin', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Terminy', 'text_domain' ),
		'name_admin_bar'        => __( 'Termin', 'text_domain' ),
		'archives'              => __( 'Archiwum terminów', 'text_domain' ),
		'attributes'            => __( 'Atrybuty terminu', 'text_domain' ),
		'parent_item_colon'     => __( 'Rodzicielski termin', 'text_domain' ),
		'all_items'             => __( 'Wszystkie terminy', 'text_domain' ),
		'add_new_item'          => __( 'Dodaj termin', 'text_domain' ),
		'add_new'               => __( 'Dodaj nowy', 'text_domain' ),
		'new_item'              => __( 'Nowy termin', 'text_domain' ),
		'edit_item'             => __( 'Edytuj termin', 'text_domain' ),
		'update_item'           => __( 'Zaktualizuj termin', 'text_domain' ),
		'view_item'             => __( 'Pokaż termin', 'text_domain' ),
		'view_items'            => __( 'Pokaż terminy', 'text_domain' ),
		'search_items'          => __( 'Szukaj termin', 'text_domain' ),
		'not_found'             => __( 'Nie znaleziono', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'text_domain' ),
		'featured_image'        => __( 'Wyróżniony obraz', 'text_domain' ),
		'set_featured_image'    => __( 'Ustaw wyróżniony obrazk', 'text_domain' ),
		'remove_featured_image' => __( 'Usuń wyróżniony obraz', 'text_domain' ),
		'use_featured_image'    => __( 'Użyj jako wyróżniony obraz', 'text_domain' ),
		'insert_into_item'      => __( 'Dodaj do terminu', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Dodano do terminu', 'text_domain' ),
		'items_list'            => __( 'Lista terminów', 'text_domain' ),
		'items_list_navigation' => __( 'Nawigacja listy terminów', 'text_domain' ),
		'filter_items_list'     => __( 'Filtruj listę terminów', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Termin', 'text_domain' ),
		'description'           => __( 'Terminy', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'custom-fields' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-calendar-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'terms', $args );

}
add_action( 'init', 'wp_register_terms_post_type', 0 );

// Columns

// Add the custom columns to the book post type:
add_filter( 'manage_terms_posts_columns', 'set_custom_terms_columns' );
function set_custom_terms_columns($columns) {
    unset( $columns['author'] );
	unset( $columns['publisher'] );
	unset ($columns['date']);
    $columns['signups'] = __( 'Zapisy', 'your_text_domain' );
	$columns['date'] = __( 'Data', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_terms_posts_custom_column' , 'custom_terms_column', 10, 2 );
function custom_terms_column( $column, $post_id ) {
    switch ( $column ) {
        case 'signups' :
            echo get_term_singUps_count($post_id) . " / " . get_field("term_limit", $post_id);
            break;
		default:
			break;
    }
}