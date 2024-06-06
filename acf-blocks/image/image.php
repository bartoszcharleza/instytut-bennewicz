<?php

/**
 * Image block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$image = get_field('image');

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
	<section class="section image <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">
			<?php if ($image) : ?>
				<?php echo wp_get_attachment_image($image['id'], 'full'); ?>
			<?php endif; ?>
		</div>
	</section>
<?php endif; ?>