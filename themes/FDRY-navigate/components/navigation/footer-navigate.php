<?php
/**
 * Primary Nav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

if ( has_nav_menu( 'footernavigate' ) ) :
    wp_nav_menu([
        'theme_location'    => 'footernavigate',
        'menu_class'        => 'footer-menu',
        'container'         => 'nav',
        'container_class'   => 'footer-menu',
        'depth'             => 1
    ]);
endif;
