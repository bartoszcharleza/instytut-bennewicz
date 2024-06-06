<?php

/**
 * Video block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$video = get_field('video');
$video_cover = get_field('video_cover');
$vimeo_link = get_field('vimeo_link');


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
	<section class="section video <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container <?php ws_padding() ?>">
			<?php if ($video && $video_cover) : ?>
				<div class="video-wrapper" data-aos="fade-up">
					<img class="video-cover" src="<?= $video_cover['url']; ?>" alt="<?= $video_cover['alt']; ?>" loading="lazy">
					<button class="play-button"></button>
					<video class="video-player" src="<?= $video ?>" controls></video>
				</div>
			<?php endif; ?>

			<?php if ($vimeo_link) : ?>
				<div class="video-wrapper video-wrapper--vimeo" data-aos="fade-up">
					<iframe src="https://player.vimeo.com/video/<?php echo $vimeo_link ?>" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
				</div>
			<?php endif; ?>


		</div>
	</section>
<?php endif; ?>

<script>
	document.addEventListener('DOMContentLoaded', function() {
		var playButton = document.querySelector('.play-button');
		var videoPlayer = document.querySelector('.video-player');
		var videoCover = document.querySelector('.video-cover');

		function playVideo() {
			videoCover.style.display = 'none';
			playButton.style.display = 'none';
			videoPlayer.play();
		}

		playButton.addEventListener('click', playVideo);
		videoCover.addEventListener('click', playVideo);
	});
</script>