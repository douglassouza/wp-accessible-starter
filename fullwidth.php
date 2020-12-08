<?php
/**
* Template Name: Full Width
 */

get_header(); ?>

	<section id="primary" class="content-area px-0 col-sm-12 col-md-12 col-lg-<?= !get_theme_mod('sidebar_page_disable') && is_active_sidebar( 'sidebar-1' ) ? '8' : '12'; ?>">
		<div id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

		</div><!-- #main -->
	</section><!-- #primary -->

<?php
if (!get_theme_mod('sidebar_page_disable')) {
	get_sidebar();
}
get_footer();
