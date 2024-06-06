<?php

/**
 * Knowledge base block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$show_all_posts = get_field('show_all_posts');

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
	$anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = '';
if (!empty($block['className'])) {
	$class_name .= ' ' . $block['className'];
};

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

if ($show_all_posts == true) {
	$posts_per_page = 9;
} else {
	$posts_per_page = 3;
}

// The Query.
$the_query = new WP_Query(array(
	'post_type' => 'wpis-blogowy',
	'posts_per_page' => $posts_per_page,
	'orderby' => 'date',
	'order' => 'DESC',
	'post_status' => 'publish',
	'ignore_sticky_posts' => true,
	'no_found_rows' => false,
	'update_post_meta_cache' => false,
	'update_post_term_cache' => false,
	'cache_results' => false,
	'paged' => $paged
));

if ($hide == false or is_admin() == true) : ?>
	<section class="section knowledge-base <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container <?php ws_padding() ?>">
			<h1 class="heading heading--xl ek-heading--xl" data-aos="fade-up">Baza <span>wiedzy</span></h1>
			<div class="posts-masonry <?php if ($show_all_posts) {
											echo 'posts-masonry--all';
										}; ?>">
				<?php
				$item_number = 1;
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
						<article <?php
									if ($item_number == 1) {
										echo 'id="post-01"';
									}
									?> class="post" data-aos="fade-up" <?php
																		if ($item_number != 1) {
																			echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#post-01"';
																		}
																		?>>
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
						$item_number++;
					}
				} else {
					esc_html_e('Brak postów.');
				}
				// Restore original Post Data.
				wp_reset_postdata();
				?>
			</div><?php
					if ($show_all_posts == false) {
						ws_button('', '', 'btn--secondary');
					}
					?>
			<?php if ($show_all_posts == true) { ?>
				<div class="pagination">
					<span class="pagination__arrow"></span>
					<?php

					$big = 999999999; // need an unlikely integer
					echo paginate_links(array(
						'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
						'format' => '?paged=%#%',
						'current' => max(1, get_query_var('paged')),
						'total' => $the_query->max_num_pages,
						'prev_next' => false,

					));
					?>
					<span class="pagination__arrow"></span>

				</div>
			<?php }; ?>
		</div>
	</section>
<?php endif; ?>