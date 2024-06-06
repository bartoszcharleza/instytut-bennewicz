<?php

/**
 * Disable gutenberg
 */
// add_filter('use_block_editor_for_post_type', '__return_false', 100);

/**
 * Remove admin pages
 */
function remove_admin_menus()
{
    remove_menu_page('edit.php');
    remove_menu_page('edit-comments.php');
    // remove_menu_page('tools.php');
    remove_submenu_page('options-general.php', 'options-writing.php');
    remove_submenu_page('options-general.php', 'options-media.php');
    define('DISALLOW_FILE_EDIT', TRUE);
}
add_action('admin_menu', 'remove_admin_menus');

/**
 * Remove 32px margin-top property from logged admin bar
 */
function remove_admin_login_header()
{
    remove_action('wp_head', '_admin_bar_bump_cb');
}
add_action('get_header', 'remove_admin_login_header');

/**
 * Change wordpress wp-admin logo image
 */
function change_wp_login_logo_image()
{ ?>
    <style>
        #login h1 a,
        .login h1 a {
            background-image: url(<?php asset('/img/website-style-logo.svg'); ?>);
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'change_wp_login_logo_image');

/**
 * Change wordpress wp-admin logo behavior
 */
function change_wp_login_logo_url()
{ ?>
    <script>
        document.getElementById('rememberme').checked = true;
        document.querySelector('.login h1 a').href = 'https://www.websitestyle.pl/';
    </script>
<?php }
add_action('login_footer', 'change_wp_login_logo_url');
