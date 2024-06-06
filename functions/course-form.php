<?php

// add_action('template_redirect', 'handle_custom_post_form_submission');
// function handle_custom_post_form_submission()
// {
//     if (isset($_POST['custom_post_nonce'], $_POST['first_name'], $_POST['last_name'], $_POST['post_term']) && wp_verify_nonce($_POST['custom_post_nonce'], 'submit_custom_post')) {
//         $first_name = sanitize_text_field($_POST['first_name']);
//         $last_name = sanitize_text_field($_POST['last_name']);
//         $email = sanitize_text_field($_POST['email']);
//         $post_terms = array_map('sanitize_text_field', $_POST['post_term']);

//         // Tworzenie nowego posta
//         $new_post = array(
//             'post_title'    => $first_name . ' ' . $last_name,
//             'post_status'   => 'publish', // Ustaw na 'draft', aby wymagać ręcznej akceptacji
//             'post_author'   => get_current_user_id(), // Opcjonalnie, przypisz post do aktualnie zalogowanego użytkownika
//             'post_type'     => 'aplikacje-na-kurs' // Można zmienić na inny typ posta
//         );

//         $post_id = wp_insert_post($new_post);

//         if ($post_id) {
//             update_field('name', $first_name, $post_id);
//             update_field('nazwisko', $last_name, $post_id);
//             update_field('email', $email, $post_id);
//             // Przechowuj wybrane terminy jako jedno pole z wartościami oddzielonymi przecinkami lub zapisz jako różne pola/metadata
//             update_field('date', join(', ', $post_terms), $post_id);

//             wp_redirect(home_url() . '/potwierdzenie-zapisu-na-kurs/'); // Przekierowanie do strony głównej po udanym utworzeniu posta
//             exit;
//         }
//     }
// }
