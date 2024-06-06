<?php

function add_arrow_to_menu_item($items, $args)
{
    foreach ($items as &$item) {
        if (in_array('menu-item-has-children', $item->classes)) {
            $item->title .= ' <span class="menu-arrow"></span>'; // Możesz użyć dowolnego symbolu lub znacznika HTML dla strzałki
        }
    }
    return $items;
}
add_filter('wp_nav_menu_objects', 'add_arrow_to_menu_item', 10, 2);

function my_custom_menu_item($title, $item, $args, $depth)
{
    // Sprawdź, czy element menu ma przypisane pole ACF 'icon'
    $icon = get_field('icon', $item);

    // Jeśli pole 'icon' istnieje, dodaj HTML ikony do tytułu elementu menu
    if ($icon) {
        $title = '<img class="menu-icon" src="' . esc_url($icon['url']) . '" alt="" loading="lazy">' . $title;
    }

    return $title;
}
add_filter('nav_menu_item_title', 'my_custom_menu_item', 10, 4);
