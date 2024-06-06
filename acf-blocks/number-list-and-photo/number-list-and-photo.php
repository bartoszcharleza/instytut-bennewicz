<?php

/**
 * Number list and photo block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;

$text = get_field('text');

$number_1 = get_field('number_1');
$number_1_suffix = get_field('number_1_suffix');
$number_1_text = get_field('number_1_text');

$photo = get_field('photo');

$cta_text = get_field('cta_text');

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
	<section class="section number-list-and-photo <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<div data-aos="fade-up" class="section-container">

			<div class="number number--1">
				<p class="number__number"><span data-number="<?php echo esc_html($number_1); ?>">0</span><span class="number__suffix"><?php echo esc_html($number_1_suffix); ?></span></p>
				<p class="number__text"><?php echo esc_html($number_1_text); ?></p>
			</div>
			<div class="wysiwyg-content"><?php echo $text ?></div>
			<img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['alt'] ?>" class="photo" loading="lazy">
			<div class="cta">
				<div><?php echo $cta_text ?></div>
				<?php ws_button('', '', 'btn--secondary'); ?>
			</div>
		</div>
		<?php ws_background_image(); ?>
	</section>
<?php endif; ?>