<?php get_header(); ?>
	
	<?php
		$single_template = get_post_meta( get_the_ID(), 'meta-select', true );
	?>
	
	<div class="container">
		
		<div id="content">
		
			<div id="main" <?php if($single_template == 'full-post') : ?>class="fullwidth"<?php endif; ?>>
			
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				
					<?php get_template_part('content'); ?>
						
				<?php endwhile; ?>
				
				<?php endif; ?>
				
			</div>

<?php if($single_template == 'full-post') : else : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>