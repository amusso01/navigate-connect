<?php 
get_header();
?>

<?php render_theme_component('header-service-providers') ?>

<main role="main" class="site-main services-main">

<?php render_theme_component('service-providers-search') ?>

<?php render_theme_component('service-providers-loop') ?>

</main><!-- #main -->


<?php
get_footer();