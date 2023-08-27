<?php 

// Register Custom Post Type
function custom_post_type_partners() {
    $labels = array(
        'name'                  => _x( 'Partners', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Partner', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Partners', 'text_domain' ),
        'name_admin_bar'        => __( 'Partner', 'text_domain' ),
        'archives'              => __( 'Partner Archives', 'text_domain' ),
        'attributes'            => __( 'Partner Attributes', 'text_domain' ),
        'parent_item_colon'     => __( 'Parent Partner:', 'text_domain' ),
        'all_items'             => __( 'All Partners', 'text_domain' ),
        'add_new_item'          => __( 'Add New Partner', 'text_domain' ),
        'add_new'               => __( 'Add New', 'text_domain' ),
        'new_item'              => __( 'New Partner', 'text_domain' ),
        'edit_item'             => __( 'Edit Partner', 'text_domain' ),
        'update_item'           => __( 'Update Partner', 'text_domain' ),
        'view_item'             => __( 'View Partner', 'text_domain' ),
        'view_items'            => __( 'View Partners', 'text_domain' ),
        'search_items'          => __( 'Search Partner', 'text_domain' ),
        'not_found'             => __( 'Not found', 'text_domain' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
        'featured_image'        => __( 'Featured Image', 'text_domain' ),
        'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
        'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
        'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
        'insert_into_item'      => __( 'Insert into Partner', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Partner', 'text_domain' ),
        'items_list'            => __( 'Partners list', 'text_domain' ),
        'items_list_navigation' => __( 'Partners list navigation', 'text_domain' ),
        'filter_items_list'     => __( 'Filter Partners list', 'text_domain' ),
       
    );
    $args = array(
        'label'                 => __( 'Partner', 'text_domain' ),
        'description'           => __( 'Custom post type for partners', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
        'taxonomies'            => array( 'category', 'post_tag' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'menu_icon'             => 'dashicons-businessperson'
    );
    register_post_type( 'partners', $args );
}
add_action( 'init', 'custom_post_type_partners', 0 );
