<?php

/**
 * Text in columns block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$header = !empty(get_field('header')) ? get_field('header') : '';
$text_1 = !empty(get_field('text_1')) ? get_field('text_1') : '';
$text_2 = !empty(get_field('text_2')) ? get_field('text_2') : '';
$button_text = get_field('button_text');
$button_link = get_field('button_link');

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
	<section class="section text-in-columns <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container">
			<div class="wysiwyg-content" data-aos="fade-up">
				<?php echo $header; ?>
			</div>
			<div class="content">
				<div id="content__column-1" class="wysiwyg-content content__column-1" data-aos="fade-up" data-aos-anchor="#content__column-1">
					<?php echo $text_1; ?>
				</div>
				<div class="wysiwyg-content content__column-2" data-aos="fade-up" data-aos-delay="200">
					<?php echo $text_2; ?>
				</div>
			</div>
			<?php if ($button_text) {
			?>
				<div class="cta btn--outside-border-secondary-wrap" data-aos="fade-up" data-aos-delay="400" data-aos-anchor="#content__column-1">
					<a href="<?php echo $button_link ?>" class="btn btn--secondary"><?php echo $button_text ?></a>
				</div>
			<?php
			} ?>
		</div>
	</section>

<?php endif; ?>