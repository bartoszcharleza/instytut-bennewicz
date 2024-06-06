<?php

/**
 * Floating Text Blocks block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$type = get_field('type');

$title = get_field('title');
$title_2 = get_field('title_2');

$text_1 = get_field('text_1');
$text_2 = get_field('text_2');
$text_3 = get_field('text_3');

$show_numbers = get_field('show_numbers');

$number_1 = get_field('number_1');
$number_1_suffix = get_field('number_1_suffix');
$number_1_text = get_field('number_1_text');

$number_2 = get_field('number_2');
$number_2_suffix = get_field('number_2_suffix');
$number_2_text = get_field('number_2_text');

$number_3 = get_field('number_3');
$number_3_suffix = get_field('number_3_suffix');
$number_3_text = get_field('number_3_text');

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

if ($hide == false or is_admin() == true) :
	if ($type == '1') :
?>
		<section class="section floating-text-blocks <?= $class_name ?>" <?= $anchor ?>>
			<div class="section-container">
				<h2 data-aos="fade-up"><?php echo esc_html($title); ?></h2>
				<h3 class="heading--s" data-aos="fade-up"><?php echo esc_html($title_2); ?></h3>
			</div>
			<div class="section-container">
				<div class="number number--1" data-aos="fade-up">
					<p class="number__number"><span data-number="<?php echo esc_html($number_1); ?>">0</span><span class="number__suffix"><?php echo esc_html($number_1_suffix); ?></span></p>
					<p class="number__text"><?php echo esc_html($number_1_text); ?></p>
				</div>
				<div class="number number--2" data-aos="fade-up">
					<p class="number__number"><span data-number="<?php echo esc_html($number_2); ?>">0</span><span class="number__suffix"><?php echo esc_html($number_2_suffix); ?></span></p>
					<p class="number__text"><?php echo esc_html($number_2_text); ?></p>
				</div>
				<div class="number number--3" data-aos="fade-up">
					<p class="number__number"><span data-number="<?php echo esc_html($number_3); ?>">0</span><span class="number__suffix"><?php echo esc_html($number_3_suffix); ?></span></p>
					<p class="number__text"><?php echo esc_html($number_3_text); ?></p>
				</div>
				<div class="content content--1" data-aos="fade-up">
					<div class="wysiwyg-content">
						<?php echo wp_kses_post($text_1); ?>
					</div>
				</div>
				<div class="content content--2" data-aos="fade-up">
					<div class=" wysiwyg-content">
						<?php echo wp_kses_post($text_2); ?>
					</div>
				</div>
				<div class="content content--3" data-aos="fade-up">
					<div class="wysiwyg-content">
						<?php echo wp_kses_post($text_3); ?>
					</div>
				</div>
			</div>
			<?php ws_background_image(); ?>
		</section>
	<?php endif;
endif;

if ($hide == false or is_admin() == true) :
	if ($type == '2') :
	?>
		<section class="section floating-text-blocks-2 <?= $class_name ?>" <?= $anchor ?>>
			<div class="section-container">
				<div class="number number--1" data-aos="fade-up">
					<p class="number__number"><span data-number="<?php echo esc_html($number_1); ?>">0</span><span class="number__suffix"><?php echo esc_html($number_1_suffix); ?></span></p>
					<p class="number__text"><?php echo esc_html($number_1_text); ?></p>
				</div>
				<div class="number number--2" data-aos="fade-up">
					<p class="number__number"><span data-number="<?php echo esc_html($number_2); ?>">0</span><span class="number__suffix"><?php echo esc_html($number_2_suffix); ?></span></p>
					<p class="number__text"><?php echo esc_html($number_2_text); ?></p>
				</div>
				<div class="content content--1" data-aos="fade-up">
					<div class="wysiwyg-content">
						<?php echo wp_kses_post($text_1); ?>
					</div>
				</div>
				<div class="content content--2" data-aos="fade-up">
					<div class=" wysiwyg-content">
						<?php echo wp_kses_post($text_2); ?>
					</div>
				</div>
				<div class="content content--3" data-aos="fade-up">
					<div class="wysiwyg-content">
						<?php echo wp_kses_post($text_3); ?>
					</div>
				</div>
				<div class="line line--1" data-aos="fade-up"></div>
				<div class="line line--2" data-aos="fade-up"></div>
				<div class="line line--3" data-aos="fade-up"></div>
			</div>
			<?php ws_background_image(); ?>
		</section>
<?php endif;
endif;  ?>