<?php

/**
 * CTA with image block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
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
	<section class="section cta-with-image <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container">
			<div class="wysiwyg-content-wrap" data-aos="fade-up">
				<div class="wysiwyg-content">
					<?php echo $text; ?>
				</div>
			</div>
			<?= wp_get_attachment_image($photo['id'], 'full', false, ['loading' => false, 'data-aos' => 'fade-up', 'data-aos-delay' => '200']); ?>
		</div>
	</section>
<?php endif; ?>