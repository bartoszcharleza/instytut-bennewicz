<?php

/**
 * Spinning circle block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : '';

$item_1 = !empty(get_field('item_1')) ? get_field('item_1') : '';
$item_2 = !empty(get_field('item_2')) ? get_field('item_2') : '';
$item_3 = !empty(get_field('item_3')) ? get_field('item_3') : '';
$item_4 = !empty(get_field('item_4')) ? get_field('item_4') : '';
$item_5 = !empty(get_field('item_5')) ? get_field('item_5') : '';
$item_6 = !empty(get_field('item_6')) ? get_field('item_6') : '';

$link_item_1 = !empty(get_field('link_item_1')) ? get_field('link_item_1') : '';
$link_item_2 = !empty(get_field('link_item_2')) ? get_field('link_item_2') : '';
$link_item_3 = !empty(get_field('link_item_3')) ? get_field('link_item_3') : '';
$link_item_4 = !empty(get_field('link_item_4')) ? get_field('link_item_4') : '';
$link_item_5 = !empty(get_field('link_item_5')) ? get_field('link_item_5') : '';
$link_item_6 = !empty(get_field('link_item_6')) ? get_field('link_item_6') : '';

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
	<section class="section spinning-circle <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div data-aos="fade-up" class="section-container">
			<div class="wysiwyg-content">
				<?php echo $text; ?>
			</div>
		</div>
		<div data-aos="fade-up" class="section-container">
			<img width="auto" height="auto" class="background-circles" src="/wp-content/themes/website_style/images/spinning-circle-bg.svg" loading="lazy" alt="Koło">

			<div class="circle">
				<div class="circle__item circle__item--1">
					<div class="circle__item-dot"></div>
					<a href="<?php echo esc_html($link_item_1) ?>"><?php echo esc_html($item_1) ?></a>
				</div>
				<div class="circle__item circle__item--2">
					<div class="circle__item-dot"></div>
					<a href="<?php echo esc_html($link_item_2) ?>"><?php echo esc_html($item_2) ?></a>
				</div>
				<div class="circle__item circle__item--3">
					<div class="circle__item-dot"></div>
					<a href="<?php echo esc_html($link_item_3) ?>"><?php echo esc_html($item_3) ?></a>
				</div>
				<div class="circle__item circle__item--4">
					<div class="circle__item-dot"></div>
					<a href="<?php echo esc_html($link_item_4) ?>"><?php echo esc_html($item_4) ?></a>
				</div>
				<div class="circle__item circle__item--5">
					<div class="circle__item-dot"></div>
					<a href="<?php echo esc_html($link_item_5) ?>"><?php echo esc_html($item_5) ?></a>
				</div>
				<div class="circle__item circle__item--6">
					<div class="circle__item-dot"></div>
					<a href="<?php echo esc_html($link_item_6) ?>"><?php echo esc_html($item_6) ?></a>
				</div>
				<div class="circle__item circle__item--background"></div>
			</div>
		</div>
	</section>

<?php endif; ?>