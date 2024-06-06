<?php

/**
 * List block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$checkbox_list = get_field('checkbox_list');


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
	<section class="section list <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">

			<div class="checkbox_list">
				<?php
				$item_number = 1;
				foreach ($checkbox_list as $checkbox) : ?>
					<div <?php
							if ($item_number == 1) {
								echo 'id="checkbox_list__checkbox-01"';
							}
							?> class="checkbox_list__checkbox" data-aos="fade-up" <?php
																					if ($item_number != 1) {
																						echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#checkbox_list__checkbox-01"';
																					}
																					?>>
						<svg id="Group_78" data-name="Group 78" xmlns="http://www.w3.org/2000/svg" width="40.667" height="40.667" viewBox="0 0 40.667 40.667">
							<path id="Path_17344" data-name="Path 17344" d="M0,0H40.667V40.667H0Z" fill="none" />
							<path id="Path_17345" data-name="Path 17345" d="M27.417,4.27A16.944,16.944,0,1,1,2.008,19.493L2,18.944l.008-.549A16.944,16.944,0,0,1,27.417,4.27ZM25.226,14.358a1.694,1.694,0,0,0-2.237-.141l-.159.141-5.58,5.578-2.191-2.189-.159-.141a1.694,1.694,0,0,0-2.377,2.377l.141.159,3.389,3.389.159.141a1.694,1.694,0,0,0,2.077,0l.159-.141,6.778-6.778.141-.159A1.694,1.694,0,0,0,25.226,14.358Z" transform="translate(1.389 1.389)" fill=" #1ad2d6" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" />
						</svg>
						<p><?php echo $checkbox['text'] ?></p>
					</div>
				<?php
					$item_number++;
				endforeach; ?>
			</div>

		</div>
	</section>
<?php endif;
