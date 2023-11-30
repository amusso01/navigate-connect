<?php

  /* ***** ----------------------------------------------- ***** **
  ** ***** ACF
  ** ***** ----------------------------------------------- ***** */

  if ( function_exists( 'acf_add_options_page' ) ) {

    // Add Global Options tab to WP Admin
    acf_add_options_page( array(
      'menu_title'  => __( 'Global Options', 'bymattlee' ),
      'page_title'  => __( 'Global Options', 'bymattlee' ),
      'menu_slug'   => 'global-options',
      'position'    => '31',
      'capability'  => 'edit_posts',
      'icon_url'    => 'dashicons-admin-generic',
    ));
    
    // Add Footer Options section under the Global Options tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Footer', 'bymattlee' ),
      'menu_title'  => __( 'Footer', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));

    // Add Contact Options section under the Global Options tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Contact', 'bymattlee' ),
      'menu_title'  => __( 'Contact', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));

    // Add Service providers Options section under the Global Options tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Service providers', 'bymattlee' ),
      'menu_title'  => __( 'Service providers', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));

    // Add Index Options section under the Global Options tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Index', 'bymattlee' ),
      'menu_title'  => __( 'Index', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));

    // Add Mandate Options section under the Global Options tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Mandate', 'bymattlee' ),
      'menu_title'  => __( 'Mandate', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));

    // Add Deal Options section under the Global Options tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Deal', 'bymattlee' ),
      'menu_title'  => __( 'Deal', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));
    
    // Add Forms Options section under the Global Options tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Forms', 'bymattlee' ),
      'menu_title'  => __( 'Forms', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));

  }

?>