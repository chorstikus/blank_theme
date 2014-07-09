<?php

/*--------------------------------------------------------------------------------------*/
/*  Set Max Content Width                               */
/*--------------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) $content_width = 1200;

/*--------------------------------------------------------------------------------------*/
/*  Theme Settings                                    */
/*--------------------------------------------------------------------------------------*/
function theme_setup() {

  remove_action( 'wp_head', 'wp_generator' );

  add_theme_support( 'automatic-feed-links' );

  register_nav_menu( 'primary', 'Hauptnavigation' );
  register_nav_menu( 'footer', 'Footernavigation' );

  add_theme_support( 'post-thumbnails' );

  // set_post_thumbnail_size( 290, 173, true );

  // add_image_size( 'new_thumbnail', 252, 150, true );

  if(is_admin()){

  }

}
add_action( 'after_setup_theme', 'theme_setup' );


/*--------------------------------------------------------------------------------------*/
/*  Enqueue Scripts */
/*--------------------------------------------------------------------------------------*/
function theme_scripts() {

  remove_action('wp_head', 'wp_print_scripts');
  remove_action('wp_head', 'wp_print_head_scripts', 9);
  remove_action('wp_head', 'wp_enqueue_scripts', 1);

  wp_enqueue_script( 'jquery', '/wp-includes/js/jquery/jquery.js', '', '', true );
  wp_enqueue_script( 'foundation', get_template_directory_uri() . '/js/foundation.min.js', array('jquery'), '1.0', true );
  wp_enqueue_script( 'theme_script', get_template_directory_uri() . '/js/script.js', array('jquery'), '1.0', true );

}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/*--------------------------------------------------------------------------------------*/
/*  Enqueue Styles */
/*--------------------------------------------------------------------------------------*/
function theme_styles() {
  global $wp_styles;

  wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'theme_style', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );
