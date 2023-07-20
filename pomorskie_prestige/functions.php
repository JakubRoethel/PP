<?php
/**
 * pomorskie_prestige functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package pomorskie_prestige
 */

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
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'pomorskie_prestige' ),
			'menu-2' => esc_html__( 'Footer', 'pomorskie_prestige' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'pomorskie_prestige_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'pomorskie_prestige_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function pomorskie_prestige_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'pomorskie_prestige_content_width', 640 );
}
add_action( 'after_setup_theme', 'pomorskie_prestige_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function pomorskie_prestige_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'pomorskie_prestige' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'pomorskie_prestige' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'pomorskie_prestige_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function pomorskie_prestige_scripts() {

	wp_enqueue_script( 'script_slider', get_template_directory_uri() . '/js/eclipse.js', array ( 'jquery' ), 1.1, true);

	wp_enqueue_script( 'script_ovl', get_template_directory_uri() . '/js/owl.carousel.js', array ( 'jquery' ), 1.1, true);

	wp_enqueue_style( 'pomorskie_prestige-style', get_stylesheet_uri() );

	wp_enqueue_script( 'pomorskie_prestige-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'pomorskie_prestige-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'pomorskie_prestige_scripts' );

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

add_action('acf/init', 'sunFlower_settings_init');
function sunFlower_settings_init() {
  if( function_exists('acf_add_options_page') ) :
    $option_page = acf_add_options_page(array(
      'page_title'  => __('Reklama', 'wpbootstrap'),
      'menu_title'  => __('Reklama', 'wpbootstrap'),
      'menu_slug'   => 'sunFlower-settings',
      'capability'  => 'edit_posts',
      'parent_slug' => '',
      'position'    => false,
      'redirect'    => false
    ));
  endif;
 }
?>
<?php
function ci_get_related_posts( $post_id, $related_count, $args = array() ) {
	$terms = get_the_terms( $post_id, 'category' );
	
	if ( empty( $terms ) ) $terms = array();
	
	$term_list = wp_list_pluck( $terms, 'slug' );
	
	$related_args = array(
		'post_type' => 'post',
		'posts_per_page' => $related_count,
		'post_status' => 'publish',
		'post__not_in' => array( $post_id ),
		'orderby' => 'rand',
		'tax_query' => array(
			array(
				'taxonomy' => 'category',
				'field' => 'slug',
				'terms' => $term_list
			)
		)
	);

	return new WP_Query( $related_args );
}
//off:
// function excerpt($limit) {
//       $excerpt = explode(' ', get_the_excerpt(), $limit);

//       if (count($excerpt) >= $limit) {
//           array_pop($excerpt);
//           $excerpt = implode(" ", $excerpt) . '...';
//       } else {
//           $excerpt = implode(" ", $excerpt);
//       }

//       $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

//       return $excerpt;
// }
//off:
// function content($limit) {
//     $content = explode(' ', get_the_content(), $limit);

//     if (count($content) >= $limit) {
//         array_pop($content);
//         $content = implode(" ", $content) . '...';
//     } else {
//         $content = implode(" ", $content);
//     }

//     $content = preg_replace('/\[.+\]/','', $content);
//     $content = apply_filters('the_content', $content); 
//     $content = str_replace(']]>', ']]&gt;', $content);

//     return $content;
// }

function exclude_post_categories($excl='', $spacer=' ') {
	global $post;
	$categories = get_the_category($post->ID);
	if (!empty($categories)) {
	  $exclude = $excl;
	  $exclude = explode(",", $exclude);
	  $thecount = count(get_the_category()) - count($exclude);
	  foreach ($categories as $cat) {
		$html = '';
		if (!in_array($cat->cat_ID, $exclude)) {
		  $html .= '<a href="' . get_category_link($cat->cat_ID) . '" ';
		  $html .= 'title="' . $cat->cat_name . '">' . $cat->cat_name . '</a>';
		  if ($thecount > 0) {
			$html .= $spacer;
		  }
		  $thecount--;
		  echo $html;
		}
	  }
	}
  }

  