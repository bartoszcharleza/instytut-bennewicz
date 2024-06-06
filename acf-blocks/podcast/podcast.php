<?php

/**
 * Podcast block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;

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
	<section class="section podcast <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container">
			<h2 class="heading--l" data-aos="fade-up">Zobacz na platformach</h2>
			<div class="platfroms">
				<a href="#" id="platfroms__platform-01" class="platfroms__platform">
					<img src="/wp-content/uploads/2024/02/spotify-logo.png" alt="" data-aos="fade-up" loading="lazy">
				</a href="#">
				<a href="#" class="platfroms__platform">
					<img src="/wp-content/uploads/2024/02/apple-podcasts-logo.png" alt="" data-aos="fade-up" data-aos-delay="200" loading="lazy">
				</a href="#">
				<a href="#" class="platfroms__platform">
					<img src="/wp-content/uploads/2024/02/youtube-logo.png" alt="" data-aos="fade-up" data-aos-delay="400" loading="lazy">
				</a href="#">
			</div>

			<div class="episodes" data-aos="fade-up">
				<a href="#" id="episodes__episode-01" class="episodes__episode">
					<img src="/wp-content/uploads/2023/11/ksiazka01.jpg" alt="" loading="lazy">
					<h3>Przykładowy tytuł odcinka podcast</h3>
					<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17320" data-name="Path 17320" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#ef9700" />
					</svg>
				</a>
				<a href="#" class="episodes__episode">
					<img src="/wp-content/uploads/2023/11/ksiazka01.jpg" alt="" loading="lazy">
					<h3>Przykładowy tytuł odcinka podcast</h3>
					<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17320" data-name="Path 17320" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#ef9700" />
					</svg>
				</a>
				<a href="#" class="episodes__episode">
					<img src="/wp-content/uploads/2023/11/ksiazka01.jpg" alt="" loading="lazy">
					<h3>Przykładowy tytuł odcinka podcast</h3>
					<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17320" data-name="Path 17320" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#ef9700" />
					</svg>
				</a>
				<a href="#" class="episodes__episode">
					<img src="/wp-content/uploads/2023/11/ksiazka01.jpg" alt="" loading="lazy">
					<h3>Przykładowy tytuł odcinka podcast</h3>
					<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17320" data-name="Path 17320" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#ef9700" />
					</svg>
				</a>
				<a href="#" class="episodes__episode">
					<img src="/wp-content/uploads/2023/11/ksiazka01.jpg" alt="" loading="lazy">
					<h3>Przykładowy tytuł odcinka podcast</h3>
					<svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.667" viewBox="0 0 28.667 28.667">
						<path id="Path_17320" data-name="Path 17320" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 30.667) rotate(-90)" fill="#ef9700" />
					</svg>
				</a>
			</div>
		</div>
	</section>
<?php endif; ?>