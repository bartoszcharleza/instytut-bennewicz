<?php

/**
 * Course form block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;

$options = get_field('options');
$dates = get_field('dates');
$form_shortcode = get_field('form_shortcode');

$anchor = '';
if (!empty($block['anchor'])) {
	$anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}




// Create class attribute allowing for custom "className" and "align" values.
$class_name = '';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}

if ($hide == false or is_admin() == true) : ?>
	<section id="formularz" class="section course-form <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<?php if ($options == 'option-1') : ?>
			<div class="section-container">
				<h2 id="form-header" class="heading--xl title" data-aos="fade-in"><span>Zapisz się</span> na kurs</h2>
				<div id="custom-post-form" class="form">
					<div id="form__column--1" class="form__column form__column--1" data-aos="fade-up">
						<fieldset>
							<legend>WYBIERZ TERMIN</legend>
							<?php
							if ($dates) :
								foreach ($dates as $date) {
							?>
									<label class="date-label">
										<input type="checkbox" name="post_term[]" value="<?php echo esc_html($date['date_title']) ?>"> <?php echo esc_html($date['date_title'] . ' ');

																																		if ($date['date_list']) :
																																			echo '<ul class="details">';
																																			foreach ($date['date_list'] as $date_list_item) {
																																				echo '<li>' . esc_html($date_list_item['date_list_item']) . ' </li>';
																																			};
																																			echo '</ul>';
																																		endif; ?>

									</label>
							<?php
								};
							endif;
							?>
						</fieldset>
						<script>
							document.addEventListener('DOMContentLoaded', function() {
								const checkboxes = document.querySelectorAll('input[type="checkbox"][name="post_term[]"]');
								const labels = document.querySelectorAll('.date-label');

								// Funkcja do aktualizacji stanu i klasy labela przy zmianie checkboxa
								function updateLabelState(checkbox, checked) {
									const label = checkbox.closest('.date-label');
									if (checked) {
										label.classList.add('active');
										label.querySelector('.details').classList.add('active');
										// Aktualizacja wartości inputa "termin" treścią labela z opóźnieniem
										const labelText = label.textContent.trim();
										setTimeout(() => {
											const inputTermin = document.querySelector('input[name="termin"]');
											inputTermin.value = labelText;
										}, 1000); // Opóźnienie 1000 ms (1 sekunda)
									} else {
										label.classList.remove('active');
										label.querySelector('.details').classList.remove('active');
										setTimeout(() => {
											const inputTermin = document.querySelector('input[name="termin"]');
											inputTermin.value = '';
										}, 1000); // Opóźnienie 1000 ms (1 sekunda)
									}
								}

								checkboxes.forEach(checkbox => {
									checkbox.addEventListener('change', function() {
										// Usuń klasę 'active' i odznacz wszystkie inne checkboxy
										labels.forEach(label => {
											const innerCheckbox = label.querySelector('input[type="checkbox"]');
											if (innerCheckbox !== this) {
												innerCheckbox.checked = false;
												updateLabelState(innerCheckbox, false);
											}
										});

										// Dodaj lub usuń klasę 'active' w zależności od stanu checkboxa
										updateLabelState(this, this.checked);
									});
								});

								// Jeśli jest tylko jeden checkbox, zaznacz go automatycznie
								if (checkboxes.length === 1) {
									setTimeout(() => {
										checkboxes[0].checked = true;
										updateLabelState(checkboxes[0], true);
									}, 1000); // Opóźnienie 1000 ms (1 sekunda)
								}
							});
						</script>


					</div>

					<div class="form__column form__column--2" data-aos="fade-up" data-aos-delay="200" data-aos-anchor="#form__column--1">

						<div class="wpcf7-form">
							<?php echo do_shortcode($form_shortcode) ?>
						</div>
					</div>

					<?php // wp_nonce_field('submit_custom_post', 'custom_post_nonce'); 
					?>
				</div>
			</div>
		<?php
		endif;
		if ($options == 'option-2') : ?>
			<div class="section-container">
				<h2 id="form-header" class="heading--xl title" data-aos="fade-in"><span>Zapisz się</span> na kurs</h2>
				<?php
				if (function_exists('woocommerce_template_loop_add_to_cart')) {
					woocommerce_template_loop_add_to_cart();
				}
				?>

			</div>
		<?php endif; ?>
	</section>

<?php endif; ?>

<?php

?>