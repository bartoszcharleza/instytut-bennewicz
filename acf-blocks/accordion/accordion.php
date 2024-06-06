<?php

/**
 * Accordion block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$accordion_option_tab = get_field('option-1', 'option');

// Check if we are on a category archive page or a product category archive page
if (is_category() || is_tax('product_cat')) {
	$term = get_queried_object();
	$term_id = $term->term_id;
	$term_meta_prefix = is_tax('product_cat') ? 'product_cat_' : 'category_';
	$accordions_list = get_field('accordions_list', $term_meta_prefix . $term_id);
	$title_1 = $accordions_list == 'option-0' ? get_field('title_1', $term_meta_prefix . $term_id) : $accordion_option_tab['title_1'];
	$title_2 = $accordions_list == 'option-0' ? get_field('title_2', $term_meta_prefix . $term_id) : $accordion_option_tab['title_2'];
	$bottom_text = $accordions_list == 'option-0' ? get_field('bottom_text', $term_meta_prefix . $term_id) : $accordion_option_tab['bottom_text'];
	$accordion = $accordions_list == 'option-0' ? get_field('accordion', $term_meta_prefix . $term_id) : $accordion_option_tab['accordion'];
	$button_text = $accordions_list == 'option-0' ? get_field('button_text', $term_meta_prefix . $term_id) : $accordion_option_tab['button_text'];
	$button_link = $accordions_list == 'option-0' ? get_field('button_link', $term_meta_prefix . $term_id) : $accordion_option_tab['button_link'];
} else {
	$accordions_list = get_field('accordions_list');
	$title_1 = $accordions_list == 'option-0' ? get_field('title_1') : $accordion_option_tab['title_1'];
	$title_2 = $accordions_list == 'option-0' ? get_field('title_2') : $accordion_option_tab['title_2'];
	$bottom_text = $accordions_list == 'option-0' ? get_field('bottom_text') : $accordion_option_tab['bottom_text'];
	$accordion = $accordions_list == 'option-0' ? get_field('accordion') : $accordion_option_tab['accordion'];
	$button_text = $accordions_list == 'option-0' ? get_field('button_text') : $accordion_option_tab['button_text'];
	$button_link = $accordions_list == 'option-0' ? get_field('button_link') : $accordion_option_tab['button_link'];
}

if ($accordions_list == 'hide') {
	$hide = true;
}

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

if ($hide == false or is_admin() == true) : ?>
	<section class="section accordion <?= $class_name ?>" <?= $anchor ?>>
		<?php // ws_background_image(); 
		?>
		<div class="circles circles--section">
			<div class="circle"></div>
			<div class="circle"></div>
			<div class="circle"></div>
			<div class="circle"></div>
			<div class="circle"></div>
		</div>
		<div class="section-container <?php ws_padding() ?>">
			<h2 class="heading" data-aos="fade-up"><span class="heading--xxl"><?php echo esc_html($title_1); ?></span><span class="heading--s"><?php echo esc_html($title_2); ?></span></h2>
			<?php if ($accordion) : ?>
				<div class="accordion-items">
					<?php
					$item_number = 1;
					foreach ($accordion as $item) : ?>
						<div <?php
								if ($item_number == 1) {
									echo 'id="accordion-item-01"';
								}
								?> class="accordion-item" data-aos="fade-up" <?php
																				if ($item_number != 1) {
																					echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#accordion-item-01"';
																				}
																				?>>
							<div class="accordion-item__title" data-toggle-id="accordion-item-<?php echo $item_number ?>" data-toggle-type="toggler" data-toggle-category="accordion" data-toggle-self-close="true">
								<h3 class="heading--xxs"><?php echo esc_html($item['title']); ?></h3>
								<div class="accordion-item__title__icon">
									<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
										<path id="Path_18078" data-name="Path 18078" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 -2)" fill="#1ad2d6" />
									</svg>
								</div>
							</div>
							<div class="accordion-item__content" data-toggle-id="accordion-item-<?php echo $item_number ?>" data-toggle-type="target" data-toggle-category="accordion">
								<p><?php echo $item['content']; ?></p>
							</div>
						</div>
					<?php
						$item_number++;
					endforeach; ?>
				</div>
			<?php endif; ?>
			<div class="bottom" <?php echo 'data-aos="fade-up" data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#accordion-item-01"'; ?>>
				<h3 class="heading--xs"><?php echo $bottom_text; ?></h3><?php ws_button($button_text, $button_link, 'btn--primary'); ?>
			</div>
		</div>
	</section>
<?php endif; ?>