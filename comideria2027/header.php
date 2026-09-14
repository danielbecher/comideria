<?php
/**
 * Cabeçalho do site.
 *
 * @package Comideria_2027
 */

defined( 'ABSPATH' ) || exit;
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Pular para o conteúdo', 'comideria' ); ?></a>

<header id="masthead" class="site-header">
	<div class="wrap">
		<div class="site-branding">
			<?php comideria_site_logo(); ?>
		</div>

		<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Menu principal', 'comideria' ); ?>">
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'container'      => false,
					'fallback_cb'    => 'comideria_nav_menu_fallback',
				)
			);
			?>
		</nav>

		<details class="search-toggle">
			<summary aria-label="<?php esc_attr_e( 'Abrir busca', 'comideria' ); ?>">
				<?php echo comideria_search_icon(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</summary>
			<?php get_search_form(); ?>
		</details>

		<details class="nav-toggle">
			<summary aria-label="<?php esc_attr_e( 'Abrir menu', 'comideria' ); ?>">
				<?php echo comideria_hamburger_icon(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
			</summary>
			<nav class="mobile-menu" aria-label="<?php esc_attr_e( 'Menu mobile', 'comideria' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'container'      => false,
						'items_wrap'     => '%3$s',
						'fallback_cb'    => 'comideria_nav_menu_fallback',
					)
				);
				?>
			</nav>
		</details>
	</div>
</header>

<main id="content" class="site-main">
