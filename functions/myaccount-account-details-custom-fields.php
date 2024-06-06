<?php
// Wyświetlanie dodatkowych pól w sekcji "Szczegóły konta"
add_action('woocommerce_edit_account_form', 'my_custom_edit_account_form');
function my_custom_edit_account_form()
{
    $user_id = get_current_user_id();
    $user = get_userdata($user_id);
    if (!$user) return;

    // Retrieve user-specific fields with ACF
    $gender = get_field('gender', 'user_' . $user_id);
    $certificate_feminatives = get_field('certificate_feminatives', 'user_' . $user_id);
    $certificate_title = get_field('certificate_title', 'user_' . $user_id);
    $certificate_title_accepted = get_field('certificate_title_accepted', 'user_' . $user_id);
    $certificate_title_note = get_field('certificate_title_note', 'user_' . $user_id);
    $certificate_title_document = get_permalink(get_field('certificate_title_document', 'user_' . $user_id));
    $certificate_title_document_checkbox = get_field('certificate_title_document_checkbox', 'user_' . $user_id);
    $checked = ($certificate_title_document_checkbox === true) ? 'checked' : '';

    // Display gender as radio buttons
?>
    <h3 class="heading--s">Ustawienia certyfikatów</h3>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label>Płeć (Do treści certyfikatów)</label>
        <input type="radio" name="gender" value="male" <?php checked($gender, 'male'); ?>> Mężczyzna<br>
        <input type="radio" name="gender" value="female" <?php checked($gender, 'female'); ?>> Kobieta
    </p>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <br>
        <label for="certificate_feminatives">Feminatywy w certyfikatach:</label>
        <input type="radio" name="certificate_feminatives" value="no" <?php checked($certificate_feminatives, 'no'); ?>> Nie (np. Coach)<br>
        <input type="radio" name="certificate_feminatives" value="yes" <?php checked($certificate_feminatives, 'yes'); ?>> Tak (np. Coach/Coacherka)
    </p>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <br>
        <label for="certificate_title">Tytuł wyświetlany w certyfikacie:</label>

        <?php if ($certificate_title_note) : ?>
            <span style="color:red;">Odrzucono: <?php echo esc_html($certificate_title_note); ?></span><br>
        <?php endif; ?>

        <?php if ($certificate_title_accepted == "waiting_for_admin_review") : ?>
            <span style="color:red;">Oczekuje na akceptację przez administratora</span><br>
        <?php endif; ?>

        <?php if ($certificate_title_accepted == "true") : ?>
            <span style="color:green;">Zaakceptowane przez administratora</span><br>
        <?php endif; ?>
        <input class="woocommerce-Input woocommerce-Input--text input-text" type="text" name="certificate_title" id="certificate_title" value="<?php echo esc_attr($certificate_title); ?>" />
    </p>

    <?php if ($certificate_title_document) :
    ?>
        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
            Dokument potwierdzający tytuł został przesłany. Znajdziesz go <a href="<?php echo $certificate_title_document ?>"><strong>tutaj</strong></a>
        </p>
    <?php endif; ?>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="certificate_title_document">Wgraj plik .jpg, .png lub .pdf o maksymalnym rozmiarze 512kb</label>
        <input type="file" name="certificate_title_document" id="certificate_title_document" accept="image/jpeg, image/png, application/pdf">
    </p>

    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="certificate_title_document_checkbox">
            <input type="checkbox" name="certificate_title_document_checkbox" id="certificate_title_document_checkbox" value="true" <?php echo $checked; ?>> Potwierdzam autentyczność danych
        </label>
    </p>


    <h3 class="heading--s">Ustawienia avatara</h3>
    <div class="account-avatar"><?php echo get_avatar($user_id)  ?></div>
    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="account_avatar">Wgraj plik .jpg lub .png o maksymalnym rozmiarze 512kb</label>
        <input type="file" name="account_avatar" id="account_avatar" accept="image/*">
    </p>
    <br>
<?php
    // Upewnij się, że formularz obsługuje przesyłanie plików
    echo '<script>jQuery(document).ready(function($){ $("form.edit-account").attr("enctype", "multipart/form-data"); });</script>';
}


