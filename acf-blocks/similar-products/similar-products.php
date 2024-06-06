<?php

/**
 * Simillar products block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;

$anchor = '';
if (!empty($block['anchor'])) {
	$anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = '';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}
global $post;

// Get the product categories for the current product
$product_category = wp_get_post_terms($post->ID, 'product_cat')[0]->slug;

$the_query = new WP_Query(array(
	'post_type' => 'product',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
	'tax_query' => array(
		array(
			'taxonomy' => 'product_cat',
			'field'    => 'slug',
			'terms'    => $product_category,
		),
	),
	'post_status' => 'publish',
	'ignore_sticky_posts' => true,
	'no_found_rows' => true,
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
	'cache_results' => false,
));


if ($hide == false or is_admin() == true) : ?>
	<section class="section similar-products <?= $class_name ?> " <?= $anchor ?>>
		<?php ws_background_image(); ?>

		<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">
			<h2 class="heading--xs">Zobacz również</h2>
			<div class="swiper-container swiper-similar-products">
				<div class="swiper-wrapper">
					<?php
					if ($the_query->have_posts()) {
						while ($the_query->have_posts()) {
							$the_query->the_post();
							$author = get_the_author();
							$title = get_the_title();
							$link = get_permalink();
							$thumbnail = get_post_thumbnail_id();
							$excerpt = wp_trim_words(get_the_excerpt(), 10); // Shorten excerpt to 10 words
					?>
							<div class="swiper-slide">
								<article class="post">
									<?php echo wp_get_attachment_image($thumbnail, 'full', false, array('class' => 'post__image')); ?>
									<div class="post__content">
										<a href="<?php echo $link ?>">
											<h3 class="post__title heading--s"><?php echo $title; ?></h3>
										</a>
										<div class="post__author">Autor: Maciej Bennewicz</div>
									</div>
								</article>
							</div>
					<?php
						}
					} else {
						esc_html_e('Brak postów.');
					}
					?>
				</div>

			</div>
			<div class="swiper-buttons">
				<div class="swiper-button-prev-4"> <svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17332" data-name="Path 17332" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(30.667 -2) rotate(90)" fill="#EF9700" />
					</svg>
				</div>
				<span class="swiper-buttons-line"></span>
				<div class="swiper-button-next-4">
					<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17333" data-name="Path 17333" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#EF9700" />
					</svg>
				</div>
			</div>
			<?php
			wp_reset_postdata();
			?>
		</div>
	</section>
<?php endif; ?>