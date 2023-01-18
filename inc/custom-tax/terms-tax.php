<?php
function wp_register_terms_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Podziały', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Podział', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Podziały', 'text_domain' ),
		'all_items'                  => __( 'Wszystkie podziały', 'text_domain' ),
		'parent_item'                => __( 'Rodzicielski podział', 'text_domain' ),
		'parent_item_colon'          => __( 'Rodzic:', 'text_domain' ),
		'new_item_name'              => __( 'Nowy podział', 'text_domain' ),
		'add_new_item'               => __( 'Dodaj nowy podział', 'text_domain' ),
		'edit_item'                  => __( 'Edytuj podział', 'text_domain' ),
		'update_item'                => __( 'Zaktualizuj podział', 'text_domain' ),
		'view_item'                  => __( 'Pokaż podział', 'text_domain' ),
		'separate_items_with_commas' => __( 'Rozdziel podziały przecinkiem', 'text_domain' ),
		'add_or_remove_items'        => __( 'Dodaj lub usuń przedziały', 'text_domain' ),
		'choose_from_most_used'      => __( 'Wybierz wśród często używanych', 'text_domain' ),
		'popular_items'              => __( 'Często używane', 'text_domain' ),
		'search_items'               => __( 'Szukaj przedział', 'text_domain' ),
		'not_found'                  => __( 'Nie znaleziono', 'text_domain' ),
		'no_terms'                   => __( 'Brak przedziałów', 'text_domain' ),
		'items_list'                 => __( 'Lista przedziałów', 'text_domain' ),
		'items_list_navigation'      => __( 'Nawigacja listy przedziałów', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => false,
	);
	register_taxonomy( 'terms_dividers', array( 'terms', 'signups'), $args );

}
add_action( 'init', 'wp_register_terms_taxonomies', 0 );