<?php
// Register Custom Post Type
function wp_register_cars_post_type() {

	$labels = array(
		'name'                  => _x( 'Samochody', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Samochód', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Flota', 'text_domain' ),
		'name_admin_bar'        => __( 'Flota', 'text_domain' ),
		'archives'              => __( 'Archiwum samochodów', 'text_domain' ),
		'attributes'            => __( 'Atrybuty samochodu', 'text_domain' ),
		'parent_item_colon'     => __( 'Rodzicielski samochód', 'text_domain' ),
		'all_items'             => __( 'Wszystkie samochody', 'text_domain' ),
		'add_new_item'          => __( 'Dodaj samochód', 'text_domain' ),
		'add_new'               => __( 'Dodaj nowy', 'text_domain' ),
		'new_item'              => __( 'Nowy samochód', 'text_domain' ),
		'edit_item'             => __( 'Edytuj samochód', 'text_domain' ),
		'update_item'           => __( 'Zaktualizuj samochód', 'text_domain' ),
		'view_item'             => __( 'Zobacz samochód', 'text_domain' ),
		'view_items'            => __( 'Zobacz samochody', 'text_domain' ),
		'search_items'          => __( 'Szukaj samochód', 'text_domain' ),
		'not_found'             => __( 'Nie znaleziono', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'text_domain' ),
		'featured_image'        => __( 'Grafika samochodu', 'text_domain' ),
		'set_featured_image'    => __( 'Ustaw grafikę', 'text_domain' ),
		'remove_featured_image' => __( 'Usuń grafikę', 'text_domain' ),
		'use_featured_image'    => __( 'Użyj jako grafikę', 'text_domain' ),
		'insert_into_item'      => __( 'Dodaj do samochodu', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Dodano do samochodu', 'text_domain' ),
		'items_list'            => __( 'Lista samochodów', 'text_domain' ),
		'items_list_navigation' => __( 'Nawigacja listy samochodów', 'text_domain' ),
		'filter_items_list'     => __( 'Filtruj listę samochodów', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Car', 'text_domain' ),
		'description'           => __( 'AutoAkademia\'s cars', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_icon'             => 'dashicons-car',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'rewrite'               => false,
		'capability_type'       => 'post',
	);
	register_post_type( 'cars', $args );

}
add_action( 'init', 'wp_register_cars_post_type', 0 );