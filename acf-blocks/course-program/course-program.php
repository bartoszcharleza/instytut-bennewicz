<?php

/**
 * Course program block
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$hide = false;
$title_1 = get_field('title_1');
$accordion = get_field('accordion');
$button_text = get_field('button_text');
$button_link = get_field('button_link');

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
  <section class="section course-program <?= $class_name ?>" <?= $anchor ?>>
    <?php // ws_background_image(); 
    ?>
    <div class="section-container <?php ws_padding() ?>">
      <div class="main-title">
        <svg xmlns="http://www.w3.org/2000/svg" width="89.75" height="94.458" viewBox="0 0 89.75 94.458">
          <g id="Group_91" data-name="Group 91" transform="translate(-16.333 -11.625)">
            <path id="Path_17378" data-name="Path 17378" d="M44.021,82.833h-30.6A11.917,11.917,0,0,1,1.5,70.917v-56.5A11.917,11.917,0,0,1,13.417,2.5h56.5A11.917,11.917,0,0,1,81.833,14.417V37.958a2.5,2.5,0,1,1-5,0V14.417A6.925,6.925,0,0,0,69.917,7.5h-56.5A6.924,6.924,0,0,0,6.5,14.417v56.5a6.925,6.925,0,0,0,6.917,6.917h30.6a2.5,2.5,0,0,1,0,5Z" transform="translate(14.833 18.542)" fill="#ef9700" />
            <path id="Path_17379" data-name="Path 17379" d="M19,46.75a2.5,2.5,0,0,1-2.5-2.5V16a2.5,2.5,0,0,1,5,0V44.25A2.5,2.5,0,0,1,19,46.75Z" transform="translate(70.458 59.333)" fill="#ef9700" />
            <path id="Path_17380" data-name="Path 17380" d="M30.125,35.625a2.5,2.5,0,0,1-1.768-.732L14.232,20.768a2.5,2.5,0,0,1,3.536-3.536L30.125,29.589,42.482,17.232a2.5,2.5,0,0,1,3.536,3.536L31.893,34.893A2.5,2.5,0,0,1,30.125,35.625Z" transform="translate(59.333 70.458)" fill="#ef9700" />
            <path id="Path_17381" data-name="Path 17381" d="M16,24.333a2.5,2.5,0,0,1-2.5-2.5V3a2.5,2.5,0,0,1,5,0V21.833A2.5,2.5,0,0,1,16,24.333Z" transform="translate(59.333 11.125)" fill="#ef9700" />
            <path id="Path_17382" data-name="Path 17382" d="M8,24.333a2.5,2.5,0,0,1-2.5-2.5V3a2.5,2.5,0,0,1,5,0V21.833A2.5,2.5,0,0,1,8,24.333Z" transform="translate(29.667 11.125)" fill="#ef9700" />
            <path id="Path_17383" data-name="Path 17383" d="M79.333,13.5H4a2.5,2.5,0,0,1,0-5H79.333a2.5,2.5,0,0,1,0,5Z" transform="translate(14.833 40.792)" fill="#ef9700" />
          </g>
        </svg>
        <h2 class="heading heading--l" data-aos="fade-in"><?php echo esc_html($title_1); ?></h2>
      </div>
      <?php if ($accordion) : ?>
        <div class="course-program-items">
          <?php
          $item_number = 1;
          foreach ($accordion as $item) : ?>
            <div <?php if ($item_number == 1) {
                    echo 'id="course-program-item-1"';
                  } ?> class="course-program-item" data-aos="fade-up" <?php if ($item_number != 1) {
                                                                      echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#course-program-item-1"';
                                                                    } ?>>
              <div class="course-program-item__title" data-toggle-id="course-program-item-<?php echo $item_number ?>" data-toggle-type="toggler" data-toggle-self-close="true">
                <h3 class="heading--xxs"><?php echo esc_html($item['title']); ?></h3>
                <div class="course-program-item__title__icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="28.667" height="28.666" viewBox="0 0 28.667 28.666">
                    <path id="Path_17419" data-name="Path 17419" d="M16.333,2A14.333,14.333,0,1,1,2,16.333,14.338,14.338,0,0,1,16.333,2Zm0,25.8A11.467,11.467,0,1,0,4.867,16.333,11.463,11.463,0,0,0,16.333,27.8Zm1.433-11.467h4.3l-5.733,5.733L10.6,16.333h4.3V10.6h2.867Z" transform="translate(-2 -2)" fill="#fff" />
                  </svg>
                </div>
              </div>
              <div class="course-program-item__content" data-toggle-id="course-program-item-<?php echo $item_number ?>" data-toggle-type="target">
                <div class="course-program-item__sessions">
                  <?php foreach ($item['sessions'] as $session) { ?>
                    <div class="course-program-item__session">
                      <h4 class="heading--xs"><?php echo $session['session_title']; ?></h4>
                      <div class="wysiwyg-content"><?php echo $session['session_text']; ?></div>
                    </div>
                  <?php } ?>
                </div>

                <div class="course-program-item__supervisions">
                  <h4 class="course-program-item__supervisions-title heading--xs"><?php echo $item['supervision_title'] ?></h4>
                  <?php
                  if ($item['supervisions']) :
                    foreach ($item['supervisions'] as $supervision) : ?>
                      <div class="course-program-item__supervision">
                        <h5 class="heading--xs"><?php echo $supervision['supervision_title']; ?></h5>
                        <div class="wysiwyg-content"><?php echo $supervision['supervision_text']; ?></div>
                      </div>
                  <?php
                    endforeach;
                  endif;
                  ?>
                </div>
              </div>
            </div>
          <?php
            $item_number++;
          endforeach; ?>
        </div>
      <?php endif;
      if ($button_text) { ?>
        <div class="bottom btn--outside-border-secondary-wrap" data-aos="fade-up" <?php echo 'data-aos-delay="' . $item_number * 200 . '" data-aos-anchor="#course-program-item-1"'; ?>>
          <a href="<?php echo $button_link ?>" class="btn btn--secondary"><?php echo $button_text ?></a>
        </div>
      <?php } ?>
    </div>
  </section>
<?php endif; ?>