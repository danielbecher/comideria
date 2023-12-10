<?php

//////////////////////////////////////////////////////////////////
// Customizer - Add Custom Styling
//////////////////////////////////////////////////////////////////
function solopine_customizer_style()
{
	wp_enqueue_style('solopine-customizer-css', get_stylesheet_directory_uri() . '/functions/customizer/css/customizer.css');
}
add_action('customize_controls_print_styles', 'solopine_customizer_style');

//////////////////////////////////////////////////////////////////
// Customizer - Add Settings
//////////////////////////////////////////////////////////////////
function solopine_register_theme_customizer( $wp_customize ) {
 	
	// Add Sections/Panels
		
		$wp_customize->add_section( 'solopine_new_section_custom_css' , array(
			'title'      => esc_html__( 'Custom CSS', 'sprout-spoon' ),
			'description'=> esc_html__( 'Add your custom CSS which will overwrite the theme CSS', 'sprout-spoon' ),
			'priority'   => 98,
		) );
		
		$wp_customize->add_panel( 'panel_color', array(
			'priority'       => 97,
			'capability'     => 'edit_theme_options',
			'title'          => esc_html__( 'Color and Style Settings', 'sprout-spoon' ),
		) );
			
			$wp_customize->add_section( 'solopine_new_section_color_misc' , array(
				'title'      => esc_html__( 'MISC Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 11,
				'panel'  => 'panel_color',
			) );
			
			$wp_customize->add_section( 'solopine_new_section_color_newsletter_color' , array(
				'title'      => esc_html__( 'Newsletter Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 10,
				'panel'  => 'panel_color',
			) );
			
			$wp_customize->add_section( 'solopine_new_section_color_post_color' , array(
				'title'      => esc_html__( 'Post Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 9,
				'panel'  => 'panel_color',
			) );
			
			$wp_customize->add_section( 'solopine_new_section_color_footer' , array(
				'title'      => esc_html__( 'Footer Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 8,
				'panel'  => 'panel_color',
			) );
			
			$wp_customize->add_section( 'solopine_new_section_color_sidebar' , array(
				'title'      => esc_html__( 'Sidebar Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 7,
				'panel'  => 'panel_color',
			) );
			
			$wp_customize->add_section( 'solopine_new_section_color_featured' , array(
				'title'      => esc_html__( 'Featured Area Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 6,
				'panel'  => 'panel_color',
			) );
				$wp_customize->add_section( 'solopine_new_section_color_mobile_menu' , array(
				'title'      => esc_html__( 'Mobile Menu Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 5,
				'panel'  => 'panel_color',
			) );
			$wp_customize->add_section( 'solopine_new_section_color_menu' , array(
				'title'      => esc_html__( 'Menu Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 4,
				'panel'  => 'panel_color',
			) );
			
			$wp_customize->add_section( 'solopine_new_section_color_header' , array(
				'title'      => esc_html__( 'Header Colors', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 3,
				'panel'  => 'panel_color',
			) );
			
			$wp_customize->add_section( 'solopine_new_section_color_wrapper' , array(
				'title'      => esc_html__( 'Wrapper style', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 2,
				'panel'  => 'panel_color',
			) );
			
			$wp_customize->add_section( 'solopine_new_section_color_background' , array(
				'title'      => esc_html__( 'Background Color/Image', 'sprout-spoon' ),
				'description'=> '',
				'priority'   => 1,
				'panel'  => 'panel_color',
			) );
		
		$wp_customize->add_section( 'solopine_new_section_footer' , array(
			'title'      => esc_html__( 'Footer Settings', 'sprout-spoon' ),
			'description'=> '',
			'priority'   => 96,
		) );
		
		$wp_customize->add_section( 'solopine_new_section_social' , array(
			'title'      => esc_html__( 'Social Media Settings', 'sprout-spoon' ),
			'description'=> esc_html__( 'Enter your social media usernames. Icons will not show if left blank.', 'sprout-spoon' ),
			'priority'   => 95,
		) );
		
		$wp_customize->add_section( 'solopine_new_section_page' , array(
			'title'      => esc_html__( 'Page Settings', 'sprout-spoon' ),
			'description'=> '',
			'priority'   => 94,
		) );
		
		$wp_customize->add_section( 'solopine_new_section_post' , array(
			'title'      => esc_html__( 'Post Settings', 'sprout-spoon' ),
			'description'=> '',
			'priority'   => 93,
		) );
		
		$wp_customize->add_section( 'solopine_new_section_featured' , array(
			'title'      => esc_html__( 'Featured Area Settings', 'sprout-spoon' ),
			'description'=> '',
			'priority'   => 92,
		) );
		
		$wp_customize->add_section( 'solopine_new_section_logo_header' , array(
			'title'      => esc_html__( 'Logo and Header Settings', 'sprout-spoon' ),
			'description'=> '',
			'priority'   => 91,
		) );
		
		$wp_customize->add_section( 'solopine_new_section_general' , array(
			'title'      => esc_html__( 'General Settings', 'sprout-spoon' ),
			'description'=> '',
			'priority'   => 90,
		) );
	
	// Add Setting
	
		// General

		
		$wp_customize->add_setting(
			'sprout_spoon_responsive',
			array(
	            'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
		);
		
		$wp_customize->add_setting(
	        'sprout_spoon_home_layout',
	        array(
	            'default'     => 'full',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		
		$wp_customize->add_setting(
	        'sprout_spoon_archive_layout',
	        array(
	            'default'     => 'full',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		
		$wp_customize->add_setting(
	        'sprout_spoon_sidebar_homepage',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		$wp_customize->add_setting(
	        'sprout_spoon_sidebar_archive',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		$wp_customize->add_setting(
	        'sprout_spoon_post_summary',
	        array(
	            'default'     => 'full',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		
		// Header & Logo
		$wp_customize->add_setting(
	        'sprout_spoon_logo',
			array(
	            'sanitize_callback'     => 'esc_url_raw'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_header_padding_top',
	        array(
	            'default'     => '65',
				'sanitize_callback'     => 'solopine_sanitize_number'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_header_padding_bottom',
	        array(
	            'default'     => '60',
				'sanitize_callback'     => 'solopine_sanitize_number'
	        )
	    );
		
		$wp_customize->add_setting(
	        'sprout_spoon_header_social',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		$wp_customize->add_setting(
	        'sprout_spoon_header_search',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		// Featured area
		$wp_customize->add_setting(
	        'sprout_spoon_featured_slider',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_featured_cat',
			array(
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_featured_id',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_featured_show_cat',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_featured_show_title',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		// Post Settings
		$wp_customize->add_setting(
	        'sprout_spoon_post_tags',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_author',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_related',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_share',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_share_author',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_comment_link',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_thumb',
	        array(
	            'default'     => 'display',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_date',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_cat',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_post_pagination',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		// Page
		$wp_customize->add_setting(
	        'sprout_spoon_page_title',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_page_share',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		// Social Media
		$wp_customize->add_setting(
	        'sprout_spoon_facebook',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_twitter',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_instagram',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_pinterest',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_tumblr',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_bloglovin',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_tumblr',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_google',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_youtube',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
	    $wp_customize->add_setting(
	        'sprout_spoon_dribbble',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
	    $wp_customize->add_setting(
	        'sprout_spoon_soundcloud',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
	    $wp_customize->add_setting(
	        'sprout_spoon_vimeo',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_linkedin',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_rss',
	        array(
	            'default'     => '',
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		
		// Footer
		$wp_customize->add_setting(
	        'sprout_spoon_footer_copyright_left',
	        array(
	            'default'     => esc_html__( 'Copyright 2016 - <a href="http://solopine.com">Solo Pine</a>. All Rights Reserved.', 'sprout-spoon' ),
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_footer_copyright_right',
	        array(
	            'default'     => esc_html__( 'Designed & Developed by <a href="http://solopine.com">SoloPine.com</a>', 'sprout-spoon' ),
				'sanitize_callback'     => 'wp_kses_post'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_footer_share',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		$wp_customize->add_setting(
	        'sprout_spoon_footer_top',
	        array(
	            'default'     => false,
				'sanitize_callback'     => 'solopine_sanitize_checkbox'
	        )
	    );
		
		// Colors
		
			// Background Colors
			
			$wp_customize->add_setting(
				'sprout_spoon_bg_color',
				array(
					'default'     => '#F7F7F3',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_bg_image',
				array(
	            'sanitize_callback'     => 'esc_url_raw'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_bg_repeat',
				array(
					'default'     => 'repeat',
					'sanitize_callback'     => 'wp_kses_post'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_bg_size',
				array(
					'default'     => 'auto',
					'sanitize_callback'     => 'wp_kses_post'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_bg_position',
				array(
					'default'     => 'center center',
					'sanitize_callback'     => 'wp_kses_post'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_bg_attachment',
				array(
					'default'     => 'scroll',
					'sanitize_callback'     => 'wp_kses_post'
				)
			);
			
			// Wrapper
			$wp_customize->add_setting(
				'sprout_spoon_wrapper_margin',
				array(
					'default'     => '30',
					'sanitize_callback'     => 'solopine_sanitize_number'
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_wrapper_radius',
				array(
					'default'     => '10',
					'sanitize_callback'     => 'solopine_sanitize_number'
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_wrapper_shadow',
				array(
					'default'     => false,
					'sanitize_callback'     => 'solopine_sanitize_checkbox'
				)
			);
			
			// Colors: Header
			$wp_customize->add_setting(
				'sprout_spoon_header_bg_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_header_bg_image',
				array(
					'sanitize_callback'     => 'esc_url_raw'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_header_bg_repeat',
				array(
					'default'     => 'repeat',
					'sanitize_callback'     => 'wp_kses_post'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_header_bg_size',
				array(
					'default'     => 'auto',
					'sanitize_callback'     => 'wp_kses_post'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_header_bg_position',
				array(
					'default'     => 'center center',
					'sanitize_callback'     => 'wp_kses_post'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_header_social_color',
				array(
					'default'     => '#b5b5b5',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_header_social_color_hover',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_header_search_text',
				array(
					'default'     => '#aaaaaa',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_header_search_icon',
				array(
					'default'     => '#bbbbbb',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Colors: Menu
			$wp_customize->add_setting(
				'sprout_spoon_menu_bg',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_menu_border',
				array(
					'default'     => '#EAE8E0',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_menu_text_color',
				array(
					'default'     => '#65625D',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_menu_text_active',
				array(
					'default'     => '#444444',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_menu_drop_arrow',
				array(
					'default'     => '#b5b5b5',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_drop_bg',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_drop_border',
				array(
					'default'     => '#e5e5e5',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_drop_text_color',
				array(
					'default'     => '#827E79',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_drop_text_hover_bg',
				array(
					'default'     => '#f7f7f7',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_drop_text_hover_color',
				array(
					'default'     => '#827E79',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Colors: Mobile Menu
		$wp_customize->add_setting(
			'sprout_spoon_mobile_burger',
			array(
				'default'     => '#b5b5b5',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_setting(
			'sprout_spoon_mobile_dropdown_bg',
			array(
				'default'     => '#ffffff',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_setting(
			'sprout_spoon_mobile_dropdown_border',
			array(
				'default'     => '#EAE8E0',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_setting(
			'sprout_spoon_mobile_dropdown_text',
			array(
				'default'     => '#65625D',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_setting(
			'sprout_spoon_mobile_dropdown_text_hover',
			array(
				'default'     => '#65625D',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_setting(
			'sprout_spoon_mobile_dropdown_text_bg_hover',
			array(
				'default'     => '#f3f3f3',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		
		$wp_customize->add_setting(
			'sprout_spoon_mobile_social_color',
			array(
				'default'     => '#b5b5b5',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
		$wp_customize->add_setting(
			'sprout_spoon_mobile_social_color_hover',
			array(
				'default'     => '#000000',
				'sanitize_callback' => 'sanitize_hex_color',
			)
		);
			
			// Featured Area Colors
			$wp_customize->add_setting(
				'sprout_spoon_featured_bg',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_featured_bg_trans',
				array(
					'default'     => '0.40',
					'sanitize_callback'     => 'solopine_sanitize_number'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_featured_bg_trans_hover',
				array(
					'default'     => '0.72',
					'sanitize_callback'     => 'solopine_sanitize_number'
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_featured_title_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_featured_cat_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_featured_cat_sep_color',
				array(
					'default'     => '#b5b5b5',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Sidebar
			$wp_customize->add_setting(
				'sprout_spoon_sidebar_widget_border',
				array(
					'default'     => '#dddddd',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_sidebar_title_color',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_sidebar_social_icon_bg',
				array(
					'default'     => '#95AF7E',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_sidebar_social_icon_color',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Footer
			$wp_customize->add_setting(
				'sprout_spoon_footer_social_color',
				array(
					'default'     => '#a5a5a5',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_footer_social_color_hover',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_footer_copyright_color',
				array(
					'default'     => '#a5a5a5',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_footer_top_color',
				array(
					'default'     => '#666666',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Colors: Posts
			$wp_customize->add_setting(
				'sprout_spoon_post_title',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_category_color',
				array(
					'default'     => '#95AF7E',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_text',
				array(
					'default'     => '#4C4A47',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_h',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_more_color',
				array(
					'default'     => '#95AF7E',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_share_color',
				array(
					'default'     => '#a5a5a5',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_share_color_hover',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_comment_color',
				array(
					'default'     => '#a5a5a5',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_comment_color_hover',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_tag_bg',
				array(
					'default'     => '#f2f2f2',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_tag_text',
				array(
					'default'     => '#777777',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_tag_bg_hover',
				array(
					'default'     => '#95AF7E',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_post_tag_text_hover',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Newsletter
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_bg',
				array(
					'default'     => '#f4f4f4',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_title',
				array(
					'default'     => '#333333',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_text',
				array(
					'default'     => '#999999',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_input_bg',
				array(
					'default'     => '#fefefe',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_input_text',
				array(
					'default'     => '#999999',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_submit_bg',
				array(
					'default'     => '#95AF7E',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_submit_text',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_submit_bg_hover',
				array(
					'default'     => '#333333',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_newsletter_submit_text_hover',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// MISC colors
			$wp_customize->add_setting(
				'sprout_spoon_misc_accent',
				array(
					'default'     => '#95AF7E',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			$wp_customize->add_setting(
				'sprout_spoon_misc_archive_bg',
				array(
					'default'     => '#ffffff',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_misc_archive_border',
				array(
					'default'     => '#EAE8E0',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_misc_archive_browsing',
				array(
					'default'     => '#999999',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			$wp_customize->add_setting(
				'sprout_spoon_misc_archive_title',
				array(
					'default'     => '#000000',
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);
			
			// Custom CSS
			$wp_customize->add_setting(
				'sprout_spoon_custom_css',
				array(
					'sanitize_callback'     => 'wp_kses_post'
				)
			);
			
	// Add Control
	
		// General
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'responsive',
				array(
					'label'      => esc_html__( 'Disable Responsive', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_general',
					'settings'   => 'sprout_spoon_responsive',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'home_layout',
				array(
					'label'          => esc_html__( 'Homepage Layout', 'sprout-spoon' ),
					'section'        => 'solopine_new_section_general',
					'settings'       => 'sprout_spoon_home_layout',
					'type'           => 'radio',
					'priority'	 => 3,
					'choices'        => array(
						'full'   => esc_html__( 'Full Post Layout', 'sprout-spoon' ),
						'grid3'  => esc_html__( '3 Column Grid Post Layout', 'sprout-spoon' ),
						'full_grid3'  => esc_html__( '1 Full Post then 3 Column Grid Layout', 'sprout-spoon' ),
						'grid2'  => esc_html__( '2 Column Grid Post Layout', 'sprout-spoon' ),
						'full_grid2'  => esc_html__( '1 Full Post then 2 Column Grid Layout', 'sprout-spoon' ),
						'list'  => esc_html__( 'List Layout', 'sprout-spoon' ),
						'full_list'  => esc_html__( '1 Full Post then List Layout', 'sprout-spoon' ),
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'archive_layout',
				array(
					'label'          => esc_html__( 'Archive Layout', 'sprout-spoon' ),
					'section'        => 'solopine_new_section_general',
					'settings'       => 'sprout_spoon_archive_layout',
					'type'           => 'radio',
					'priority'	 => 3,
					'choices'        => array(
						'full'   => esc_html__( 'Full Post Layout', 'sprout-spoon' ),
						'grid3'  => esc_html__( '3 Column Grid Post Layout', 'sprout-spoon' ),
						'full_grid3'  => esc_html__( '1 Full Post then 3 Column Grid Layout', 'sprout-spoon' ),
						'grid2'  => esc_html__( '2 Column Grid Post Layout', 'sprout-spoon' ),
						'full_grid2'  => esc_html__( '1 Full Post then 2 Column Grid Layout', 'sprout-spoon' ),
						'list'  => esc_html__( 'List Layout', 'sprout-spoon' ),
						'full_list'  => esc_html__( '1 Full Post then List Layout', 'sprout-spoon' ),
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_homepage',
				array(
					'label'      => esc_html__( 'Disable Sidebar on Homepage', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_general',
					'settings'   => 'sprout_spoon_sidebar_homepage',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'sidebar_archive',
				array(
					'label'      => esc_html__( 'Disable Sidebar on Archives', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_general',
					'settings'   => 'sprout_spoon_sidebar_archive',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_summary',
				array(
					'label'          => esc_html__( 'Homepage/Archive Post Summary Type', 'sprout-spoon' ),
					'section'        => 'solopine_new_section_general',
					'settings'       => 'sprout_spoon_post_summary',
					'type'           => 'radio',
					'priority'	 => 8,
					'choices'        => array(
						'full'   => esc_html__( 'Use Read More Tag', 'sprout-spoon' ),
						'excerpt'  => esc_html__( 'Use Excerpt', 'sprout-spoon' ),
					)
				)
			)
		);
		
		// Header and Logo
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'upload_logo',
				array(
					'label'      => esc_html__( 'Upload Logo', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'sprout_spoon_logo',
					'priority'	 => 1
				)
			)
		);
		
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_top',
				array(
					'label'      => esc_html__( 'Top Header Padding', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'sprout_spoon_header_padding_top',
					'type'		 => 'number',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new Customize_Number_Control(
				$wp_customize,
				'header_padding_bottom',
				array(
					'label'      => esc_html__( 'Bottom Header Padding', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'sprout_spoon_header_padding_bottom',
					'type'		 => 'number',
					'priority'	 => 3
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'header_social',
				array(
					'label'      => esc_html__( 'Hide Social Icons in Header', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'sprout_spoon_header_social',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'header_search',
				array(
					'label'      => esc_html__( 'Hide Search Bar in Header', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_logo_header',
					'settings'   => 'sprout_spoon_header_search',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		
		// Featured area
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_slider',
				array(
					'label'      => esc_html__( 'Enable Featured Area', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_featured',
					'settings'   => 'sprout_spoon_featured_slider',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Category_Control(
				$wp_customize,
				'featured_cat',
				array(
					'label'    => esc_html__( 'Select Featured Category', 'sprout-spoon' ),
					'settings' => 'sprout_spoon_featured_cat',
					'section'  => 'solopine_new_section_featured',
					'priority'	 => 3
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_id',
				array(
					'label'      => esc_html__( 'Select featured post/page IDs', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_featured',
					'settings'   => 'sprout_spoon_featured_id',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_show_cat',
				array(
					'label'      => esc_html__( 'Hide Categories', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_featured',
					'settings'   => 'sprout_spoon_featured_show_cat',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'featured_show_title',
				array(
					'label'      => esc_html__( 'Hide Title', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_featured',
					'settings'   => 'sprout_spoon_featured_show_title',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		
		// Post Settings
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_thumb',
				array(
					'label'          => esc_html__( 'Featured Image (On Top of Post)', 'sprout-spoon' ),
					'section'        => 'solopine_new_section_post',
					'settings'       => 'sprout_spoon_post_thumb',
					'type'           => 'radio',
					'priority'	 => 1,
					'choices'        => array(
						'display'   => esc_html__( 'Display Featured Image', 'sprout-spoon' ),
						'no_display'  => esc_html__( 'Hide Featured Image', 'sprout-spoon' ),
						'ho_display'  => esc_html__( 'Hide Featured Image only on single post pages', 'sprout-spoon' ),
					)
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_cat',
				array(
					'label'      => esc_html__( 'Hide Category', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_cat',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_tags',
				array(
					'label'      => esc_html__( 'Hide Tags', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_tags',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_date',
				array(
					'label'      => esc_html__( 'Hide Date', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_date',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_share_author',
				array(
					'label'      => esc_html__( 'Hide Author Name', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_share_author',
					'type'		 => 'checkbox',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_share',
				array(
					'label'      => esc_html__( 'Hide Share Buttons', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_share',
					'type'		 => 'checkbox',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_comment_link',
				array(
					'label'      => esc_html__( 'Hide Comment Link', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_comment_link',
					'type'		 => 'checkbox',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_author',
				array(
					'label'      => esc_html__( 'Hide Author Box', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_author',
					'type'		 => 'checkbox',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_related',
				array(
					'label'      => esc_html__( 'Hide Related Posts Box', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_related',
					'type'		 => 'checkbox',
					'priority'	 => 9
				)
			)
		);
		
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'post_pagination',
				array(
					'label'      => esc_html__( 'Hide Next/Previous Post Links', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_post',
					'settings'   => 'sprout_spoon_post_pagination',
					'type'		 => 'checkbox',
					'priority'	 => 10
				)
			)
		);
		
		// Page
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_title',
				array(
					'label'      => esc_html__( 'Hide Page Title', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_page',
					'settings'   => 'sprout_spoon_page_title',
					'type'		 => 'checkbox',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'page_share',
				array(
					'label'      => esc_html__( 'Hide Share Buttons', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_page',
					'settings'   => 'sprout_spoon_page_share',
					'type'		 => 'checkbox',
					'priority'	 => 2
				)
			)
		);
		
		// Social Media
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'facebook',
				array(
					'label'      => esc_html__( 'Facebook', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_facebook',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'twitter',
				array(
					'label'      => esc_html__( 'Twitter', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_twitter',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'instagram',
				array(
					'label'      => esc_html__( 'Instagram', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_instagram',
					'type'		 => 'text',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'pinterest',
				array(
					'label'      => esc_html__( 'Pinterest', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_pinterest',
					'type'		 => 'text',
					'priority'	 => 4
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'bloglovin',
				array(
					'label'      => esc_html__( 'Bloglovin', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_bloglovin',
					'type'		 => 'text',
					'priority'	 => 5
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'google',
				array(
					'label'      => esc_html__( 'Google Plus', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_google',
					'type'		 => 'text',
					'priority'	 => 6
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'tumblr',
				array(
					'label'      => esc_html__( 'Tumblr', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_tumblr',
					'type'		 => 'text',
					'priority'	 => 7
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'youtube',
				array(
					'label'      => esc_html__( 'Youtube', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_youtube',
					'type'		 => 'text',
					'priority'	 => 8
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'dribbble',
				array(
					'label'      => esc_html__( 'Dribbble', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_dribbble',
					'type'		 => 'text',
					'priority'	 => 9
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'soundcloud',
				array(
					'label'      => esc_html__( 'Soundcloud', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_soundcloud',
					'type'		 => 'text',
					'priority'	 => 10
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'vimeo',
				array(
					'label'      => esc_html__( 'Vimeo', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_vimeo',
					'type'		 => 'text',
					'priority'	 => 11
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'linkedin',
				array(
					'label'      => esc_html__( 'Linkedin (Use full URL to your Linkedin profile)', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_linkedin',
					'type'		 => 'text',
					'priority'	 => 12
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'rss',
				array(
					'label'      => esc_html__( 'RSS Link', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_social',
					'settings'   => 'sprout_spoon_rss',
					'type'		 => 'text',
					'priority'	 => 13
				)
			)
		);
		
		// Footer
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright_left',
				array(
					'label'      => esc_html__( 'Footer Copyright Text', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_footer',
					'settings'   => 'sprout_spoon_footer_copyright_left',
					'type'		 => 'text',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_copyright_right',
				array(
					'label'      => esc_html__( 'Footer Text (Right side)', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_footer',
					'settings'   => 'sprout_spoon_footer_copyright_right',
					'type'		 => 'text',
					'priority'	 => 2
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_share',
				array(
					'label'      => esc_html__( 'Hide Footer Social Links', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_footer',
					'settings'   => 'sprout_spoon_footer_share',
					'type'		 => 'checkbox',
					'priority'	 => 3
				)
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'footer_top',
				array(
					'label'      => esc_html__( 'Hide Back to Top', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_footer',
					'settings'   => 'sprout_spoon_footer_top',
					'type'		 => 'checkbox',
					'priority'	 => 4
				)
			)
		);
		
		// Colors: Background
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'bg_color',
				array(
					'label'      => esc_html__( 'Background Color', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_color_background',
					'settings'   => 'sprout_spoon_bg_color',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'bg_image',
					array(
						'label'      => esc_html__( 'Background Image', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_background',
						'settings'   => 'sprout_spoon_bg_image',
						'priority'	 => 2
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'bg_repeat',
					array(
						'label'          => esc_html__( 'Background Repeat', 'sprout-spoon' ),
						'section'        => 'solopine_new_section_color_background',
						'settings'       => 'sprout_spoon_bg_repeat',
						'type'           => 'select',
						'priority'	 => 3,
						'choices'        => array(
							'repeat'   => esc_html__( 'Repeat', 'sprout-spoon' ),
							'no-repeat'  => esc_html__( 'No Repeat', 'sprout-spoon' ),
							'repeat-y'  => esc_html__( 'Repeat Y', 'sprout-spoon' ),
							'repeat-x'  => esc_html__( 'Repeat X', 'sprout-spoon' ),
						)
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'bg_size',
					array(
						'label'          => esc_html__( 'Background Size', 'sprout-spoon' ),
						'section'        => 'solopine_new_section_color_background',
						'settings'       => 'sprout_spoon_bg_size',
						'type'           => 'select',
						'priority'	 => 5,
						'choices'        => array(
							'auto'   => esc_html__( 'Auto', 'sprout-spoon' ),
							'cover'  => esc_html__( 'Cover', 'sprout-spoon' ),
							'contain'  => esc_html__( 'Contain', 'sprout-spoon' ),
						)
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'bg_position',
					array(
						'label'          => esc_html__( 'Background Position', 'sprout-spoon' ),
						'section'        => 'solopine_new_section_color_background',
						'settings'       => 'sprout_spoon_bg_position',
						'type'           => 'select',
						'priority'	 => 6,
						'choices'        => array(
							'center center'   => esc_html__( 'Center Center', 'sprout-spoon' ),
							'center top'  => esc_html__( 'Center Top', 'sprout-spoon' ),
							'center bottom'  => esc_html__( 'Center Bottom', 'sprout-spoon' ),
							'right center'  => esc_html__( 'Right Center', 'sprout-spoon' ),
							'right top'  => esc_html__( 'Right Top', 'sprout-spoon' ),
							'right bottom'  => esc_html__( 'Right Bottom', 'sprout-spoon' ),
							'left center'  => esc_html__( 'Left Center', 'sprout-spoon' ),
							'left top'  => esc_html__( 'Left Top', 'sprout-spoon' ),
							'left bottom'  => esc_html__( 'Left Bottom', 'sprout-spoon' ),
						)
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'bg_attachment',
					array(
						'label'          => esc_html__( 'Background Attachment', 'sprout-spoon' ),
						'section'        => 'solopine_new_section_color_background',
						'settings'       => 'sprout_spoon_bg_attachment',
						'type'           => 'select',
						'priority'	 => 7,
						'choices'        => array(
							'scroll'   => esc_html__( 'Scroll', 'sprout-spoon' ),
							'fixed'  => esc_html__( 'Fixed', 'sprout-spoon' ),
						)
					)
				)
			);
			
			// Wrapper
			$wp_customize->add_control(
				new Customize_Number_Control(
					$wp_customize,
					'wrapper_margin',
					array(
						'label'      => esc_html__( 'Wrapper Margin Top', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_wrapper',
						'settings'   => 'sprout_spoon_wrapper_margin',
						'type'		 => 'number',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new Customize_Number_Control(
					$wp_customize,
					'wrapper_radius',
					array(
						'label'      => esc_html__( 'Wrapper Border Radius', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_wrapper',
						'settings'   => 'sprout_spoon_wrapper_radius',
						'type'		 => 'number',
						'priority'	 => 2
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'wrapper_shadow',
					array(
						'label'      => esc_html__( 'Disable Wrapper Shadow', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_wrapper',
						'settings'   => 'sprout_spoon_wrapper_shadow',
						'type'		 => 'checkbox',
						'priority'	 => 3
					)
				)
			);
			
		// Header
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'header_bg_color',
				array(
					'label'      => esc_html__( 'Header BG Color', 'sprout-spoon' ),
					'section'    => 'solopine_new_section_color_header',
					'settings'   => 'sprout_spoon_header_bg_color',
					'priority'	 => 1
				)
			)
		);
		$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'header_bg_image',
					array(
						'label'      => esc_html__( 'Header BG Image', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_header',
						'settings'   => 'sprout_spoon_header_bg_image',
						'priority'	 => 2
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'header_bg_repeat',
					array(
						'label'          => esc_html__( 'Header BG Repeat', 'sprout-spoon' ),
						'section'        => 'solopine_new_section_color_header',
						'settings'       => 'sprout_spoon_header_bg_repeat',
						'type'           => 'select',
						'priority'	 => 3,
						'choices'        => array(
							'repeat'   => esc_html__( 'Repeat', 'sprout-spoon' ),
							'no-repeat'  => esc_html__( 'No Repeat', 'sprout-spoon' ),
							'repeat-y'  => esc_html__( 'Repeat Y', 'sprout-spoon' ),
							'repeat-x'  => esc_html__( 'Repeat X', 'sprout-spoon' ),
						)
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'header_bg_size',
					array(
						'label'          => esc_html__( 'Header BG Size', 'sprout-spoon' ),
						'section'        => 'solopine_new_section_color_header',
						'settings'       => 'sprout_spoon_header_bg_size',
						'type'           => 'select',
						'priority'	 => 5,
						'choices'        => array(
							'auto'   => esc_html__( 'Auto', 'sprout-spoon' ),
							'cover'  => esc_html__( 'Cover', 'sprout-spoon' ),
							'contain'  => esc_html__( 'Contain', 'sprout-spoon' ),
						)
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Control(
					$wp_customize,
					'header_bg_position',
					array(
						'label'          => esc_html__( 'Header BG Position', 'sprout-spoon' ),
						'section'        => 'solopine_new_section_color_header',
						'settings'       => 'sprout_spoon_header_bg_position',
						'type'           => 'select',
						'priority'	 => 6,
						'choices'        => array(
							'center center'   => esc_html__( 'Center Center', 'sprout-spoon' ),
							'center top'  => esc_html__( 'Center Top', 'sprout-spoon' ),
							'center bottom'  => esc_html__( 'Center Bottom', 'sprout-spoon' ),
							'right center'  => esc_html__( 'Right Center', 'sprout-spoon' ),
							'right top'  => esc_html__( 'Right Top', 'sprout-spoon' ),
							'right bottom'  => esc_html__( 'Right Bottom', 'sprout-spoon' ),
							'left center'  => esc_html__( 'Left Center', 'sprout-spoon' ),
							'left top'  => esc_html__( 'Left Top', 'sprout-spoon' ),
							'left bottom'  => esc_html__( 'Left Bottom', 'sprout-spoon' ),
						)
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_social_color',
					array(
						'label'      => esc_html__( 'Header Social Icon Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_header',
						'settings'   => 'sprout_spoon_header_social_color',
						'priority'	 => 8
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_social_hover',
					array(
						'label'      => esc_html__( 'Header Social Icon Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_header',
						'settings'   => 'sprout_spoon_header_social_color_hover',
						'priority'	 => 9
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_search_text',
					array(
						'label'      => esc_html__( 'Header Search Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_header',
						'settings'   => 'sprout_spoon_header_search_text',
						'priority'	 => 10
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'header_search_icon',
					array(
						'label'      => esc_html__( 'Header Search Icon Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_header',
						'settings'   => 'sprout_spoon_header_search_icon',
						'priority'	 => 11
					)
				)
			);
			
			// Colors: Menu
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_bg',
					array(
						'label'      => esc_html__( 'Menu BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_menu_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_border',
					array(
						'label'      => esc_html__( 'Menu Border Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_menu_border',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_text_color',
					array(
						'label'      => esc_html__( 'Menu Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_menu_text_color',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_text_active',
					array(
						'label'      => esc_html__( 'Menu Text Active/Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_menu_text_active',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_drop_arrow',
					array(
						'label'      => esc_html__( 'Menu Dropdown Arrow Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_menu_drop_arrow',
						'priority'	 => 5
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_drop_bg',
					array(
						'label'      => esc_html__( 'Dropdown BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_drop_bg',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'menu_drop_border',
					array(
						'label'      => esc_html__( 'Dropdown Border Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_drop_border',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_color',
					array(
						'label'      => esc_html__( 'Dropdown Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_drop_text_color',
						'priority'	 => 8
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_bg',
					array(
						'label'      => esc_html__( 'Dropdown Text Hover BG', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_drop_text_hover_bg',
						'priority'	 => 9
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'drop_text_hover_color',
					array(
						'label'      => esc_html__( 'Dropdown Text Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_menu',
						'settings'   => 'sprout_spoon_drop_text_hover_color',
						'priority'	 => 10
					)
				)
			);
			
			// Colors: Mobile Menu
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_burger',
					array(
						'label'      => esc_html__( 'Mobile Menu Toggle Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_mobile_menu',
						'settings'   => 'sprout_spoon_mobile_burger',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_dropdown_bg',
					array(
						'label'      => esc_html__( 'Mobile Menu Dropdown BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_mobile_menu',
						'settings'   => 'sprout_spoon_mobile_dropdown_bg',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_dropdown_border',
					array(
						'label'      => esc_html__( 'Mobile Menu Dropdown Border Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_mobile_menu',
						'settings'   => 'sprout_spoon_mobile_dropdown_border',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_dropdown_text',
					array(
						'label'      => esc_html__( 'Mobile Menu Dropdown Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_mobile_menu',
						'settings'   => 'sprout_spoon_mobile_dropdown_text',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_dropdown_text_hover',
					array(
						'label'      => esc_html__( 'Mobile Menu Dropdown Text Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_mobile_menu',
						'settings'   => 'sprout_spoon_mobile_dropdown_text_hover',
						'priority'	 => 5
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_dropdown_text_bg_hover',
					array(
						'label'      => esc_html__( 'Mobile Menu Dropdown Text BG Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_mobile_menu',
						'settings'   => 'sprout_spoon_mobile_dropdown_text_bg_hover',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_social_color',
					array(
						'label'      => esc_html__( 'Mobile Menu Social Icon Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_mobile_menu',
						'settings'   => 'sprout_spoon_mobile_social_color',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'mobile_social_color_hover',
					array(
						'label'      => esc_html__( 'Mobile Menu Social Icon Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_mobile_menu',
						'settings'   => 'sprout_spoon_mobile_social_color_hover',
						'priority'	 => 8
					)
				)
			);
			
			// Featured Area Colors
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'featured_bg',
					array(
						'label'      => esc_html__( 'Featured Overlay BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_featured',
						'settings'   => 'sprout_spoon_featured_bg',
						'priority'	 => 1
					)
				)
			);
			
			$wp_customize->add_control(
				new Customize_Number2_Control(
					$wp_customize,
					'featured_bg_trans',
					array(
						'label'      => esc_html__( 'Featured Overlay BG Transparency', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_featured',
						'settings'   => 'sprout_spoon_featured_bg_trans',
						'type'		 => 'number2',
						'priority'	 => 2
					)
				)
			);
			
			$wp_customize->add_control(
				new Customize_Number2_Control(
					$wp_customize,
					'featured_bg_trans_hover',
					array(
						'label'      => esc_html__( 'Featured Overlay BG Hover Transparency', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_featured',
						'settings'   => 'sprout_spoon_featured_bg_trans_hover',
						'type'		 => 'number2',
						'priority'	 => 3
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'featured_title_color',
					array(
						'label'      => esc_html__( 'Featured Post Title Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_featured',
						'settings'   => 'sprout_spoon_featured_title_color',
						'priority'	 => 4
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'featured_cat_color',
					array(
						'label'      => esc_html__( 'Featured Post Category Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_featured',
						'settings'   => 'sprout_spoon_featured_cat_color',
						'priority'	 => 5
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'featured_cat_sep_color',
					array(
						'label'      => esc_html__( 'Featured Post Category Separator Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_featured',
						'settings'   => 'sprout_spoon_featured_cat_sep_color',
						'priority'	 => 5
					)
				)
			);
			
			// Colors: Sidebar
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_widget_border',
					array(
						'label'      => esc_html__( 'Widget Border Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_sidebar',
						'settings'   => 'sprout_spoon_sidebar_widget_border',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_title_color',
					array(
						'label'      => esc_html__( 'Widget Title Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_sidebar',
						'settings'   => 'sprout_spoon_sidebar_title_color',
						'priority'	 => 2
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_social_icon_bg',
					array(
						'label'      => esc_html__( 'Sidebar Social Icon BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_sidebar',
						'settings'   => 'sprout_spoon_sidebar_social_icon_bg',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'sidebar_social_icon_color',
					array(
						'label'      => esc_html__( 'Sidebar Social Icon Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_sidebar',
						'settings'   => 'sprout_spoon_sidebar_social_icon_color',
						'priority'	 => 4
					)
				)
			);
			
			// Footer
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_color',
					array(
						'label'      => esc_html__( 'Footer Social Icon Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'sprout_spoon_footer_social_color',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_social_color_hover',
					array(
						'label'      => esc_html__( 'Footer Social Icon Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'sprout_spoon_footer_social_color_hover',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_copyright_color',
					array(
						'label'      => esc_html__( 'Footer Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'sprout_spoon_footer_copyright_color',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'footer_top_color',
					array(
						'label'      => esc_html__( 'Footer Back to Top Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_footer',
						'settings'   => 'sprout_spoon_footer_top_color',
						'priority'	 => 4
					)
				)
			);
			
			// Colors: Posts
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_title',
					array(
						'label'      => esc_html__( 'Post Title Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_title',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_category_color',
					array(
						'label'      => esc_html__( 'Post Category Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_category_color',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_text',
					array(
						'label'      => esc_html__( 'Post Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_text',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_h',
					array(
						'label'      => esc_html__( 'Post H1-H6 Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_h',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_more_color',
					array(
						'label'      => esc_html__( 'Continue Reading Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_more_color',
						'priority'	 => 5
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_share_color',
					array(
						'label'      => esc_html__( 'Share Icon Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_share_color',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_share_color_hover',
					array(
						'label'      => esc_html__( 'Share Icon Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_share_color_hover',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_comment_color',
					array(
						'label'      => esc_html__( 'Comment Link Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_comment_color',
						'priority'	 => 8
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_comment_color_hover',
					array(
						'label'      => esc_html__( 'Comment Link Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_comment_color_hover',
						'priority'	 => 9
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_tag_bg',
					array(
						'label'      => esc_html__( 'Post Tag BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_tag_bg',
						'priority'	 => 10
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_tag_text',
					array(
						'label'      => esc_html__( 'Post Tag Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_tag_text',
						'priority'	 => 11
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_tag_bg_hover',
					array(
						'label'      => esc_html__( 'Post Tag BG Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_tag_bg_hover',
						'priority'	 => 12
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'post_tag_text_hover',
					array(
						'label'      => esc_html__( 'Post Tag Text Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_post_color',
						'settings'   => 'sprout_spoon_post_tag_text_hover',
						'priority'	 => 13
					)
				)
			);
			
			// Colors Newsletter
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_bg',
					array(
						'label'      => esc_html__( 'Newsletter BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_bg',
						'priority'	 => 1
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_title',
					array(
						'label'      => esc_html__( 'Newsletter Title Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_title',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_text',
					array(
						'label'      => esc_html__( 'Newsletter Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_text',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_input_bg',
					array(
						'label'      => esc_html__( 'Newsletter Input BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_input_bg',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_input_text',
					array(
						'label'      => esc_html__( 'Newsletter Input Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_input_text',
						'priority'	 => 5
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_submit_bg',
					array(
						'label'      => esc_html__( 'Newsletter Submit BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_submit_bg',
						'priority'	 => 6
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_submit_text',
					array(
						'label'      => esc_html__( 'Newsletter Submit Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_submit_text',
						'priority'	 => 7
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_submit_bg_hover',
					array(
						'label'      => esc_html__( 'Newsletter Submit BG Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_submit_bg_hover',
						'priority'	 => 8
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'newsletter_submit_text_hover',
					array(
						'label'      => esc_html__( 'Newsletter Submit Text Hover Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_newsletter_color',
						'settings'   => 'sprout_spoon_newsletter_submit_text_hover',
						'priority'	 => 9
					)
				)
			);
			
			// MISC Colors
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'misc_accent',
					array(
						'label'      => esc_html__( 'Accent Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_misc',
						'settings'   => 'sprout_spoon_misc_accent',
						'priority'	 => 1
					)
				)
			);
			
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'misc_archive_bg',
					array(
						'label'      => esc_html__( 'Category/Archive Box BG Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_misc',
						'settings'   => 'sprout_spoon_misc_archive_bg',
						'priority'	 => 2
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'misc_archive_border',
					array(
						'label'      => esc_html__( 'Category/Archive Box Border Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_misc',
						'settings'   => 'sprout_spoon_misc_archive_border',
						'priority'	 => 3
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'misc_archive_browsing',
					array(
						'label'      => esc_html__( 'Category/Archive Box Browsing Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_misc',
						'settings'   => 'sprout_spoon_misc_archive_browsing',
						'priority'	 => 4
					)
				)
			);
			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'misc_archive_title',
					array(
						'label'      => esc_html__( 'Category/Archive Box Title Text Color', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_color_misc',
						'settings'   => 'sprout_spoon_misc_archive_title',
						'priority'	 => 5
					)
				)
			);
			
			// Custom CSS
			$wp_customize->add_control(
				new Customize_CustomCss_Control(
					$wp_customize,
					'custom_css',
					array(
						'label'      => esc_html__( 'Custom CSS', 'sprout-spoon' ),
						'section'    => 'solopine_new_section_custom_css',
						'settings'   => 'sprout_spoon_custom_css',
						'type'		 => 'custom_css',
						'priority'	 => 1
					)
				)
			);
			

	// Remove Sections
	//$wp_customize->remove_section( 'title_tagline');
	$wp_customize->remove_section( 'nav');
	$wp_customize->remove_section( 'static_front_page');
	$wp_customize->remove_section( 'colors');
	$wp_customize->remove_section( 'background_image');
	
 
}
add_action( 'customize_register', 'solopine_register_theme_customizer' );

/**
 * Sanitize
 */
function solopine_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}
function solopine_sanitize_number($input) {
    if ( isset( $input ) && is_numeric( $input ) ) {
        return $input;
    }
}

?>