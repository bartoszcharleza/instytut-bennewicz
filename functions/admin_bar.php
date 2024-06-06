<?php 
function adjust_for_admin_bar() {
    // Tylko dla zalogowanych użytkowników, którzy mają pasek admina
    if (is_user_logged_in() && is_admin_bar_showing()) {
        echo '<style type="text/css">
            body, header { margin-top: 32px !important; }
            @media screen and (max-width: 782px) {
                body, header { margin-top: 46px !important; }
            }
        </style>';
    }
}
add_action('wp_head', 'adjust_for_admin_bar');