<?php

/**
 * Carousel block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = get_field('text');
$big_number = get_field('big_number');
$title = get_field('title');
$carousel = get_field('carousel');
if ($carousel) {
	$carousel_items_number = count($carousel);
}
$carousel_type = get_field('carousel_type');
$bg_effect = get_field('bg_effect');
$button_text = get_field('button_text');
$button_url = get_field('button_url');
$products = get_field('products');

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
if ($carousel_type == '1') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel <?= $class_name ?> " <?= $anchor ?>>
			<?php
			if (is_array($bg_effect)) :
				if (in_array('option-1', $bg_effect)) : ?>
					<div class="video-background">
						<video class="video-background__video" width="100%" height="100%" autoplay muted loop>
							<source src="/wp-content/themes/website_style/images/bennewicz-bg-02.mp4" type="video/mp4">
						</video>
					</div>
			<?php endif;
			endif; ?>
			<?php ws_background_image();
			?>
			<!-- <?php
					if (is_array($bg_effect)) :
						if (in_array('option-1', $bg_effect)) : ?>
					<div class="section-background section-background-1"></div>
			<?php endif;
					endif; ?> -->
			<div class="section-container <?php ws_padding() ?>">
				<div class="wysiwyg-content" data-aos="fade-up">
					<?php echo $text; ?>
				</div>
				<?php if (have_rows('carousel')) : ?>
					<div class="swiper-container swiper-carousel" data-aos="fade-up">
						<div class="swiper-wrapper">
							<?php while (have_rows('carousel')) :
								the_row();
								$title = get_sub_field('title');
								$text = get_sub_field('text');
								$photo = get_sub_field('photo')['ID'];
								$button_text = get_sub_field('button_text');
								$button_link = get_sub_field('button_link');
							?>
								<div class="swiper-slide">
									<a href="<?php echo $button_link ?>">
										<?php echo wp_get_attachment_image($photo, 'carousel', false, ['class' => 'swiper-slide__image', 'loading' => 'lazy', 'alt' => esc_attr($title)]); ?>
									</a>
									<h3 class="swiper-slide__title heading--xs">
										<?php echo esc_html($title); ?>
									</h3>
									<p class="swiper-slide__text">
										<?php echo wp_kses_post($text); ?>
									</p>
									<?php if ($button_text && $button_link) : ?>
										<?php ws_button($button_text, $button_link, 'btn--primary swiper-slide__button'); ?>
									<?php endif; ?>
								</div>
							<?php endwhile; ?>
						</div>

						<div class="swiper-button-prev-1">
							<img src="/wp-content/themes/website_style/images/swiper-arrow-left.svg" loading="lazy">
						</div>
						<div class="swiper-button-next-1">
							<img src="/wp-content/themes/website_style/images/swiper-arrow-right.svg" loading="lazy">
						</div>

					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
	<?php endif;

if ($carousel_type == '2') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel-2  <?= $class_name ?> <?php ws_section_classes() ?>" <?= $anchor ?>>
			<div class="section-container">
				<div class="wysiwyg-content" data-aos="fade-up">
					<?php echo $text; ?>
				</div>
			</div>
			<div class="section-container">

				<?php if (
					have_rows('carousel')
				) : ?>
					<div class="swiper-container swiper-carousel-2" data-aos="fade-up">
						<div class="swiper-wrapper">
							<?php while (have_rows('carousel')) :
								the_row();
								$title = get_sub_field('title');
								$photo = get_sub_field('photo')['ID'];
								$link = get_sub_field('link');
							?>
								<a href="<?php echo esc_html($link) ?>" class="swiper-slide">
									<?php echo wp_get_attachment_image($photo, 'carousel', false, ['class' => 'swiper-slide__image', 'loading' => 'lazy', 'alt' => esc_attr($title)]); ?>
									<h3 class="swiper-slide__title heading--xxs">
										<?php echo esc_html($title); ?>
									</h3>
								</a>
							<?php endwhile; ?>
						</div>
					</div>
					<div class="swiper-buttons">
						<div class="swiper-button-prev swiper-button-prev-2"> <img src="/wp-content/themes/website_style/images/swiper-arrow-left.svg" loading="lazy">
						</div>
						<div class="swiper-button-next swiper-button-next-2">
							<img src="/wp-content/themes/website_style/images/swiper-arrow-right.svg" loading="lazy">
						</div>
					</div>
				<?php endif; ?>
			</div>
			<?php ws_background_image(); ?>
		</section>
	<?php endif; ?>
	<?php endif;

if ($carousel_type == '3') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel-3  <?= $class_name ?> <?php ws_section_classes() ?>" <?= $anchor ?>>

			<div class="section-container">
				<div class="wysiwyg-content" data-aos="fade-up">
					<?php echo $text; ?>
				</div>
				<h2 class="heading heading--xl" data-aos="fade-up"><span><?php echo esc_html($big_number); ?></span><?php echo esc_html($title); ?></h2>
			</div>
			<div class="section-container">
				<?php if (
					have_rows('carousel')
				) : ?>
					<div class="swiper-container swiper-carousel-3" data-aos="fade-up">
						<div class="swiper-wrapper">
							<?php while (have_rows('carousel')) :
								the_row();
								$title = get_sub_field('title');
								$text = get_sub_field('text');
								$photo = get_sub_field('photo')['ID'];
							?>
								<div class="swiper-slide">
									<?php echo wp_get_attachment_image($photo, 'carousel', false, ['class' => 'swiper-slide__image', 'loading' => 'lazy', 'alt' => esc_attr($title)]); ?>
									<div class="swiper-slide__overlay"></div>
									<h3 class="swiper-slide__title heading--xs">
										<?php echo esc_html($title); ?>
									</h3>
									<div class="swiper-slide__text"><?php echo wp_kses_post($text) ?></div>
								</div>
							<?php endwhile; ?>
						</div>
						<div class="swiper-button-prev-3 <?php if ($carousel_items_number <= 3) : echo 'hide-destkop';
															endif; ?>"> <svg xmlns="http://www.w3.org/2000/svg" width="37.809" height="37.809" viewBox="0 0 37.809 37.809">
								<path id="Path_17384" data-name="Path 17384" d="M18.9,0A18.9,18.9,0,1,1,0,18.9,18.912,18.912,0,0,1,18.9,0Zm0,34.028A15.124,15.124,0,1,0,3.781,18.9,15.12,15.12,0,0,0,18.9,34.028ZM20.8,18.9h5.671L18.9,26.467,11.343,18.9h5.671V11.343H20.8Z" transform="translate(37.809) rotate(90)" fill="#EF9700" />
							</svg>

						</div>
						<div class="swiper-button-next-3 <?php if ($carousel_items_number <= 3) : echo 'hide-destkop';
															endif; ?>">
							<svg xmlns="http://www.w3.org/2000/svg" width="37.809" height="37.809" viewBox="0 0 37.809 37.809">
								<path id="Path_17385" data-name="Path 17385" d="M18.9,0A18.9,18.9,0,1,1,0,18.9,18.912,18.912,0,0,1,18.9,0Zm0,34.028A15.124,15.124,0,1,0,3.781,18.9,15.12,15.12,0,0,0,18.9,34.028ZM20.8,18.9h5.671L18.9,26.467,11.343,18.9h5.671V11.343H20.8Z" transform="translate(0 37.809) rotate(-90)" fill="#EF9700" />
							</svg>

						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif; ?>
	<?php endif;

if ($carousel_type == '4') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel-4 <?= $class_name ?> " <?= $anchor ?>>
			<?php
			if (is_array($bg_effect)) :
				if (in_array('option-1', $bg_effect)) : ?>
					<div class="video-background">
						<video class="video-background__video" width="100%" height="100%" autoplay muted loop>
							<source src="/wp-content/themes/website_style/images/bennewicz-bg-02.mp4" type="video/mp4">
						</video>
					</div>
			<?php endif;
			endif; ?>
			<?php ws_background_image();
			?>
			<!-- <?php
					if (is_array($bg_effect)) :
						if (in_array('option-1', $bg_effect)) : ?>
					<div class="section-background section-background-1"></div>
			<?php endif;
					endif; ?> -->
			<div class="section-container <?php ws_padding() ?>">
				<div class="content">
					<div class="wysiwyg-content" data-aos="fade-up">
						<?php echo $text; ?>
					</div>
					<?php if (have_rows('carousel')) : ?>
						<div class="swiper-container swiper-carousel-4" data-aos="fade-up">
							<div class="swiper-wrapper">
								<?php while (have_rows('carousel')) :
									the_row();
									$dynamic_product = get_sub_field('dynamic_product');
									$dynamic_product_object = get_sub_field('dynamic_product_object')[0];
									if ($dynamic_product) :
										$dynamic_product_id = $dynamic_product_object->ID;
										$title = $dynamic_product_object->post_title;
										$text = get_sub_field('text');
										$photo = get_post_thumbnail_id($dynamic_product_object);
										$button_text = get_sub_field('button_text');
										$button_link = get_the_permalink($dynamic_product_object);
									else :
										$title = get_sub_field('title');
										$text = get_sub_field('text');
										$photo = get_sub_field('photo')['ID'];
										$button_text = get_sub_field('button_text');
										$button_link = get_sub_field('button_link');
									endif;
								?>
									<div class="swiper-slide">
										<a href="<?php echo $button_link ?>">
											<?php echo wp_get_attachment_image($photo, 'carousel', false, ['class' => 'swiper-slide__image', 'loading' => 'lazy', 'alt' => esc_attr($title)]) ?>
										</a>
										<h3 class="swiper-slide__title heading--xs">
											<?php echo esc_html($title); ?>
										</h3>
										<p class="swiper-slide__text">
											<?php echo esc_html($text); ?>
										</p>
										<?php if ($button_text && $button_link) : ?>
											<?php ws_button($button_text, $button_link, 'btn--primary swiper-slide__button'); ?>
										<?php endif; ?>
									</div>
								<?php endwhile; ?>
							</div>
							<div class="swiper-button-prev-4">
								<img src="/wp-content/themes/website_style/images/swiper-arrow-left.svg" loading="lazy">
							</div>
							<div class="swiper-button-next-4">
								<img src="/wp-content/themes/website_style/images/swiper-arrow-right.svg" loading="lazy">
							</div>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php endif;

if ($carousel_type == '5') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel-5 <?= $class_name ?> " <?= $anchor ?>>
			<?php
			if (is_array($bg_effect)) :
				if (in_array('option-1', $bg_effect)) : ?>
					<div class="video-background">
						<video class="video-background__video" width="100%" height="100%" autoplay muted loop>
							<source src="/wp-content/themes/website_style/images/bennewicz-bg-02.mp4" type="video/mp4">
						</video>
					</div>
			<?php endif;
			endif; ?>
			<?php ws_background_image();
			?>
			<!-- <?php
					if (is_array($bg_effect)) :
						if (in_array('option-1', $bg_effect)) : ?>
					<div class="section-background section-background-1"></div>
			<?php endif;
					endif; ?> -->
			<div class="section-container <?php ws_padding() ?>">
				<div class="wysiwyg-content" data-aos="fade-up">
					<?php echo $text; ?>
				</div>
				<!-- Swiper Container -->
				<?php if (have_rows('carousel')) : ?>
					<div class="swiper-container swiper-carousel-5" data-aos="fade-up">
						<div class="swiper-wrapper">
							<?php
							$slide_number = 1;
							while (have_rows('carousel')) : the_row();
								$name = get_sub_field('name');
								$description = get_sub_field('description');
								$opinion = get_sub_field('opinion');
								$opinion_video = get_sub_field('opinion_video');
								$photo = get_sub_field('photo') ? get_sub_field('photo')['ID'] : '';
								$button_text = get_sub_field('button_text');
								$button_link = get_sub_field('button_link');
							?>
								<div class="swiper-slide">
									<svg class="swiper-slide__icon" id="google-icon-logo" xmlns="http://www.w3.org/2000/svg" width="19.667" height="20.068" viewBox="0 0 19.667 20.068">
										<path id="Path_18282" data-name="Path 18282" d="M140.183,108.812a8.6,8.6,0,0,0-.212-2.051H130.55v3.724h5.53a4.9,4.9,0,0,1-2.051,3.255l-.019.125,2.979,2.308.206.021a9.811,9.811,0,0,0,2.988-7.381" transform="translate(-120.516 -98.555)" fill="#4285f4" />
										<path id="Path_18283" data-name="Path 18283" d="M22.889,164.419a9.564,9.564,0,0,0,6.645-2.43l-3.166-2.453a5.939,5.939,0,0,1-3.478,1,6.041,6.041,0,0,1-5.708-4.17l-.118.01-3.1,2.4-.041.113a10.027,10.027,0,0,0,8.964,5.53" transform="translate(-12.855 -144.352)" fill="#34a853" />
										<path id="Path_18284" data-name="Path 18284" d="M4.326,77.849a6.177,6.177,0,0,1-.334-1.984,6.491,6.491,0,0,1,.323-1.984l-.006-.133L1.173,71.312l-.1.049a10.013,10.013,0,0,0,0,9.008l3.255-2.52" transform="translate(0 -65.831)" fill="#fbbc05" />
										<path id="Path_18285" data-name="Path 18285" d="M22.889,3.88a5.561,5.561,0,0,1,3.88,1.494L29.6,2.609A9.64,9.64,0,0,0,22.889,0a10.027,10.027,0,0,0-8.964,5.53l3.244,2.52a6.065,6.065,0,0,1,5.719-4.17" transform="translate(-12.855)" fill="#eb4335" />
									</svg>

									<?php echo wp_get_attachment_image($photo, 'carousel', false, ['class' => 'swiper-slide__image', 'loading' => 'lazy', 'alt' => esc_attr($title)]); ?>
									<h3 class="swiper-slide__name heading--xs"><?php echo esc_html($name); ?></h3>
									<p class="swiper-slide__description"><?php echo esc_html($description); ?></p>
									<div class="swiper-slide__opinion">
										<?php
										if (mb_strlen($opinion, "UTF-8") > 300) {
											echo mb_substr($opinion, 0, 300, "UTF-8") . '<a class="opinion-more" data-slide-number="' . $slide_number . '"> ... więcej</a>';
										} else {
											echo $opinion;
										}

										if ($opinion_video) { ?>
											<a class="swiper-slide__opinion-video opinion-more" data-slide-number="<?php echo $slide_number ?>">
												<img src="<?php echo $opinion_video['sizes']['medium_large'] ?>" alt="Miniaturka wideo" loading="lazy">
												<span class="btn btn--secondary">Obejrzyj wideo</span>
											</a>
										<?php } ?>
									</div>
								</div>
							<?php $slide_number++;
							endwhile; ?>
						</div>
					</div>

					<div class="swiper-button-prev swiper-button-prev-5"><img src="/wp-content/themes/website_style/images/swiper-arrow-left.svg" loading="lazy"></div>
					<div class="swiper-button-next swiper-button-next-5"><img src="/wp-content/themes/website_style/images/swiper-arrow-right.svg" loading="lazy"></div>

				<?php endif; ?>
			</div>
			<?php if ($button_text) : ?>
				<div data-aos="fade-up" class="section-container">
					<?php ws_button($button_text, $button_url, ' cta btn--secondary'); ?>
				</div>

			<?php
			endif;
			if (have_rows('carousel')) : ?>
				<?php
				$slide_number = 1;
				while (have_rows('carousel')) : the_row();
					$opinion = get_sub_field('opinion');
					$opinion_video = get_sub_field('opinion_video');

					if (mb_strlen($opinion, "UTF-8") > 300) {
						echo '<div class="swiper-slide__opinion-popup popup" data-slide-number="' . $slide_number . '">' . $opinion;
						echo '<div class="swiper-slide__opinion-popup-close popup-close">X</div></div>';
					}
					if ($opinion_video) {
						echo '<div class="swiper-slide__opinion-popup popup" data-slide-number="' . $slide_number . '">'
				?>
						<video preload="none" width="100%" height="auto" controls>
							<source src="<?php echo $opinion_video['url'] ?>" type="video/mp4">
							Your browser does not support the video tag.
						</video>
					<?php
						echo '<div class="swiper-slide__opinion-popup-close">X</div>';
						echo '</div>';
					}
					?>
				<?php $slide_number++;
				endwhile; ?>
			<?php endif; ?>

			<div id="opinion-popup" class="swiper-slide__opinion-popup popup">
				<div class="popup-content"></div>
			</div>
		</section>
	<?php endif; ?>
	<?php endif;

if ($carousel_type == '6') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel-6 <?= $class_name ?> " <?= $anchor ?>>
			<?php
			if (is_array($bg_effect)) :
				if (in_array('option-1', $bg_effect)) : ?>

					<div class="video-background">
						<video class="video-background__video" width="100%" height="100%" autoplay muted loop>
							<source src="/wp-content/themes/website_style/images/bennewicz-bg-02.mp4" type="video/mp4">
						</video>
					</div>

			<?php endif;
			endif; ?>
			<?php ws_background_image();
			?>
			<!-- <?php
					if (is_array($bg_effect)) :
						if (in_array('option-1', $bg_effect)) : ?>
					<div class="section-background section-background-1"></div>
			<?php endif;
					endif; ?> -->
			<div class="section-container <?php ws_padding() ?>">
				<div class="wysiwyg-content" data-aos="fade-up">
					<p class="background-text">Team</p>
					<?php echo $text; ?>
				</div>
				<!-- Swiper Container -->
				<?php if (have_rows('carousel')) : ?>
					<div class="swiper-container swiper-carousel-6" data-aos="fade-up">
						<div class="swiper-wrapper">
							<?php
							$slide_number = 1;
							while (have_rows('carousel')) : the_row();
								$name = get_sub_field('name');
								$description = get_sub_field('description');
								$opinion = get_sub_field('text');
								$photo = get_sub_field('photo')['ID'];
							?>
								<div class="swiper-slide">
									<?php echo wp_get_attachment_image($photo, 'carousel', false, ['class' => 'swiper-slide__image', 'loading' => 'lazy', 'alt' => esc_attr($title)]); ?>
									<h3 class="swiper-slide__name heading--s"><?php echo esc_html($name); ?></h3>
									<p class="swiper-slide__description"><?php echo esc_html($description); ?></p>
									<div class="swiper-slide__opinion">
										<?php
										if (mb_strlen($opinion, "UTF-8") > 105) {
											echo mb_substr($opinion, 0, 105, "UTF-8") . '<a class="opinion-more" data-slide-number="' . $slide_number . '"> ... więcej</a>';
										} else {
											echo $opinion;
										}
										?>
									</div>
								</div>

							<?php $slide_number++;
							endwhile; ?>
						</div>
					</div>

					<div class="swiper-button-prev-6"><img src="/wp-content/themes/website_style/images/swiper-arrow-left.svg" loading="lazy"></div>
					<div class="swiper-button-next-6"><img src="/wp-content/themes/website_style/images/swiper-arrow-right.svg" loading="lazy"></div>

				<?php endif; ?>
			</div>

			<?php if (have_rows('carousel')) : ?>
				<?php
				$slide_number = 1;
				while (have_rows('carousel')) : the_row();
					$opinion = get_sub_field('text');
					$opinion_video = get_sub_field('opinion_video');

					if (mb_strlen($opinion, "UTF-8") > 105) {
						echo '<div class="swiper-slide__opinion-popup popup" data-slide-number="' . $slide_number . '">' . $opinion;
						echo '<div class="popup-close">X</div></div>';
					}
					$slide_number++;
				endwhile; ?>
			<?php endif; ?>

		</section>
	<?php endif; ?>
	<?php endif;
if ($carousel_type == '7') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel-7 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div class="section-container <?php ws_padding() ?>">
				<?php if ($text) : ?>
					<div class="wysiwyg-content" data-aos="fade-up">
						<?php echo $text; ?>
					</div>
				<?php endif; ?>
				<?php
				$args = array(
					'post_type' => 'product',
					'posts_per_page' => 10,
					'post__in' => $products,
				);
				$loop = new WP_Query($args);
				if ($loop->have_posts()) : ?>
					<div class="swiper-container swiper-carousel-7" data-aos="fade-up">
						<div class="swiper-wrapper">
							<?php
							while ($loop->have_posts()) : $loop->the_post();
								global $product;
								$product_id = $product->get_id();
								$product_cats = wp_get_post_terms($product_id, 'product_cat');
								$category_names = [];
								foreach ($product_cats as $cat) {
									$category_names[] = $cat->name;
								}
								$tags = wp_get_post_terms($product_id, 'product_tag');
								$tag_names = [];
								foreach ($tags as $tag) {
									$tag_names[] = $tag->name;
								}
							?>
								<div class="swiper-slide">
									<?php echo wp_get_attachment_image(get_post_thumbnail_id($product_id), 'carousel', false, ['class' => 'swiper-slide__image', 'alt' => esc_attr(get_the_title($product_id)), 'loading' => 'lazy']); ?>
									<div class="swiper-slide__info">
										<div class="swiper-slide__top">
											<?php if ($product->is_on_sale()) : ?>
												<span class="swiper-slide__sale-tag">Promocja</span>
											<?php endif; ?>

											<div class="swiper-slide__categories">
												<?php foreach ($product_cats as $cat) :
												?> <div class="swiper-slide__category"> <?php
																						$cat_thumb_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
																						$cat_thumb_url = wp_get_attachment_url($cat_thumb_id);
																						if ($cat_thumb_url) : ?>
															<img src="<?php echo esc_url($cat_thumb_url); ?>" alt="<?php echo esc_attr($cat->name); ?>" class="swiper-slide__category-image" loading="lazy">
														<?php endif; ?>
														<span class="swiper-slide__category-title"><?php echo esc_html($cat->name); ?></span>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
										<h3 class="swiper-slide__title heading--l"><?php the_title(); ?></h3>
										<p class="swiper-slide__text"><?php echo mb_substr(get_the_excerpt(), 0, 150, "UTF-8") . '...'; ?></p>
										<div class="swiper-slide__bottom">
											<a href="<?php the_permalink(); ?>" class="btn btn--secondary"><?php esc_html_e('Zobacz produkt', 'your-text-domain'); ?></a>
											<!-- <p class="swiper-slide__price"><?php echo $product->get_price_html(); ?></p> -->
										</div>
									</div>
								</div>
							<?php endwhile;
							wp_reset_postdata(); ?>
						</div>
						<div class="swiper-buttons">
							<div class="swiper-button-prev swiper-button-prev-7">
								<img src="/wp-content/themes/website_style/images/swiper-arrow-left.svg" loading="lazy">
							</div>
							<div class="swiper-button-next swiper-button-next-7">
								<img src="/wp-content/themes/website_style/images/swiper-arrow-right.svg" loading="lazy">
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>

	<?php endif; ?>
	<?php endif;
if ($carousel_type == '8') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel-8 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div class="section-container <?php ws_padding() ?>">
				<div class="wysiwyg-content" data-aos="fade-up">
					<?php echo $text; ?>
				</div>
				<?php

				$args = array(
					'post_type' => 'product',
					'posts_per_page' => 16,
					'post__in' => $products,
				);

				$loop = new WP_Query($args);
				if ($loop->have_posts()) : ?>
					<div class="swiper-container swiper-carousel-8" data-aos="fade-up">
						<div class="swiper-wrapper">
							<?php
							$item_number = 1;
							while ($loop->have_posts()) : $loop->the_post();
								global $product;
								$product_id = $product->get_id();
								$product_cats = wp_get_post_terms($product_id, 'product_cat');
								$category_names = [];
								foreach ($product_cats as $cat) {
									$category_names[] = $cat->name;
								}
								$tags = wp_get_post_terms($product_id, 'product_tag');
								$tag_names = [];
								$premiere = get_field('premiere', $product_id);
								$bestseller = get_field('bestseller', $product_id);
								foreach ($tags as $tag) {
									$tag_names[] = $tag->name;
								}
							?>
								<div class="swiper-slide">
									<a href="<?php echo the_permalink(); ?>" class="swiper-slide__image">
										<?php echo wp_get_attachment_image(get_post_thumbnail_id($product_id), 'carousel', false, ['loading' => 'lazy', 'alt' => esc_attr(get_the_title($product_id))]); ?>
										<div class="swiper-slide__tags">
											<?php if ($product->is_on_sale()) : ?>
												<span class="swiper-slide__sale-tag">Promocja</span>
											<?php endif; ?>

											<?php if ($premiere) : ?>
												<span class="swiper-slide__premiere-tag">Premiera</span>
											<?php endif; ?>
											<?php if ($bestseller) : ?>
												<span class="swiper-slide__bestseller-tag">Bestseller</span>
											<?php endif; ?>
										</div>


									</a>
									<div class="swiper-slide__info">
										<div class="swiper-slide__top">
											<div class="swiper-slide__categories">
												<?php foreach ($product_cats as $cat) : ?>
													<div class="swiper-slide__category">
														<?php
														$cat_thumb_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
														$cat_thumb_url = wp_get_attachment_url($cat_thumb_id);
														if ($cat_thumb_url) : ?>
															<img src="<?php echo esc_url($cat_thumb_url); ?>" alt="<?php echo esc_attr($cat->name); ?>" class="swiper-slide__category-image" loading="lazy">
														<?php endif; ?>
														<span class="swiper-slide__category-title"><?php echo esc_html($cat->name); ?></span>
													</div>
												<?php endforeach; ?>
											</div>
										</div>
										<a href="<?php echo the_permalink(); ?>">
											<h3 class="swiper-slide__title heading--xs"><?php the_title(); ?></h3>
										</a>

									</div>

									<div class="swiper-slide__bottom">

										<?php if (!has_term(array('kursy-rozwojowe', 'kursy-zawodowe'), 'product_cat', $product->get_id())) {
										?>
											<p class="swiper-slide__price"><?php echo $product->get_price_html(); ?></p>
											<div class="swiper-slide__add_to_cart"><?php woocommerce_template_loop_add_to_cart(); ?></div>
										<?php
										} else {
											// Przycisk linkujący do strony produktu dla określonych kategorii
											echo '<a href="' . get_permalink($product->get_id()) . '" class="btn btn--secondary">Zobacz produkt</a>';
										}
										?>
									</div>

								</div>
							<?php
								$item_number++;
							endwhile;
							wp_reset_postdata(); ?>
						</div>


						<div class="swiper-button-prev swiper-button-prev-8">
							<img src="/wp-content/themes/website_style/images/swiper-arrow-left.svg" loading="lazy">
						</div>
						<div class="swiper-button-next swiper-button-next-8">
							<img src="/wp-content/themes/website_style/images/swiper-arrow-right.svg" loading="lazy">
						</div>

					</div>
				<?php endif; ?>
			</div>
		</section>

	<?php endif; ?>
	<?php endif;
if ($carousel_type == '9') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section carousel-9 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div class="section-container <?php ws_padding() ?>" data-aos="fade-up" data-aos-offset="0">

				<?php
				$exclude_category = get_term_by('slug', 'bez-kategorii', 'product_cat');
				$exclude_category_id = ($exclude_category) ? array($exclude_category->term_id) : array();

				$args = array(
					'taxonomy'   => 'product_cat',
					'number'     => 10,
					'exclude'    => $exclude_category_id,
				);
				$product_categories = get_terms($args);
				if (!empty($product_categories)) : ?>
					<div class="swiper-additional-container">
						<div class="swiper-container swiper-carousel-9">
							<div class="swiper-wrapper">
								<?php foreach ($product_categories as $category) :
									$thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
									$image_url = wp_get_attachment_url($thumbnail_id);
									$category_link = get_term_link($category);
								?>
									<div class="swiper-slide">
										<a href="<?php echo esc_url($category_link); ?>" class="swiper-slide__info">
											<?php if ($image_url) : ?>
												<img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($category->name); ?>" loading="lazy">
											<?php endif; ?>
											<h3 class="swiper-slide__title">
												<?php echo esc_html($category->name); ?>
											</h3>
										</a>
									</div>
								<?php endforeach; ?>
							</div>

						</div>
						<div class="swiper-button-prev swiper-button-prev--without-wrap swiper-button-prev-9">
							<svg xmlns="http://www.w3.org/2000/svg" width="37.809" height="37.809" viewBox="0 0 37.809 37.809">
								<path id="Path_18269" data-name="Path 18269" d="M18.9,37.809A18.9,18.9,0,1,0,0,18.9,18.911,18.911,0,0,0,18.9,37.809Zm0-34.028A15.123,15.123,0,1,1,3.781,18.9,15.119,15.119,0,0,1,18.9,3.781ZM20.795,18.9h5.671L18.9,11.343,11.343,18.9h5.671v7.562h3.781Z" transform="translate(0 37.809) rotate(-90)" fill="#ef9700" />
							</svg>
						</div>
						<div class="swiper-button-next swiper-button-next--without-wrap swiper-button-next-9">
							<svg xmlns="http://www.w3.org/2000/svg" width="37.809" height="37.809" viewBox="0 0 37.809 37.809">
								<path id="Path_18268" data-name="Path 18268" d="M18.9,0A18.9,18.9,0,1,1,0,18.9,18.912,18.912,0,0,1,18.9,0Zm0,34.028A15.124,15.124,0,1,0,3.781,18.9,15.12,15.12,0,0,0,18.9,34.028ZM20.8,18.9h5.671L18.9,26.467,11.343,18.9h5.671V11.343H20.8Z" transform="translate(0 37.809) rotate(-90)" fill="#ef9700" />
							</svg>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</section>

	<?php endif; ?>
<?php endif;
?>