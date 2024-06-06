<?php

/**
 * Block post content block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$title = get_field('title');
$text = !empty(get_field('text')) ? get_field('text') : 'Text...';
$photo = get_field('photo');
$cta_text = get_field('cta_text');
$cta_photo = get_field('cta_photo');
$width = get_field('width');
$date = get_the_date('j F Y');
$author = get_the_author();
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
	<section class="section blog-post-content <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>

		<div data-aos="fade-up" class="section-container <?php ws_padding() ?>">
			<div class="post__line"></div>

			<div class="post">
				<div class="post__details">
					<svg xmlns="http://www.w3.org/2000/svg" width="22.905" height="24.05" viewBox="0 0 22.905 24.05">
						<path id="Path_17321" data-name="Path 17321" d="M6.615,8.222l3.057,3.057-1.7,1.7L2,7.017,7.967,1.05l1.7,1.7L6.615,5.811h8.646a9.644,9.644,0,0,1,0,19.289H4.411V22.689h10.85a7.233,7.233,0,0,0,0-14.466Z" transform="translate(-2 -1.05)" fill="#fff" />
					</svg>
					<p class="post__date-and-author"><?php echo $date;
														echo '&nbsp; • &nbsp;';
														echo $author; ?></p>
				</div>
				<h1 class="post__title heading--xl"><?php echo esc_html($title); ?></h1>
				<?php if ($photo) : ?>
					<div class="post__photo">
						<?php echo wp_get_attachment_image($photo['ID'], 'full'); ?>
					</div>
				<?php endif; ?>
				<div class="post__main-content">
					<div class="wysiwyg-content">
						<?php echo $text; ?>
					</div>
				</div>
				<div class="post__cta">
					<div class="wysiwyg-content">
						<?php echo $cta_text; ?>
					</div>
					<?php if ($cta_photo) : ?>
						<div class="post__cta-photo">
							<?php echo wp_get_attachment_image($cta_photo['ID'], 'full'); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

		</div>
	</section>
<?php endif; ?>