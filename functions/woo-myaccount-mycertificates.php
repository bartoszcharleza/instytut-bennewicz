<?php
function ws_my_account_my_certificates_endpoint_content()
{
    echo '<h1 class="heading--l">Twoje certyfikaty</h3>';
    echo do_shortcode('[uo_learndash_certificates]');
}

add_action('woocommerce_account_moje-certyfikaty_endpoint', 'ws_my_account_my_certificates_endpoint_content');
