<article id="post-<?php the_ID(); ?>" <?php post_class('sp_page'); ?>>
	
	<?php if(!get_theme_mod('sprout_spoon_page_title')) : ?>
	<div class="post-header">
		
		<h1><?php the_title(); ?></h1>
		
	</div>
	<?php endif; ?>
	
	<?php if(has_post_thumbnail()) : ?>
	<div class="post-img">
		<?php the_post_thumbnail('sprout_spoon_full-thumb'); ?>
	</div>
	<?php endif; ?>
	
	<div class="post-entry">
		
		<?php the_content(); ?>
		
		<?php wp_link_pages(); ?>
		
	</div>
	
	<?php if(get_theme_mod('sprout_spoon_page_share')) : else : ?>
	<div class="post-meta">
		
		<div class="post-share">
			<a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="fa fa-facebook"></i></a>
			<a target="_blank" href="https://twitter.com/intent/tweet?text=Check%20out%20this%20article:%20<?php print solopine_social_title( get_the_title() ); ?>&url=<?php echo urlencode(the_permalink()); ?>"><i class="fa fa-twitter"></i></a>
			<?php $pin_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); ?>
			<a data-pin-do="none" target="_blank" href="https://pinterest.com/pin/create/button/?url=<?php echo urlencode(the_permalink()); ?>&media=<?php echo esc_url($pin_image); ?>&description=<?php print solopine_social_title( get_the_title() ); ?>"><i class="fa fa-pinterest"></i></a>
			<a target="_blank" href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
		</div>
		
	</div>
	<?php endif; ?>
	
	<?php comments_template( '', true );  ?>
	
</article>