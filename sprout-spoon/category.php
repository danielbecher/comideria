<?php get_header(); ?>
	
	<div class="archive-box">
		<span><?php esc_html_e( 'Browsing Category', 'sprout-spoon' ); ?></span>
		<h1><?php printf( esc_html__( '%s', 'sprout-spoon' ), single_cat_title( '', false ) ); ?></h1>
	</div>
	
	<div class="container">
	
		<div id="content">
		
			<div id="main" <?php if(get_theme_mod('sprout_spoon_sidebar_archive') == true) : ?>class="fullwidth"<?php endif; ?>>
				
				<?php if(get_theme_mod('sprout_spoon_archive_layout') == 'grid3' || get_theme_mod('sprout_spoon_archive_layout') == 'full_grid3') : ?>
					<ul class="sp-grid col3">
				<?php elseif(get_theme_mod('sprout_spoon_archive_layout') == 'grid2' || get_theme_mod('sprout_spoon_archive_layout') == 'full_grid2') : ?>
					<ul class="sp-grid col2">
				<?php endif; ?>
				
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						
					<?php if(get_theme_mod('sprout_spoon_archive_layout') == 'grid3' || get_theme_mod('sprout_spoon_archive_layout') == 'grid2') : ?>
					
						<?php get_template_part('content', 'grid'); ?>
					
					<?php elseif(get_theme_mod('sprout_spoon_archive_layout') == 'full_grid3' || get_theme_mod('sprout_spoon_archive_layout') == 'full_grid2') : ?>
					
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'grid'); ?>
						<?php endif; ?>
						
					<?php elseif(get_theme_mod('sprout_spoon_archive_layout') == 'list') : ?>
						
						<?php get_template_part('content', 'list'); ?>
						
					<?php elseif(get_theme_mod('sprout_spoon_archive_layout') == 'full_list') : ?>
					
						<?php if( $wp_query->current_post == 0 && !is_paged() ) : ?>
							<?php get_template_part('content'); ?>
						<?php else : ?>
							<?php get_template_part('content', 'list'); ?>
						<?php endif; ?>
						
					<?php else : ?>
						
						<?php get_template_part('content'); ?>
						
					<?php endif; ?>	
						
				<?php endwhile; ?>
				
				<?php if(get_theme_mod('sprout_spoon_archive_layout') == 'grid3' || get_theme_mod('sprout_spoon_archive_layout') == 'full_grid3' || get_theme_mod('sprout_spoon_archive_layout') == 'grid2' || get_theme_mod('sprout_spoon_archive_layout') == 'full_grid2') : ?></ul><?php endif; ?>
				
					<?php solopine_pagination(); ?>
				
				<?php else : ?>
					
					<?php get_template_part('content', 'none'); ?>
					
				<?php endif; ?>
			
			</div>

<?php if(get_theme_mod('sprout_spoon_sidebar_archive')) : else : ?><?php get_sidebar(); ?><?php endif; ?>
<?php get_footer(); ?>