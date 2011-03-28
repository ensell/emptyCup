<?php

// Change Excerpt length
//----------------------------------------------------
function new_excerpt_length($length) { return 30; }
add_filter('excerpt_length', 'new_excerpt_length');

// Sidebar Widgets
//----------------------------------------------------
if ( function_exists('register_sidebar') )
{
  register_sidebar(array(
    'before_widget' => '<li id="%1$s" class="widget %2$s">',
    'after_widget' => '</li>',
    'before_title' => '',
    'after_title' => '',
  ));
}

// Pagination Check
//----------------------------------------------------
function will_paginate() 
{
  global $wp_query;
  
  if ( !is_singular() ) 
  {
    $max_num_pages = $wp_query->max_num_pages;
    
    if ( $max_num_pages > 1 ) 
    {
      return true;
    }
  }
  return false;
}

// Bloginfo Shortcode
//----------------------------------------------------
function digwp_bloginfo_shortcode( $atts ) {
   extract(shortcode_atts(array(
       'key' => '',
   ), $atts));
   return get_bloginfo($key);
}
add_shortcode('bloginfo', 'digwp_bloginfo_shortcode');


// Including jQuery, The Right Way
//----------------------------------------------------
if( !is_admin()){
   wp_deregister_script('jquery'); 
   wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"), false, '1.4'); 
   wp_enqueue_script('jquery');
}

?>