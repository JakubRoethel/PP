<?php
// Exit if accessed directly
if (!defined('ABSPATH')) exit;

// BEGIN ENQUEUE PARENT ACTION
// AUTO GENERATED - Do not modify or remove comment markers above or below:

if (!function_exists('chld_thm_cfg_locale_css')) :
    function chld_thm_cfg_locale_css($uri)
    {
        if (empty($uri) && is_rtl() && file_exists(get_template_directory() . '/rtl.css'))
            $uri = get_template_directory_uri() . '/rtl.css';
        return $uri;
    }
endif;
add_filter('locale_stylesheet_uri', 'chld_thm_cfg_locale_css');

if (!function_exists('chld_thm_cfg_parent_css')) :
    function chld_thm_cfg_parent_css()
    {
        wp_enqueue_style('chld_thm_cfg_parent', trailingslashit(get_template_directory_uri()) . 'style.css', array());
    }
endif;
add_action('wp_enqueue_scripts', 'chld_thm_cfg_parent_css', 10);

// END ENQUEUE PARENT ACTION

if ( ! function_exists( 'pomorskie_prestige_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function pomorskie_prestige_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pomorskie_prestige, use a find and replace
		 * to change 'pomorskie_prestige' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'pomorskie_prestige', get_template_directory() . '/languages' );

		

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pomorskie_prestige' ),
			'menu-2' => esc_html__( 'Footer', 'pomorskie_prestige' ),
		) );

		
	}
endif;
add_action( 'after_setup_theme', 'pomorskie_prestige_setup' );



function studio_scripts()
{
    wp_register_style('main', get_stylesheet_directory_uri() . '/dist/main.css', [], 1, 'all');
    wp_enqueue_style('main');
    wp_register_style('custom', get_stylesheet_directory_uri() . '/src/css/custom.css', [], 1, 'all');
    wp_enqueue_style('custom');

    wp_register_script('main', get_stylesheet_directory_uri() . '/dist/main.js', ['jquery', 'acf-input'], 1, true);
    wp_enqueue_script('main');
    wp_localize_script('main', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

    wp_register_script('Swiper', 'https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', null, null, true);
    wp_enqueue_script('Swiper');
}

add_action('wp_enqueue_scripts', 'studio_scripts');



add_theme_support('custom-logo');



function add_extra_element_to_menu_item($item_output, $item, $depth, $args)
{
    // Check if it's the desired menu location
    if ($args->theme_location === 'main-menu') {
        // Check if the current item is a parent (has children)
        $is_parent = in_array('menu-item-has-children', $item->classes);

        // Add the wrapper element if it's a parent item
        if ($is_parent) {
            $wrapper_start = '<div class="menu-item-wrapper">';
            $wrapper_end   = '</div>';

            $item_output = $wrapper_start . $item_output . $wrapper_end;
        }

        // Add the extra element only for parent items
        if ($is_parent) {
            $extra_element = '<span class="material-symbols-outlined open-menu">expand_more</span>';

            $item_output = str_replace('</a>', '</a>' . $extra_element, $item_output);
        }
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_extra_element_to_menu_item', 10, 4);








//custom ajax spinner 

add_action('wp_head', 'custom_ajax_spinner', 1000 );
function custom_ajax_spinner() {
    ?>
    <style>

.woocommerce .blockUI.blockOverlay {
    background-color: unset !important;
    background-color: unset !important;background: unset !important;
}
    .woocommerce .blockUI.blockOverlay:before,
    .woocommerce .loader:before {
        height: 3em;
        width: 3em;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-left: -.5em;
        margin-top: -.5em;
        display: block;
        content: "";
        -webkit-animation: none;
        -moz-animation: none;
        animation: none;
        background-image:url('<?php echo get_stylesheet_directory_uri() . "/img/my_spinner.gif"; ?>') !important;
        background-position: center center;
        background-size: cover;
        line-height: 1;
        text-align: center;
        font-size: 2em;
    }
    </style>
    <?php
}


// De-queues Select2 styles & scripts ONLY in the Woocommerce Checkout.
// Useful to keep Boostrap form control formatting

/**
 * Remove Woocommerce Select2 only for Checkout - Woocommerce 3.2.1+
 */
// function woo_dequeue_select2_only_for_checkout() {

// 	if ( is_checkout() || is_cart() || is_account_page()) {
// 	    if ( class_exists( 'woocommerce' ) ) {
// 	        wp_dequeue_style( 'select2' );
// 	        wp_deregister_style( 'select2' );

// 	        wp_dequeue_script( 'selectWoo');
// 	        wp_deregister_script('selectWoo');
// 	    } 
// 	}
// }
// add_action( 'wp_enqueue_scripts', 'woo_dequeue_select2_only_for_checkout', 100 );

// // Add filter to modify the related products arguments on single product page
// add_filter('woocommerce_output_related_products_args', 'customize_related_products_args');

// function customize_related_products_args($args) {
//     // Modify the 'posts_per_page' argument to limit the number of related products
//     $args['posts_per_page'] = 2;

//     return $args;
// }