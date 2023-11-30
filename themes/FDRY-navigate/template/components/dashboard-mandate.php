<?php
$args = array(
  'post_type' => 'mandate', // - retrieves any type except revisions and types with 'exclude_from_search' set to true.
  'posts_per_page' => 3, // (int) - number of post to show per page (available with Version 2.1). Use 'posts_per_page' => -1 to show all posts.
);

$the_query = new WP_Query( $args );
?>

<section class="component-mandate">
  <div class="content-block">

    <div class="dashboard-main-buble">
      
      <div class="buble-info">
        <h3 class="title"> <i><?php get_template_part( 'svg-template/svg', 'mandate' ) ?></i>Latest Investor Mandates</h3>
        <p>Investors looking for investment opportunities</p>
      </div>
  
      <div class="dashboard-main-buble__grid">
      <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post() ; ?>
  
          <!-- GET SECTORS -->
          <?php 
          $sectors = [];
          $post_id = get_the_ID();
          $taxonomy = 'sector';
          $terms = get_the_terms( $post_id , $taxonomy );
          if ( $terms != null ){
            foreach( $terms as $term ) {
              $cc = get_field('color-code' , $term);
              $sectors[$cc] = $term->name;
            }
          }
      
          ?>
  
          <article class="dashboard-inner-buble">
            <div class="deal-title">
              <?= get_the_title() ?>
              <span class="divider"></span>
              <span class="money"><?= get_field('invested', $post_id ) ?></span>
            </div>
  
            <div class="deal-deatails">
              <div class="sectors">
                <i><?php get_template_part( 'svg-template/svg', 'sectors' ) ?></i>
                <?php foreach($sectors as $key => $sector) : ?>
                  <div class="sector-buble" style="background-color: <?= $key ?>;">
                    <?= $sector ?>
                  </div>
                <?php endforeach ?>
              </div>
  
              <div class="link">
                <a class="btn"  href="<?= get_the_permalink() ?>"><i><?php get_template_part( 'svg-template/svg', 'plus' ) ?></i> View deal <i class="carret"><?php get_template_part( 'svg-template/svg', 'carret' ) ?></i></a>
              </div>
            </div>
  
          </article>
  
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
      </div>
      
    </div>

  </div>
</section>
