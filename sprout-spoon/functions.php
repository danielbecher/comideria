<?php
//////////////////////////////////////////////////////////////////
// Set Content Width
//////////////////////////////////////////////////////////////////
if ( ! isset( $content_width ) )
	$content_width = 1080;

//////////////////////////////////////////////////////////////////
// Theme set up
//////////////////////////////////////////////////////////////////
add_action( 'after_setup_theme', 'solopine_theme_setup' );

if ( !function_exists('solopine_theme_setup') ) {

	function solopine_theme_setup() {
	
		// Register navigation menu
		register_nav_menus(
			array(
				'main-menu' => esc_html__('Primary Menu', 'sprout-spoon'),
			)
		);
		
		// Title tag
		add_theme_support( 'title-tag' );
		
		// Localization support
		load_theme_textdomain('sprout-spoon', get_template_directory() . '/lang');
		
		// Post formats
		add_theme_support( 'post-formats', array( 'gallery', 'video', 'audio' ) );
		
		// Featured image
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'sprout_spoon_full-thumb', 1080, 0, true );
		add_image_size( 'sprout_spoon_misc-thumb', 350, 460, true );
		add_image_size( 'sprout_spoon_col2-thumb', 530, 700, true );
		add_image_size( 'sprout_spoon_side-thumb', 350, 300, true );
		
		// Feed Links
		add_theme_support( 'automatic-feed-links' );
		
	}

}

//////////////////////////////////////////////////////////////////
// Register & enqueue styles/scripts
//////////////////////////////////////////////////////////////////

add_action( 'wp_enqueue_scripts','solopine_load_scripts' );

function solopine_load_scripts() {

	// Register scripts and styles
	wp_enqueue_style('sprout_spoon_style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_style('fontawesome-css', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('bxslider-css', get_template_directory_uri() . '/css/jquery.bxslider.css');
	if(!get_theme_mod('sprout_spoon_responsive')) {
	wp_enqueue_style('sprout_spoon_respon', get_template_directory_uri() . '/css/responsive.css');
	}
	
	wp_enqueue_script('sticky', get_template_directory_uri() . '/js/jquery.sticky.js', 'jquery', '', true);
	wp_enqueue_script('bxslider', get_template_directory_uri() . '/js/jquery.bxslider.min.js', 'jquery', '', true);
	wp_enqueue_script('slicknav', get_template_directory_uri() . '/js/jquery.slicknav.min.js', 'jquery', '', true);
	wp_enqueue_script('print', get_template_directory_uri() . '/js/jQuery.print.js', 'jquery', '', true);
	wp_enqueue_script('fitvids', get_template_directory_uri() . '/js/fitvids.js', 'jquery', '', true);
	wp_enqueue_script('sprout_spoon_scripts', get_template_directory_uri() . '/js/solopine.js', 'jquery', '', true);
	
	// Register Fonts
	function solopine_fonts_url() {
		$font_url = '';
		
		/*
		Translators: If there are characters in your language that are not supported
		by chosen font(s), translate this to 'off'. Do not translate into your own language.
		 */
		if ( 'off' !== _x( 'on', 'Google font: on or off', 'sprout-spoon' ) ) {
			$font_url = add_query_arg( 'family', urlencode( 'Source Sans Pro:400,600,700,400italic,700italic|Crimson Text:400,700,700italic,400italic&subset=latin,latin-ext' ), "//fonts.googleapis.com/css" );
		}
		return $font_url;
	}
	// Enqueue fonts
	wp_enqueue_style( 'solopine-fonts', solopine_fonts_url(), array(), '1.0.0' );
	
	if (is_singular() && get_option('thread_comments'))	wp_enqueue_script('comment-reply');
	
}

//////////////////////////////////////////////////////////////////
// Include files
//////////////////////////////////////////////////////////////////

// Theme Options
include( get_template_directory() . '/functions/customizer/sp_custom_controller.php');
include( get_template_directory() . '/functions/customizer/sp_customizer_settings.php');
include( get_template_directory() . '/functions/customizer/sp_customizer_style.php');

// Widgets
include( get_template_directory() . '/inc/widgets/about_widget.php');
include( get_template_directory() . '/inc/widgets/social_widget.php');
include( get_template_directory() . '/inc/widgets/facebook_widget.php');
include( get_template_directory() . '/inc/widgets/ad_widget.php');
include( get_template_directory() . '/inc/widgets/promo_widget.php');
include( get_template_directory() . '/inc/widgets/post_widget.php');

// TGM
include( get_template_directory() . '/sp-tgm.php');


//////////////////////////////////////////////////////////////////
// Register widgets
//////////////////////////////////////////////////////////////////
if ( function_exists('register_sidebar') ) {
	register_sidebar(array(
		'name' => esc_html__('Sidebar', 'sprout-spoon'),
		'id' => 'sidebar-1',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'description' => esc_html__('Widgets here will appear vertically to the right of your content.', 'sprout-spoon'),
	));
	register_sidebar(array(
		'name' => esc_html__('Instagram Footer', 'sprout-spoon'),
		'id' => 'sidebar-2',
		'before_widget' => '<div id="%1$s" class="instagram-widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="instagram-title">',
		'after_title' => '</h4>',
		'description' => esc_html__('Use the "Instagram" widget here. IMPORTANT: For best result set number of photos to 12.', 'sprout-spoon'),
	));
	register_sidebar(array(
		'name' => esc_html__('Widget Area under Featured Area', 'sprout-spoon'),
		'id' => 'sidebar-3',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'description' => esc_html__('Intended for newsletter widget or banner ads', 'sprout-spoon'),
	));
	register_sidebar(array(
		'name' => esc_html__('Widget Area under Single Post', 'sprout-spoon'),
		'id' => 'sidebar-4',
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
		'description' => esc_html__('Intended for newsletter widget or banner ads', 'sprout-spoon'),
	));
}

//////////////////////////////////////////////////////////////////
// COMMENTS LAYOUT
//////////////////////////////////////////////////////////////////

	function solopine_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		
		?>
		<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
			
			<div class="thecomment">
						
				<div class="author-img">
					<?php echo get_avatar($comment,$args['avatar_size']); ?>
				</div>
				
				<div class="comment-text">
					<span class="reply">
						<?php comment_reply_link(array_merge( $args, array('reply_text' => esc_html__('Responder', 'sprout-spoon'), 'depth' => $depth, 'max_depth' => $args['max_depth'])), $comment->comment_ID); ?>
						<?php edit_comment_link(esc_html__('Edit', 'sprout-spoon')); ?>
					</span>
					<h6 class="author"><?php echo get_comment_author_link(); ?></h6>
					<span class="date"><?php printf(esc_html__('%1$s at %2$s', 'sprout-spoon'), get_comment_date(),  get_comment_time()) ?></span>
					<?php if ($comment->comment_approved == '0') : ?>
						<em><i class="icon-info-sign"></i> <?php esc_html_e('Comment awaiting approval', 'sprout-spoon'); ?></em>
						<br />
					<?php endif; ?>
					<?php comment_text(); ?>
				</div>
						
			</div>
			
			
		</li>

		<?php 
	}

