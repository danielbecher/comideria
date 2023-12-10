<?php
//////////////////////////////////////////////////////////////////
// Customizer - Add CSS
//////////////////////////////////////////////////////////////////
function solopine_customizer_css() {
    ?>
    <style type="text/css">
	
		#header { padding-top:<?php echo get_theme_mod( 'sprout_spoon_header_padding_top' ); ?>px; padding-bottom:<?php echo get_theme_mod( 'sprout_spoon_header_padding_bottom' ); ?>px; }
		<?php if(get_theme_mod( 'sprout_spoon_bg_color' )) : ?>body { background-color:<?php echo get_theme_mod( 'sprout_spoon_bg_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_bg_image' )) : ?>body { background-image:url(<?php echo get_theme_mod( 'sprout_spoon_bg_image' ); ?>); }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_bg_repeat' )) : ?>body { background-repeat:<?php echo get_theme_mod( 'sprout_spoon_bg_repeat' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_bg_size' )) : ?>body { background-size:<?php echo get_theme_mod( 'sprout_spoon_bg_size' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_bg_position' )) : ?>body { background-position:<?php echo get_theme_mod( 'sprout_spoon_bg_position' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_bg_attachment' )) : ?>body { background-attachment:<?php echo get_theme_mod( 'sprout_spoon_bg_attachment' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_wrapper_margin' ) || get_theme_mod( 'sprout_spoon_wrapper_margin' ) == 0) : ?>#wrapper { margin-top:<?php echo get_theme_mod( 'sprout_spoon_wrapper_margin' ); ?>px; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_wrapper_radius' ) || get_theme_mod( 'sprout_spoon_wrapper_radius' ) == 0) : ?>
		#wrapper { border-radius:<?php echo get_theme_mod( 'sprout_spoon_wrapper_radius' ); ?>px; }
		#header { border-radius:<?php echo get_theme_mod( 'sprout_spoon_wrapper_radius' ); ?>px <?php echo get_theme_mod( 'sprout_spoon_wrapper_radius' ); ?>px 0 0; }
		<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_wrapper_shadow' )) : ?>#wrapper { box-shadow:none; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_header_bg_color' )) : ?>#header { background-color:<?php echo get_theme_mod( 'sprout_spoon_header_bg_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_header_bg_image' )) : ?>#header { background-image:url(<?php echo get_theme_mod( 'sprout_spoon_header_bg_image' ); ?>); }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_header_bg_repeat' )) : ?>#header { background-repeat:<?php echo get_theme_mod( 'sprout_spoon_header_bg_repeat' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_header_bg_size' )) : ?>#header { background-size:<?php echo get_theme_mod( 'sprout_spoon_header_bg_size' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_header_bg_position' )) : ?>#header { background-position:<?php echo get_theme_mod( 'sprout_spoon_header_bg_position' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_header_social_color' )) : ?>#top-social a { color:<?php echo get_theme_mod( 'sprout_spoon_header_social_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_header_social_color_hover' )) : ?>#top-social a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_header_social_color_hover' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_header_search_text' )) : ?>
		#top-search input { color:<?php echo get_theme_mod( 'sprout_spoon_header_search_text' ); ?>; }
		#top-search ::-webkit-input-placeholder { color:<?php echo get_theme_mod( 'sprout_spoon_header_search_text' ); ?>; }
		#top-search ::-moz-placeholder { color: <?php echo get_theme_mod( 'sprout_spoon_header_search_text' ); ?>; }
		#top-search :-ms-input-placeholder { color: <?php echo get_theme_mod( 'sprout_spoon_header_search_text' ); ?>; }
		<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_header_search_icon' )) : ?>#top-search i { color:<?php echo get_theme_mod( 'sprout_spoon_header_search_icon' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_menu_bg' )) : ?>#navigation { background-color:<?php echo get_theme_mod( 'sprout_spoon_menu_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_menu_border' )) : ?>#navigation { border-color:<?php echo get_theme_mod( 'sprout_spoon_menu_border' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_menu_text_color' )) : ?>#nav-wrapper .menu li a { color:<?php echo get_theme_mod( 'sprout_spoon_menu_text_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_menu_text_active' )) : ?>#nav-wrapper .menu li.current-menu-item a, #nav-wrapper .menu li > a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_menu_text_active' ); ?> }<?php endif ?>
		<?php if(get_theme_mod( 'sprout_spoon_menu_drop_arrow' )) : ?>#nav-wrapper .menu > li.menu-item-has-children > a:after { color:<?php echo get_theme_mod( 'sprout_spoon_menu_drop_arrow' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_drop_bg' )) : ?>#nav-wrapper .menu .sub-menu, #nav-wrapper .menu .children { background-color: <?php echo get_theme_mod( 'sprout_spoon_drop_bg' ); ?>; }<?php endif ?>
		<?php if(get_theme_mod( 'sprout_spoon_drop_border' )) : ?>#nav-wrapper .menu .sub-menu, #nav-wrapper .menu .children, #nav-wrapper ul.menu ul a, #nav-wrapper .menu ul ul a { border-color:<?php echo get_theme_mod( 'sprout_spoon_drop_border' ); ?> ; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_drop_text_color' )) : ?>#nav-wrapper ul.menu ul a, #nav-wrapper .menu ul ul a { color:<?php echo get_theme_mod( 'sprout_spoon_drop_text_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_drop_text_hover_bg' )) : ?>#nav-wrapper ul.menu ul a:hover, #nav-wrapper .menu ul ul a:hover { background:<?php echo get_theme_mod( 'sprout_spoon_drop_text_hover_bg' ); ?> ; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_drop_text_hover_color' )) : ?>#nav-wrapper ul.menu ul a:hover, #nav-wrapper .menu ul ul a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_drop_text_hover_color' ); ?> ; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_mobile_burger' )) : ?>.slicknav_menu .slicknav_icon-bar { background-color:<?php echo get_theme_mod( 'sprout_spoon_mobile_burger' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_mobile_dropdown_bg' )) : ?>.slicknav_nav, .slicknav_nav ul { background-color:<?php echo get_theme_mod( 'sprout_spoon_mobile_dropdown_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_mobile_dropdown_border' )) : ?>.slicknav_nav { border:1px solid <?php echo get_theme_mod( 'sprout_spoon_mobile_dropdown_border' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_mobile_dropdown_text' )) : ?>.slicknav_nav a { color:<?php echo get_theme_mod( 'sprout_spoon_mobile_dropdown_text' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_mobile_dropdown_text_hover' )) : ?>.slicknav_nav a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_mobile_dropdown_text_hover' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_mobile_dropdown_text_bg_hover' )) : ?>.slicknav_nav a:hover { background-color:<?php echo get_theme_mod( 'sprout_spoon_mobile_dropdown_text_bg_hover' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_mobile_social_color' )) : ?>#mobile-social a { color:<?php echo get_theme_mod( 'sprout_spoon_mobile_social_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_mobile_social_color_hover' )) : ?>#mobile-social a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_mobile_social_color_hover' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_featured_bg' )) : ?>.feat-overlay { background-color:rgba(<?php sprout_spoon_hex2rgb(get_theme_mod( 'sprout_spoon_featured_bg' ), get_theme_mod( 'sprout_spoon_featured_bg_trans' )); ?>); }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_featured_bg_trans_hover' )) : ?>.feat-item:hover .feat-overlay { background-color:rgba(<?php sprout_spoon_hex2rgb(get_theme_mod( 'sprout_spoon_featured_bg' ), get_theme_mod( 'sprout_spoon_featured_bg_trans_hover' )); ?>); }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_featured_title_color' )) : ?>.feat-inner h2 a { color:<?php echo get_theme_mod( 'sprout_spoon_featured_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_featured_cat_color' )) : ?>.feat-inner .cat a { color:<?php echo get_theme_mod( 'sprout_spoon_featured_cat_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_featured_cat_sep_color' )) : ?>.feat-inner .cat span { color:<?php echo get_theme_mod( 'sprout_spoon_featured_cat_sep_color' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_sidebar_widget_border' )) : ?>.widget, .widget-title:before, .widget-title:after { border-color:<?php echo get_theme_mod( 'sprout_spoon_sidebar_widget_border' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_sidebar_title_color' )) : ?>.widget-title { color:<?php echo get_theme_mod( 'sprout_spoon_sidebar_title_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_sidebar_social_icon_bg' )) : ?>.social-widget i { background:<?php echo get_theme_mod( 'sprout_spoon_sidebar_social_icon_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_sidebar_social_icon_color' )) : ?>.social-widget i { color:<?php echo get_theme_mod( 'sprout_spoon_sidebar_social_icon_color' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_footer_social_color' )) : ?>#footer-social a { color:<?php echo get_theme_mod( 'sprout_spoon_footer_social_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_footer_social_color_hover' )) : ?>#footer-social a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_footer_social_color_hover' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_footer_copyright_color' )) : ?>#footer-copyright p { color:<?php echo get_theme_mod( 'sprout_spoon_footer_copyright_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_footer_top_color' )) : ?>.to-top { color:<?php echo get_theme_mod( 'sprout_spoon_footer_top_color' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_post_title' )) : ?>.post-header h2 a, .post-header h1 { color:<?php echo get_theme_mod( 'sprout_spoon_post_title' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_category_color' )) : ?>.post-header .cat a { color:<?php echo get_theme_mod( 'sprout_spoon_post_category_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_text' )) : ?>.post-entry p { color:<?php echo get_theme_mod( 'sprout_spoon_post_text' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_h' )) : ?>.post-entry h1, .post-entry h2, .post-entry h3, .post-entry h4, .post-entry h5, .post-entry h6 { color:<?php echo get_theme_mod( 'sprout_spoon_post_h' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_more_color' )) : ?>.more-link { color:<?php echo get_theme_mod( 'sprout_spoon_post_more_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_share_color' )) : ?>.post-share a { color:<?php echo get_theme_mod( 'sprout_spoon_post_share_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_share_color_hover' )) : ?>.post-share a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_post_share_color_hover' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_comment_color' )) : ?>.meta-comments a { color:<?php echo get_theme_mod( 'sprout_spoon_post_comment_color' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_comment_color_hover' )) : ?>.meta-comments a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_post_comment_color_hover' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_tag_bg' )) : ?>.post-tags a, .widget .tagcloud a { background:<?php echo get_theme_mod( 'sprout_spoon_post_tag_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_tag_text' )) : ?>.post-tags a, .widget .tagcloud a { color:<?php echo get_theme_mod( 'sprout_spoon_post_tag_text' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_tag_bg_hover' )) : ?>.post-tags a:hover, .widget .tagcloud a:hover { background:<?php echo get_theme_mod( 'sprout_spoon_post_tag_bg_hover' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_post_tag_text_hover' )) : ?>.post-tags a:hover, .widget .tagcloud a:hover { color:<?php echo get_theme_mod( 'sprout_spoon_post_tag_text_hover' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_bg' )) : ?>.subscribe-box { background:<?php echo get_theme_mod( 'sprout_spoon_newsletter_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_title' )) : ?>.subscribe-box h4 { color:<?php echo get_theme_mod( 'sprout_spoon_newsletter_title' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_text' )) : ?>.subscribe-box p { color:<?php echo get_theme_mod( 'sprout_spoon_newsletter_text' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_input_bg' )) : ?>.subscribe-box input { background:<?php echo get_theme_mod( 'sprout_spoon_newsletter_input_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_input_text' )) : ?>.subscribe-box ::-webkit-input-placeholder, .subscribe-box input { color:<?php echo get_theme_mod( 'sprout_spoon_newsletter_input_text' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_submit_bg' )) : ?>.subscribe-box input[type=submit] { background:<?php echo get_theme_mod( 'sprout_spoon_newsletter_submit_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_submit_text' )) : ?>.subscribe-box input[type=submit] { color:<?php echo get_theme_mod( 'sprout_spoon_newsletter_submit_text' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_submit_bg_hover' )) : ?>.subscribe-box input[type=submit]:hover { background:<?php echo get_theme_mod( 'sprout_spoon_newsletter_submit_bg_hover' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_newsletter_submit_text_hover' )) : ?>.subscribe-box input[type=submit]:hover { color:<?php echo get_theme_mod( 'sprout_spoon_newsletter_submit_text_hover' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_misc_archive_bg' )) : ?>.archive-box { background:<?php echo get_theme_mod( 'sprout_spoon_misc_archive_bg' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_misc_archive_border' )) : ?>.archive-box { border-color:<?php echo get_theme_mod( 'sprout_spoon_misc_archive_border' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_misc_archive_browsing' )) : ?>.archive-box span { color:<?php echo get_theme_mod( 'sprout_spoon_misc_archive_browsing' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_misc_archive_title' )) : ?>.archive-box h1 { color:<?php echo get_theme_mod( 'sprout_spoon_misc_archive_title' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_misc_accent' )) : ?>a { color:<?php echo get_theme_mod( 'sprout_spoon_misc_accent' ); ?>; }<?php endif; ?>
		<?php if(get_theme_mod( 'sprout_spoon_misc_accent' )) : ?>.widget .tagcloud a:hover { background:<?php echo get_theme_mod( 'sprout_spoon_misc_accent' ); ?>; }<?php endif; ?>
		
		<?php if(get_theme_mod( 'sprout_spoon_custom_css' )) : ?>
		<?php echo get_theme_mod( 'sprout_spoon_custom_css' ); ?>
		<?php endif; ?>
		
    </style>
    <?php
}
add_action( 'wp_head', 'solopine_customizer_css' );

?>