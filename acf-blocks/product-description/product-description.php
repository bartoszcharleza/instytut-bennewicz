<?php

/**
 * Product description block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$title = !empty(get_field('title')) ? get_field('title') : 'title...';
$author = !empty(get_field('author')) ? get_field('author') : 'author...';
$photo = get_field('photo');
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
	<section class="section product-description <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">

			<div class="photo-wrap"><img src="<?php echo $photo['url'] ?>" alt="<?php echo $photo['alt'] ?>" loading="lazy"></div>

			<div class="product-content">
				<h1 class="product-content__title heading--l"><?php echo esc_html($title) ?></h1>
				<h3 class="product-content__author">Autor: <?php echo esc_html($author) ?></h3>
				<div class="product-content__text wysiwyg-content">
					<?php echo $text; ?>
				</div>
				<div class="product-content__details">
					<?php if ($details_list) : ?>
						<ul>
							<?php foreach ($details_list as $item) : ?>
								<li><span><?php echo $item['title'] ?></span><span><?php echo $item['text'] ?></span></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
				</div>

				<div class="product-content__price">Cena:
					<?php
					if (!is_admin()) {
						echo wc_price(wc_get_product(get_the_id())->get_price());
					}
					?>
				</div>
				<div class="product-content__add_to_cart"><?php woocommerce_template_loop_add_to_cart(); ?></div>

			</div>
	</section>
<?php endif; ?>