<?php
// Register Custom Post Type for staff

function custom_post_type_staff() {

	$labels = array(
		'name'                  => _x( 'Staff', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => _x( 'Staff', 'text_domain' ),
		'name_admin_bar'        => _x( 'Faculty Category', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		'featured_image'        => __( 'Staff featured image'),
		'set_featured_image'    => __( 'Set staff featured image'),
		'remove_featured_image' => __( 'Remove staff featured image'),
		'use_featured_image'    => __( 'Use as featured image'),
	);
	$args = array(
		'labels'                => $labels,
		'supports'              => false,
		'taxonomies'            => array( 'slug', 'staff' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'show_in_rest'          => true,
		'can_export'            => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'has_archive'        	=> false,
		'hierarchical'       	=> false,
		'supports'              => array( 'title' ),
		'menu_icon'             => 'dashicons-custimizer',
	);
	register_post_type( 'school-staff', $args );
	
}
add_action( 'init', 'custom_post_type_staff');

// Register Custom Taxonomy Staff
add_action( 'init', 'custom_taxonomy_staff' );
function custom_taxonomy_staff() {

	$labels = array(
		'name'                       => _x( 'Staff', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Staff', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomy(Category)', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'         		 => true,
		'rewrite'           		 => array( 'slug' => 'staff-category' ),
	);
	register_taxonomy( 'taxonomy-staff', array( 'school-staff' ), $args ); 

}


// Register Custom Post Type for Student
add_action( 'init', 'custom_post_type_student');
function custom_post_type_student() {

	$labels = array(
		'name'                  => _x( 'Student', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Student', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => _x( 'Student', 'text_domain' ),
		'name_admin_bar'        => _x( 'Faculty Category', 'text_domain' ),
		'archives'              => __( 'Student', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
		'featured_image'        => __( 'Staff featured image'),
		'set_featured_image'    => __( 'Set staff featured image'),
		'remove_featured_image' => __( 'Remove staff featured image'),
		'use_featured_image'    => __( 'Use as featured image'),
	);
	$args = array(
		'labels'                => $labels,
		'supports'              => false,
		'taxonomies'            => array( 'slug', 'staff' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'query_var'             => true,
		'show_in_rest'          => true,
		'can_export'            => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'has_archive'        	=> true,
		'hierarchical'       	=> false,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'template' 			    => array(
									array('core/paragraph'),
									array('core/buttons'),
		),
		'template_lock'         => 'all',
		'menu_icon'             => 'dashicons-custimizer',
	);
	register_post_type( 'school-student', $args );

}


// Register Custom Student
add_action( 'init', 'custom_taxonomy_student' );
function custom_taxonomy_student() {

	$labels = array(
		'name'                       => _x( 'Student', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Student', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Taxonomy(Category)', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'view_item'                  => __( 'View Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
		'popular_items'              => __( 'Popular Items', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
		'no_terms'                   => __( 'No items', 'text_domain' ),
		'items_list'                 => __( 'Items list', 'text_domain' ),
		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'query_var'         		=> true,
		'rewrite'           		=> array( 'slug' => 'staff-category' ),
	);
	register_taxonomy( 'taxonomy-student', array( 'school-student' ), $args ); 

}

    //Rewrite flush 
    function school_rewrite_flush() {
        custom_post_type_staff();
		custom_taxonomy_staff();
		
        custom_post_type_student();
        custom_taxonomy_student();
        
    }
    add_action( 'after_switch_theme', 'fwd_rewrite_flush' );


    