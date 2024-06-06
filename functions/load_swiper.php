<?php
function load_swiper()
{
  wp_enqueue_script('swiper-bundle-js', get_template_directory_uri() . '/inc/swiper-bundle.min.js', array('jquery'), '1.0.0', true);

  wp_enqueue_style('swiper-bundle-css', get_template_directory_uri() . '/inc/swiper-bundle.min.css');
}

add_action('wp_enqueue_scripts', 'load_swiper');
