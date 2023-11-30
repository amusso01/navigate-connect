<?php 
get_header();
?>

<?php render_theme_component('header-deals') ?>

<main role="main" class="site-main services-main">

<?php render_theme_component('deal-search') ?>

<?php render_theme_component('deal-loop') ?>

</main><!-- #main -->


<?php
get_footer();