<?php

add_filter('wp_nav_menu_objects', 'my_wp_nav_menu_objects', 10, 2);

function my_wp_nav_menu_objects($items, $args)
{

    foreach ($items as &$item) {

        $element_type = get_field('menu_element_type', $item);
        if ($element_type == 'option-01') {
            array_push($item->classes, 'menu-courses');
        } elseif ($element_type == 'option-02') {
            array_push($item->classes, 'menu-courses__column-title');
        } elseif ($element_type == 'option-03') {
            array_push($item->classes, 'menu-courses__main-course');
        } elseif ($element_type == 'option-04') {
            array_push($item->classes, 'menu-courses__main-course-with-subcourses');
        } elseif ($element_type == 'option-05') {
            array_push($item->classes, 'menu-courses__subscourses-title');
        } elseif ($element_type == 'option-06') {
            array_push($item->classes, 'menu-courses__subcourse');
        }
    }
    return $items;
}
