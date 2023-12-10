			
			<!-- END CONTENT -->
			</div>
			
		<!-- END CONTAINER -->
		</div>
		
		<footer id="footer">
			
			<div id="instagram-footer">
				<?php	/* Widgetised Area */	if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-2') ) ?>
			</div>
			
			<?php if(!get_theme_mod('sprout_spoon_footer_share')) : ?>
			<div id="footer-social">
				<?php if(get_theme_mod('sprout_spoon_facebook')) : ?><a href="http://facebook.com/<?php echo esc_html(get_theme_mod('sprout_spoon_facebook')); ?>" target="_blank"><i class="fa fa-facebook"></i> <span><?php _e( 'Facebook', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_twitter')) : ?><a href="http://twitter.com/<?php echo esc_html(get_theme_mod('sprout_spoon_twitter')); ?>" target="_blank"><i class="fa fa-twitter"></i> <span><?php _e( 'Twitter', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_instagram')) : ?><a href="http://instagram.com/<?php echo esc_html(get_theme_mod('sprout_spoon_instagram')); ?>" target="_blank"><i class="fa fa-instagram"></i> <span><?php _e( 'Instagram', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_pinterest')) : ?><a href="http://pinterest.com/<?php echo esc_html(get_theme_mod('sprout_spoon_pinterest')); ?>" target="_blank"><i class="fa fa-pinterest"></i> <span><?php _e( 'Pinterest', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_bloglovin')) : ?><a href="http://bloglovin.com/<?php echo esc_html(get_theme_mod('sprout_spoon_bloglovin')); ?>" target="_blank"><i class="fa fa-heart"></i> <span><?php _e( 'Bloglovin', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_google')) : ?><a href="http://plus.google.com/<?php echo esc_html(get_theme_mod('sprout_spoon_google')); ?>" target="_blank"><i class="fa fa-google-plus"></i> <span><?php _e( 'Google +', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_tumblr')) : ?><a href="http://<?php echo esc_html(get_theme_mod('sprout_spoon_tumblr')); ?>.tumblr.com/" target="_blank"><i class="fa fa-tumblr"></i> <span><?php _e( 'Tumblr', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_youtube')) : ?><a href="http://youtube.com/<?php echo esc_html(get_theme_mod('sprout_spoon_youtube')); ?>" target="_blank"><i class="fa fa-youtube-play"></i> <span><?php _e( 'Youtube', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_dribbble')) : ?><a href="http://dribbble.com/<?php echo esc_html(get_theme_mod('sprout_spoon_dribbble')); ?>" target="_blank"><i class="fa fa-dribbble"></i> <span><?php _e( 'Dribbble', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_soundcloud')) : ?><a href="http://soundcloud.com/<?php echo esc_html(get_theme_mod('sprout_spoon_soundcloud')); ?>" target="_blank"><i class="fa fa-soundcloud"></i> <span><?php _e( 'Soundcloud', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_vimeo')) : ?><a href="http://vimeo.com/<?php echo esc_html(get_theme_mod('sprout_spoon_vimeo')); ?>" target="_blank"><i class="fa fa-vimeo-square"></i> <span><?php _e( 'Vimeo', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_linkedin')) : ?><a href="<?php echo esc_html(get_theme_mod('sprout_spoon_linkedin')); ?>" target="_blank"><i class="fa fa-linkedin"></i> <span><?php _e( 'LinkedIn', 'sprout-spoon' ); ?></span></a><?php endif; ?>
				<?php if(get_theme_mod('sprout_spoon_rss')) : ?><a href="<?php echo esc_url(get_theme_mod('sprout_spoon_rss')); ?>" target="_blank"><i class="fa fa-rss"></i> <span><?php _e( 'RSS', 'sprout-spoon' ); ?></span></a><?php endif; ?>
			</div>
			<?php endif; ?>
			
		</footer>
		
	<!-- END WRAPPER -->
	</div>
	
	<div id="footer-copyright">
			
		<div class="container">
			<p class="left-copy"><?php echo wp_kses_post(get_theme_mod('sprout_spoon_footer_copyright_left', '&copy; Copyright 2016 - <a href="http://solopine.com">Solo Pine</a>. All Rights Reserved.')); ?></p>
			<?php if(!get_theme_mod('sprout_spoon_footer_top')) : ?><a href="#" class="to-top"><?php _e( 'Top', 'sprout-spoon' ); ?> <i class="fa fa-angle-up"></i></a><?php endif; ?>
			<p class="right-copy"><?php echo wp_kses_post(get_theme_mod('sprout_spoon_footer_copyright_right', 'Designed & Developed by <a href="http://solopine.com">Solo Pine</a>.')); ?></p>
		</div>

	</div>
	
	<?php wp_footer(); ?>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-1211127-26', 'auto');
  ga('send', 'pageview');

</script>
	
</body>

</html>
