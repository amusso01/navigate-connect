<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

?>

<?php 

$footerContent = get_field('footer_content', 'option');
$address = get_field('address', 'option');

?>

</div><!-- #content -->

	<footer class="site-footer">
		<div class="site-footer__inner">
			<div class="site-footer__item site-footer__top ">

				<div class="content-block">
					<div class="site-footer__top-grid">
						<div class="site-footer__top-logo">
							<?php get_template_part( 'svg-template/svg', 'logo-black' ) ?>
						</div>
		
						<div class="site-footer__top-menu">
							<p class="title">Navigate Connect</p>
							<?php get_template_part( 'components/navigation/footer-navigate' ) ?>
						</div>
						<div class="site-footer__top-menu">
							<p class="title">More information</p>
							<?php get_template_part( 'components/navigation/footer-info' ) ?>
						</div>
						<div class="site-footer__top-menu">
							<p class="title">Contact details</p>
							<div class="details">
								<?= $address ?>
							</div>
						</div>
					</div>
				</div>
				
			
			</div>

			<div class="site-footer__item site-footer__bottom ">
		
				<div class="content-block">
					<div class="site-footer__bottom-content">
						<?= $footerContent ?>
					</div>
	
					<div class="site-footer__bottom-nav">
						<?php get_template_part( 'components/navigation/footer-legal' ) ?>
	
						<?php get_template_part( 'components/footer/copyright' ) ?>
					</div>
				</div>

			</div>

		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
