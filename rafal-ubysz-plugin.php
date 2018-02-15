<?php
/**
 * Plugin Name: Rafal Ubysz Plugin
 * Plugin URI:  https://github.com/kamilradziszewski/rafal-ubysz-plugin
 * Description: Plugin for Rafal Ubysz Ultrasonografia WordPress Theme (adds Address Post Type and removes some Menu items)
 * Version:     20180405
 * Author:      Kamil Radziszewski
 * Author URI:  https://github.com/kamilradziszewski
 * Text Domain: rafal-ubysz
 * Domain Path: /languages
 * License:     GPL2
 */

/*
Address Post Type is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

Address Post Type is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Address Post Type. If not, see
https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html
*/


/*******************************************************************************
 * Register Custom Post Type
 */
function addresses_post_type() {

  $labels = array(
    'name'                  => _x(  'Addresses',
                                    'Post Type General Name',
                                    'rafal-ubysz' ),
    'singular_name'         => _x(  'Address',
                                    'Post Type Singular Name',
                                    'rafal-ubysz' ),
    'menu_name'             => __( 'Addresses', 'rafal-ubysz' ),
    'name_admin_bar'        => __( 'Address', 'rafal-ubysz' ),
    'archives'              => __( 'Address Archives', 'rafal-ubysz' ),
    'attributes'            => __( 'Address Attributes', 'rafal-ubysz' ),
    'parent_item_colon'     => __( 'Parent Address:', 'rafal-ubysz' ),
    'all_items'             => __( 'All Addresses', 'rafal-ubysz' ),
    'add_new_item'          => __( 'Add New Address', 'rafal-ubysz' ),
    'add_new'               => __( 'Add New', 'rafal-ubysz' ),
    'new_item'              => __( 'New Address', 'rafal-ubysz' ),
    'edit_item'             => __( 'Edit Address', 'rafal-ubysz' ),
    'update_item'           => __( 'Update Address', 'rafal-ubysz' ),
    'view_item'             => __( 'View Address', 'rafal-ubysz' ),
    'view_items'            => __( 'View Addresses', 'rafal-ubysz' ),
    'search_items'          => __( 'Search Address', 'rafal-ubysz' ),
    'not_found'             => __( 'Not found', 'rafal-ubysz' ),
    'not_found_in_trash'    => __( 'Not found in Trash', 'rafal-ubysz' ),
    'featured_image'        => __( 'Featured Image', 'rafal-ubysz' ),
    'set_featured_image'    => __( 'Set featured image', 'rafal-ubysz' ),
    'remove_featured_image' => __( 'Remove featured image', 'rafal-ubysz' ),
    'use_featured_image'    => __( 'Use as featured image', 'rafal-ubysz' ),
    'insert_into_item'      => __( 'Insert into Address', 'rafal-ubysz' ),
    'uploaded_to_this_item' => __( 'Uploaded to this Address', 'rafal-ubysz' ),
    'items_list'            => __( 'Addresses list', 'rafal-ubysz' ),
    'items_list_navigation' => __( 'Addresses list navigation', 'rafal-ubysz' ),
    'filter_items_list'     => __( 'Filter Addresses list', 'rafal-ubysz' ),
  );

  $args = array(
    'label'                 => __( 'Addresses', 'rafal-ubysz' ),
    'description'           => __( 'Post Type Description', 'rafal-ubysz' ),
    'labels'                => $labels,
    'supports'              => array( 'title', 'page-attributes' ),
    'public'                => true,
    'menu_position'         => 20,
    'menu_icon'                => 'dashicons-location-alt',
  );
  register_post_type( 'addresses', $args );

}
add_action( 'init', 'addresses_post_type', 0 );



function my_rewrite_flush() {
  addresses_post_type();
  flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'my_rewrite_flush' );



/*******************************************************************************
 * Remove Admin Menu Pages
 */
function custom_menu_page_removing() {
  remove_menu_page( 'edit.php' );
  remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'custom_menu_page_removing' );