//////////////////////////////////////////////////////////////////
// PAGINATION
//////////////////////////////////////////////////////////////////
function solopine_pagination() {
	
	?>
	
	<div class="pagination <?php if(get_theme_mod('sprout_spoon_home_layout') == 'grid2' || get_theme_mod('sprout_spoon_home_layout') == 'full_grid2' || get_theme_mod('sprout_spoon_home_layout') == 'grid3' || get_theme_mod('sprout_spoon_home_layout') == 'full_grid3') : ?>pagi-grid<?php endif; ?>">
		
		<div class="older"><?php next_posts_link(wp_kses( __( 'Older Posts <i class="fa fa-angle-right"></i>', 'sprout-spoon' ), array( 'i' => array( 'class' => array() ) ) )); ?></div>
		<div class="newer"><?php previous_posts_link(wp_kses( __( '<i class="fa fa-angle-left"></i> Newer Posts', 'sprout-spoon' ), array( 'i' => array( 'class' => array() ) ) )); ?></div>
		
	</div>
					
	<?php
	
}
	
//////////////////////////////////////////////////////////////////
// PREVENT SCROLL ON READ MORE LINK
//////////////////////////////////////////////////////////////////
function sprout_spoon_remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );
	return $link;
}
add_filter( 'the_content_more_link', 'sprout_spoon_remove_more_link_scroll' );
	
//////////////////////////////////////////////////////////////////
// AUTHOR SOCIAL LINKS
//////////////////////////////////////////////////////////////////
function solopine_contactmethods( $contactmethods ) {

	$contactmethods['twitter']   = 'Twitter Username';
	$contactmethods['facebook']  = 'Facebook Username';
	$contactmethods['google']    = 'Google Plus Username';
	$contactmethods['tumblr']    = 'Tumblr Username';
	$contactmethods['instagram'] = 'Instagram Username';
	$contactmethods['pinterest'] = 'Pinterest Username';

	return $contactmethods;
}
add_filter('user_contactmethods','solopine_contactmethods',10,1);

//////////////////////////////////////////////////////////////////
// THE EXCERPT
//////////////////////////////////////////////////////////////////
function sprout_spoon_custom_excerpt_length( $length ) {
	return 200;
}
add_filter( 'excerpt_length', 'sprout_spoon_custom_excerpt_length', 999 );

function sp_string_limit_words($string, $word_limit)
{
	$words = explode(' ', $string, ($word_limit + 1));
	
	if(count($words) > $word_limit) {
		array_pop($words);
	}
	
	return implode(' ', $words);
}

//////////////////////////////////////////////////////////////////
// HEX to RGB function
//////////////////////////////////////////////////////////////////
function sprout_spoon_hex2rgb($hex, $opacity = "0.4") {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
	  $r = hexdec(substr($hex,0,1).substr($hex,0,1));
	  $g = hexdec(substr($hex,1,1).substr($hex,1,1));
	  $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
	  $r = hexdec(substr($hex,0,2));
	  $g = hexdec(substr($hex,2,2));
	  $b = hexdec(substr($hex,4,2));
   }

   echo $r . ',' . $g . ',' . $b . ',' . $opacity;
}

//////////////////////////////////////////////////////////////////
// TWITTER AMPERSAND ENTITY DECODE
//////////////////////////////////////////////////////////////////
function solopine_social_title( $title ) {
    $title = html_entity_decode( $title );
    $title = urlencode( $title );
    return $title;
}
