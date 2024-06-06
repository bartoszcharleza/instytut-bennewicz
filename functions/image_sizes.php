<?php

/**
 * Add custom wordpress image sizes
 */
function addImageSizes()
{
	add_image_size('fullhd', 1920, 1080, false);
	add_image_size('carousel', 600, 600, false);
	add_image_size('avatar', 150, 150, false);
	add_image_size('post-small', 450, 450, false);
	add_image_size('post-big', 1250, 850, false);
}
add_action('after_setup_theme', 'addImageSizes');