// Zapisywanie dodatkowych pól po zaktualizowaniu danych konta
add_action('woocommerce_save_account_details', 'my_custom_save_account_details');
function my_custom_save_account_details($user_id)
{

    $certificate_title = get_field('certificate_title', 'user_' . $user_id);

    if (isset($_POST['gender'])) {
        update_field('gender', $_POST['gender'], 'user_' . $user_id);
    }

    if (isset($_POST['certificate_feminatives'])) {
        update_field('certificate_feminatives', $_POST['certificate_feminatives'], 'user_' . $user_id);
    }

    if (isset($_POST['certificate_title_document_checkbox'])) {
        update_field('certificate_title_document_checkbox', true, 'user_' . $user_id);
    } else {
        update_field('certificate_title_document_checkbox', false, 'user_' . $user_id);
    }


    if (isset($_POST['certificate_title']) && $_POST['certificate_title'] != $certificate_title) {
        update_field('certificate_title', $_POST['certificate_title'], 'user_' . $user_id);
        update_field('certificate_title_accepted', 'waiting_for_admin_review', 'user_' . $user_id);
        update_field('certificate_title_note', '', 'user_' . $user_id);
    }

    if (isset($_FILES['certificate_title_document']) && $_FILES['certificate_title_document']['error'] == UPLOAD_ERR_OK) {
        // Sprawdzanie typu pliku (akceptujemy jpg, png i pdf)
        $file_type = wp_check_filetype($_FILES['certificate_title_document']['name']);
        if (in_array($file_type['type'], ['image/jpeg', 'image/png', 'application/pdf'])) {
            // Sprawdzanie rozmiaru pliku (maksymalnie 512KB)
            if ($_FILES['certificate_title_document']['size'] <= 512 * 1024) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/media.php');

                // Przesyłanie pliku i zapisywanie go w bibliotece mediów WordPress
                $attachment_id = media_handle_upload('certificate_title_document', 0);

                // Jeśli przesyłanie się powiedzie, zapisz ID załącznika w metadanych użytkownika
                if (!is_wp_error($attachment_id)) {
                    update_user_meta($user_id, 'certificate_title_document', $attachment_id);
                }
            } else {
                wc_add_notice(__('Rozmiar pliku przekracza maksymalny limit 512KB.', 'woocommerce'), 'error');
            }
        } else {
            wc_add_notice(__('Niedozwolony typ pliku. Akceptowane są tylko pliki JPG, PNG i PDF.', 'woocommerce'), 'error');
        }
    }


    if (isset($_FILES['account_avatar']) && $_FILES['account_avatar']['error'] == UPLOAD_ERR_OK) {
        // Sprawdzanie typu pliku (akceptujemy tylko jpg i png)
        $file_type = wp_check_filetype($_FILES['account_avatar']['name']);
        if (in_array($file_type['type'], ['image/jpeg', 'image/png'])) {
            // Sprawdzanie rozmiaru pliku (maksymalnie 512KB)
            if ($_FILES['account_avatar']['size'] <= 512 * 1024) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                require_once(ABSPATH . 'wp-admin/includes/media.php');

                // Przesyłanie pliku i zapisywanie go w bibliotece mediów WordPress
                $attachment_id = media_handle_upload('account_avatar', 0);

                // Jeśli przesyłanie się powiedzie, zapisz ID załącznika w metadanych użytkownika
                if (!is_wp_error($attachment_id)) {
                    update_user_meta($user_id, 'account_avatar', $attachment_id);
                }
            } else {
                wc_add_notice(__('Rozmiar pliku przekracza maksymalny limit 512KB.', 'woocommerce'), 'error');
            }
        } else {
            wc_add_notice(__('Niedozwolony typ pliku. Akceptowane są tylko pliki JPG i PNG.', 'woocommerce'), 'error');
        }
    }
}

function custom_avatar_filter($avatar, $id_or_email, $size, $default, $alt)
{
    $user_id = 0;

    if (is_numeric($id_or_email)) {
        $user_id = $id_or_email;
    } elseif (is_object($id_or_email)) {
        if (!empty($id_or_email->user_id)) {
            $user_id = $id_or_email->user_id;
        }
    } else {
        $user = get_user_by('email', $id_or_email);
        if ($user) {
            $user_id = $user->ID;
        }
    }

    if ($user_id) {
        $user_avatar = get_user_meta($user_id, 'account_avatar', true); // Sprawdź, czy użytkownik ma przypisany własny avatar
        if (!empty($user_avatar)) {
            $avatar = wp_get_attachment_url($user_avatar);
            // Zwróć znacznik img z URL własnego avatara
            return "<img alt='{$alt}' src='{$avatar}' class='avatar avatar-{$size} photo' height='{$size}' width='{$size}' />";
        }
    }

    return $avatar; // Zwróć domyślny avatar, jeśli własny nie istnieje
}
add_filter('get_avatar', 'custom_avatar_filter', 10, 5);
