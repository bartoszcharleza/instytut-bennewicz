<?php

/**
 * Check if the post is older than $days
 *
 * @param String
 *
 * @return Integer $days
 */
function isOld($days)
{
  $days   = (int)$days;
  $offset = $days * 60 * 60 * 24;

  return (get_post_time() < date('U') - $offset) ? true : false;
}

/**
 * Returns the String of the asset in dist folder
 *
 * @param String asset
 *
 * @return String url
 */
function asset($asset)
{
  echo get_template_directory_uri() . '/dist/' . $asset;
}

/**
 * Inject inline SVG
 *
 * @param String name
 *
 * @return String HTML
 */
function svg($asset)
{
  $getOptions = array(
    "ssl" => array(
      "verify_peer"      => false,
      "verify_peer_name" => false
    )
  );
  echo file_get_contents(get_template_directory_uri() . '/dist/img/' . $asset, false, stream_context_create($getOptions));
}

function detectSafari($classes)
{
  $agent = $_SERVER['HTTP_USER_AGENT'];
  if (stripos($agent, 'Safari') !== false && stripos($agent, 'Chrome') == false) {
    $classes[] = 'safari';
  }

  return $classes;
}
add_filter('body_class', 'detectSafari');


/**
 * Log php output to console, why not
 */
function console_log($data)
{
  $output = $data;
  if (is_array($output)) {
    $output = implode(',', $output);
  }

  // print the result into the JavaScript console
  echo "<script>console.log( 'PHP LOG: " . $output . "' );</script>";
}
