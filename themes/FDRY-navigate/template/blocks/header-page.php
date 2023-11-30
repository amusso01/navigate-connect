<section class="block-header-page"  style="background-image: url(<?= get_the_post_thumbnail_url() ?>);">

  <div class="content-block">

    <div class="block-header-page__contents">
      <h1><?= $fields['title'] ? $fields['title'] : get_the_title()?></h1>
      <div class="block-header-page__text">
        <?= $fields['intro'] ?>
      </div>
    </div>

  </div>

</section>