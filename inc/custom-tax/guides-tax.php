<?php

/**
 * Create two taxonomies, genres and Tagi for the post type "book".
 *
 * @see register_post_type() for registering custom post types.
 */
function wp_register_guides_taxonomies()
{
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x('Kategorie', 'taxonomy general name', 'textdomain'),
    'singular_name'     => _x('Kategoria', 'taxonomy singular name', 'textdomain'),
    'search_items'      => __('Wyszukaj kategorię', 'textdomain'),
    'all_items'         => __('Wszystkie kategorie', 'textdomain'),
    'parent_item'       => __('Rodzic kategorii', 'textdomain'),
    'parent_item_colon' => __('Rodzic kategorii:', 'textdomain'),
    'edit_item'         => __('Edytuj kategorię', 'textdomain'),
    'update_item'       => __('Zaktualizuj kategoię', 'textdomain'),
    'add_new_item'      => __('Dodaj nową kategorię', 'textdomain'),
    'new_item_name'     => __('Nowa nazwa kategorii', 'textdomain'),
    'menu_name'         => __('Kategorie', 'textdomain'),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'kategorie'),
  );

  register_taxonomy('guides_categories', array('guides'), $args);

  unset($args);
  unset($labels);

  // Add new taxonomy, NOT hierarchical (like tags)
  $labels = array(
    'name'                       => _x('Tagi', 'taxonomy general name', 'textdomain'),
    'singular_name'              => _x('Tag', 'taxonomy singular name', 'textdomain'),
    'search_items'               => __('Wyszukaj Tagi', 'textdomain'),
    'popular_items'              => __('Popularne Tagi', 'textdomain'),
    'all_items'                  => __('Wszystkie Tagi', 'textdomain'),
    'parent_item'                => null,
    'parent_item_colon'          => null,
    'edit_item'                  => __('Edytuj Tag', 'textdomain'),
    'update_item'                => __('Zaktualizuj Tag', 'textdomain'),
    'add_new_item'               => __('Dodaj nowy Tag', 'textdomain'),
    'new_item_name'              => __('Nazwa nowego Tagu', 'textdomain'),
    'separate_items_with_commas' => __('Oddziel Tagi przecinkiem', 'textdomain'),
    'add_or_remove_items'        => __('Dodaj lub usuń Tagi', 'textdomain'),
    'choose_from_most_used'      => __('Wybierz z najczęściej używanych tagów', 'textdomain'),
    'not_found'                  => __('Nie znaleziono żadnych Tagów', 'textdomain'),
    'menu_name'                  => __('Tagi', 'textdomain'),
  );

  $args = array(
    'hierarchical'          => false,
    'labels'                => $labels,
    'show_ui'               => true,
    'show_admin_column'     => true,
    'update_count_callback' => '_update_post_term_count',
    'query_var'             => true,
    'rewrite'               => array('slug' => 'tag'),
  );

  register_taxonomy('guide_tags', 'guides', $args);
}
// hook into the init action and call create_book_taxonomies when it fires
add_action('init', 'wp_register_guides_taxonomies', 0);
