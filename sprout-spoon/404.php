<?php get_header(); ?>
	
	<div class="container">
		
		<div id="content">
		
			<div id="main">
			
				<div class="post-entry nothing">
				
					<div class="error-page">
						
						<h1><?php esc_html_e( 'Erro!', 'sprout-spoon' ); ?></h1>
						<p><?php esc_html_e( 'Desculpe, mas a página que você procura não existe. Tente novamente!', 'sprout-spoon' ); ?></p>
						<?php get_search_form(); ?>
						
					</div>
					
				</div>
			
			</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>