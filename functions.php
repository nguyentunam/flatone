<?php
/**
 * flatone functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package flatone
 */

if ( ! function_exists( 'flatone_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function flatone_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on flatone, use a find and replace
		 * to change 'flatone' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'flatone', get_template_directory() . '/languages' );

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
			'menu-1' => esc_html__( 'Primary', 'flatone' ),
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
		add_theme_support( 'custom-background', apply_filters( 'flatone_custom_background_args', array(
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
add_action( 'after_setup_theme', 'flatone_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function flatone_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'flatone_content_width', 640 );
}
add_action( 'after_setup_theme', 'flatone_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function flatone_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'flatone' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'flatone' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'flatone_widgets_init' );


// development only
function get_stylesheet_uri_dev() {
    $time = time();
    $stylesheet_dir_uri = get_stylesheet_directory_uri();
    $stylesheet_uri = $stylesheet_dir_uri . '/style.css?v='.$time;
    /**
     * Filter the URI of the current theme stylesheet.
     *
     * @since 1.5.0
     *
     * @param string $stylesheet_uri     Stylesheet URI for the current theme/child theme.
     * @param string $stylesheet_dir_uri Stylesheet directory URI for the current theme/child theme.
     */
    return apply_filters( 'stylesheet_uri', $stylesheet_uri, $stylesheet_dir_uri );
}


/**
 * Enqueue scripts and styles.
 */
function flatone_scripts() {

	wp_register_script( 'jQuery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js', null, null, true );
	wp_enqueue_script('jQuery');
	
	
	wp_enqueue_script( 'flatone-content-slider-pro', get_template_directory_uri() . '/libs/content-slider-pro/dist/js/jquery.sliderPro.min.js', array(), '20151215', true );
	wp_enqueue_style( 'flatone-content-slider-pro-style', get_template_directory_uri() . '/libs/content-slider-pro/dist/css/slider-pro.min.css');
	
	wp_enqueue_script( 'flatone-jquery-flipster', get_template_directory_uri() . '/libs/jquery-flipster/dist/jquery.flipster.min.js', array(), '20151215', true );
	wp_enqueue_style( 'flatone-jquery-flipster-style', get_template_directory_uri() . '/libs/jquery-flipster/dist/jquery.flipster.min.css');
	
	// wp_enqueue_style('font-awesome-47', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css');
	

	wp_enqueue_script( 'flatone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'flatone-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'flatone-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	wp_enqueue_style( 'flatone-style', get_stylesheet_uri_dev() );
}
add_action( 'wp_enqueue_scripts', 'flatone_scripts' );


function flatone_content_slider_pro()
{
    function flatone_content_slider_pro_shortcode($atts = [], $content = null)
    {
    	$atts = array_change_key_case((array)$atts, CASE_LOWER);
    	
    	if (!isset($atts['slider'])) {
        	return '<code>missing attr: slider<code>';
    	}
    	
    	$post  = get_post( $atts['slider'] );
    	
    	$items = get_field('item', $atts['slider']);
    	
    	if (!isset($post) || $post->post_type != 'flatone_slider') {
        	return '<code>post type must be "flatone_slider", you may input an invalid slider id.<code>';
    	}
    	
    	$html = '<div class="flatone-slider">';
    	
    	if (!isset($atts['type']) || $atts['type'] == 'basic') {
			$thumbnails = '<div class="sp-thumbnails">';
			
	    	$html .= '<div class="wraper">';
	    	$html .= '<div class="slider-pro">';
		    	$html .= '<div class="sp-slides">';
		    		foreach($items as $item) {
		    			$html .= '<div class="sp-slide">';
		    				$html .= '<img class="sp-image" src="' . wp_get_attachment_url($item['image']) . '">';
		    			$html .= '</div>';
		    			
		    			$thumbnails .= '<div class="sp-thumbnail">';
		    				// $thumbnails .= '<div class="sp-thumbnail-image-container"> <img class="sp-thumbnail-image" src="http://bqworks.com/slider-pro/images/image10_thumbnail.jpg"/> </div>';
			    			$thumbnails .= '<div class="sp-thumbnail-text">';
			    				$thumbnails .= '<div class="sp-thumbnail-description">' . $item['description']  . '<div>';
			    				$thumbnails .= '<a class="sp-thumbnail-title" href="' . $item['link'] . '"><span class="fa fa-mail-reply-all" aria-hidden="true"></span></a>';
			    			$thumbnails .= '</div>';
		    			$thumbnails .= '</div>';
		    		}
		    	$html .= '</div>';
	    	
	    	$thumbnails .= '</div>';
	    	
	    	$html .= $thumbnails;
		    	
	    	$html .= '</div>';
	    	$html .= '</div>';
    	} else if ($atts['type'] == '3d') {
    		$html .= '<div class="flipster-3d">';
    		$html .= '<ul>';
    		foreach($items as $item) {
    			$html .= '<li>';
	    			$html .= '<a href="' . $item['link'] . '">';
	    				$html .= '<div class="item">';
	    				$html .= '<div class="description">' . $item['description'] . '</div>';
	    				$html .= '<div class="image" style="background-image: url(' . wp_get_attachment_url($item['image']) . ')">';
	    				$html .= '</div>';
	    			$html .= '</a>';
    			$html .= '</li>';
    		}
    		$html .= '</ul>';
    		$html .= '</div>';
    	}
    	
    	$html .= '</div>';
    	
        return $html;
    }
    add_shortcode('flatone_slider', 'flatone_content_slider_pro_shortcode');
}
add_action('init', 'flatone_content_slider_pro');

function flatone_slider_register() {

	/**
	 * Post Type: Flatone Sliders.
	 */

	$labels = [
		"name" => __( "Flatone Sliders", "flatone" ),
		"singular_name" => __( "Flatone Slider", "flatone" ),
		"menu_name" => __( "Flatone Sliders", "flatone" ),
		"all_items" => __( "All Sliders", "flatone" ),
	];

	$args = [
		"label" => __( "Flatone Sliders", "flatone" ),
		"labels" => $labels,
		"description" => "",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"delete_with_user" => false,
		"show_in_rest" => true,
		"rest_base" => "",
		"rest_controller_class" => "WP_REST_Posts_Controller",
		"has_archive" => false,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => false,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => false,
		"rewrite" => [ "slug" => "flatone_slider", "with_front" => true ],
		"query_var" => true,
		"menu_icon" => "dashicons-images-alt2",
		"supports" => [ "title", 'custom-fields' ],
	];

	register_post_type( "flatone_slider", $args );
}

add_action( 'init', 'flatone_slider_register' );


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
