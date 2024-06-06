<?php

// Dodanie strony administracyjnej
add_action('admin_menu', 'register_my_custom_menu_page');
function register_my_custom_menu_page()
{
    add_menu_page(
        __('Weryfikacja zmian', 'textdomain'),
        'Weryfikacja zmian',
        'manage_options',
        'custompage',
        'my_custom_menu_page',
        null,
        58
    );
}

// Zawartość strony
function my_custom_menu_page()
{
    echo '<div class="wrap">';
    echo '<h1>' . esc_html__('Weryfikacja zmian tytułu certyfikatu przez użytkowników', 'textdomain') . '</h1>';
    $users = get_users();

    echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '" id="my-custom-form">';
    wp_nonce_field('update_certificate_title_status', 'certificate_title_nonce');
    echo '<input type="hidden" name="action" value="handle_change"/>';

    // Dodanie kontenera dla listy użytkowników
    echo '<div class="user-list">';

    foreach ($users as $user) {
        $user_id = $user->ID;
        $certificate_title_accepted = get_field('certificate_title_accepted', 'user_' . $user_id);

        if ($certificate_title_accepted === 'waiting_for_admin_review') {
            $certificate_title = get_field('certificate_title', 'user_' . $user_id);
            $certificate_title_note = get_field('certificate_title_note', 'user_' . $user_id);
            $certificate_title_document = get_field('certificate_title_document', 'user_' . $user_id);
            $certificate_title_document_checkbox = get_field('certificate_title_document_checkbox', 'user_' . $user_id);
            $checked = ($certificate_title_document_checkbox === true) ? 'Tak' : 'Nie';

            // Używanie klasy WordPress dla sekcji
            echo '<div class="user-section">';
            echo '<h3>Użytkownik: ' . esc_html($user->display_name) . '</h3>';
            echo '<p>Tytuł certyfikatu: <strong>' . esc_html($certificate_title) . '</strong></p>';
            echo '<p>Plik potwierdzający dane: <a href="' . $certificate_title_document . '" download><strong>Pobierz</strong></a></p>';
            echo '<p>Potwierdzenie autentyczności: <strong>' . $checked . '</strong></p>';
            echo '<input type="hidden" name="user_id[]" value="' . esc_attr($user_id) . '">';

            // Dodanie klas WordPress dla buttonów
            echo '<button type="submit" class="button button-primary" name="accept" value="' . esc_attr($user_id) . '">Akceptuj</button> ';
            echo '<input type="text" class="regular-text" name="certificate_title_note[' . esc_attr($user_id) . ']" placeholder="Powód odrzucenia" value="' . esc_html($certificate_title_note) . '">';
            echo '<button type="submit" class="button" name="reject" value="' . esc_attr($user_id) . '">Odrzuć</button>';
            echo '</div>';
        }
    }

    echo '</div>'; // Zamknięcie kontenera dla listy użytkowników
    echo '</form>';
    echo '</div>'; // Zamknięcie kontenera wrap
}

// Dodanie powiadomienia o oczekujących weryfikacjach
add_action('admin_notices', 'show_pending_verification_notice');
function show_pending_verification_notice()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $users = get_users();
    $pending_verifications = array_filter($users, function ($user) {
        return get_field('certificate_title_accepted', 'user_' . $user->ID) === 'waiting_for_admin_review';
    });

    if (!empty($pending_verifications)) {
        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p>' . sprintf(__('Masz %d oczekujących weryfikacji tytułów certyfikatów. <a href="%s">Zobacz szczegóły</a>.'), count($pending_verifications), admin_url('admin.php?page=custompage')) . '</p>';
        echo '</div>';
    }
}

// Obsługa zmiany (akceptacja/odrzucenie)
add_action('admin_post_handle_change', 'handle_change');
function handle_change()
{
    if (!isset($_POST['certificate_title_nonce']) || !wp_verify_nonce($_POST['certificate_title_nonce'], 'update_certificate_title_status')) {
        wp_die('Dostęp zabroniony', 'Nieprawidłowe żądanie', ['response' => 403]);
    }

    if (!current_user_can('manage_options')) {
        wp_die('Brak wystarczających uprawnień', 'Nieautoryzowany dostęp', ['response' => 403]);
    }

    if (isset($_POST['accept'])) {
        $user_id = $_POST['accept'];
        update_field('certificate_title_accepted', 'true', 'user_' . $user_id);
        update_field('certificate_title_note', '', 'user_' . $user_id); // Czyszczenie notatki
    } elseif (isset($_POST['reject']) && !empty($_POST['certificate_title_note'][$_POST['reject']])) {
        $user_id = $_POST['reject'];
        $note = sanitize_text_field($_POST['certificate_title_note'][$user_id]);
        update_field('certificate_title_accepted', 'false', 'user_' . $user_id);
        update_field('certificate_title_note', $note, 'user_' . $user_id); // Aktualizacja notatki
    }

    wp_redirect(admin_url('admin.php?page=custompage'));
    exit;
}
