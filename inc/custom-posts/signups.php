<?php
// Register Custom Post Type
function wp_register_signups_post_type() {

	$labels = array(
		'name'                  => _x( 'Zapisy', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Zapis', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Zapisy', 'text_domain' ),
		'name_admin_bar'        => __( 'Zapis', 'text_domain' ),
		'archives'              => __( 'Archiwum zapisów', 'text_domain' ),
		'attributes'            => __( 'Atrybuty zapisów', 'text_domain' ),
		'parent_item_colon'     => __( 'Rodzicielski zapis', 'text_domain' ),
		'all_items'             => __( 'Wszystkie zapisy', 'text_domain' ),
		'add_new_item'          => __( 'Dodaj Zapis', 'text_domain' ),
		'add_new'               => __( 'Dodaj nowy', 'text_domain' ),
		'new_item'              => __( 'Nowy zapis', 'text_domain' ),
		'edit_item'             => __( 'Edytuj zapis', 'text_domain' ),
		'update_item'           => __( 'Zaktualizuj zapis', 'text_domain' ),
		'view_item'             => __( 'Pokaż zapis', 'text_domain' ),
		'view_items'            => __( 'Pokaż zapisy', 'text_domain' ),
		'search_items'          => __( 'Szukaj zapis', 'text_domain' ),
		'not_found'             => __( 'Nie znaleziono', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'text_domain' ),
		'featured_image'        => __( 'Wyróżniony obraz', 'text_domain' ),
		'set_featured_image'    => __( 'Ustaw wyróżniony obrazk', 'text_domain' ),
		'remove_featured_image' => __( 'Usuń wyróżniony obraz', 'text_domain' ),
		'use_featured_image'    => __( 'Użyj jako wyróżniony obraz', 'text_domain' ),
		'insert_into_item'      => __( 'Dodaj do zapisu', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Dodano do zapisu', 'text_domain' ),
		'items_list'            => __( 'Lista zapisów', 'text_domain' ),
		'items_list_navigation' => __( 'Nawigacja listy zapisów', 'text_domain' ),
		'filter_items_list'     => __( 'Filtruj listę zapisów', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Zapis', 'text_domain' ),
		'description'           => __( 'Zapisy', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => null,
		'menu_icon'             => 'dashicons-clipboard',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'signups', $args );

}
add_action( 'init', 'wp_register_signups_post_type', 0 );