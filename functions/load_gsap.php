<?php

function load_gsap()
{
  wp_enqueue_script('gsap', get_template_directory_uri() . '/inc/gsap.min.js', array(), false, true);
  wp_enqueue_script('gsapsmoother', get_template_directory_uri() . '/inc/ScrollSmoother.min.js', array(), false, true);
  wp_enqueue_script('gsaptrigger', get_template_directory_uri() . '/inc/ScrollTrigger.min.js', array(), false, true);
  wp_enqueue_script('gsapanimations', get_template_directory_uri() . '/inc/my-animations.js', array(), false, true);
  // wp_enqueue_script('gsapscrollto', get_template_directory_uri() . '/inc/ScrollToPlugin.min.js', array(), false, true);
}
add_action('wp_enqueue_scripts', 'load_gsap');
