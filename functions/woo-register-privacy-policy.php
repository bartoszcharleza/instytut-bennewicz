<?php


add_action('woocommerce_register_form', 'mz_add_registration_privacy_policy', 11);

function mz_add_registration_privacy_policy()
{

    woocommerce_form_field('privacy_policy_reg', array(
        'type'          => 'checkbox',
        'class'         => array('form-row privacy form-row-wide'),
        'label_class'   => array('woocommerce-form__label woocommerce-form__label-for-checkbox checkbox'),
        'input_class'   => array('woocommerce-form__input woocommerce-form__input-checkbox input-checkbox'),
        'required'      => true,
        'label'         => 'Przeczytałem i akceptuję <a href="/polityka-prywatnosci/">Politykę prywatności</a>',
    ));
}

// Show error if user does not tick

add_filter('woocommerce_registration_errors', 'mz_validate_privacy_registration', 10, 3);

function mz_validate_privacy_registration($errors, $username, $email)
{
    if (!is_checkout()) {
        if (!(int) isset($_POST['privacy_policy_reg'])) {
            $errors->add('privacy_policy_reg_error', __('Akceptacja polityki prywatności jest wymagana', 'woocommerce'));
        }
    }
    return $errors;
}
