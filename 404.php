<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

	<section id="primary" class="content-area col-sm-12 col-lg-<?= !get_theme_mod('sidebar_page_disable') && is_active_sidebar( 'sidebar-1' ) ? '8' : '12'; ?>">
		<div id="main" class="site-main" role="main">

			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wp-accessible-starter' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'wp-accessible-starter' ); ?></p>
					<p>
						<a href="<?= home_url(); ?>"><?= __('Home Page'); ?></a>
					</p>
					<?php
						get_search_form();
					?>

				</div><!-- .page-content -->
			</section><!-- .error-404 -->

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
if (!get_theme_mod('sidebar_page_disable')) {
	get_sidebar();
}
get_footer();
