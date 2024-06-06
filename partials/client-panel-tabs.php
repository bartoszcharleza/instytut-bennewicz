<section class="section client-panel-tabs">
    <div class="section-container">
        <div class="tabs">
            <?php
            $base_account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
            $current_url = home_url(add_query_arg(null, null));
            $user_id = get_current_user_id();

            $active_class = ($current_url == $base_account_url) ? 'active' : '';
            echo '<a href="' . esc_url($base_account_url) . '" class="tab ' . $active_class . '"> Moje konto</a>';

            $tabs = [
                'moje-certyfikaty' => 'Moje certyfikaty',
                'orders' => 'Zamówienia',
                'downloads' => 'Pliki do pobrania',
                'edit-address' => 'Adresy',
                'edit-account' => 'Szczegóły konta'
            ];

            foreach ($tabs as $slug => $name) {
                $active_class = (strpos($current_url, $base_account_url . $slug) !== false) ? 'active' : '';
                echo '<a href="' . esc_url($base_account_url . $slug) . '" class="tab ' . $active_class . '">' . esc_html($name) . '</a>';
            }

            $logout_url = wp_logout_url(get_permalink());
            $active_class = (strpos($current_url, 'wp-logout.php') !== false) ? 'active' : ''; // This might not be necessary but included for consistency
            echo '<a href="' . esc_url($logout_url) . '" class="tab logout-tab' . $active_class . '"> Wyloguj</a>';
            echo '<a href="' . esc_url($base_account_url . 'edit-account') . '" class="tab account-avatar' . $active_class . '">' . get_avatar($user_id) . '</a>';
            ?>
        </div>
    </div>
</section>