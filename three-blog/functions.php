<?php
/**
 * Three Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package three_blog
 */

if ( ! function_exists( 'three_blog_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function three_blog_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Three Blog, use a find and replace
		 * to change 'three-blog' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'three-blog', get_template_directory() . '/languages' );

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
			'primary_menu' 		=> esc_html__( 'Primary Menu', 'three-blog' ),
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
		add_theme_support( 'custom-background', apply_filters( 'three_blog_custom_background_args', array(
			'default-color' => 'fff',
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

		/*
		* This theme styles the visual editor to resemble the theme style,
		* specifically font, colors, icons, and column width.
		*/
		add_editor_style( array( '/assets/css/editor-style.css', three_blog_get_fonts_url() ) );

		// Gutenberg support
		add_theme_support( 'editor-color-palette', array(
	       	array(
				'name' => esc_html__( 'Blue', 'three-blog' ),
				'slug' => 'blue',
				'color' => '#2c7dfa',
	       	),
	       	array(
	           	'name' => esc_html__( 'Green', 'three-blog' ),
	           	'slug' => 'green',
	           	'color' => '#07d79c',
	       	),
	       	array(
	           	'name' => esc_html__( 'Orange', 'three-blog' ),
	           	'slug' => 'orange',
	           	'color' => '#ff8737',
	       	),
	       	array(
	           	'name' => esc_html__( 'Black', 'three-blog' ),
	           	'slug' => 'black',
	           	'color' => '#2f3633',
	       	),
	       	array(
	           	'name' => esc_html__( 'Grey', 'three-blog' ),
	           	'slug' => 'grey',
	           	'color' => '#82868b',
	       	),
	   	));

		add_theme_support( 'align-wide' );
		add_theme_support( 'editor-font-sizes', array(
		   	array(
		       	'name' => esc_html__( 'small', 'three-blog' ),
		       	'shortName' => esc_html__( 'S', 'three-blog' ),
		       	'size' => 12,
		       	'slug' => 'small'
		   	),
		   	array(
		       	'name' => esc_html__( 'regular', 'three-blog' ),
		       	'shortName' => esc_html__( 'M', 'three-blog' ),
		       	'size' => 16,
		       	'slug' => 'regular'
		   	),
		   	array(
		       	'name' => esc_html__( 'larger', 'three-blog' ),
		       	'shortName' => esc_html__( 'L', 'three-blog' ),
		       	'size' => 36,
		       	'slug' => 'larger'
		   	),
		   	array(
		       	'name' => esc_html__( 'huge', 'three-blog' ),
		       	'shortName' => esc_html__( 'XL', 'three-blog' ),
		       	'size' => 48,
		       	'slug' => 'huge'
		   	)
		));
		add_theme_support('editor-styles');
		add_theme_support( 'wp-block-styles' );
	}
endif;
add_action( 'after_setup_theme', 'three_blog_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function three_blog_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'three_blog_content_width', 790 );
}
add_action( 'after_setup_theme', 'three_blog_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function three_blog_widgets_init() {
	register_sidebar( 
		array(
			'name'          => esc_html__( 'Sidebar', 'three-blog' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'three-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		) 
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 1', 'three-blog' ),
			'id'            => 'sidebar-2',
			'description'   => __( 'Add widgets here to appear in your footer.', 'three-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 2', 'three-blog' ),
			'id'            => 'sidebar-3',
			'description'   => __( 'Add widgets here to appear in your footer.', 'three-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => __( 'Footer 3', 'three-blog' ),
			'id'            => 'sidebar-4',
			'description'   => __( 'Add widgets here to appear in your footer.', 'three-blog' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'three_blog_widgets_init' );

/**
* Enqueue theme fonts.
*/
function three_blog_fonts() {
	$fonts_url = three_blog_get_fonts_url();

	// Load Fonts if necessary.
	if ( $fonts_url ) {
		require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );
		wp_enqueue_style( 'three-blog-fonts', wptt_get_webfont_url( $fonts_url ), array(), null );
	}
}
add_action( 'wp_enqueue_scripts', 'three_blog_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'three_blog_fonts', 1 );

/**
 * Retrieve webfont URL to load fonts locally.
 */
function three_blog_get_fonts_url() {
	$font_families = array(
		'Montserrat:300,400,500,600,700',
	);

	$query_args = array(
		'family'  => urlencode( implode( '|', $font_families ) ),
		'subset'  => urlencode( 'latin,latin-ext' ),
		'display' => urlencode( 'swap' ),
	);

	return apply_filters( 'three_blog_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}

/**
 * Enqueue scripts and styles.
 */
function three_blog_scripts() {

	wp_enqueue_style( 'three-blog-blocks', get_template_directory_uri() . '/assets/css/blocks.css' );

	wp_enqueue_style( 'three-blog-style', get_stylesheet_uri() );

	wp_enqueue_script( 'three-blog-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'three-blog-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array('jquery'), '1.0', true );
	
	$three_blog_l10n = array(
		'quote'          => three_blog_get_svg( array( 'icon' => 'angle-down' ) ),
		'expand'         => esc_html__( 'Expand child menu', 'three-blog' ),
		'collapse'       => esc_html__( 'Collapse child menu', 'three-blog' ),
		'icon'           => three_blog_get_svg( array( 'icon' => 'angle-down', 'fallback' => true ) ),
	);
	
	wp_localize_script( 'three-blog-navigation', 'three_blog_l10n', $three_blog_l10n );

	wp_enqueue_script( 'three-blog-custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'three_blog_scripts' );

/**
 * Enqueue editor styles for Gutenberg
 *
 * @since Three Blog 1.0.0
 */
function three_blog_block_editor_styles() {
	// Block styles.
	wp_enqueue_style( 'three-blog-block-editor-style', get_theme_file_uri( '/assets/css/editor-blocks.css' ) );
	// Add custom fonts.
	wp_enqueue_style( 'three-blog-fonts', three_blog_get_fonts_url(), array(), null );
}
add_action( 'enqueue_block_editor_assets', 'three_blog_block_editor_styles' );

/**
 * Removing category text from category page.
 */
function three_blog_category_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    }
    return $title;
}
add_filter( 'get_the_archive_title', 'three_blog_category_title' );

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
 * SVG icons functions and filters.
 */
require get_template_directory() . '/inc/icon-functions.php';

