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

if (!function_exists('pomorskie_prestige_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function pomorskie_prestige_setup()
    {
        /*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on pomorskie_prestige, use a find and replace
		 * to change 'pomorskie_prestige' to the name of your theme in all the template files.
		 */
        load_theme_textdomain('pomorskie_prestige', get_template_directory() . '/languages');



        /*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'pomorskie_prestige'),
            'menu-2' => esc_html__('Footer', 'pomorskie_prestige'),
        ));
    }
endif;
add_action('after_setup_theme', 'pomorskie_prestige_setup');



function register_acf_blocks() {
    register_block_type( __DIR__ . '/blocks/testimonial/block.json' );
    register_block_type( __DIR__ . '/blocks/partner/block.json' );
}








add_action( 'init', 'register_acf_blocks' );



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
require_once('lib/acf-config.php');
require_once('lib/partner-post-type.php');


function add_extra_element_to_menu_item($item_output, $item, $depth, $args)
{


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


    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_extra_element_to_menu_item', 10, 4);








//custom ajax spinner 

add_action('wp_head', 'custom_ajax_spinner', 1000);
function custom_ajax_spinner()
{
?>
    <style>
        .woocommerce .blockUI.blockOverlay {
            background-color: unset !important;
            background-color: unset !important;
            background: unset !important;
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
            background-image: url('<?php echo get_stylesheet_directory_uri() . "/img/my_spinner.gif"; ?>') !important;
            background-position: center center;
            background-size: cover;
            line-height: 1;
            text-align: center;
            font-size: 2em;
        }
    </style>
    <?php
}


function my_excerpt_length($length)
{
    return 15;
}
add_filter('excerpt_length', 'my_excerpt_length');




function get_breadcrumb()
{
    // Initialize an empty array to store breadcrumb items
    $breadcrumb = array();

    // Add the home link to the breadcrumb
    $breadcrumb[] = '<a href="' . esc_url(home_url()) . '">' . esc_html__('Home', 'textdomain') . '</a>';

    // Check if we are on a single post (e.g., single post, page, custom post type)
    if (is_singular()) {
        $post_type = get_post_type();

        // Get the post type object to retrieve its labels
        $post_type_object = get_post_type_object($post_type);

        // Add the post type archive link to the breadcrumb
        if ($post_type_object->has_archive) {
            $breadcrumb[] = '<a href="' . esc_url(get_post_type_archive_link($post_type)) . '">' . esc_html($post_type_object->label) . '</a>';
        }

        // Check if the current post has any categories
        $categories = get_the_category();
        if ($categories) {
            // Get the first category (assuming a post can belong to only one category)
            $category = $categories[0];
            // Add the category link to the breadcrumb
            $breadcrumb[] = '<a href="' . esc_url(get_category_link($category)) . '">' . esc_html($category->name) . '</a>';
        }

        // Add the current post title to the breadcrumb
        $breadcrumb[] = get_the_title();
    }

    // Check if we are on a category or tag archive page
    elseif (is_category() || is_tag()) {
        $term = get_queried_object();
        $breadcrumb[] = $term->name;
    }

    // Check if we are on an archive page (e.g., date, author, custom taxonomy)
    elseif (is_archive()) {
        $breadcrumb[] = post_type_archive_title('', false);
    }

    // Check if we are on a search results page
    elseif (is_search()) {
        $breadcrumb[] = esc_html__('Search Results', 'textdomain');
    }

    // Check if the user came from a category archive or a single post within a category
    elseif (wp_get_referer()) {
        $referer_url = wp_get_referer();
        $referer_url_parts = parse_url($referer_url);

        // Check if the referer URL corresponds to a category archive
        if (isset($referer_url_parts['path']) && preg_match('/^\/category\//', $referer_url_parts['path'])) {
            $category_slug = str_replace('/category/', '', $referer_url_parts['path']);
            $category = get_category_by_slug($category_slug);
            if ($category) {
                // Add the category link to the breadcrumb
                $breadcrumb[] = '<a href="' . esc_url(get_category_link($category)) . '">' . esc_html($category->name) . '</a>';
            }
        }
    }

    // Add more conditions and custom logic based on your website's structure

    // Return the breadcrumb trail as a string
    return implode(' / ', $breadcrumb);
}


//show related posts 
function custom_related_posts()
{
    global $post;

    $related_posts_args = array(
        'category__in' => wp_get_post_categories($post->ID),
        'post__not_in' => array($post->ID),
        'posts_per_page' => 4, // Number of related posts to display
        'orderby' => 'rand', // You can change this to 'date', 'title', 'modified', etc.
    );

    $related_posts_query = new WP_Query($related_posts_args);



    if ($related_posts_query->have_posts()) { ?>
        <section class="related-container">
            <h3><?php echo pll__("Polecane dla Ciebie") ?></h3>
            <ul class="related-posts-swiper">
                <div class="swiper-wrapper">
                    <?php
                    while ($related_posts_query->have_posts()) {
                        $related_posts_query->the_post(); ?>
                        <div class="swiper-slide">
                            <?php get_template_part('entry'); ?>
                        </div>
                    <?php  } ?>
                </div>
                <!-- <div class="swiper-scrollbar"></div> -->
            </ul>
        <?php
        wp_reset_postdata();
    } else {
        echo '<p>No related posts found.</p>';
    } ?>
        </section>
    <?php
}


//!!!! IMPORTANT for dropdown menu on mobile
