<?php

/**
 * Hero block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$title = !empty(get_field('title')) ? get_field('title') : '';
$text = !empty(get_field('text')) ? get_field('text') : '';
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
	<section class="section hero <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container">

			<h1 class="heading--xxl title">
				<?php echo $title; ?>
			</h1>

			<div class="wysiwyg-content">
				<?php echo $text; ?>
			</div>

			<div class="button-wrap">
				<svg xmlns="http://www.w3.org/2000/svg" width="34.354" height="35.333" viewBox="0 0 34.354 35.333">
					<path id="Path_17306" data-name="Path 17306" d="M23.607,30.879,35.452,19.033l3.123,3.123L21.4,39.333,4.222,22.156l3.123-3.123L19.19,30.879V4h4.417Z" transform="translate(-4.222 -4)" fill="#EF9700" />
				</svg>
				<span class="button-wrap__arrow"></span>
				<?php ws_button('', '', 'btn--tertiary'); ?>
			</div>

		</div>
		<?= wp_get_attachment_image($photo['id'], 'full', false, false); ?>
	</section>
<?php endif; ?>