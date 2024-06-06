<?php

/**
 * Course certificate example block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$list = get_field('list');
$title = get_field('title');
$subtitle = get_field('subtitle');
$button_text = get_field('button_text');
$button_url = get_field('button_url');
$certificate_image = get_field('certificate_image');
$certificate_image_en = get_field('certificate_image_en');
$list_title = get_field('list_title');
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
	<section class="section course-certificate-example <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>

		<div class="section-container">
			<div class="content">

				<div class="content__header" data-aos="fade-in">
					<svg class="content__header-icon" xmlns="http://www.w3.org/2000/svg" width="91.917" height="116.75" viewBox="0 0 91.917 116.75">
						<g id="Group_93" data-name="Group 93" transform="translate(-28.542 -16.125)">
							<path id="Path_17324" data-name="Path 17324" d="M45.042,36.542H20.208A8.718,8.718,0,0,1,11.5,27.833V3a2.5,2.5,0,1,1,5,0V27.833a3.713,3.713,0,0,0,3.708,3.708H45.042a2.5,2.5,0,0,1,0,5Z" transform="translate(72.917 15.625)" fill="#ef9700" />
							<path id="Path_17325" data-name="Path 17325" d="M79.5,117.25H17.417A14.917,14.917,0,0,1,2.5,102.333V15.417A14.917,14.917,0,0,1,17.417.5H60.875a2.5,2.5,0,0,1,1.768.732L93.684,32.274a2.5,2.5,0,0,1,.732,1.768v68.292A14.917,14.917,0,0,1,79.5,117.25ZM17.417,5.5A9.928,9.928,0,0,0,7.5,15.417v86.917a9.928,9.928,0,0,0,9.917,9.917H79.5a9.928,9.928,0,0,0,9.917-9.917V35.077L59.839,5.5Z" transform="translate(26.042 15.625)" fill="#ef9700" />
							<path id="Path_17326" data-name="Path 17326" d="M21.417,40.333a2.5,2.5,0,0,1-1.768-.732L7.232,27.184a2.5,2.5,0,1,1,3.536-3.536L21.417,34.3,44.482,11.232a2.5,2.5,0,0,1,3.536,3.536L23.184,39.6A2.5,2.5,0,0,1,21.417,40.333Z" transform="translate(46.875 67.708)" fill="#ef9700" />
						</g>
					</svg>
					<div class="content__header-text">
						<h2 class="heading--m"><?php echo $title ?></h2>
						<h3 class="heading--xs"><?php echo $subtitle ?></h3>
					</div>
				</div>

				<div class="content__text">
					<div class="content__list">
						<h4 class="content__list-item-title" data-aos="fade-up"><?php echo $list_title ?></h4>

						<?php
						if ($list) :
							$item_number = 1;
							foreach ($list as $list_item) {
						?>
								<div <?php
										if ($item_number == 1) {
											echo 'id="content__list-item-01"';
										}
										?> class="content__list-item" data-aos="fade-up" <?php
																							if ($item_number != 1) {
																								echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#content__list-item-01"';
																							}
																							?>>
									<h4 class="content__list-item-title"><span><?php echo '0' . $item_number ?></span><?php echo $list_item['title'] ?></h4>
									<p class="content__list-item-text"><?php echo $list_item['text'] ?></p>
								</div>
						<?php
								$item_number++;
							}
						endif;
						?>
					</div>
					<div class="content__cta btn--outside-border-secondary-wrap" data-aos="fade-up" <?php echo 'data-aos-delay="' . $item_number * 200 + 400 . '" data-aos-anchor="#content__list-item-01"';
																									$item_number++; ?>>
						<a href="<?php echo $button_url ?>" class="btn btn--secondary"><?php echo $button_text ?></a>
					</div>
				</div>

				<div class="content__certificate" data-aos="fade-up" <?php echo 'data-aos-delay="' . $item_number * 200 + 800 . '" data-aos-anchor="#content__list-item-01"';
																		$item_number++; ?>>
					<a href="<?php echo $certificate_image['url'] ?>" target="_blank"><img src="<?php echo $certificate_image['url'] ?>" alt="<?php echo $certificate_image['alt'] ?>" loading="lazy"></a>
					<p>Certyfikat w wersji angielskiej: <a href="<?php echo $certificate_image_en['url'] ?>" target="_blank">zobacz</a></p>
				</div>

			</div>
		</div>

	</section>

<?php endif; ?>