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


$sectors = [];
$taxonomy = 'sector';
$terms = get_the_terms( $post_id , $taxonomy );
if ( $terms != null ){
	foreach( $terms as $term ) {
		$cc = get_field('color-code' , $term);
		$sectors[$cc] = $term->name;
	}
}
?>

	<main id="main" class="site-main single-mandate-main">
		<div class="content-block">

			<div class="back">
				<a href="<?= get_post_type_archive_link( 'mandate' ) ?> "><i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i> Back to Investor Mandates</a>
			</div>

			<div class="content">
				<h1><?= get_the_title() ?></h1>
				<div class="mandate-info-buble">
					<div class="investment">
						<p>Amount to be invested</p>
						<p><i><?php get_template_part( 'svg-template/svg', 'money' ) ?></i> <?= get_field('invested') ?></p>
					</div>
					<div class="sector__container">
              <p>Sector(s)</p>
              <div class="sectors">
                <i><?php get_template_part( 'svg-template/svg', 'sectors' ) ?></i>
                <?php foreach($sectors as $key => $sector) : ?>
                  <div class="sector-buble" style="background-color: <?= $key ?>;">
                    <?= $sector ?>
                  </div>
                <?php endforeach ?>
              </div>
						</div>
				</div>
				<div class="content-wrapper">
					<?php the_content(); ?>
				</div>
			</div>
		</div>

		<div class="single-mandate__contact-link">
			<a href="<?= site_url( '/form-register-interest' ) ?>/?post_type='<?= $post_type ?>'&id=<?= $post_id ?>&user=<?= $user_id ?>" class="btn">Show interest</a>
		</div>
	</main><!-- #main -->


<?php
get_footer();
