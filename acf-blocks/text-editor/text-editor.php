<?php

/**
 * Text editor block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$width = get_field('width');
$bg_effect = get_field('bg_effect');
$animation = get_field('animation');
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
	<section class="section text-editor <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container <?php ws_padding() ?> <?php echo $width ?>">
			<div class="wysiwyg-content " data-aos="fade-up">
				<?php echo $text; ?>
			</div>
			<?php if ($image) { ?>
				<img src="<?php echo $image['url'] ?>" data-aos="fade-up" alt="<?php echo $image['alt'] ?>" class="image" loading="lazy">
			<?php } ?>
		</div>
	</section>

<?php endif; ?>