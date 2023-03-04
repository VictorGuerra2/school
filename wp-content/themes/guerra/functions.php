<?php
/**
 * Guerra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Guerra
 */
require get_template_directory(). '/inc/cpt-taxonomy.php';
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function guerra_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Guerra, use a find and replace
		* to change 'guerra' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'guerra', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'guerra' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'guerra_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	//thumbnails
	add_theme_support( 'post-thumbnails' );

	//image size
	add_image_size( 'student-photo', 200, 300, true );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'guerra_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */

function guerra_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'guerra_content_width', 640 );
}
add_action( 'after_setup_theme', 'guerra_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function guerra_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'guerra' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'guerra' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'guerra_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function guerra_scripts() {
	wp_enqueue_style( 'guerra-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'guerra-style', 'rtl', 'replace' );

	wp_enqueue_script( 'guerra-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'guerra_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// CUSTOM EXCERPT
function custom_excerpt_length( $length ) {
	return 20;
  }
  add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// CUSTOM EXCERPT

// add FULL width and half width
add_theme_support('align-wide');



// // Register Custom Post Type for staff

// function custom_post_type_staff() {

// 	$labels = array(
// 		'name'                  => _x( 'Staff', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'         => _x( 'Staff', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'             => _x( 'Staff', 'text_domain' ),
// 		'name_admin_bar'        => _x( 'Faculty Category', 'text_domain' ),
// 		'archives'              => __( 'Item Archives', 'text_domain' ),
// 		'attributes'            => __( 'Item Attributes', 'text_domain' ),
// 		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
// 		'all_items'             => __( 'All Items', 'text_domain' ),
// 		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
// 		'add_new'               => __( 'Add New', 'text_domain' ),
// 		'new_item'              => __( 'New Item', 'text_domain' ),
// 		'edit_item'             => __( 'Edit Item', 'text_domain' ),
// 		'update_item'           => __( 'Update Item', 'text_domain' ),
// 		'view_item'             => __( 'View Item', 'text_domain' ),
// 		'view_items'            => __( 'View Items', 'text_domain' ),
// 		'search_items'          => __( 'Search Item', 'text_domain' ),
// 		'not_found'             => __( 'Not found', 'text_domain' ),
// 		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
// 		'featured_image'        => __( 'Featured Image', 'text_domain' ),
// 		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
// 		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
// 		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
// 		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
// 		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
// 		'items_list'            => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
// 		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
// 		'featured_image'        => __( 'Staff featured image'),
// 		'set_featured_image'    => __( 'Set staff featured image'),
// 		'remove_featured_image' => __( 'Remove staff featured image'),
// 		'use_featured_image'    => __( 'Use as featured image'),
// 	);
// 	$args = array(
// 		'labels'                => $labels,
// 		'supports'              => false,
// 		'taxonomies'            => array( 'slug', 'staff' ),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 5,
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'query_var'             => true,
// 		'show_in_rest'          => true,
// 		'can_export'            => true,
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
// 		'capability_type'       => 'post',
// 		'has_archive'        	=> false,
// 		'hierarchical'       	=> false,
// 		'supports'              => array( 'title' ),
// 		'menu_icon'             => 'dashicons-custimizer',
// 	);
// 	register_post_type( 'school-staff', $args );
	
// }
// add_action( 'init', 'custom_post_type_staff');

// // Register Custom Taxonomy Staff
// add_action( 'init', 'custom_taxonomy_staff' );
// function custom_taxonomy_staff() {

// 	$labels = array(
// 		'name'                       => _x( 'Staff', 'Taxonomy General Name', 'text_domain' ),
// 		'singular_name'              => _x( 'Staff', 'Taxonomy Singular Name', 'text_domain' ),
// 		'menu_name'                  => __( 'Taxonomy(Category)', 'text_domain' ),
// 		'all_items'                  => __( 'All Items', 'text_domain' ),
// 		'parent_item'                => __( 'Parent Item', 'text_domain' ),
// 		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
// 		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
// 		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
// 		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
// 		'update_item'                => __( 'Update Item', 'text_domain' ),
// 		'view_item'                  => __( 'View Item', 'text_domain' ),
// 		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
// 		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
// 		'popular_items'              => __( 'Popular Items', 'text_domain' ),
// 		'search_items'               => __( 'Search Items', 'text_domain' ),
// 		'not_found'                  => __( 'Not Found', 'text_domain' ),
// 		'no_terms'                   => __( 'No items', 'text_domain' ),
// 		'items_list'                 => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 		'query_var'         		 => true,
// 		'rewrite'           		 => array( 'slug' => 'staff-category' ),
// 	);
// 	register_taxonomy( 'taxonomy-staff', array( 'school-staff' ), $args ); 

// }


// // Register Custom Post Type for Student
// add_action( 'init', 'custom_post_type_student');
// function custom_post_type_student() {

// 	$labels = array(
// 		'name'                  => _x( 'Student', 'Post Type General Name', 'text_domain' ),
// 		'singular_name'         => _x( 'Student', 'Post Type Singular Name', 'text_domain' ),
// 		'menu_name'             => _x( 'Student', 'text_domain' ),
// 		'name_admin_bar'        => _x( 'Faculty Category', 'text_domain' ),
// 		'archives'              => __( 'Student', 'text_domain' ),
// 		'attributes'            => __( 'Item Attributes', 'text_domain' ),
// 		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
// 		'all_items'             => __( 'All Items', 'text_domain' ),
// 		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
// 		'add_new'               => __( 'Add New', 'text_domain' ),
// 		'new_item'              => __( 'New Item', 'text_domain' ),
// 		'edit_item'             => __( 'Edit Item', 'text_domain' ),
// 		'update_item'           => __( 'Update Item', 'text_domain' ),
// 		'view_item'             => __( 'View Item', 'text_domain' ),
// 		'view_items'            => __( 'View Items', 'text_domain' ),
// 		'search_items'          => __( 'Search Item', 'text_domain' ),
// 		'not_found'             => __( 'Not found', 'text_domain' ),
// 		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
// 		'featured_image'        => __( 'Featured Image', 'text_domain' ),
// 		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
// 		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
// 		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
// 		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
// 		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
// 		'items_list'            => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
// 		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
// 		'featured_image'        => __( 'Staff featured image'),
// 		'set_featured_image'    => __( 'Set staff featured image'),
// 		'remove_featured_image' => __( 'Remove staff featured image'),
// 		'use_featured_image'    => __( 'Use as featured image'),
// 	);
// 	$args = array(
// 		'labels'                => $labels,
// 		'supports'              => false,
// 		'taxonomies'            => array( 'slug', 'staff' ),
// 		'hierarchical'          => false,
// 		'public'                => true,
// 		'show_ui'               => true,
// 		'show_in_menu'          => true,
// 		'menu_position'         => 5,
// 		'show_in_admin_bar'     => true,
// 		'show_in_nav_menus'     => true,
// 		'query_var'             => true,
// 		'show_in_rest'          => true,
// 		'can_export'            => true,
// 		'exclude_from_search'   => false,
// 		'publicly_queryable'    => true,
// 		'capability_type'       => 'post',
// 		'has_archive'        	=> true,
// 		'hierarchical'       	=> false,
// 		'supports'              => array( 'title', 'editor', 'thumbnail' ),
// 		'template' 			    => array(
// 									array('core/paragraph'),
// 									array('core/buttons'),
// 		),
// 		'template_lock'         => 'all',
// 		'menu_icon'             => 'dashicons-custimizer',
// 	);
// 	register_post_type( 'school-student', $args );

// }


// // Register Custom Student
// add_action( 'init', 'custom_taxonomy_student' );
// function custom_taxonomy_student() {

// 	$labels = array(
// 		'name'                       => _x( 'Student', 'Taxonomy General Name', 'text_domain' ),
// 		'singular_name'              => _x( 'Student', 'Taxonomy Singular Name', 'text_domain' ),
// 		'menu_name'                  => __( 'Taxonomy(Category)', 'text_domain' ),
// 		'all_items'                  => __( 'All Items', 'text_domain' ),
// 		'parent_item'                => __( 'Parent Item', 'text_domain' ),
// 		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
// 		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
// 		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
// 		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
// 		'update_item'                => __( 'Update Item', 'text_domain' ),
// 		'view_item'                  => __( 'View Item', 'text_domain' ),
// 		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
// 		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
// 		'choose_from_most_used'      => __( 'Choose from the most used', 'text_domain' ),
// 		'popular_items'              => __( 'Popular Items', 'text_domain' ),
// 		'search_items'               => __( 'Search Items', 'text_domain' ),
// 		'not_found'                  => __( 'Not Found', 'text_domain' ),
// 		'no_terms'                   => __( 'No items', 'text_domain' ),
// 		'items_list'                 => __( 'Items list', 'text_domain' ),
// 		'items_list_navigation'      => __( 'Items list navigation', 'text_domain' ),
// 	);
// 	$args = array(
// 		'labels'                     => $labels,
// 		'hierarchical'               => true,
// 		'public'                     => true,
// 		'show_ui'                    => true,
// 		'show_admin_column'          => true,
// 		'show_in_nav_menus'          => true,
// 		'show_tagcloud'              => true,
// 		'query_var'         		=> true,
// 		'rewrite'           		=> array( 'slug' => 'staff-category' ),
// 	);
// 	register_taxonomy( 'taxonomy-student', array( 'school-student' ), $args ); 

// }

//     //Rewrite flush 
//     function school_rewrite_flush() {
//         custom_post_type_staff();
// 		custom_taxonomy_staff();
		
//         custom_post_type_student();
//         custom_taxonomy_student();
        
//     }
//     add_action( 'after_switch_theme', 'fwd_rewrite_flush' );


    