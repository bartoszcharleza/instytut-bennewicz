<?php

/**
 * Similar posts block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;

$anchor = '';
if (!empty($block['anchor'])) {
	$anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = '';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
}
global $post;

$the_query = new WP_Query(array(
	'post_type' => 'wpis-blogowy',
	'posts_per_page' => -1,
	'orderby' => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'ignore_sticky_posts' => true,
	'no_found_rows' => true,
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
	'cache_results' => false,
));


if ($hide == false or is_admin() == true) : ?>
	<section class="section similar-posts <?= $class_name ?> " <?= $anchor ?>>
		<?php ws_background_image(); ?>

		<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">
			<h2 class="heading--xs">Zobacz również</h2>
			<div class="swiper-container swiper-similar-posts">
				<div class="swiper-wrapper">
					<?php
					if ($the_query->have_posts()) {
						while ($the_query->have_posts()) {
							$the_query->the_post();
							$category = get_the_terms(get_the_ID(), 'kategoria-bloga');
							$date = get_the_date('j F Y');
							$author = get_the_author();
							$title = get_the_title();
							$thumbnail = get_post_thumbnail_id();
							$excerpt = wp_trim_words(get_the_excerpt(), 10); // Shorten excerpt to 10 words
					?>
							<article class="post swiper-slide">
								<?php echo wp_get_attachment_image($thumbnail, 'full', false, array('class' => 'post__image')); ?>
								<div class="post__content">
									<!-- <div class="post__category"><?php echo $category[0]->name; ?></div> -->
									<div class="post__details">
										<div class="post__date"><?php echo $date; ?>&nbsp;&nbsp;&nbsp;•</div>
										<div class="post__author"><?php echo $author; ?></div>
									</div>
									<h2 class="post__title"><?php echo $title; ?></h2>
									<p class="post__excerpt"><?php echo $excerpt; ?></p>
									<a href="<?php the_permalink(); ?>" class="btn btn--arrow">Czytaj dalej</a>
								</div>
							</article>
					<?php
						}
					} else {
						esc_html_e('Brak postów.');
					}
					// Restore original Post Data.
					wp_reset_postdata();
					?>
				</div>
			</div>
			<div class="swiper-buttons">
				<div class="swiper-button-prev-5"> <svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17332" data-name="Path 17332" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(30.667 -2) rotate(90)" fill="#EF9700" />
					</svg>
				</div>
				<span class="swiper-buttons-line"></span>
				<div class="swiper-button-next-5">
					<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17333" data-name="Path 17333" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#EF9700" />
					</svg>
				</div>
			</div>
			<?php
			wp_reset_postdata();
			?>
		</div>
	</section>
<?php endif; ?>