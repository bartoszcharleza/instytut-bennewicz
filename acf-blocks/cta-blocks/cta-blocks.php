<?php

/**
 * CTA blocks block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$blocks = get_field('blocks');

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
	<section id="cta-blocks" class="section cta-blocks <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div data-aos="fade-up" class="section-container <?php ws_padding(); ?>">

			<?php if (have_rows('blocks')) : ?>
				<div class="cta-blocks__list">
					<?php
					$item_number = 1;
					while (have_rows('blocks')) :
						the_row();
						$title = get_sub_field('title');
						$text = get_sub_field('text');
						$link = get_sub_field('link');
					?>
						<div <?php
								if ($item_number == 1) {
									echo 'id="cta-blocks__block-wrap-01"';
								}
								?> class="cta-blocks__block-wrap" data-aos="fade-up" <?php
																						if ($item_number != 1) {
																							echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#cta-blocks__block-wrap-01"';
																						}
																						?>>
							<a href="<?php echo $link ?>" class="cta-blocks__block">

								<h2 class="cta-blocks__title heading--l">
									<?php echo esc_html($title); ?>
								</h2>

								<?php if (!empty($text)) : ?>
									<p class="cta-blocks__text">
										<?php echo esc_html($text); ?>
									</p>
								<?php endif; ?>

								<?php if ($item_number % 2 == 0) { ?>
									<svg class="cta-blocks__icon" xmlns="http://www.w3.org/2000/svg" width="57.874" height="57.874" viewBox="0 0 57.874 57.874">
										<path id="Path_18130" data-name="Path 18130" d="M22.461,2A20.461,20.461,0,1,1,2,22.461,20.469,20.469,0,0,1,22.461,2Zm0,36.831A16.369,16.369,0,1,0,6.092,22.461,16.365,16.365,0,0,0,22.461,38.831Zm2.046-16.369h6.138l-8.185,8.185-8.185-8.185h6.138V14.277h4.092Z" transform="translate(-2.828 28.937) rotate(-45)" fill="#1ad2d6" />
									</svg>
								<?php } else { ?>
									<svg class="cta-blocks__icon" xmlns="http://www.w3.org/2000/svg" width="57.874" height="57.874" viewBox="0 0 57.874 57.874">
										<path id="Path_18132" data-name="Path 18132" d="M22.461,2A20.461,20.461,0,1,1,2,22.461,20.469,20.469,0,0,1,22.461,2Zm0,36.831A16.369,16.369,0,1,0,6.092,22.461,16.365,16.365,0,0,0,22.461,38.831Zm2.046-16.369h6.138l-8.185,8.185-8.185-8.185h6.138V14.277h4.092Z" transform="translate(-2.828 28.937) rotate(-45)" fill="#ef9700" />
									</svg>
								<?php } ?>

							</a>
						</div>
					<?php
						$item_number++;
					endwhile; ?>
				</div>
			<?php endif; ?>

		</div>
	</section>
<?php endif; ?>