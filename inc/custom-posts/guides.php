<?php
// Register Guides post type


function wp_register_guides_post_type() {

	$labels = array(
		'name'                  => _x( 'Poradniki', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Poradnik', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Poradniki', 'text_domain' ),
		'name_admin_bar'        => __( 'Poradniki', 'text_domain' ),
		'archives'              => __( 'Archiwum poradników', 'text_domain' ),
		'attributes'            => __( 'Atrybuty poradnika', 'text_domain' ),
		'parent_item_colon'     => __( 'Rodzic poradnika:', 'text_domain' ),
		'all_items'             => __( 'Wszystkie poradniki', 'text_domain' ),
		'add_new_item'          => __( 'Dodaj nowy poradnik', 'text_domain' ),
		'add_new'               => __( 'Dodaj nowy', 'text_domain' ),
		'new_item'              => __( 'Nowy poradnik', 'text_domain' ),
		'edit_item'             => __( 'Edytuj poradnik', 'text_domain' ),
		'update_item'           => __( 'Zaktualizuj poradnik', 'text_domain' ),
		'view_item'             => __( 'Zobacz poradnik', 'text_domain' ),
		'view_items'            => __( 'Zobacz poradniki', 'text_domain' ),
		'search_items'          => __( 'Szukaj poradnika', 'text_domain' ),
		'not_found'             => __( 'Nie znaleziono', 'text_domain' ),
		'not_found_in_trash'    => __( 'Nie znaleziono w koszu', 'text_domain' ),
		'featured_image'        => __( 'Okładka poradnika', 'text_domain' ),
		'set_featured_image'    => __( 'Ustaw okładkę poradnika', 'text_domain' ),
		'remove_featured_image' => __( 'Usuń okładkę poradnika', 'text_domain' ),
		'use_featured_image'    => __( 'Użyj jako okładki poradnika', 'text_domain' ),
		'insert_into_item'      => __( 'Wstaw do poradnika', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Wstawione do tego poradnika', 'text_domain' ),
		'items_list'            => __( 'Lista poradników', 'text_domain' ),
		'items_list_navigation' => __( 'Menu listy poradników', 'text_domain' ),
		'filter_items_list'     => __( 'Filtruj listę poradników', 'text_domain' ),
	);
  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'poradniki' ),
    'capability_type'    => 'post',
    'has_archive'        => false,
    'hierarchical'       => false,
    'menu_position'      => null,
    'show_in_menu'        => TRUE,
    'show_in_nav_menus'   => TRUE,
    'show_in_rest' => true,
    'supports'           => array( 'title', 'thumbnail','excerpt','custom-fields', 'author'),
    'menu_icon'          => 'dashicons-edit-page',
		'taxonomies' => array('guides_categories', 'guides_tags'),
  );
	register_post_type( 'guides', $args );

}
add_action( 'init', 'wp_register_guides_post_type', 0 );