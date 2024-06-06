<?php

/**
 * Course header block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';

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
$subtitle = get_field('subtitle');
$title = get_field('title');
$details = get_field('details');
$price = get_field('price');
$image = get_field('image');
$type = get_field('type');
$editions = get_field('editions');
$read_more_button = get_field('read_more_button') ?? 'Dowiedz się więcej';
$add_to_cart_button = get_field('add_to_cart_button') ?? 'Kup';

if ($type == 'option-1') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section course-header-1 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">
				<?php

				?>
				<div class="course">

					<span class="course__overlay"></span>
					<div class="course__subtitle">
						<svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37">
							<path id="Path_17332" data-name="Path 17332" d="M20.5,39A18.5,18.5,0,1,1,39,20.5,18.5,18.5,0,0,1,20.5,39Zm0-3.7A14.8,14.8,0,1,0,5.7,20.5,14.8,14.8,0,0,0,20.5,35.3ZM18.65,11.25h3.7v3.7h-3.7Zm0,7.4h3.7v11.1h-3.7Z" transform="translate(-2 -2)" fill="#EF9700" />
						</svg>
						<?php echo $subtitle ?>
					</div>
					<h1 class="course__title heading--l"><?php echo $title ?></h1>
					<div class="course__image-wrap">
						<?php echo wp_get_attachment_image($image['id'], 'full') ?>
					</div>

					<div class="course__details">
						<?php if ($details) : ?>
							<div class="course__description">

								<svg xmlns="http://www.w3.org/2000/svg" width="62.735" height="60.5" viewBox="0 0 62.735 60.5">
									<path id="Path_18055" data-name="Path 18055" d="M1,61.284a22.813,22.813,0,0,1,45.625,0h-5.7a17.109,17.109,0,0,0-34.219,0ZM23.813,35.62A17.109,17.109,0,1,1,40.922,18.51,17.1,17.1,0,0,1,23.813,35.62Zm0-5.7A11.406,11.406,0,1,0,12.406,18.51,11.4,11.4,0,0,0,23.813,29.916ZM59.593.784a40.007,40.007,0,0,1,0,35.453L54.9,32.826A34.311,34.311,0,0,0,54.9,4.2ZM50.179,7.63a28.614,28.614,0,0,1,0,21.76L45.4,25.913a22.927,22.927,0,0,0,0-14.8Z" transform="translate(-1 -0.784)" fill="#fff" />
								</svg>
								<div class="course__description-content">
									<p class="course__description-title">Szczegóły szkolenia</p>
									<p class="course__description-text"><?php echo $details ?></p>
								</div>

							</div>
						<?php
						endif;
						if ($price) : ?>
							<div class="course__description">

								<svg xmlns="http://www.w3.org/2000/svg" width="59.456" height="50.963" viewBox="0 0 59.456 50.963">
									<path id="Path_18056" data-name="Path 18056" d="M58.63,14.325h2.831V42.638H58.63v8.494A2.831,2.831,0,0,1,55.8,53.963H4.836A2.831,2.831,0,0,1,2,51.131V5.831A2.831,2.831,0,0,1,4.836,3H55.8A2.831,2.831,0,0,1,58.63,5.831ZM52.968,42.638H35.98a14.156,14.156,0,1,1,0-28.313H52.968V8.663H7.667V48.3h45.3ZM55.8,36.975V19.988H35.98a8.494,8.494,0,0,0,0,16.988ZM35.98,25.65h8.494v5.663H35.98Z" transform="translate(-2.005 -3)" fill="#fff" />
								</svg>
								<div class="course__description-content">
									<p class="course__description-title">Cena</p>
									<p class="course__description-text"><?php echo $price ?></p>
								</div>

							</div>
						<?php
						endif; ?>
						<div class="course__info">
							<p class="btn btn--black course__button" id="scrollToNextSection"><?php echo esc_html($read_more_button) ?></p>
							<?php
							global $product;
							if (function_exists('woocommerce_template_loop_add_to_cart')) {
								$product_id = $product->get_id();
								echo '<a href="' . esc_url(wc_get_cart_url()) . '?add-to-cart=' . esc_attr($product_id) . '" class="btn btn--white">' . $add_to_cart_button . '</a>';
							}
							?>
						</div>

					</div>
				</div>
			</div>
		</section>
	<?php endif;
endif;

if ($type == 'option-2') :
	if ($hide == false or is_admin() == true) : ?>
		<section class="section course-header-2 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<span class="course__overlay"></span>

			<div class="course__image-wrap" data-aos="fade-in" data-aos-delay="600" data-aos-anchor="#course__subtitle">
				<?php echo wp_get_attachment_image($image['id'], 'full') ?>
			</div>
			<div class="section-container <?php ws_padding() ?>">
				<div class="course">
					<div class="course__details">
						<div id="course__subtitle" class="course__subtitle" data-aos="fade-up">
							<svg xmlns="http://www.w3.org/2000/svg" width="37" height="37" viewBox="0 0 37 37">
								<path id="Path_17332" data-name="Path 17332" d="M20.5,39A18.5,18.5,0,1,1,39,20.5,18.5,18.5,0,0,1,20.5,39Zm0-3.7A14.8,14.8,0,1,0,5.7,20.5,14.8,14.8,0,0,0,20.5,35.3ZM18.65,11.25h3.7v3.7h-3.7Zm0,7.4h3.7v11.1h-3.7Z" transform="translate(-2 -2)" fill="#EF9700" />
							</svg>
							<?php echo $subtitle ?>
						</div>
						<h1 class="course__title heading--l" data-aos="fade-up" data-aos-delay="200" data-aos-anchor="#course__subtitle"><?php echo $title ?></h1>
						<?php if ($editions) : ?>
							<div class="course__description" data-aos="fade-up" data-aos-delay="400" data-aos-anchor="#course__subtitle">

								<svg xmlns="http://www.w3.org/2000/svg" width="53.333" height="53.333" viewBox="0 0 53.333 53.333">
									<path id="Path_17368" data-name="Path 17368" d="M20.667,1V6.333h16V1H42V6.333H52.667A2.667,2.667,0,0,1,55.333,9V51.667a2.667,2.667,0,0,1-2.667,2.667h-48A2.667,2.667,0,0,1,2,51.667V9A2.667,2.667,0,0,1,4.667,6.333H15.333V1ZM50,27.667H7.333V49H50Zm-34.667-16h-8V22.333H50V11.667H42V17H36.667V11.667h-16V17H15.333Z" transform="translate(-2 -1)" fill="#001a61" />
								</svg>

								<div class="course__description-content">
									<?php foreach ($editions as $edition) {
									?>
										<div class="course__description-edition <?php if (count($editions) == 1) {
																					echo 'course__description-edition--only-one';
																				}; ?>">
											<p class="course__description-edition-title"><?php echo $edition['title'] ?></p>
											<p class="course__description-edition-text"><?php echo $edition['date'] ?></p>
										</div>
									<?php
									}
									?>
								</div>

							</div>
						<?php
						endif;
						if ($price) : ?>
							<div class="course__description" data-aos="fade-up" data-aos-delay="600" data-aos-anchor="#course__subtitle">

								<svg xmlns="http://www.w3.org/2000/svg" width="59.456" height="50.963" viewBox="0 0 59.456 50.963">
									<path id="Path_18056" data-name="Path 18056" d="M58.63,14.325h2.831V42.638H58.63v8.494A2.831,2.831,0,0,1,55.8,53.963H4.836A2.831,2.831,0,0,1,2,51.131V5.831A2.831,2.831,0,0,1,4.836,3H55.8A2.831,2.831,0,0,1,58.63,5.831ZM52.968,42.638H35.98a14.156,14.156,0,1,1,0-28.313H52.968V8.663H7.667V48.3h45.3ZM55.8,36.975V19.988H35.98a8.494,8.494,0,0,0,0,16.988ZM35.98,25.65h8.494v5.663H35.98Z" transform="translate(-2.005 -3)" fill="#001a61" />
								</svg>

								<div class="course__description-content">
									<p class="course__description-title">Cena</p>
									<p class="course__description-text"><?php echo $price ?></p>
								</div>

							</div>
						<?php
						endif; ?>
						<div class="btn--outside-border-secondary-wrap" data-aos="fade-up" data-aos-delay="800" data-aos-anchor="#course__subtitle">
							<p id="scrollToNextSection" class="btn btn--secondary">Dowiedz się więcej</p>
						</div>
					</div>
				</div>
			</div>
		</section>
<?php endif;
endif; ?>

<script>
	document.getElementById('scrollToNextSection').addEventListener('click', function() {
		// Znajdź wszystkie sekcje na stronie
		const sections = document.querySelectorAll('section');
		// Znajdź obecną pozycję przewijania
		const currentScrollPosition = window.pageYOffset;

		for (let i = 0; i < sections.length; i++) {
			// Znajdź sekcję, która jest poniżej obecnej pozycji przewijania
			if (sections[i].offsetTop > currentScrollPosition) {
				// Przewiń do tej sekcji
				window.scrollTo({
					top: sections[i].offsetTop,
					behavior: 'smooth' // Dla płynnego przewijania
				});
				break; // Zakończ pętlę po znalezieniu pierwszej pasującej sekcji
			}
		}
	});
</script>