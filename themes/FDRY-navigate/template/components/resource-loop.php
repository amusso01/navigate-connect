<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // changed all page to paged
  $args = array(
    'post_type' => 'resource', 
    'posts_per_page' => 30,
    'paged' => $paged, 
  );




$the_query = new WP_Query( $args );
?>

<div class="resource__loop">
  <div class="content-block">
  
    <div class="resource__grid">


      <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post() ; ?>
      
          <?php render_theme_component('resource-card') ?>

        <?php endwhile;  ?>
        <?php wp_reset_postdata(); ?>

      <?php else : ?>
        NO POST
      <?php endif; ?>

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
            'base' => get_pagenum_link(1) . '%_%',
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