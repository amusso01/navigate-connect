<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package foundry
 */

get_header();
?>

<main role="main" class="site-main page-main">

<?php $container_blocks = get_field('blocks'); ?>

<?php foreach ($container_blocks as $block) : ?>

		<?php $file_name = str_replace("block-", "", $block["acf_fc_layout"]); ?>

		<?php if (file_exists(get_template_directory() . '/template/blocks/' . $file_name . '.php')) :

				render_theme_block($file_name, ["id_block" => $block['block-' . $file_name]]);

		endif; ?>

<?php endforeach; ?>

<!-- CONTACT PAGE -->
<?php if(is_page( 61 )) : ?>
	<?php render_theme_component('contact-form') ?>
<?php endif; ?>

</main><!-- #main -->


<?php
get_footer();
