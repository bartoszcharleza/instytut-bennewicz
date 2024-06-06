<?php
function generuj_certyfikat_shortcode($atts)
{
    // Pobranie atrybutów
    $atts = shortcode_atts(array(

        'tytul' => 'Tytuł',
        'podtytul' => 'Podtytuł',

        'tekst_nad_imieniem' => 'Tekst nad imieniem',

        'tekst_pod_imieniem_kobieta' => 'Tekst pod imieniem - Kobieta',
        'tekst_pod_imieniem_mezczyzna' => 'Tekst pod imieniem - Mężczyzna',

        'zdobyty_tytul_czesc_1_maskulinatyw' => 'Zdobyty tytuł, część 1 - maskulinatyw',
        'zdobyty_tytul_czesc_2_maskulinatyw' => 'Zdobyty tytuł, część 2 - maskulinatyw',

        'zdobyty_tytul_czesc_1_feminatyw' => 'Zdobyty tytuł, część 1 - feminatyw',
        'zdobyty_tytul_czesc_2_feminatyw' => 'Zdobyty tytuł, część 2 - feminatyw',

        'nr_certyfikatu' => '### ###',
        'tekst_nr_certyfikatu' => 'Certyfikat nr:',

        'miejsce' => 'Marki, 2024'

    ), $atts, 'certyfikat');

    $user_first_name = do_shortcode('[quizinfo show="bennewicz_certificate_name"]');
    $user_email = do_shortcode('[usermeta field="last_name"]');
    $user_id = do_shortcode('[usermeta field="id"]');

    $user_gender_setting = do_shortcode('[quizinfo show="bennewicz_certificate_gender"]');
    $user_feminatives_setting = do_shortcode('[quizinfo show="bennewicz_certificate_feminatives"]');
    $displayed_user_name = do_shortcode('[quizinfo show="bennewicz_certificate_name"]');

    $certificate_number_setting = $atts['nr_certyfikatu'];
    $certificate_title_setting = $atts['tekst_nr_certyfikatu'];
    $certificate_number =  substr($user_first_name, 0, 1) . substr($user_first_name, -1) . substr($user_id * 3 * mb_strlen($user_email, "UTF-8"), 0, 1) . substr($user_id * 2 * mb_strlen($user_email, "UTF-8"), 0, 1) . substr($user_id * 4 * mb_strlen($user_email, "UTF-8"), 0, 1);

    if ($user_gender_setting == "male") {
        $displayed_text_under_name = esc_html($atts['tekst_pod_imieniem_mezczyzna']);
    } else {
        $displayed_text_under_name = esc_html($atts['tekst_pod_imieniem_kobieta']);
    }

    if ($user_feminatives_setting == "no") {
        $displayed_text_under_name_part_1 = esc_html($atts['zdobyty_tytul_czesc_1_maskulinatyw']);
        $displayed_text_under_name_part_2 = esc_html($atts['zdobyty_tytul_czesc_2_maskulinatyw']);
    } else {
        $displayed_text_under_name_part_1 = esc_html($atts['zdobyty_tytul_czesc_1_feminatyw']);
        $displayed_text_under_name_part_2 = esc_html($atts['zdobyty_tytul_czesc_2_feminatyw']);
    }

    if ($certificate_number_setting == 'tak') {
        $displayed_certificate_number_content = '<span style="text-transform:uppercase">' . $certificate_number . "</span>";
    } else {
        $displayed_certificate_number_content = '&nbsp;';
    }

    // Stworzenie treści certyfikatu
    $tresc_certyfikatu = "<div style='text-align: center; margin: 20px auto;'>

        <p style='color:#E84E0F; font-size:46px;'>" . esc_html($atts['tytul']) . "</p>
        <p style='font-size:29px; margin-top:12px'>" . esc_html($atts['podtytul']) . "</p>

        <p style='font-size:16px; font-family:serif; margin-top:12px'>" . esc_html($atts['tekst_nad_imieniem']) . "</p>
        <p style='font-size:42px; margin-top:14px'>" . esc_html($displayed_user_name) . "</p>
        <p style='font-size:16px; font-family:serif; margin-top:22px'>" . esc_html($displayed_text_under_name) . "</p>

        <p style='font-size:34px; margin-top:14px;'>" . esc_html($displayed_text_under_name_part_1) . "</p>
        <p style='color:#E84E0F; font-size:30px; margin-top:12px;'>" . esc_html($displayed_text_under_name_part_2) . "</p>

        <p style='font-size:16px; font-family:serif; margin-top:15px'><i>" . esc_html($atts['tekst_nr_certyfikatu']) . $displayed_certificate_number_content . "</i></p>

        <p style='font-size:12px; font-family:serif; margin-top:130px'>" . esc_html($atts['miejsce']) . ", " . date('d.m.Y') . "</p>

    </div>";

    return $tresc_certyfikatu;
}
add_shortcode('certyfikat', 'generuj_certyfikat_shortcode');


function generuj_podglad_danych_do_certyfikatu()
{

    $preview_user_id =  get_current_user_id();

    if ( ! empty( $preview_user_id ) ) {

        $preview_user_first_name = get_field('first_name', 'user_' . $preview_user_id);
        $preview_user_last_name = get_field('last_name', 'user_' . $preview_user_id);

        $preview_user_gender_setting = get_field('gender', 'user_' . $preview_user_id) == 'fame' ? 'Kobieta' : 'Mężczyzna';
        $preview_user_feminatives_setting = get_field('certificate_feminatives', 'user_' . $preview_user_id) == 'yes' ? 'Tak (np. Coach/Coacherka)' : 'Nie (np. Coach)';

        $preview_user_certificate_title_setting = get_field('certificate_title', 'user_' . $preview_user_id);
        $preview_user_certificate_accepted_setting = get_field('certificate_title_accepted', 'user_' . $preview_user_id);

        if ($preview_user_certificate_title_setting && $preview_user_certificate_accepted_setting == 'true') {
            $preview_displayed_user_name = $preview_user_certificate_title_setting;
        } else {
            $preview_custom_title_info = $preview_user_certificate_title_setting;
            $preview_displayed_user_name = $preview_user_first_name . ' ' . $preview_user_last_name . '<span style="color:red;"> (' . $preview_custom_title_info . ' - oczekuje na akceptację przez administratora)</span>';
        }
    }

    // Stworzenie treści certyfikatu
    $preview_tresc_certyfikatu = "
    <br>
    Imię i nazwisko: <strong>$preview_displayed_user_name</strong>,<br>
    Płeć: <strong>$preview_user_gender_setting</strong>,<br>
    Feminatywy: <strong>$preview_user_feminatives_setting</strong>,<br>
    ";

    return $preview_tresc_certyfikatu;
}
add_shortcode('dane_do_certyfikatu', 'generuj_podglad_danych_do_certyfikatu');

