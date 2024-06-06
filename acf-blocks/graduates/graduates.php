<?php

/**
 * Graduates block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;

$title = get_field('title');
$list = get_field('list');

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
	<section class="section graduates <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container">
			<h2 class="heading-background"><? echo $title ?></h2>
			<?php if ($list) : ?>
				<div class="graduates-list">
					<?php
					$item_number = 1;
					foreach ($list as $item) : ?>
						<div <?php
								if ($item_number == 1) {
									echo 'id="graduates-list__graduate-01"';
								}
								?> class="graduates-list__graduate" data-aos="fade-up" <?php
																						if ($item_number != 1) {
																							echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#graduates-list__graduate-01"';
																						}
																						?>>
							<img class="graduates-list__image" src="<?php echo $item['photo']['url'] ?>" alt="<?php echo $item['photo']['alt'] ?>" loading="lazy">
							<h3 class="graduates-list__name heading--m"><?php echo $item['name'] ?></h3>
							<p class="graduates-list__title"><?php echo $item['description'] ?></p>
							<p class="graduates-list__description">
								<?php
								if (mb_strlen($item['text'], "UTF-8") > 200) {
									echo mb_substr($item['text'], 0, 200, "UTF-8") . '...';
								} else {
									echo $item['text'];
								}
								?>
							</p>
							<?php if ($item['social_media']) : ?>
								<div class="graduates-list__social-media">
									<?php foreach ($item['social_media'] as $social_media_item) : ?>
										<a href="<?php echo $social_media_item['link'] ?>" class="graduates-list__social-media-item">
											<img src="/wp-content/themes/website_style/images/icon-social-media-<?php echo $social_media_item['icon'] ?>.svg" loading="lazy">
										</a>
									<?php endforeach; ?>
								</div>
							<?php endif; ?>
							<a href="" class="btn btn--arrow" data-slide-number="<?php echo $item_number ?>">CZYTAJ WIĘCEJ</a>
						</div>
					<?php
						$item_number++;
					endforeach; ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if ($list) : ?>
			<?php
			$item_number = 1;
			foreach ($list as $item) : ?>
				<div class="graduates-list__popup popup" data-slide-number="<?php echo $item_number ?>">
					<p>
						<?php
						echo $item['text'];
						?>
					</p>
					<div class="popup-close">X</div>
				</div>
			<?php
				$item_number++;
			endforeach; ?>
		<?php endif; ?>
	</section>
<?php endif; ?>