<?php 
get_header();
?>

<?php render_theme_component('header-mandates') ?>

<main role="main" class="site-main services-main">

<?php render_theme_component('mandates-search') ?>

<?php render_theme_component('mandates-loop') ?>

</main><!-- #main -->


<?php
get_footer();