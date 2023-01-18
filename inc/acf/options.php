<?php
if( function_exists('acf_add_options_page') ) {
  $parent = acf_add_options_page(array(
    'page_title'  => 'Pola powtarzalne',
    'menu_title'  => 'Pola powtarzalne',
    'menu_slug'   => 'repeat',
    'capability'  => 'edit_posts',
    'redirect'    => true
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Elementy powtarzalne',
    'menu_title'  => 'Elementy powtarzalne',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Dlaczego warto się zapisać?',
    'menu_title'  => 'Dlaczego warto się zapisać?',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Sekcja z mapą',
    'menu_title'  => 'Sekcja z mapą',
    'parent_slug'   => $parent['menu_slug'],
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Call to action',
    'menu_title'  => 'Call to action',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Dane kontaktowe',
    'menu_title'  => 'Dane kontaktowe',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Sekcja opinie',
    'menu_title'  => 'Sekcja opinie',
    'parent_slug'   => $parent['menu_slug'],
  ));
  acf_add_options_sub_page(array(
    'page_title'  => 'Stopka',
    'menu_title'  => 'Stopka',
    'parent_slug'   => $parent['menu_slug'],
  ));
}
