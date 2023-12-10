<li>
<article id="post-<?php the_ID(); ?>" <?php post_class('grid-item'); ?>>
		
	<div class="post-img">
		<?php if(get_theme_mod('sprout_spoon_home_layout') == 'full_grid2' || get_theme_mod('sprout_spoon_home_layout') == 'grid2' && get_theme_mod('sprout_spoon_sidebar_homepage') || get_theme_mod('sprout_spoon_sidebar_archive')) : ?>
		<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('sprout_spoon_col2-thumb'); ?></a>
		<?php else : ?>
		<a href="<?php echo get_permalink() ?>"><?php the_post_thumbnail('sprout_spoon_misc-thumb'); ?></a>
		<?php endif; ?>
	</div>
	
	<div class="post-header">
		<?php if(!get_theme_mod('sprout_spoon_post_cat')) : ?>
		<span class="cat"><?php the_category('<span>/</span> '); ?></span>
		<?php endif; ?>
		<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
	</div>
	
	<?php if(!get_theme_mod('sprout_spoon_post_date')) : ?><span class="date"><a href="<?php echo get_permalink(); ?>"><?php the_time( get_option('date_format') ); ?></a></span><?php endif; ?>
		
</article>
</li>