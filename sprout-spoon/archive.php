<?php get_header(); ?>
	
	<div class="archive-box">
					
		<?php
			if ( is_day() ) :
				echo wp_kses( __( '<span>Daily Archives:</span>', 'sprout-spoon' ), array( 'span' => array( 'class' => array() ) ) );
				
				printf( wp_kses( __( '<h1>%s</h1>', 'sprout-spoon' ), array( 'h1' => array( 'class' => array() ) ) ), get_the_date() );

			elseif ( is_month() ) :
			
				
				echo wp_kses( __( '<span>Monthly Archives:</span>', 'sprout-spoon' ), array( 'span' => array( 'class' => array() ) ) );
				
				printf( wp_kses( __( '<h1>%s</h1>', 'sprout-spoon' ), array( 'h1' => array( 'class' => array() ) ) ), get_the_date( _x( 'F Y', 'monthly archives date format', 'sprout-spoon' ) ) );
				

			elseif ( is_year() ) :
				
				echo wp_kses( __( '<span>Yearly Archives:</span>', 'sprout-spoon' ), array( 'span' => array( 'class' => array() ) ) );
				
				printf( wp_kses( __( '<h1>%s</h1>', 'sprout-spoon' ), array( 'h1' => array( 'class' => array() ) ) ), get_the_date( _x( 'Y', 'yearly archives date format', 'sprout-spoon' ) ) );
				

			else :
				echo wp_kses( __( '<h1>Archives:</h1>', 'sprout-spoon' ), array( 'h1' => array( 'class' => array() ) ) );

			endif;
		?>
	
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