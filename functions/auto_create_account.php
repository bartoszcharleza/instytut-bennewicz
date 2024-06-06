<?php
// add_action('woocommerce_checkout_order_processed', 'auto_create_account_if_needed', 10, 1);

// function auto_create_account_if_needed($order_id)
// {
//     if (!$order_id) {
//         return;
//     }

//     $order = wc_get_order($order_id);
//     if (!$order) {
//         return;
//     }

//     foreach ($order->get_items() as $item) {
//         $product_id = $item->get_product_id();

//         // Sprawdź, czy produkt ma pole ACF "create_account"
//         $create_account = get_field('create_account', $product_id);
//         if ($create_account) {
//             $email = $order->get_billing_email();

//             // Sprawdź, czy użytkownik już istnieje
//             if (email_exists($email)) {
//                 continue; // Pomijamy, jeśli użytkownik już istnieje
//             }

//             // Tworzenie nowego użytkownika
//             $username = sanitize_user(current(explode('@', $email)));
//             $password = wp_generate_password();
//             $user_id = wp_create_user($username, $password, $email);

//             if (!is_wp_error($user_id)) {
//                 // Wysyłanie e-maila do użytkownika
//                 $first_name = $order->get_billing_first_name();
//                 $reset_key = get_password_reset_key(get_user_by('id', $user_id));
//                 $reset_url = network_site_url("wp-login.php?action=rp&key=$reset_key&login=" . rawurlencode($username), 'login');
//                 $login_url = "https://instytutbennewicz.pl/moje-konto/";

//                 $subject = 'Jak zacząć? Twoje dane logowania do platformy kursowej';
//                 $message = "<p>Cześć $first_name,</p><br>";
//                 $message .= "<p>Twoje zamówienie zostało przetworzone, a kurs jest już dostępny. Oto dane logowania do naszej platformy:</p><br>";
//                 $message .= "<p>Login: $username<br>";
//                 $message .= "Ustaw hasło: <a href=\"$reset_url\">$reset_url</a></p><br>";
//                 $message .= "<p>Aby uzyskać dostęp do kursu, ustaw hasło klikając w powyższy link a następnie zaloguj się korzystając z poniższego adres:</p>";
//                 $message .= "<p><a href=\"" . $login_url . "\">" . $login_url . "</a></p><br>";
//                 $message .= "<p>Życzymy powodzenia w nauce!</p><br>";
//                 $message .= "<p>Pozdrawiamy, Zespół Instytutu Kognitywistyki</p>";

//                 $headers = array('Content-Type: text/html; charset=UTF-8');
//                 wp_mail($email, $subject, $message, $headers);
//             }
//         }
//     }
// }
