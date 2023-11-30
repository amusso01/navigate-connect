<article class="post-card">
  <figure>
    <img
      data-sizes="auto"
      data-srcset="<?php bml_the_image_srcset(get_post_thumbnail_id()) ?>"
      alt="article image"
      style="max-width: 100%; max-height: 100%;"
      class="lazyload" />
  </figure>

  <div class="post-card__info">
    <div class="date"><?= get_the_date('M d, Y' ) ?></div>
    <h4><?= get_the_title() ?></h4>
    <p class="excerpt">
      <?= get_the_excerpt() ?>
    </p>

    <a href="<?= get_the_permalink() ?>">Learn more <i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i></a>
  </div>
</article>