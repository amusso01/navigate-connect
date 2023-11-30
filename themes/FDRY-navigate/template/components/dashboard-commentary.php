<?php
$args = array(
  'post_type' => 'post', // - retrieves any type except revisions and types with 'exclude_from_search' set to true.
  'posts_per_page' => 3, // (int) - number of post to show per page (available with Version 2.1). Use 'posts_per_page' => -1 to show all posts.
);

$the_query = new WP_Query( $args );
?>

<section class="component-latest-commentary">
  <div class="content-block">
    <h3>Latest Commentary</h3>
    <div class="component-latest-commentary__grid">
    <?php if ( $the_query->have_posts() ) : ?>
      <?php while ( $the_query->have_posts() ) : $the_query->the_post() ; ?>

      <?php render_theme_component('post-card') ?>

      <?php endwhile; ?>
    <?php endif; ?>
    </div>

    <div class="link-container">
      <a href="<?= site_url( '/commentary' ) ?>" class="btn">All commentary</a>
    </div>
  </div>
</section>
