<?php

/**
 * Course time block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$title_1 = !empty(get_field('title_1')) ? get_field('title_1') : 'title_1...';
$title_2 = !empty(get_field('title_2')) ? get_field('title_2') : 'title_2...';
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
	<section class="section course-time <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container">
			<div class="content">
				<div class="content__details">
					<div class="content__title">
						<svg class="content__icon" data-aos="fade-up" xmlns="http://www.w3.org/2000/svg" width="75" height="87.5" viewBox="0 0 75 87.5">
							<path id="Path_17384" data-name="Path 17384" d="M63.907,21.7l6.056-6.056,5.893,5.893L69.8,27.593A37.5,37.5,0,1,1,63.907,21.7ZM40.5,80.167A29.167,29.167,0,1,0,11.333,51,29.167,29.167,0,0,0,40.5,80.167Zm-4.167-50h8.333v25H36.333ZM23.833,1H57.167V9.333H23.833Z" transform="translate(-3 -1)" fill="#fff" />
						</svg>
						<h2 class="heading--s" data-aos="fade-up"><span><?php echo $title_1 ?> </span><?php echo $title_2 ?></h2>
					</div>
					<div class="content__list">
						<?php
						$item_number = 1;
						foreach ($list as $list_item) {
						?>
							<div <?php if ($item_number == 1) {
										echo 'id="content__list-item-1"';
									} ?> class="content__list-item" data-aos="fade-up" <?php if ($item_number != 1) {
																							echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#content__list-item-1"';
																						} ?>>
								<svg class="content__list-item-icon" id="Group_2073" data-name="Group 2073" xmlns="http://www.w3.org/2000/svg" width="40.667" height="40.667" viewBox="0 0 40.667 40.667">
									<path id="Path_17344" data-name="Path 17344" d="M0,0H40.667V40.667H0Z" fill="none" />
									<path id="Path_17345" data-name="Path 17345" d="M27.417,4.27A16.944,16.944,0,1,1,2.008,19.493L2,18.944l.008-.549A16.944,16.944,0,0,1,27.417,4.27ZM25.226,14.358a1.694,1.694,0,0,0-2.237-.141l-.159.141-5.58,5.578-2.191-2.189-.159-.141a1.694,1.694,0,0,0-2.377,2.377l.141.159,3.389,3.389.159.141a1.694,1.694,0,0,0,2.077,0l.159-.141,6.778-6.778.141-.159A1.694,1.694,0,0,0,25.226,14.358Z" transform="translate(1.389 1.389)" fill="#1ad2d6" />
								</svg>
								<h3 class="content__list-item-title"><?php echo $list_item['title'] ?></h3>
								<p class="content__list-item-text"><?php echo $list_item['text'] ?></p>
							</div>
						<?php
							$item_number++;
						}
						?>

					</div>
					<div class="content__cta btn--outside-border-primary-wrap" data-aos="fade-up" data-aos-anchor="#content__list-item-1" <?php echo 'data-aos-delay="' . $item_number * 200 . '"'; ?>>
						<a href="#formularz" class="btn btn--primary">ZAPISZ SIĘ NA KURS</a>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php endif; ?>