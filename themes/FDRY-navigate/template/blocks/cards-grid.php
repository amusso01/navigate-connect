<section class="block-cards-grid">

  <div class="content-block">

    <div class="block-cards-grid__grid">
      <?php foreach($fields['cards'] as $card ) : ?>
        <article class="block-cards-grid__single-card"   style="background-color: <?=  $card['background_color'] ?>">
          <div class="icon">
            <i><?= acfFile_toSvg($card['icon']) ?></i>
          </div>
          <h3><?= $card['title'] ?></h3>
          <p class="content">
            <?= $card['content'] ?>
          </p>
          <a href="<?= $card['link']['url'] ?>" class="btn"><?= $card['link']['title']?> <i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i></a>
        </article>
      <?php endforeach; ?>
    </div>

  </div>

</section>