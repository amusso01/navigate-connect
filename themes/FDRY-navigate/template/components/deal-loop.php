<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // changed all page to paged
$getSector = '';
$getLocation = '';
if($_GET){
  $getSector = $_GET['sector'];
  $getLocation = $_GET['location'];
  $args = array(
    'post_type' => 'deal', 
    'posts_per_page' => -1,
    'paged' => $paged,
    'tax_query' => array(
      'relation' => 'OR',
      array(
        'taxonomy' => 'sector',
        'field' => 'slug', 
        'terms' => $getSector,
      ),
      array(
        'taxonomy' => 'location',
        'field' => 'slug',
        'terms' => $getLocation
      ),
    )  
  );
}else{
  $args = array(
    'post_type' => 'deal', 
    'posts_per_page' => 12,
    'paged' => $paged, 
  );
}




$the_query = new WP_Query( $args );
?>

<div class="deals__loop">
  <div class="content-block">
  
    <div class="deals__grid">


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
    
        <article class="deal-buble">
          <p class="deal-title h3">
            <?= get_the_title() ?>
          </p>

          <p class="excerpt"><?= get_field('short_deal_description') ?></p>

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
          <div class="link">
            <a class="btn"  href="<?= get_the_permalink() ?>">View Deal</a>
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
        $big = 99999999999;  

        echo paginate_links(array(
            'base' => str_replace( [ $big, '&#038;' ], [ '%#%', '&' ], get_pagenum_link( $big ) ),
            'format' => '/page/%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'prev_text'    => false,
            'next_text'    => false,
          //   'add_args' => array(
          //     'sector' => ( !empty($_GET['sector']) ) ? $_GET['sector'] : ''),
          //     'stage' => 'early-stage',
          // )
        ));
    }    
    ?> 

    
  </div>
</div>