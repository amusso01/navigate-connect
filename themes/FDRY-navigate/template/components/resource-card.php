<?php 
$user_id = get_current_user_id();
$post_id = get_the_ID();
$bgColor = get_field('front_cover_color', $post_id);

$isDownload = get_field('download');
$download = get_field('download_document');

?>

<article class="resource-card"  >

  <div class="overlay" style="background-color: <?= $bgColor ?>"></div>

  <div class="card-content">
    <div class="top">
      <i class="icon">
        <?php get_template_part( 'svg-template/svg', 'folder' ) ?>
      </i>
  
      <h3><?= get_the_title() ?></h3>
    </div>

    <p class="excerpt"><?= get_the_content() ?></p>
    <?php if($isDownload) : ?>
      <a class="resource-link btn" href="<?= $download ?>" download >Download<i><?php get_template_part( 'svg-template/svg', 'download' ) ?></i></a>
    <?php else : ?>
      <a class="resource-link cnt btn" href="<?= site_url( '/form-register-interest' )?>/?post_type='resource'&id=<?= $post_id ?>&user=<?= $user_id ?>">Contact</a>
    <?php endif; ?>

  </div>


</article>