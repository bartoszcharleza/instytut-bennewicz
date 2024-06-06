<?php

/**
 * Login / register block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
// $hide = get_field('hide');
// $text = !empty(get_field('text')) ? get_field('text') : 'Text...';
// $show_column_1 = get_field('show_column_1');
// $staff_member = get_field('staff_member');
// $staff_title = get_field('staff_title');

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$width = get_field('width');

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
	$anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = '';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

do_action('woocommerce_before_customer_login_form');

if ($hide == false or is_admin() == true) : ?>
	<section class="section login-register <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">

			<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

				<div class="columns" id="customer_login">

					<div class="column column-1">

					<?php endif; ?>



					<form class="woocommerce-form woocommerce-form-login login" method="post">

						<h2 class="column__title heading--xxs"><?php //esc_html_e('Login', 'woocommerce'); 
																?> Mam już konto</h2>

						<?php do_action('woocommerce_login_form_start'); ?>

						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<!-- <label for="username"><?php // esc_html_e('Username or email address', 'woocommerce'); 
														?>&nbsp;<span class="required">*</span></label> -->
							<input placeholder="<?php esc_html_e('Username or email address', 'woocommerce'); ?>" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																						?>
						</p>
						<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
							<!-- <label for="password"><?php // esc_html_e('Password', 'woocommerce'); 
														?>&nbsp;<span class="required">*</span></label> -->
							<input placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" class="woocommerce-Input woocommerce-Input--text input-text" type="password" name="password" id="password" autocomplete="current-password" />
						</p>

						<?php do_action('woocommerce_login_form'); ?>
						<p class="woocommerce-LostPassword lost_password">
							<a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e('Lost your password?', 'woocommerce'); ?></a>
						</p>
						<p class="form-row button-wrap">
							<!-- <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
								<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php // esc_html_e('Remember me', 'woocommerce'); 
																																													?></span>
							</label> -->
							<?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
							<button type="submit" class="btn btn--primary" name="login" value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
						</p>


						<?php do_action('woocommerce_login_form_end'); ?>

					</form>

					<?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

					</div>

					<span class="separator"></span>

					<div class="column column-2">

						<h2 class="column__title heading--xxs"><?php // esc_html_e('Register', 'woocommerce'); 
																?>Jestem nowym klientem</h2>
						<div class="column-2__content">
							Zarejestruj się, aby korzystać z benefitów
							<ul>
								<li>Bezpłatne konto</li>
								<li>Łatwe sprawdzenie historii zamówień
								</li>
								<li>Szybki i wygodny proces składania kolejnych zamówień
								</li>
								<li>Możliwość edycji danych
								</li>
							</ul>
						</div>
						<form data-toggle-id="register" data-toggle-type="target" method="post" class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?>>

							<?php do_action('woocommerce_register_form_start'); ?>

							<?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<!-- <label for="reg_username"><?php // esc_html_e('Username', 'woocommerce'); 
																	?>&nbsp;<span class="required">*</span></label> -->
									<input placeholder="<?php esc_html_e('Username', 'woocommerce'); ?>" type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																					?>
								</p>

							<?php endif; ?>

							<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
								<!-- <label for="reg_email"><?php // esc_html_e('Email address', 'woocommerce'); 
															?>&nbsp;<span class="required">*</span></label> -->
								<input placeholder="<?php esc_html_e('Email address', 'woocommerce'); ?>" type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" id="reg_email" autocomplete="email" value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>" /><?php // @codingStandardsIgnoreLine 
																																																																																		?>
							</p>

							<?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

								<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
									<!-- <label for="reg_password"><?php // esc_html_e('Password', 'woocommerce'); 
																	?>&nbsp;<span class="required">*</span></label> -->
									<input placeholder="<?php esc_html_e('Password', 'woocommerce'); ?>" type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" />
								</p>

							<?php else : ?>

								<p><?php esc_html_e('A link to set a new password will be sent to your email address.', 'woocommerce'); ?></p>

							<?php endif; ?>

							<?php do_action('woocommerce_register_form'); ?>

							<p class="woocommerce-form-row form-row">
								<?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
								<button type="submit" class="btn btn--secondary" name="register" value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
							</p>

							<?php do_action('woocommerce_register_form_end'); ?>

						</form>

						<p class="btn btn--secondary" data-toggle-id="register" data-toggle-type="toggler" data-toggle-self-close="true">Rejestracja</p>

					</div>
					<span class="separator"></span>
					<div class="column column-3">
						<h2 class="column__title heading--xxs"> Zamów bez logowania</h2>
						<p>Złóż zamówienie bez logowania</p>
						<a class="btn btn--white">Przejdź dalej</a>

					</div>

				</div>
			<?php endif; ?>

		</div>
	</section>
<?php endif;

do_action('woocommerce_after_customer_login_form'); ?>