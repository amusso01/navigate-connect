<section class="block-image-text" id="<?= $fields['block_id'] ?>">

  <div class="content-block">

    <div class="block-image-text__grid block-image-text__grid-<?= $fields['where_is_the_image'] ?>">

      <div class="content">
        <h2><?= $fields['title'] ?></h2>
        <div class="paragraph">
          <?= $fields['paragraph'] ?>
        </div>
        <?php if($fields['link']) : ?>
        <a href="<?= $fields['link']['url'] ?>" class="btn"><?= $fields['link']['title'] ?></a>
        <?php endif;  ?>
      </div>

      <div class="image">
        <figure class="img-container">
          <img
            data-sizes="auto"
            data-srcset="<?php bml_the_image_srcset($fields['image']) ?>"
            alt="article image"
            style="max-width: 100%; max-height: 100%;"
            class="lazyload" />
        </figure>
      </div>

    </div>

  </div>

</section>