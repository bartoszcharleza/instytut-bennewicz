<?php
function ws_my_account_all_courses_endpoint_content()
{
    echo '<h3>Podstrona wszystkie kursy</h3>';
}

add_action('woocommerce_account_wszystkie-kursy_endpoint', 'ws_my_account_all_courses_endpoint_content');
