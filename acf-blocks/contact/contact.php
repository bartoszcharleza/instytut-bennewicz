<?php

/**
 * Contact block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$title = !empty(get_field('title')) ? get_field('title') : 'title...';
$form = get_field('form');
$contact_details = get_field('contact_details');
$social_media_title = get_field('social_media_title');
$social_media_list = get_field('social_media_list');
$form_title = get_field('form_title');

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
	<section class="section contact <?= $class_name ?>" <?= $anchor ?>>

		<div data-aos="fade-up" class="section-container">
			<h1 class="heading--xl ek-heading--xl"><?php echo wp_kses_post($title); ?></h1>
		</div>
		<div data-aos="fade-up" class="section-container">
			<div class="contact-details">
				<?php
				if ($contact_details) :
					foreach ($contact_details as $contact_detail) :
						$icon = $contact_detail['icon'];
						$text = $contact_detail['text'];
				?>
						<div class="contact-details__item">
							<div class="contact-details__icon">
								<?php echo wp_get_attachment_image($icon, 'full'); ?>
							</div>
							<div class="contact-details__text">
								<?php echo $text; ?>
							</div>
						</div>
				<?php
					endforeach;
				endif;
				?>

				<?php if ($social_media_title) : ?>
					<?php if ($social_media_list) : ?>
						<div class="contact-details__social-media">
							<?php foreach ($social_media_list as $social_media) : ?>
								<div class="contact-details__social-media-item">
									<a href="<?php echo $social_media['link']; ?>" target="_blank">
										<?php
										echo wp_get_attachment_image($social_media['icon']['id'], 'full'); ?>
									</a>
								</div>
							<?php endforeach; ?>
							<h3 class="heading--m contact-details__social-media-title"><?php echo $social_media_title; ?></h3>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			<div class="contact-form">
				<div class="contact-form__title">
					<svg xmlns="http://www.w3.org/2000/svg" width="74.001" height="73.361" viewBox="0 0 74.001 73.361">
						<path id="Subtraction_1" data-name="Subtraction 1" d="M7967.649,968.36h-69.3a2.354,2.354,0,0,1-2.351-2.351V917.05a.426.426,0,0,1,.208-.364l35.6-21.35a2.341,2.341,0,0,1,2.417,0l35.571,21.35a.428.428,0,0,1,.206.364v48.96A2.354,2.354,0,0,1,7967.649,968.36Zm-34.635-68.271L7900.7,919.471V963.66h64.6V919.469l-32.286-19.379Zm.26,49.73h0l-23.711-19.541,2.989-3.628,20.688,17.05,20.2-17.02,3.03,3.594-23.193,19.545Z" transform="translate(-7895.999 -894.999)" fill="#fff" />
					</svg>
					<h2 class="heading--m"><?php echo wp_kses_post($form_title) ?></h2>
				</div>
				<div class="contact-form__form">
					<?php echo do_shortcode($form); ?>
				</div>
			</div>
		</div>
		<?php ws_background_image(); ?>
	</section>
<?php endif; ?>