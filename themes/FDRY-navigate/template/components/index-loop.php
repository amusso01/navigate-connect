<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // changed all page to paged
if($_GET){
  $getYear = $_GET['search_year'];
  $getmonth = $_GET['search_month'];
  $args = array(
    'post_type' => 'post', 
    'posts_per_page' => 12,
    'paged' => $paged, 
    'date_query' => array( // (array) - Date parameters (available with Version 3.7).
      // these are super powerful. check out the codex for more comprehensive code examples http://codex.wordpress.org/Class_Reference/WP_Query#Date_Parameters
        array(
        'year' => $getYear, // (int) - 4 digit year (e.g. 2011).
        'month' => $getmonth, // (int) - Month number (from 1 to 12).
      ),
    ),
  );
}else{
  $args = array(
    'post_type' => 'post', 
    'posts_per_page' => 12,
    'paged' => $paged, 
  );
}




$the_query = new WP_Query( $args );
?>

<div class="index__loop">
  <div class="content-block">
  
    <div class="index__grid">


      <?php if ( $the_query->have_posts() ) : ?>
        <?php while ( $the_query->have_posts() ) : $the_query->the_post() ; ?>
      
          <?php render_theme_component('post-card') ?>

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