<?php

add_filter('jpeg_quality', function ($arg) {
    return 100;
});

add_filter('wp_editor_set_quality', function ($arg) {
    return 100;
});

add_filter('big_image_size_threshold', '__return_false');
