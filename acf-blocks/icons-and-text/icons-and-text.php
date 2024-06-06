<?php

/**
 * Icons and text block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$type = get_field('type');
$header = get_field('header');
$icons_and_text = get_field('icons_and_text');
$button_text = get_field('button_text');
$button_url = get_field('button_url');

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
if ($type == '1') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section icons-and-text <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">
				<?php if ($icons_and_text) : ?>
					<div class="icons-and-text-items">
						<?php
						$item_number = 1;
						foreach ($icons_and_text as $item) : ?>
							<div <?php
									if ($item_number == 1) {
										echo 'id="icons-and-text-item-01"';
									}
									?> class="icons-and-text-item" data-aos="fade-up" <?php
																						if ($item_number != 1) {
																							echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#icons-and-text-item-01"';
																						}
																						?>>
								<div class="icons-and-text-item-icon">
									<?php if ($item['icon']) : ?>
										<img src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>" loading="lazy">
									<?php endif; ?>
								</div>
								<div class="icons-and-text-item-text">
									<div class="icons-and-text-item-number-and-suffix">
										<?php if ($item['number']) : ?>
											<p class="icons-and-text-item-number-counter" data-number="<?php echo esc_html($item['number']); ?>">0</p>
										<?php endif; ?>

										<?php if ($item['suffix']) : ?>
											<p><?php echo esc_html($item['suffix']); ?></p>
										<?php endif; ?>
									</div>
									<?php if ($item['title']) : ?>
										<h3><?= $item['title'] ?></h3>
									<?php endif; ?>
								</div>
							</div>
						<?php
							$item_number++;
						endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif;
endif;

if ($type == '2') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section icons-and-text-2 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div class="section-container <?php ws_padding() ?>">
				<?php if (
					have_rows('icons_and_text')
				) : ?>
					<div class="swiper-container swiper-icons-and-text" data-aos="fade-up">
						<div class="swiper-wrapper">
							<?php
							$item_number = 1;
							while (have_rows('icons_and_text')) :
								the_row();
								$title = get_sub_field('title');
								$text = get_sub_field('text');
								$icon = get_sub_field('icon')['url'];
							?>
								<div <?php if ($item_number == 1) {
											echo 'id="swiper-slide-1"';
										} ?> class="swiper-slide" data-aos="fade-up" <?php
																						// if ($item_number != 1) {
																						// 													echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#swiper-slide-1"';
																						// 												} 
																						?>>
									<img class="swiper-slide__image" src="<?php echo $icon ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
									<?php if ($title) { ?>
										<h3 class="swiper-slide__title">
											<?php echo esc_html($title); ?>
										</h3>
									<?php };
									if ($text) { ?>
										<div class="swiper-slide__text wysiwyg-content">
											<?php echo $text; ?>
										</div>
									<?php } ?>
								</div>
							<?php
								$item_number++;
							endwhile; ?>
						</div>
						<div class="swiper-button-prev-4"><svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
								<path id="Path_17348" data-name="Path 17348" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(30.667 -2) rotate(90)" fill="#EF9700" />
							</svg>

						</div>
						<div class="swiper-button-next-4">
							<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
								<path id="Path_17347" data-name="Path 17347" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#EF9700" />
							</svg>
						</div>
					</div>
				<?php endif;
				if ($button_text) { ?>
					<div class="cta btn--outside-border-secondary-wrap" data-aos="fade-up" <?php echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#swiper-slide-1"' ?>>
						<a href="<?php echo $button_url ?>" class="btn btn--secondary"><?php echo $button_text ?></a>
					</div>
				<?php } ?>
			</div>
		</section>
	<?php endif;
endif;

if ($type == '3') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section icons-and-text-3 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">
				<?php if ($icons_and_text) : ?>
					<div class="icons-and-text-3-items">
						<?php
						$item_number = 1;
						foreach ($icons_and_text as $item) : ?>
							<div <?php if ($item_number == 1) {
										echo 'id="icons-and-text-3-item-1"';
									} ?> class="icons-and-text-3-item" data-aos="fade-up" <?php if ($item_number != 1) {
																								echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#icons-and-text-3-item-1"';
																							} ?>>
								<div class="icons-and-text-3-item-icon">
									<?php if ($item['icon']) : ?>
										<img src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>" loading="lazy">
									<?php endif; ?>
								</div>
								<div class="icons-and-text-3-item-text">
									<?= $item['title'] ?>
								</div>
							</div>
						<?php
							$item_number++;
						endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif;
endif;

if ($type == '4') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section icons-and-text-4 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div class="section-container <?php ws_padding() ?>">
				<?php if ($icons_and_text) : ?>
					<div class="icons-and-text-4-items">
						<?php
						$item_number = 1;
						foreach ($icons_and_text as $item) : ?>

							<div <?php if ($item_number == 1) {
										echo 'id="icons-and-text-4-item-1"';
									} ?> class="icons-and-text-4-item" data-aos="fade-up" <?php if ($item_number != 1) {
																								echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#icons-and-text-4-item-1"';
																							} ?>>
								<div class="icons-and-text-4-item-icon">
									<?php if ($item['icon']) : ?>
										<img src="<?= $item['icon']['url'] ?>" alt="<?= $item['icon']['alt'] ?>" loading="lazy">
									<?php endif; ?>
								</div>
								<div class="icons-and-text-4-item-text">
									<?= $item['title'] ?>
								</div>
							</div>

						<?php
							$item_number++;
						endforeach; ?>
					</div>
				<?php endif; ?>
			</div>
		</section>
	<?php endif;
endif;

if ($type == '5') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section icons-and-text-5 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div class="section-container <?php ws_padding() ?>">
				<div class="content">
					<div class="wysiwyg-content" data-aos="fade-up"><?php echo $header ?></div>
					<?php if (
						have_rows('icons_and_text')
					) : ?>
						<div class="swiper-container swiper-icons-and-text-5" data-aos="fade-up">
							<div class="swiper-wrapper">
								<?php while (have_rows('icons_and_text')) :
									the_row();
									$title = get_sub_field('title');
									$text = get_sub_field('text');
									$icon = get_sub_field('icon')['url'];
								?>
									<div class="swiper-slide">
										<img class="swiper-slide__image" src="<?php echo $icon ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
										<?php if ($title) { ?>
											<h3 class="swiper-slide__title">
												<?php echo esc_html($title); ?>
											</h3>
										<?php };
										if ($text) { ?>
											<div class="swiper-slide__text wysiwyg-content">
												<?php echo $text; ?>
											</div>
										<?php } ?>
									</div>
								<?php endwhile; ?>
							</div>
						</div>
					<?php endif; ?>
					<div class="swiper-button-prev-5" data-aos="fade-up"><svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
							<path id="Path_17348" data-name="Path 17348" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(30.667 -2) rotate(90)" fill="#EF9700" />
						</svg>

					</div>
					<div class="swiper-button-next-5" data-aos="fade-up">
						<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
							<path id="Path_17347" data-name="Path 17347" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#EF9700" />
						</svg>
					</div>
					<?php
					if ($button_text) { ?>
						<div class="cta btn--outside-border-secondary-wrap">
							<a href="<?php echo $button_url ?>" class="btn btn--secondary"><?php echo $button_text ?></a>
						</div>
					<?php } ?>
				</div>
			</div>
		</section>
<?php endif;
endif;

?>