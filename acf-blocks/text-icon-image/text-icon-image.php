<?php

/**
 * Text icon image block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$icon = get_field('icon');
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
	<section class="section text-icon-image <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div data-aos="fade-up" class="section-container">
			<img src="<?php echo $icon['url'] ?>" alt="<?php echo $icon['alt'] ?>" class="icon" loading="lazy">
			<div class="wysiwyg-content">
				<?php echo $text; ?>
			</div>
		</div>
		<div class="image">
			<img src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" loading="lazy">
		</div>
	</section>

<?php endif; ?>