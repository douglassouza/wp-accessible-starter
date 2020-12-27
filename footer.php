<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
			</div><!-- .row -->
		</div><!-- .container -->
		<?php if(get_theme_mod('scroll-top')): ?>
		<div class="scroll-top"> <!--scrollbar at the end of main-->
			<a class="scroll-top-link text-center rounded-circle fas fa-angle-up" href="#scrolltop"><span class="sr-only"><?= __('Back to top', 'wp-accessible-starter'); ?></span></a> <!--href="#" navigates to the top of the page-->
		</div>
		<?php endif; ?>
	</div><!-- #content -->
	<footer id="colophon" class="site-footer text-center link-anchor" role="contentinfo">
		<?php get_template_part( 'footer-widget' ); ?>
		<div class="container py-1">
            <div class="site-info">
				&copy; <?php echo date('Y'); ?> <?php echo '<a href="'.home_url().'">'.get_bloginfo('name').'</a>'; ?>
				<?php if(!empty(get_theme_mod('footer_copyright_description'))): ?>
					<span> | <?= get_theme_mod('footer_copyright_description'); ?></span>
				<?php endif; ?>
            </div><!-- close .site-info -->
		</div>
	</footer><!-- #colophon -->
<?php endif; ?>
</div><!-- #page -->
<noscript> Para a funcionalidade completa deste site, &eacute; necess&aacute;rio habilitar o JavaScript. Aqui est&aacute; o <a href="https://www.enable-javascript.com/pt/" target="_blank"> instru&ccedil;&otilde;es sobre como habilitar o JavaScript no seu navegador da Web.</a> </noscript>
<?php wp_footer(); ?>
</body>
</html>