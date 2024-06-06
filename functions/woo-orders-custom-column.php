<?php
// Dodajemy nową kolumnę na liście zamówień
add_filter('manage_edit-shop_order_columns', 'add_acf_payment_due_date_column');
function add_acf_payment_due_date_column($columns)
{
    // Dodajemy nową kolumnę przed kolumną "Data zamówienia"
    $new_columns = array();
    foreach ($columns as $column_name => $column_info) {
        $new_columns[$column_name] = $column_info;
        if ($column_name === 'order_total') {
            $new_columns['ws_payment_due_date'] = 'Termin płatności';
        }
    }
    return $new_columns;
}

// Wyświetlamy wartość pola ACF w naszej nowej kolumnie
add_action('manage_shop_order_posts_custom_column', 'display_acf_payment_due_date');
function display_acf_payment_due_date($column)
{
    global $post;

    if ('ws_payment_due_date' === $column) {
        $payment_due_date = get_post_meta($post->ID, 'ws_payment_due_date', true);
        if (!empty($payment_due_date)) {
            $formattedDate = DateTime::createFromFormat('Ymd', $payment_due_date)->format('Y.m.d');
            echo $formattedDate;
        } else {
            echo '—'; // Wyświetlamy puste miejsce, jeśli nie ma wartości
        }
    }
}

// Opcjonalnie: Dodajemy CSS do dostosowania wyglądu nowej kolumny
add_action('admin_head', 'custom_style_for_acf_payment_due_date_column');
function custom_style_for_acf_payment_due_date_column()
{
    echo '<style>
        .widefat .column-ws_payment_due_date {
            width: 15%;
        }
    </style>';
}

add_filter('manage_edit-shop_order_sortable_columns', 'make_acf_payment_due_date_column_sortable');
function make_acf_payment_due_date_column_sortable($columns)
{
    $columns['ws_payment_due_date'] = 'ws_payment_due_date';
    return $columns;
}

add_action('pre_get_posts', 'custom_orderby_acf_payment_due_date');
function custom_orderby_acf_payment_due_date($query)
{
    if (!is_admin() || !$query->is_main_query()) {
        return;
    }

    if ('ws_payment_due_date' === $query->get('orderby')) {
        $query->set('meta_key', 'ws_payment_due_date');
        $query->set('orderby', 'meta_value'); // użyj 'meta_value_num' jeśli pole jest numeryczne
    }
}
