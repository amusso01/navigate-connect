<?php 
/* Template Name: Resources
Template Post Type: page */ 


get_header();
?>

<?php render_theme_component('header-resources') ?>

<main role="main" class="site-main resources-main">

  <?php render_theme_component('resource-loop') ?>

</main><!-- #main -->


<?php
get_footer();