<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="post-header">
		
		<?php if(!get_theme_mod('sprout_spoon_post_cat')) : ?>
		<span class="cat"><?php the_category('<span>/</span> '); ?></span>
		<?php endif; ?>
		
		<?php if(is_single()) : ?>
			<h1><?php the_title(); ?></h1>
		<?php else : ?>
			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		<?php endif; ?>
		
	</div>
	
	<?php if(has_post_format('gallery')) : ?>
	
		<?php $images = get_post_meta( $post->ID, '_format_gallery_images', true ); ?>
		
		<?php if($images) : ?>
		<div class="post-img">
		<div class="sideslides">
		<ul class="bxslider">
		<?php foreach($images as $image) : ?>
			
			<?php $the_image = wp_get_attachment_image_src( $image, 'sprout_spoon_full-thumb' ); ?> 
			<?php $the_caption = get_post_field('post_excerpt', $image); ?>
			<li><img src="<?php echo esc_url($the_image[0]); ?>" <?php if($the_caption) : ?>title="<?php echo esc_html($the_caption); ?>"<?php endif; ?> /></li>
			
		<?php endforeach; ?>
		</ul>
		</div>
		</div>
		<?php endif; ?>
	
	<?php elseif(has_post_format('video')) : ?>
	
		<div class="post-img">
			<?php $sp_video = get_post_meta( $post->ID, '_format_video_embed', true ); ?>
			<?php if(wp_oembed_get( $sp_video )) : ?>
				<?php echo wp_oembed_get($sp_video); ?>
			<?php else : ?>
				<?php echo wp_kses_post($sp_video); ?>
			<?php endif; ?>
		</div>
	
	<?php elseif(has_post_format('audio')) : ?>
	
		<div class="post-img audio">
			<?php $sp_audio = get_post_meta( $post->ID, '_format_audio_embed', true ); ?>
			<?php if(wp_oembed_get( $sp_audio )) : ?>
				<?php echo wp_oembed_get($sp_audio); ?>
			<?php else : ?>
				<?php echo wp_kses_post($sp_audio); ?>
			<?php endif; ?>
		</div>
	
	<?php else : ?>
		
		<?php if(has_post_thumbnail()) : ?>
		<?php if(get_theme_mod('sprout_spoon_post_thumb') == 'no_display') : elseif(get_theme_mod('sprout_spoon_post_thumb') == 'ho_display') : ?>
			
			<?php if(is_single()) : else : ?>
				<div class="post-img">
					<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('sprout_spoon_full-thumb'); ?></a>
				</div>
			<?php endif; ?>
				
		<?php else : ?>
			<div class="post-img">
				<?php if(is_single()) : ?>
					<?php the_post_thumbnail('sprout_spoon_full-thumb'); ?>
				<?php else : ?>
					<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('sprout_spoon_full-thumb'); ?></a>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php endif; ?>
		
	<?php endif; ?>
	
	<div class="post-entry">
		
		<?php if(is_single()) : ?>
		
			<?php the_content(); ?>
			
		<?php else : ?>
		
			<?php if(get_theme_mod('sprout_spoon_post_summary') == 'excerpt') : ?>
				
				<p><?php echo sp_string_limit_words(get_the_excerpt(), 70); ?>&hellip;</p>
				<p><a href="<?php echo get_permalink() ?>" class="more-link"><?php esc_html_e( 'Continue lendo', 'sprout-spoon' ); ?></a></p>
				
			<?php else : ?>
				
				<?php the_content(esc_html__('Continue lendo...', 'sprout-spoon')); ?>
				
			<?php endif; ?>
		
		<?php endif; ?>
		
		<?php wp_link_pages(); ?>
		
		<?php if(!get_theme_mod('sprout_spoon_post_tags')) : ?>
		<?php if(is_single()) : ?>
		<?php if(has_tag()) : ?>
			<div class="post-tags">
				<?php the_tags("",""); ?>
			</div>
		<?php endif; ?>	
		<?php endif; ?>
		<?php endif; ?>
		
	</div>
	
	<?php if(get_theme_mod('sprout_spoon_post_comment_link') && get_theme_mod('sprout_spoon_post_share') && get_theme_mod('sprout_spoon_post_share_author') && get_theme_mod('sprout_spoon_post_date')) : else : ?>	
	<div class="post-meta">
		
		<div class="meta-info">
			<?php if(!get_theme_mod('sprout_spoon_post_date')) : ?><span class="meta-text"><a href="<?php echo get_permalink(); ?>"><?php the_time( get_option('date_format') ); ?></a></span><?php endif; ?> 
			<?php if(!get_theme_mod('sprout_spoon_post_share_author')) : ?><span class="by"><?php esc_html_e( 'Por', 'sprout-spoon' ); ?></span> <span class="meta-text"><?php the_author_posts_link(); ?></span><?php endif; ?>
		</div>
		
		<?php if(!get_theme_mod('sprout_spoon_post_comment_link')) : ?>
		<div class="meta-comments">
			<?php comments_popup_link( '0 <i class="fa fa-comment-o"></i>', '1 <i class="fa fa-comment-o"></i>', '% <i class="fa fa-comment-o"></i>', '', ''); ?>
		</div>
		<?php endif; ?>
		
		<?php if(!get_theme_mod('sprout_spoon_post_share')) : ?>
		<div class="post-share">
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
			<a target="_blank" href="https://twitter.com/intent/tweet?text=Check%20out%20this%20article:%20<?php print solopine_social_title( get_the_title() ); ?>&url=<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
			<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
			<a data-pin-do="none" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&media=<?php echo esc_url($pin_image); ?>&description=<?php print solopine_social_title( get_the_title() ); ?>"><i class="fa fa-pinterest"></i></a>
			<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
		</div>
		<?php endif; ?>
		
	</div>
	<?php endif; ?>
	
	<?php if(is_single()) : ?>
	<?php if(is_active_sidebar('sidebar-4')) : ?>
	<div class="post-widget">
		<?php if ( !function_exists( 'dynamic_sidebar' ) || !dynamic_sidebar('sidebar-4') ) ?>
	</div>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(!get_theme_mod('sprout_spoon_post_pagination')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/post_pagination'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(!get_theme_mod('sprout_spoon_post_author')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/about_author'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php if(!get_theme_mod('sprout_spoon_post_related')) : ?>
	<?php if(is_single()) : ?>
		<?php get_template_part('inc/templates/related_posts'); ?>
	<?php endif; ?>
	<?php endif; ?>
	
	<?php comments_template( '', true );  ?>
	
</article>