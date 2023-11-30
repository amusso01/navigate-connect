<?php
/**
 * The template for displaying frontpage by default
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

get_header();
?>

<section class="site-hero">
	
	<?php get_template_part( 'components/front/hero' ); ?>

</section>

<main class="main homepage-main" role="main">

	<?php render_theme_component('dashboard-welcome') ?>

	<?php render_theme_component('dashboard-latest-deal') ?>
	
	<?php render_theme_component('dashboard-mandate') ?>

	<?php render_theme_component('dashboard-commentary') ?>

</main>

<?php get_footer(); ?>
