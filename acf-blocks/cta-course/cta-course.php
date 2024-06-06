<?php

/**
 * CTA Course block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$cta_type = get_field('cta_type');
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$button_text = get_field('button_text');
$button_url = get_field('button_url');
$button_url_alt = get_field('button_url_alt');
$checkbox_list = get_field('checkbox_list');
$content = get_field('content');
$book_img = get_field('book_img');
$details = get_field('details');
$price = get_field('price');
$currency = get_field('currency');
$editions_list = get_field('editions_list');
$price_includes = get_field('price_includes');
$meetings = get_field('meetings');
$add_to_cart_button = get_field('add_to_cart_button') ?? 'Dodaj do koszyka';

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
if ($cta_type == '1') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section cta-course cta-course-1 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div class="section-container">
				<div class="content">
					<div class="text" data-aos="fade-up">
						<svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37">
							<path id="Path_17335" data-name="Path 17335" d="M20.5,39A18.5,18.5,0,1,1,39,20.5,18.5,18.5,0,0,1,20.5,39Zm0-3.7A14.8,14.8,0,1,0,5.7,20.5,14.8,14.8,0,0,0,20.5,35.3ZM18.65,11.25h3.7v3.7h-3.7Zm0,7.4h3.7v11.1h-3.7Z" transform="translate(-2 -2)" fill="#EF9700" />
						</svg>
						<?php echo $text; ?>
					</div>
					<?php
					if ($button_url_alt) {
						echo '<a href="' . esc_url($button_url_alt) . '" class="btn btn--secondary">' . $add_to_cart_button . '</a>';
					} else {
						global $product;
						if (function_exists('woocommerce_template_loop_add_to_cart')) {
							$product_id = $product->get_id();
							echo '<a href="' . esc_url(wc_get_cart_url()) . '?add-to-cart=' . esc_attr($product_id) . '" class="btn btn--secondary">' . $add_to_cart_button . '</a>';
						}
					}
					?>
				</div>
			</div>
		</section>
	<?php endif;
endif;

if ($cta_type == '2') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section cta-course cta-course-2 <?= $class_name ?>" <?= $anchor ?>>
			<div class="section-container">
				<div class="content">
					<h2 class="heading heading--m" data-aos="fade-up">
						<svg xmlns="http://www.w3.org/2000/svg" width="73" height="69.35" viewBox="0 0 73 69.35">
							<path id="Path_17343" data-name="Path 17343" d="M9.3,50.45H67.7V10.3H9.3Zm32.85,7.3v7.3h14.6v7.3H20.25v-7.3h14.6v-7.3H5.62A3.644,3.644,0,0,1,2,54.073V6.677A3.676,3.676,0,0,1,5.62,3H71.38A3.644,3.644,0,0,1,75,6.677v47.4a3.676,3.676,0,0,1-3.62,3.677Z" transform="translate(-2 -3)" fill="#fff" />
						</svg>
						<?php echo $text 	?>
					</h2>
					<div class="checkbox_list">
						<?php
						$item_number = 1;
						foreach ($checkbox_list as $checkbox) : ?>
							<div <?php
									if ($item_number == 1) {
										echo 'id="checkbox_list__checkbox-1"';
									}
									?> class="checkbox_list__checkbox" data-aos="fade-up" <?php
																							if ($item_number != 1) {
																								echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#checkbox_list__checkbox-1"';
																							}
																							?>>
								<svg id="Group_71" data-name="Group 71" xmlns="http://www.w3.org/2000/svg" width="40.667" height="40.667" viewBox="0 0 40.667 40.667">
									<path id="Path_17344" data-name="Path 17344" d="M0,0H40.667V40.667H0Z" fill="none" />
									<path id="Path_17345" data-name="Path 17345" d="M27.417,4.27A16.944,16.944,0,1,1,2.008,19.493L2,18.944l.008-.549A16.944,16.944,0,0,1,27.417,4.27ZM25.226,14.358a1.694,1.694,0,0,0-2.237-.141l-.159.141-5.58,5.578-2.191-2.189-.159-.141a1.694,1.694,0,0,0-2.377,2.377l.141.159,3.389,3.389.159.141a1.694,1.694,0,0,0,2.077,0l.159-.141,6.778-6.778.141-.159A1.694,1.694,0,0,0,25.226,14.358Z" transform="translate(1.389 1.389)" fill="#EF9700" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" />
								</svg>
								<p><?php echo $checkbox['text'] ?></p>
							</div>
						<?php
							$item_number++;
						endforeach; ?>
					</div>

					<?php
					global $product;
					if (function_exists('woocommerce_template_loop_add_to_cart')) {
						$product_id = $product->get_id();
						echo '<a href="' . esc_url(wc_get_cart_url()) . '?add-to-cart=' . esc_attr($product_id) . '" class="btn btn--secondary">' . $add_to_cart_button . '</a>';
					}
					?>
				</div>
			</div>

		</section>
	<?php endif;
endif;

if ($cta_type == '3') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section cta-course cta-course-3 <?= $class_name ?>" <?= $anchor ?>>
			<div data-aos="fade-up" class="section-container">

				<div class="content">
					<?php if ($book_img) : ?>
						<img src="<?php echo $book_img['url']; ?>" alt="<?php echo $book_img['alt']; ?>" loading="lazy">
					<?php endif; ?>
					<div class="text">
						<?php echo $content; ?>

						<?php
						$add_to_cart_button = get_field('add_to_cart_button') ?? 'Dodaj do koszyka';
						global $product;
						if (function_exists('woocommerce_template_loop_add_to_cart') && empty($button_text) && empty($button_url)) {
							$product_id = $product->get_id();
							echo '<a href="' . esc_url(wc_get_cart_url()) . '?add-to-cart=' . esc_attr($product_id) . '" class="btn btn--secondary">' . $add_to_cart_button . '</a>';
						} else {
							echo '<a href="' . esc_url($button_url) . '" class="btn btn--secondary">' . $button_text . '</a>';
						}
						?>

					</div>
				</div>
			</div>
		</section>
	<?php endif;
endif;

if ($cta_type == '4') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section cta-course cta-course-4 <?= $class_name ?>" <?= $anchor ?>>
			<div data-aos="fade-up" class="section-container">

				<div class="content">

					<div class="column column--1">
						<div class="column__icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="62.735" height="60.501" viewBox="0 0 62.735 60.501">
								<path id="Path_18147" data-name="Path 18147" d="M1,61.284a22.813,22.813,0,0,1,45.625,0h-5.7a17.109,17.109,0,0,0-34.219,0ZM23.813,35.62A17.109,17.109,0,1,1,40.922,18.51,17.1,17.1,0,0,1,23.813,35.62Zm0-5.7A11.406,11.406,0,1,0,12.406,18.51,11.4,11.4,0,0,0,23.813,29.916ZM59.593.784a40.007,40.007,0,0,1,0,35.453L54.9,32.826A34.311,34.311,0,0,0,54.9,4.2ZM50.179,7.63a28.614,28.614,0,0,1,0,21.76L45.4,25.913a22.927,22.927,0,0,0,0-14.8Z" transform="translate(-1 -0.783)" fill="#fff" />
							</svg>
						</div>
						<div class="column__text">
							<p>szczegóły</p>
							<p><?php echo $details ?></p>
						</div>
					</div>

					<div class="column column--2">
						<div class="column__icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="59.456" height="50.963" viewBox="0 0 59.456 50.963">
								<path id="Path_18148" data-name="Path 18148" d="M58.63,14.325h2.831V42.638H58.63v8.494A2.831,2.831,0,0,1,55.8,53.963H4.836A2.831,2.831,0,0,1,2,51.131V5.831A2.831,2.831,0,0,1,4.836,3H55.8A2.831,2.831,0,0,1,58.63,5.831ZM52.968,42.638H35.98a14.156,14.156,0,1,1,0-28.313H52.968V8.663H7.667V48.3h45.3ZM55.8,36.975V19.988H35.98a8.494,8.494,0,0,0,0,16.988ZM35.98,25.65h8.494v5.663H35.98Z" transform="translate(-2.005 -3)" fill="#fff" />
							</svg>
						</div>
						<div class="column__text">
							<p>cena</p>
							<p><?php echo $price ?></p>
						</div>
					</div>

					<div class="column column--3">
						<?php
						global $product;
						if (function_exists('woocommerce_template_loop_add_to_cart')) {
							$product_id = $product->get_id();
							echo '<a href="' . esc_url(wc_get_cart_url()) . '?add-to-cart=' . esc_attr($product_id) . '" class="btn btn--secondary">' . $add_to_cart_button . '</a>';
						}
						?>
					</div>

				</div>
			</div>
		</section>
	<?php endif;
endif;

if ($cta_type == '5') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section cta-course cta-course-5 <?= $class_name ?>" <?= $anchor ?>>
			<div class="section-container">

				<div class="content">

					<p class="content__price" data-aos="fade-in"><span><?php echo $price ?></span> <?php echo $currency ?></p>

					<h2 class="content__title heading--s" data-aos="fade-in"><?php echo $text ?></h2>

					<div id="content__detail-1" class="content__detail" data-aos="fade-up">

						<div class="content__detail-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="53.333" height="53.333" viewBox="0 0 53.333 53.333">
								<path id="Path_17368" data-name="Path 17368" d="M20.667,1V6.333h16V1H42V6.333H52.667A2.667,2.667,0,0,1,55.333,9V51.667a2.667,2.667,0,0,1-2.667,2.667h-48A2.667,2.667,0,0,1,2,51.667V9A2.667,2.667,0,0,1,4.667,6.333H15.333V1ZM50,27.667H7.333V49H50Zm-34.667-16h-8V22.333H50V11.667H42V17H36.667V11.667h-16V17H15.333Z" transform="translate(-2 -1)" fill="#fff" />
							</svg>
						</div>

						<div class="content__detail-content">
							<?php foreach ($editions_list as $edition) { ?>
								<div class="content__detail-edition">
									<h3><?php echo $edition['title'] ?></h3>
									<p><?php echo $edition['date'] ?></p>
								</div>
							<?php } ?>
						</div>

					</div>

					<div class="content__detail" data-aos="fade-up" data-aos-delay="200" data-aos-anchor="#content__detail-1">

						<div class="content__detail-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="47.811" height="53.123" viewBox="0 0 47.811 53.123">
								<path id="Path_18100" data-name="Path 18100" d="M16.281,7.312A5.312,5.312,0,1,1,10.968,2,5.312,5.312,0,0,1,16.281,7.312ZM8.312,39.186V55.123H3V23.249a7.968,7.968,0,0,1,13.562-5.675l6.307,5.956,6.143-6.143,3.756,3.756-9.794,9.794-4.038-3.813v28H13.625V39.186Zm2.656-18.593a2.656,2.656,0,0,0-2.656,2.656V33.874h5.312V23.249A2.656,2.656,0,0,0,10.968,20.593ZM45.5,9.968H21.593V4.656H48.154a2.656,2.656,0,0,1,2.656,2.656V36.53a2.656,2.656,0,0,1-2.656,2.656h-9.1l7.5,15.937H40.688l-7.5-15.937h-11.6V33.874H45.5Z" transform="translate(-3 -2)" fill="#fff" />
							</svg>
						</div>

						<div class="content__detail-content">
							<p><?php echo $price_includes ?></p>
						</div>

					</div>

					<div class="content__detail" data-aos="fade-up" data-aos-delay="400" data-aos-anchor="#content__detail-1">
						<div class="content__detail-icon">
							<svg xmlns="http://www.w3.org/2000/svg" width="66" height="66" viewBox="0 0 66 66">
								<g id="Group_2217" data-name="Group 2217" transform="translate(-398 -3164)">
									<g id="Ellipse_445" data-name="Ellipse 445" transform="translate(398 3164)" fill="none" stroke="#fff" stroke-width="4">
										<circle cx="33" cy="33" r="33" stroke="none" />
										<circle cx="33" cy="33" r="31" fill="none" />
									</g>
									<g id="Group_2187" data-name="Group 2187" transform="translate(408.659 3176.596)">
										<path id="Path_17365" data-name="Path 17365" d="M0,0H45.8V40.8H0Z" fill="none" />
										<path id="Path_17366" data-name="Path 17366" d="M10,26.4,20.2,16.2,10,6V26.4" transform="translate(9.776 4.2)" fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
									</g>
								</g>
							</svg>
						</div>
						<div class="content__detail-content">
							<p><?php echo $meetings ?></p>
						</div>
					</div>

					<div class="content__cta btn--outside-border-primary-wrap" data-aos="fade-up" data-aos-delay="600" data-aos-anchor="#content__detail-1">

						<?php
						$add_to_cart_button = get_field('add_to_cart_button') ?? 'Dodaj do koszyka';
						global $product;
						if (function_exists('woocommerce_template_loop_add_to_cart') && empty($button_text) && empty($button_url)) {
							$product_id = $product->get_id();
							echo '<a href="' . esc_url(wc_get_cart_url()) . '?add-to-cart=' . esc_attr($product_id) . '" class="btn btn--primary">' . $add_to_cart_button . '</a>';
						} else {
							echo '<a href="' . esc_url($button_url) . '" class="btn btn--primary">' . $button_text . '</a>';
						}
						?>

					</div>

				</div>
			</div>
		</section>
<?php endif;
endif; ?>