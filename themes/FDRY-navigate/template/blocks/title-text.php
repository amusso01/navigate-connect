<section class="block-title-text" >

  <div class="content-block">
    <?php if($fields['title']) : ?>
    <div class="block-title-text__title">
      <?= $fields['title'] ? $fields['title'] : get_the_title()?>
    </div>
    <?php endif; ?>

    <?php if($fields['text']) : ?>
    <div class="block-title-text__text">
      <?= $fields['text'] ?>
    </div>
    <?php endif; ?>
  </div>

</section>