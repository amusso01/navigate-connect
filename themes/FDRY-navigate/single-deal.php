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

	<main id="main" class="site-main single-deal-main">
		<div class="content-block">

			<div class="back">
				<a href="<?= get_post_type_archive_link( 'deal' ) ?> "><i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i> Back to All Deal</a>
			</div>

			<div class="content">
				<h1><?= get_the_title() ?></h1>
				<p class="short-descritpion"><?= get_field('short_deal_description') ?></p>
				<div class="deal-info-buble">
					<div class="deal-details">

						<div class="investment deal-details__info">
							<p class="title">Deal size (approx)</p>
							<p><i><?php get_template_part( 'svg-template/svg', 'money' ) ?></i> <?= get_field('deal_size') ?></p>
						</div>

						<div class="close-date deal-details__info">
							<p class="title">Close date</p>
							<p><i><?php get_template_part( 'svg-template/svg', 'calendar' ) ?></i> <?= get_field('close_date') ?></p>
						</div>

						<div class="fee deal-details__info">
							<p class="title">Success fee</p>
							<p><i><?php get_template_part( 'svg-template/svg', 'success' ) ?></i> <?= get_field('success_fee') ?>%</p>
						</div>

						<div class="location deal-details__info">
							<p class="title">Location(s)</p>
							<p><i><?php get_template_part( 'svg-template/svg', 'location' ) ?></i> <span class="buble"><?= get_field('location')->name ?></span></p>
						</div>

						<div class="fee deal-details__info">
							<p class="title">Form of raising</p>
							<p><i><?php get_template_part( 'svg-template/svg', 'mandate' ) ?></i> <span class="buble"><?= get_field('form_of_raising') ?></span></p>
						</div>



					</div>

					<div class="sector__container deal-details__info">
						<p class="title">Sector(s)</p>
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

				<?php if(get_field('company_overview') ) : ?>
				<div class="singel-deal__row company-overview">
					<h3>Company overview</h3>
					<p><?= get_field('company_overview') ?></p>
				</div>
				<?php endif; ?>

				<?php if(get_field('rationale') ) : ?>
				<div class="singel-deal__row rationable">
					<h3>Rationale behind raising</h3>
					<p><?= get_field('rationale') ?></p>
				</div>
				<?php endif; ?>

				<div class="singel-deal__row column-2">
					<?php if(get_field('exclusive_mandate') ) : ?>
					<div class="mandate">
						<h3>Exclusive mandate</h3>
						<p><?= get_field('exclusive_mandate') ?></p>
					</div>
					<?php endif; ?>

					<?php if(get_field('deal_type') ) : ?>
					<div class="deal-type">
						<h3>Deal type</h3>
						<p><?= get_field('deal_type')->name ?></p>
					</div>
					<?php endif; ?>
				</div>
				

				<?php if(get_field('deal_size') ) : ?>
				<div class="deal-size">
					<h3>Deal size</h3>
					<p><?= get_field('deal_size') ?></p>
				</div>
				<?php endif; ?>

			</div>
		</div>

		<div class="single-deal__contact-link">
			<a href="<?= site_url( '/form-register-interest' ) ?>/?post_type='<?= $post_type ?>'&id=<?= $post_id ?>&user=<?= $user_id ?>" class="btn">Show interest</a>
		</div>
	</main><!-- #main -->


<?php
get_footer();
