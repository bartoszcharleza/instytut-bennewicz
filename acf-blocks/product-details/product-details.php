<?php

/**
 * Product details block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$title = !empty(get_field('title')) ? get_field('title') : 'title...';
$details_list = get_field('details_list');

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
	<section class="section product-details <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">

			<h2 class="product-details__title heading--s"><?php echo esc_html($title); ?></h2>

			<?php if ($details_list) : ?>
				<ul>
					<?php foreach ($details_list as $item) : ?>
						<li class="product-details__item">

							<div class="product-details__item-text">
								<?php echo $item['text'] ?>
							</div>

							<div class="product-details__item-title">
								<?php echo $item['title'] ?>
							</div>

						</li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

		</div>
	</section>
<?php endif; ?>