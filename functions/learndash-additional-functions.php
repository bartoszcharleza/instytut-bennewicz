<?php
add_action(
    'learndash-focus-header-user-menu-before',
    function () {
        $base_account_url = get_permalink(get_option('woocommerce_myaccount_page_id'));
        echo '<a href="' . $base_account_url . '" class="btn btn--secondary btn--small">Panel klienta</a>';
    }
);

// create database info about user details when quiz is submited (later used for certificate)
add_action(
    'learndash_quiz_submitted',
    function ($quiz_data, $current_user) {

        $quiz_data_id = $quiz_data['quiz'];

        $user_id =  $current_user->id;
        $user_first_name = get_field('first_name', 'user_' . $user_id);
        $user_last_name = get_field('last_name', 'user_' . $user_id);

        $user_gender_setting = get_field('gender', 'user_' . $user_id);
        $user_feminatives_setting = get_field('certificate_feminatives', 'user_' . $user_id);

        $user_certificate_title_setting = get_field('certificate_title', 'user_' . $user_id);
        $user_certificate_accepted_setting = get_field('certificate_title_accepted', 'user_' . $user_id);

        if ($user_certificate_title_setting && $user_certificate_accepted_setting == 'true') {
            $displayed_user_name = $user_certificate_title_setting;
        } else {
            $displayed_user_name = $user_first_name . ' ' . $user_last_name;
        }

        $user_quiz_meta = get_user_meta($user_id, '_sfwd-quizzes', true);

        foreach ($user_quiz_meta as $index => $user_quiz_meta_item) {
            if ($user_quiz_meta[$index]['quiz'] == $quiz_data_id) {
                $user_quiz_meta[$index]['bennewicz_certificate_name'] = $displayed_user_name;
                $user_quiz_meta[$index]['bennewicz_certificate_date'] = date('d.m.Y');
                $user_quiz_meta[$index]['bennewicz_certificate_gender'] = $user_gender_setting;
                $user_quiz_meta[$index]['bennewicz_certificate_feminatives'] = $user_feminatives_setting;

                update_user_meta($user_id, '_sfwd-quizzes', $user_quiz_meta);
            }
        }
    },
    10,
    2
);
