<?php
function load_toggler()
{
  wp_enqueue_script('toggler-js', get_template_directory_uri() . '/inc/toggler.js', array('jquery'), '1.0.0', true);
}

add_action('wp_enqueue_scripts', 'load_toggler');
