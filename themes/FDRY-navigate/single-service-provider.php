<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foundry
 */

get_header();

$post_id = get_the_ID();
$post_type = get_post_type( $post->ID );
$user_id = get_current_user_id();
?>

	<main id="main" class="site-main single-service-main">
		<div class="content-block">

			<div class="back">
				<a href="<?=  get_post_type_archive_link( 'service-provider' ) ?> "><i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i> Back to Service Providers</a>
			</div>

			<div class="content">
				<h1><?= get_the_title() ?></h1>
				<?php
					the_content();
				?>
			</div>
		</div>

		<div class="single-service__contact-link">
			<a href="<?= site_url( '/form-register-interest' ) ?>/?post_type='<?= $post_type ?>'&id=<?= $post_id ?>&user=<?= $user_id ?>" class="btn">Contact Navigate Connect</a>
		</div>
	</main><!-- #main -->


<?php
get_footer();
