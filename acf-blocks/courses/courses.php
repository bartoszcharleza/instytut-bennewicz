<?php

/**
 * Courses block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$type = get_field('type');
$courses_per_page = !empty(get_field('courses_per_page')) ? get_field('courses_per_page') : '3';

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
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;



if ($hide == false or is_admin() == true) :
	if ($type == '1') :
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $courses_per_page, // Liczba produktów na stronę
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => 'kursy-rozwojowe',
				),
			),
		); ?>
		<section class="section courses <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div class="section-container <?php ws_padding() ?>">
				<?php
				$query = new WP_Query($args);
				$product_number = 1;
				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						$date = get_field('course_date', get_the_id());
						$authors = get_field('course_authors', get_the_id());
						$details = get_field('course_details', get_the_id());
						$price = get_field('course_price', get_the_id());
						$image = get_the_post_thumbnail(get_the_id(), 'full');
						$link = get_permalink(get_the_id());
				?>
						<div class="course" data-aos="fade-up" data-aos-offset="0">

							<?php
							if ($product_number == 1) { ?>
								<span class="course__overlay"></span>
								<div class="wysiwyg-content">
									<?php echo $text; ?>
								</div><?php }; ?>
							<span class="course__overlay-2"></span>
							<div class="course__image-wrap">
								<?php echo $image ?>
							</div>
							<div class="course__info gsap-slide-left">
								<h2 class="course__title heading--l"><?php the_title(); ?></h2>
								<a href="<?php echo $link ?>" class="btn btn--secondary course__button">przejdź do szkolenia</a>
							</div>
							<div class="course__details-wrap">
								<?php if ($details) : ?>
									<div class="course__details">
										<svg xmlns="http://www.w3.org/2000/svg" width="62.734" height="60.5" viewBox="0 0 62.734 60.5">
											<path id="Path_18167" data-name="Path 18167" d="M1,61.284a22.813,22.813,0,0,1,45.625,0h-5.7a17.109,17.109,0,0,0-34.219,0ZM23.813,35.62A17.109,17.109,0,1,1,40.922,18.51,17.1,17.1,0,0,1,23.813,35.62Zm0-5.7A11.406,11.406,0,1,0,12.406,18.51,11.4,11.4,0,0,0,23.813,29.916ZM59.593.784a40.007,40.007,0,0,1,0,35.453L54.9,32.826A34.311,34.311,0,0,0,54.9,4.2ZM50.179,7.63a28.614,28.614,0,0,1,0,21.76L45.4,25.913a22.927,22.927,0,0,0,0-14.8Z" transform="translate(-1 -0.784)" fill="#fff" />
										</svg>
										<p class="course__details-title">Szczegóły</p>
										<p class="course__details-text"><?php echo $details ?>
										</p>
									</div>
								<?php
								endif;
								if ($price) : ?>
									<div class="course__details">
										<svg xmlns="http://www.w3.org/2000/svg" width="59.456" height="50.963" viewBox="0 0 59.456 50.963">
											<path id="Path_18166" data-name="Path 18166" d="M58.63,14.325h2.831V42.638H58.63v8.494A2.831,2.831,0,0,1,55.8,53.963H4.836A2.831,2.831,0,0,1,2,51.131V5.831A2.831,2.831,0,0,1,4.836,3H55.8A2.831,2.831,0,0,1,58.63,5.831ZM52.968,42.638H35.98a14.156,14.156,0,1,1,0-28.313H52.968V8.663H7.667V48.3h45.3ZM55.8,36.975V19.988H35.98a8.494,8.494,0,0,0,0,16.988ZM35.98,25.65h8.494v5.663H35.98Z" transform="translate(-2.005 -3)" fill="#fff" />
										</svg>
										<p class="course__details-title">Cena</p>
										<p class="course__details-text"><?php echo $price ?></p>
									</div>
								<?php
								endif; ?>
							</div>
						</div>
				<?php
						$product_number++;
					}
				}
				wp_reset_postdata();
				?><div class="course__pagination"> <?php
													$big = 999999999; // need an unlikely integer
													echo paginate_links(array(
														'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
														'format' => '?paged=%#%',
														'current' => max(1, get_query_var('paged')),
														'total' => $query->max_num_pages
													));
													?>
				</div>
			</div>
		</section>
	<?php endif;
endif;

if ($hide == false or is_admin() == true) :
	if ($type == '2') :
		$args = array(
			'post_type' => 'product',
			'posts_per_page' => $courses_per_page, // Liczba produktów na stronę
			'paged' => $paged,
			'tax_query' => array(
				array(
					'taxonomy' => 'product_cat',
					'field'    => 'slug',
					'terms'    => 'kursy-zawodowe',
				),
				'orderby' => 'menu_order',
				'order' => 'ASC'
			),
		); ?>
		<section class="section courses-2 <?= $class_name ?>" <?= $anchor ?>>
			<?php ws_background_image(); ?>
			<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">
				<?php
				$query = new WP_Query($args);
				$product_number = 1;
				if ($query->have_posts()) {
					while ($query->have_posts()) {
						$query->the_post();
						$date = get_field('course_date', get_the_id());
						$authors = get_field('course_authors', get_the_id());
						$details = get_field('course_details', get_the_id());
						$price = get_field('course_price', get_the_id());
						$image = get_the_post_thumbnail(get_the_id(), 'full');
						$link = get_permalink(get_the_id());
						$connected_courses = get_field('connected_courses', get_the_id());
				?>
						<div class="course">

							<?php
							if ($product_number == 1) { ?>
								<span class="course__overlay"></span>
								<div class="wysiwyg-content">
									<?php echo $text; ?>
								</div><?php }; ?>
							<span class="course__overlay-2"></span>
							<div class="course__image-wrap">
								<?php echo $image ?>
							</div>
							<div class="course__info">
								<h2 class="course__title heading--l"><?php the_title(); ?></h2>
								<a href="<?php echo $link ?>" class="btn btn--secondary course__button">przejdź do szkolenia</a>
							</div>
							<!-- <div class="course__details-wrap">
								<?php if ($details) : ?>
									<div class="course__details">
										<svg xmlns="http://www.w3.org/2000/svg" width="62.734" height="60.5" viewBox="0 0 62.734 60.5">
											<path id="Path_18167" data-name="Path 18167" d="M1,61.284a22.813,22.813,0,0,1,45.625,0h-5.7a17.109,17.109,0,0,0-34.219,0ZM23.813,35.62A17.109,17.109,0,1,1,40.922,18.51,17.1,17.1,0,0,1,23.813,35.62Zm0-5.7A11.406,11.406,0,1,0,12.406,18.51,11.4,11.4,0,0,0,23.813,29.916ZM59.593.784a40.007,40.007,0,0,1,0,35.453L54.9,32.826A34.311,34.311,0,0,0,54.9,4.2ZM50.179,7.63a28.614,28.614,0,0,1,0,21.76L45.4,25.913a22.927,22.927,0,0,0,0-14.8Z" transform="translate(-1 -0.784)" fill="#fff" />
										</svg>
										<p class="course__details-title">Szczegóły</p>
										<p class="course__details-text"><?php echo $details ?>
										</p>
									</div>
								<?php
								endif;
								if ($price) : ?>
									<div class="course__details">
										<svg xmlns="http://www.w3.org/2000/svg" width="59.456" height="50.963" viewBox="0 0 59.456 50.963">
											<path id="Path_18166" data-name="Path 18166" d="M58.63,14.325h2.831V42.638H58.63v8.494A2.831,2.831,0,0,1,55.8,53.963H4.836A2.831,2.831,0,0,1,2,51.131V5.831A2.831,2.831,0,0,1,4.836,3H55.8A2.831,2.831,0,0,1,58.63,5.831ZM52.968,42.638H35.98a14.156,14.156,0,1,1,0-28.313H52.968V8.663H7.667V48.3h45.3ZM55.8,36.975V19.988H35.98a8.494,8.494,0,0,0,0,16.988ZM35.98,25.65h8.494v5.663H35.98Z" transform="translate(-2.005 -3)" fill="#fff" />
										</svg>
										<p class="course__details-title">Cena</p>
										<p class="course__details-text"><?php echo $price ?></p>
									</div>
								<?php
								endif; ?>
							</div> -->
						</div>

						<?php if ($connected_courses) : ?>

							<div class="subcourses">
								<h2 class="heading--m"><span>Późniejsza śćieżka rozwoju </span>nazwa kursu</h2>
								<div class="subcourses__toggle" data-toggle-id="<?php echo $product_number ?>" data-toggle-type="toggler" data-toggle-self-close="true"><span>ROZWIŃ</span> <span>ZWIŃ</span><svg xmlns="http://www.w3.org/2000/svg" width="15.124" height="15.124" viewBox="0 0 15.124 15.124">
										<path id="Path_18235" data-name="Path 18235" d="M20.8,18.9h5.671L18.9,26.467,11.343,18.9h5.671V11.343H20.8Z" transform="translate(-11.343 -11.343)" fill="#1ad2d6" />
									</svg>
								</div>
								<div class="swiper courses-swiper" data-toggle-id="<?php echo $product_number ?>" data-toggle-type="target" data-toggle-category="subcourses">
									<div class="swiper-wrapper">

										<?php foreach ($connected_courses as $course) : ?>
											<div class="swiper-slide">
												<img src="<?php echo get_the_post_thumbnail_url($course) ?>" alt="" loading="lazy">
												<h3 class="heading--xxs"><?php echo get_the_title($course) ?></h3>
												<a href="<?php the_permalink($course) ?>" class="btn btn--primary">przejdź do kursu</a>
											</div>
										<?php endforeach; ?>
									</div>
								</div>
								<div class="swiper-buttons">
									<div class="swiper-button-prev">
										<img src="/wp-content/themes/website_style/images/swiper-arrow-left.svg" loading="lazy">
									</div>
									<div class="swiper-button-next">
										<img src="/wp-content/themes/website_style/images/swiper-arrow-right.svg" loading="lazy">
									</div>
								</div>
							</div>
				<?php endif;
						$product_number++;
					}
				}
				wp_reset_postdata();
				?><div class="course__pagination"> <?php
													$big = 999999999; // need an unlikely integer
													echo paginate_links(array(
														'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
														'format' => '?paged=%#%',
														'current' => max(1, get_query_var('paged')),
														'total' => $query->max_num_pages
													));
													?>
				</div>
			</div>
		</section>

<?php endif;
endif;  ?>