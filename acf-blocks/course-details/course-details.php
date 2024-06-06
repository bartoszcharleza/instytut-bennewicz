<?php

/**
 * Course details block
 *
 * @param array $block The block settings and attributes.
 */


// Load values and assign defaults.
$hide = false;
$title = !empty(get_field('title')) ? get_field('title') : 'title...';
$sections = get_field('sections');

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
	<section class="section course-details <?php ws_section_classes() ?> <?= $class_name ?>" <?= $anchor ?>>
		<?php ws_background_image(); ?>
		<div class="section-container <?php ws_padding() ?>">
			<?php foreach ($sections as $section) {
			?>
				<div class="details-section  <?php echo $section['type'] ?>">
					<div class="details-section__icon" data-aos="fade-in">
						<?php if ($section['type'] == 'option-1' || $section['type'] == 'option-2') { ?>
							<img src="<?php echo $section['icon']['url'] ?>" alt="<?php echo $section['icon']['alt'] ?>" loading="lazy">
						<?php }; ?>
						<?php if ($section['type'] == 'option-3') { ?>
							<svg xmlns="http://www.w3.org/2000/svg" width="87.731" height="87.731" viewBox="0 0 87.731 87.731">
								<path id="Subtraction_1" data-name="Subtraction 1" d="M7367.7,3562.732h-81.658A3.04,3.04,0,0,1,7283,3559.7v-72.587a3.039,3.039,0,0,1,3.037-3.035h19.646V3475h6.073v9.073h30.22V3475h6.074v9.073H7367.7a3.039,3.039,0,0,1,3.037,3.035V3559.7A3.04,3.04,0,0,1,7367.7,3562.732Zm-78.621-45.366v39.293h75.584v-39.293Zm0-27.22v21.146h75.584v-21.146H7348.05v9.073h-6.074v-9.073h-30.22v9.073h-6.073v-9.073Z" transform="translate(-7283 -3475)" fill="#1ad2d6" />
							</svg>
						<?php }; ?>
					</div>
					<div class="details-section__content">
						<h3 class="details-section__content-title heading--m <?php echo $section['type'] ?>" data-aos="fade-in"><?php echo $section['title'] ?></h3>
						<?php if ($section['type'] == 'option-1' || $section['type'] == 'option-2') { ?>
							<div class="details-section__content-column-1" data-aos="fade-up">
								<?php if ($section['type'] == 'option-1') { ?>
									<div class="details-section__content-text"><?php echo $section['text-1'] ?></div>
								<?php
								};
								if ($section['type'] == 'option-2') {
									foreach ($section['list-1'] as $list_item) {
										echo '<div class="details-section__content-list-item">';
										if ($list_item['icon']) {
											echo "<img class='details-section__content-list-icon' src=" . $list_item['icon']['url'] . " alt=" . $list_item['icon']['alt'] . " loading='lazy'>";
										} else {
											echo '<svg class="details-section__content-list-icon" id="Group_2177" data-name="Group 2177" xmlns="http://www.w3.org/2000/svg" width="40.667" height="40.667" viewBox="0 0 40.667 40.667">
										<path id="Path_17344" data-name="Path 17344" d="M0,0H40.667V40.667H0Z" fill="none" />
										<path id="Path_17345" data-name="Path 17345" d="M27.417,4.27A16.944,16.944,0,1,1,2.008,19.493L2,18.944l.008-.549A16.944,16.944,0,0,1,27.417,4.27ZM25.226,14.358a1.694,1.694,0,0,0-2.237-.141l-.159.141-5.58,5.578-2.191-2.189-.159-.141a1.694,1.694,0,0,0-2.377,2.377l.141.159,3.389,3.389.159.141a1.694,1.694,0,0,0,2.077,0l.159-.141,6.778-6.778.141-.159A1.694,1.694,0,0,0,25.226,14.358Z" transform="translate(1.389 1.389)" fill="#ef9700" />
									</svg>';
										}
										echo '<div class="wysiwyg-content">' . $list_item['text'] . '</div>';
										echo '</div>';
									};
								}; ?>
							</div>
							<div class="details-section__content-column-2" data-aos="fade-up" data-aos-delay="200">

								<?php if ($section['type'] == 'option-1') { ?>
									<div class="details-section__content-text wysiwyg-content"><?php echo $section['text-2'] ?></div>
								<?php
								};
								if ($section['type'] == 'option-2' && $section['list-2']) {
									foreach ($section['list-2'] as $list_item) {
										echo '<div class="details-section__content-list-item">';
										if ($list_item['icon']) {
											echo "<img class='details-section__content-list-icon' src=" . $list_item['icon']['url'] . " alt=" . $list_item['icon']['alt'] . " loading='lazy'>";
										} else {
											echo '<svg class="details-section__content-list-icon" id="Group_2177" data-name="Group 2177" xmlns="http://www.w3.org/2000/svg" width="40.667" height="40.667" viewBox="0 0 40.667 40.667">
										<path id="Path_17344" data-name="Path 17344" d="M0,0H40.667V40.667H0Z" fill="none" />
										<path id="Path_17345" data-name="Path 17345" d="M27.417,4.27A16.944,16.944,0,1,1,2.008,19.493L2,18.944l.008-.549A16.944,16.944,0,0,1,27.417,4.27ZM25.226,14.358a1.694,1.694,0,0,0-2.237-.141l-.159.141-5.58,5.578-2.191-2.189-.159-.141a1.694,1.694,0,0,0-2.377,2.377l.141.159,3.389,3.389.159.141a1.694,1.694,0,0,0,2.077,0l.159-.141,6.778-6.778.141-.159A1.694,1.694,0,0,0,25.226,14.358Z" transform="translate(1.389 1.389)" fill="#ef9700" />
									</svg>';
										}
										echo '<div class="wysiwyg-content">' . $list_item['text'] . '</div>';
										echo '</div>';
									};
								}; ?>
							</div>
						<?php
						}
						if ($section['type'] == 'option-3') { ?>
							<div class="details-section__content-column-callendar" data-aos="fade-up">

								<div class="details-section__content-callendar-item">
									<div class="details-section__content-callendar-item-icon"><svg xmlns="http://www.w3.org/2000/svg" width="53.333" height="53.333" viewBox="0 0 53.333 53.333">
											<path id="Path_18154" data-name="Path 18154" d="M20.667,1V6.333h16V1H42V6.333H52.667A2.667,2.667,0,0,1,55.333,9V51.667a2.667,2.667,0,0,1-2.667,2.667h-48A2.667,2.667,0,0,1,2,51.667V9A2.667,2.667,0,0,1,4.667,6.333H15.333V1ZM50,27.667H7.333V49H50Zm-34.667-16h-8V22.333H50V11.667H42V17H36.667V11.667h-16V17H15.333Z" transform="translate(-2 -1)" fill="#1ad2d6" />
										</svg>
									</div>
									<div class="details-section__content-dates">
										<p class="details-section__content-callendar-item-title">TERMINY SPOTKAŃ</p>

										<?php foreach ($section['dates'] as $date) {
											echo '<div class="details-section__content-date"><span>' . $date['title'] . '</span><span>' . $date['days'] .  '</span><span>' . $date['hours'] . '</span></div>';
										} ?>
									</div>
								</div>

								<div class="details-section__content-callendar-item">
									<div class="details-section__content-callendar-item-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="47.811" height="53.123" viewBox="0 0 47.811 53.123">
											<path id="Path_18185" data-name="Path 18185" d="M16.281,7.312A5.312,5.312,0,1,1,10.968,2,5.312,5.312,0,0,1,16.281,7.312ZM8.312,39.186V55.123H3V23.249a7.968,7.968,0,0,1,13.562-5.675l6.307,5.956,6.143-6.143,3.756,3.756-9.794,9.794-4.038-3.813v28H13.625V39.186Zm2.656-18.593a2.656,2.656,0,0,0-2.656,2.656V33.874h5.312V23.249A2.656,2.656,0,0,0,10.968,20.593ZM45.5,9.968H21.593V4.656H48.154a2.656,2.656,0,0,1,2.656,2.656V36.53a2.656,2.656,0,0,1-2.656,2.656h-9.1l7.5,15.937H40.688l-7.5-15.937h-11.6V33.874H45.5Z" transform="translate(-3 -2)" fill="#1ad2d6" />
										</svg>
									</div>
									<p class="details-section__content-callendar-item-title">CZAS TRWANIA KURSU</p>
									<p class="details-section__content-callendar-item-text"><?php echo $section['time'] ?></p>
								</div>

								<div class="details-section__content-callendar-item">
									<div class="details-section__content-callendar-item-icon">
										<svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50">
											<g id="Group_2194" data-name="Group 2194" transform="translate(-398 -3164)">
												<g id="Ellipse_445" data-name="Ellipse 445" transform="translate(398 3164)" fill="none" stroke="#1ad2d6" stroke-width="4">
													<circle cx="25" cy="25" r="25" stroke="none" />
													<circle cx="25" cy="25" r="23" fill="none" />
												</g>
												<g id="Group_2187" data-name="Group 2187" transform="translate(406.075 3173.543)">
													<path id="Path_17365" data-name="Path 17365" d="M0,0H34.7V30.91H0Z" fill="none" />
													<path id="Path_17366" data-name="Path 17366" d="M10,21.455l7.728-7.728L10,6V21.455" transform="translate(4.982 1.728)" fill="none" stroke="#1ad2d6" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" />
												</g>
											</g>
										</svg>
									</div>
									<p class="details-section__content-callendar-item-title">SYSTEM ZAJĘĆ</p>
									<p class="details-section__content-callendar-item-text"><?php echo $section['system'] ?></p>
								</div>

							</div>
						<?php }; ?>
					</div>
				</div>
			<?php
			} ?>

			<div class="details-cta btn--outside-border-secondary-wrap">
				<a href="#formularz" class="btn btn--secondary">ZAPISZ SIĘ NA KURS</a>
			</div>
		</div>

	</section>

<?php endif; ?>