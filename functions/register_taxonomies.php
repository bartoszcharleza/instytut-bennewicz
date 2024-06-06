<?php

function taxonomy_blog_post()
{
    $labels = array(
        'name' => _x('Kategorie bloga', 'Kategorie bloga', 'websitestyle'),
        'singular_name' => _x('Kategoria bloga', 'Kategoria bloga', 'websitestyle'),
    );

    $args = array(
        'label' => __('Kategoria bloga', 'websitestyle'),
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'kategoria-bloga'),
        'publicly_queryable' => false,
    );

    register_taxonomy('kategoria-bloga', array('wpis-blogowy'), $args);
}
add_action('init', 'taxonomy_blog_post');
