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


  register_nav_menus( array(
    'primary'   => 'Top primary menu',
    // 'secondary' => __( 'Secondary menu in left sidebar', 'twentyfourteen' ),
  ) );


  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list',
  ) );

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
  wp_enqueue_script( 'theme_script', get_template_directory_uri() . '/js/main.js', array('jquery'), '1.0', true );

}

add_action( 'wp_enqueue_scripts', 'theme_scripts' );


/*--------------------------------------------------------------------------------------*/
/*  Enqueue Styles */
/*--------------------------------------------------------------------------------------*/
function theme_styles() {
  global $wp_styles;

  wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'foundation', get_template_directory_uri() . '/css/foundation.min.css', array(), '1.0', 'all' );
  wp_enqueue_style( 'theme_style', get_template_directory_uri() . '/css/main.css', array(), '1.0', 'all' );

}
add_action( 'wp_enqueue_scripts', 'theme_styles' );


/*--------------------------------------------------------------------------------------*/
/*  Widgets */
/*--------------------------------------------------------------------------------------*/
function theme_widgets_init() {

  register_sidebar( array(
    'name'          => 'Primary Sidebar',
    'id'            => 'sidebar-1',
    'description'   => 'Main sidebar that appears on the left.',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget'  => '</aside>',
    'before_title'  => '<h1 class="widget-title">',
    'after_title'   => '</h1>',
  ) );

}
add_action( 'widgets_init', 'theme_widgets_init' );
