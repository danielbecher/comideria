<article id="post-<?php the_ID(); ?>" <?php post_class('list-item'); ?>>
		
	<div class="post-img">
		<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('sprout_spoon_misc-thumb'); ?></a>
	</div>
	
	<div class="list-content">
	
		<div class="post-header">
			<?php if(!get_theme_mod('sprout_spoon_post_cat')) : ?>
			<span class="cat"><?php the_category('<span>/</span> '); ?></span>
			<?php endif; ?>
			<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		
		<div class="post-entry">
							
			<p><?php echo sp_string_limit_words(get_the_excerpt(), 29); ?>&hellip;</p>
							
		</div>
		
		<?php if(get_theme_mod('sprout_spoon_post_comment_link') && get_theme_mod('sprout_spoon_post_share') && get_theme_mod('sprout_spoon_post_share_author') && get_theme_mod('sprout_spoon_post_date')) : else : ?>	
	<div class="post-meta">
		
		<div class="meta-info">
			<?php if(!get_theme_mod('sprout_spoon_post_date')) : ?><span class="meta-text"><a href="<?php echo get_permalink(); ?>"><?php the_time( get_option('date_format') ); ?></a></span><?php endif; ?> 
			<?php if(!get_theme_mod('sprout_spoon_post_share_author')) : ?><span class="by"><?php esc_html_e( 'By', 'sprout-spoon' ); ?></span> <span class="meta-text"><?php the_author_posts_link(); ?></span><?php endif; ?>
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
	
	</div>
		
</article>