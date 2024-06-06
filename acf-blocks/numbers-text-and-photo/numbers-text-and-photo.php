<?php

/**
 * Numbers text and photo block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;

$title = get_field('title');

$number_1 = get_field('number_1');
$number_1_suffix = get_field('number_1_suffix');
$number_1_text = get_field('number_1_text');

$number_2 = get_field('number_2');
$number_2_suffix = get_field('number_2_suffix');
$number_2_text = get_field('number_2_text');

$description_title = get_field('description_title');
$description_column_1 = get_field('description_column_1');
$description_column_2 = get_field('description_column_2');

$photo = get_field('photo');

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
	<section class="section numbers-text-and-photo <?= $class_name ?>" <?= $anchor ?>>
		<div data-aos="fade-up" class="section-container">

			<img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['alt'] ?>" class="photo" loading="lazy">

			<h3 class="title heading--xl"><?php echo $title ?></h3>

			<div class="numbers">
				<div class="number number--1">
					<p class="number__number"><span data-number="<?php echo esc_html($number_1); ?>">0</span><span class="number__suffix"><?php echo esc_html($number_1_suffix); ?></span></p>
					<p class="number__text"><?php echo esc_html($number_1_text); ?></p>
				</div>
				<div class="number number--2">
					<p class="number__number"><span data-number="<?php echo esc_html($number_2); ?>">0</span><span class="number__suffix"><?php echo esc_html($number_2_suffix); ?></span></p>
					<p class="number__text"><?php echo esc_html($number_2_text); ?></p>
				</div>
			</div>

			<h3 class="description__title heading--l"><?php echo $description_title ?></h3>

			<div class="description">
				<div class="description__column-1"><?php echo $description_column_1 ?></div>
				<div class="description__column-2"><?php echo $description_column_2 ?></div>
			</div>
		</div>
		<?php ws_background_image(); ?>
	</section>
<?php endif; ?>