<div class="featured-area">
	
	<div class="container">
		
		<?php
			// Get featured posts
			$featured_cat = get_theme_mod( 'sprout_spoon_featured_cat' );
			$get_featured_posts = get_theme_mod('sprout_spoon_featured_id');
			
			if($get_featured_posts) {
				$featured_posts = explode(',', $get_featured_posts);
				$args = array( 'showposts' => 3, 'post_type' => array('post', 'page'), 'post__in' => $featured_posts, 'orderby' => 'post__in' );
			} else {
				$args = array( 'cat' => $featured_cat, 'showposts' => 3 );
			}
			
			$feat_query = new WP_Query( $args );
		
			if ($feat_query->have_posts()) : while ($feat_query->have_posts()) : $feat_query->the_post();
			
		?>
		
		<?php 
				
			// Get slider image
			if(get_post_meta( get_the_ID(), 'meta-image', true )) :
			
				$feat_image = get_post_meta( get_the_ID(), 'meta-image', true );
				
			else :
			
				if(has_post_thumbnail()) {
					$get_feat_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'sprout_spoon_full-thumb' );
					$feat_image = $get_feat_image[0];
				} else {
					$feat_image = get_template_directory_uri() . '/img/slider-default.png';
				}
			
			endif;
		
		?>
		
		<div class="feat-item" style="background-image:url(<?php echo esc_url($feat_image); ?>)">
			<a class="feat-url" href="<?php echo get_permalink(); ?>"></a>
			
			<?php if(get_theme_mod('sprout_spoon_featured_show_cat') && get_theme_mod('sprout_spoon_featured_show_title')) : else : ?>
			<div class="feat-overlay">
				<div class="feat-inner">
					<?php if(!get_theme_mod('sprout_spoon_featured_show_cat')) : ?><span class="cat"><?php the_category('<span>/</span> '); ?></span><?php endif; ?>
					<?php if(!get_theme_mod('sprout_spoon_featured_show_title')) : ?><h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2><?php endif; ?>
				</div>
			</div>
			<?php endif; ?>
			
		</div>
		
		<?php endwhile; endif; ?>
	
	</div>
	
</div>