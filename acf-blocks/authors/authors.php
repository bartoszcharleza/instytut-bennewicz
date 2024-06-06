<?php

/**
 * Authors block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;

$title = get_field('title');

$text_2 = get_field('text_2');
$text_3 = get_field('text_3');


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

	<section class="section authors <?= $class_name ?>" <?= $anchor ?>>

		<div class="section-container">
			<div class="content content--1" data-aos="fade-up">
				<svg xmlns="http://www.w3.org/2000/svg" width="62.735" height="60.501" viewBox="0 0 62.735 60.501">
					<path id="Path_17341" data-name="Path 17341" d="M1,61.284a22.813,22.813,0,0,1,45.625,0h-5.7a17.109,17.109,0,0,0-34.219,0ZM23.813,35.62A17.109,17.109,0,1,1,40.922,18.51,17.1,17.1,0,0,1,23.813,35.62Zm0-5.7A11.406,11.406,0,1,0,12.406,18.51,11.4,11.4,0,0,0,23.813,29.916ZM59.593.784a40.007,40.007,0,0,1,0,35.453L54.9,32.826A34.311,34.311,0,0,0,54.9,4.2ZM50.179,7.63a28.614,28.614,0,0,1,0,21.76L45.4,25.913a22.927,22.927,0,0,0,0-14.8Z" transform="translate(-1 -0.783)" fill="#fff" />
				</svg>

				<h2 class="heading--xl"><?php echo esc_html($title); ?></h2>
			</div>
			<div class="content content--2">
				<div class=" wysiwyg-content" data-aos="fade-up">
					<?php echo wp_kses_post($text_2); ?>
				</div>
			</div>
			<div class="content content--3">
				<div class="wysiwyg-content" data-aos="fade-up">
					<?php echo wp_kses_post($text_3); ?>
				</div>
			</div>
		</div>

		<?php ws_background_image(); ?>

	</section>
<?php endif; ?>