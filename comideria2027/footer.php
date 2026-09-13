<?php
/**
 * Rodapé do site.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;
?>
</main><!-- #content -->

<footer id="colophon" class="site-footer">
	<div class="wrap footer-grid">
		<div class="footer-brand">
			<?php comideria_site_logo( 'footer-logo' ); ?>
			<div class="footer-social">
				<?php
				// Perfis conhecidos do rodapé histórico (article:publisher no JSON-LD atual do site).
				$socials = array(
					'facebook'  => array( 'label' => 'Facebook', 'url' => 'https://facebook.com/comideria' ),
					'twitter'   => array( 'label' => 'Twitter', 'url' => 'https://twitter.com/comideria' ),
					'instagram' => array( 'label' => 'Instagram', 'url' => 'https://instagram.com/comideria' ),
				);
				foreach ( $socials as $network => $data ) :
					?>
					<a href="<?php echo esc_url( $data['url'] ); ?>" rel="me noopener" aria-label="<?php echo esc_attr( $data['label'] ); ?>">
						<?php echo comideria_social_icon( $network ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</a>
					<?php
				endforeach;
				?>
			</div>
		</div>

		<nav aria-label="<?php esc_attr_e( 'Categorias', 'comideria' ); ?>">
			<h2><?php esc_html_e( 'Explorar', 'comideria' ); ?></h2>
			<ul>
				<?php
				$footer_cats = get_categories(
					array(
						'parent'     => 0,
						'hide_empty' => true,
						'orderby'    => 'count',
						'order'      => 'DESC',
						'number'     => 6,
						'exclude'    => get_option( 'default_category' ),
					)
				);
				foreach ( $footer_cats as $cat ) :
					?>
					<li><a href="<?php echo esc_url( get_category_link( $cat ) ); ?>"><?php echo esc_html( $cat->name ); ?></a></li>
					<?php
				endforeach;
				?>
			</ul>
		</nav>

		<nav aria-label="<?php esc_attr_e( 'Links institucionais', 'comideria' ); ?>">
			<h2><?php esc_html_e( 'Comideria', 'comideria' ); ?></h2>
			<?php
			if ( has_nav_menu( 'footer' ) ) {
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'container'      => false,
						'items_wrap'     => '<ul>%3$s</ul>',
					)
				);
			} else {
				?>
				<ul>
					<?php
					wp_list_pages(
						array(
							'title_li' => '',
							'depth'    => 1,
						)
					);
					?>
				</ul>
				<?php
			}
			?>
		</nav>
	</div>

	<div class="bottom-bar wrap">
		<p>&copy; <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'Todos os direitos reservados.', 'comideria' ); ?></p>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
