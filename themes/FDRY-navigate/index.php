<?php
/**
 * The index file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */


 get_header();
 ?>
 
 <?php render_theme_component('header-index') ?>
 
 <main role="main" class="site-main index-main">

 	<?php render_theme_component('index-filter') ?>

 	<?php render_theme_component('index-loop') ?>
 
 </main><!-- #main -->
 
 
 <?php
 get_footer();