<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // changed all page to paged
$getSector = '';
if($_GET){
  $getSector = $_GET['sector'];
  $args = array(
    'post_type' => 'service-provider', 
    'posts_per_page' => 12,
    'paged' => $paged,
    'tax_query' => array(
      // 'relation' => 'OR',
      array(
        'taxonomy' => 'sector',
        'field' => 'slug', 
        'terms' => $getSector,
      ),
      // array(
      //   'taxonomy' => 'post_tag',
      //   'field' => 'term_id',
      //   'terms' => $tagsFound
      // ),
    )  
  );
}else{
  $args = array(
    'post_type' => 'service-provider', 
    'posts_per_page' => 12,
    'paged' => $paged, 
  );
}




$the_query = new WP_Query( $args );
?>

<div class="service-providers__loop">
  <div class="content-block">
  
    <div class="service-providers__grid">


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
      
        <article class="service-buble">
          <p class="service-title h3">
            <?= get_the_title() ?>
          </p>

          <p class="excerpt"><?= get_the_excerpt() ?></p>

          <div class="service-deatails">
            <p>Sector(s)</p>
            <div class="sectors">
              <i><?php get_template_part( 'svg-template/svg', 'sectors' ) ?></i>
              <?php foreach($sectors as $key => $sector) : ?>
                <div class="sector-buble" style="background-color: <?= $key ?>;">
                  <?= $sector ?>
                </div>
              <?php endforeach ?>
            </div>

            <div class="link">
              <a class="btn"  href="<?= get_the_permalink() ?>">View service provider</a>
            </div>
          </div>
        </article>

        <?php endwhile;  ?>

      <?php else : ?>
        NON CI SN TERMS
      <?php endif; ?>

      <?php wp_reset_postdata(); ?>
    </div>
    
  </div>
</div>




<div class="pagination__wrapper" >
  <div class="content-block">

    <?php  
    $total_pages = $the_query->max_num_pages;

    if ($total_pages > 1){

        $current_page = max(1, get_query_var('paged'));
        echo paginate_links(array(
            'base' => remove_query_arg( 'sector',get_pagenum_link(1) ) . '%_%',
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => false,
            'next_text'    => false,
        ));
    }    
    ?> 

  </div>
</div>