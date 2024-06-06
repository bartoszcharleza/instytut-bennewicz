<?php

// Get padding from block settings
function ws_padding()
{
    $settings_padding_top = get_field('settings_padding_top');
    $settings_padding_bottom = get_field('settings_padding_bottom');
    echo ' section-container--padding-top-' . $settings_padding_top;
    echo ' section-container--padding-bottom-' . $settings_padding_bottom;
}

// Get background image from block settings
function ws_background_image()
{
    $settings_background_image = get_field('settings_background_image');
    if ($settings_background_image) {
        echo '<div class="section-background"><img src="' . $settings_background_image['url'] . '" alt="' . $settings_background_image['alt'] . '" loading="lazy"></div>';
    };

    $settings_background_element_bottom = get_field('settings_background_element_bottom');
    if ($settings_background_element_bottom) {
        echo '<div class="section-background-element-bottom"><img src="' . $settings_background_element_bottom['url'] . '" alt="' . $settings_background_element_bottom['alt'] . '" loading="lazy"></div>';
    };

    $settings_background_element_top = get_field('settings_background_element_top');
    if ($settings_background_element_top) {
        echo '<div class="section-background-element-top" ><img src="' . $settings_background_element_top['url'] . '" alt="' . $settings_background_element_top['alt'] . '" loading="lazy"></div>';
    };

    $settings_animation = get_field('settings_animation');
    $settings_animation_position = get_field('settings_animation_position');
    if ($settings_animation) {
?>
        <div class="video-background <?php if ($settings_animation_position) {
                                            echo $settings_animation_position;
                                        } ?>">
            <video class="video-background__video" width="100%" height="100%" autoplay muted loop>
                <source src="/wp-content/themes/website_style/images/bennewicz-bg-02.mp4" type="video/mp4">
            </video>
        </div>
    <?php
    }

    $floating_background_circles = get_field('floating_background_circles');
    if ($floating_background_circles) {
    ?>
        <div class="circles circles--section">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
        </div>
<?php
    }
}

// Get background image from block settings
function ws_button($text, $link, $class)
{
    $button_text = !empty($text) ? $text : get_field('button_text');
    $button_link = !empty($link) ? $link : get_field('button_link');
    $button_class = !empty($class) ? $class : 'btn--primary';

    echo '<a href="' . $button_link . '" class="btn ' . $button_class . '">' . $button_text . '</a>';
}

// Get dark gradient from block settings
function ws_section_classes()
{
    $settings_dark_top = get_field('settings_dark_top');
    $settings_dark_bottom = get_field('settings_dark_bottom');
    $settings_background_color = get_field('settings_background_color');
    if ($settings_dark_top) {
        echo '<div class="section--dark-gradient-top"></div>';
    }
    if ($settings_dark_bottom) {
        echo '<div class="section--dark-gradient-bottom"></div>';
    }

    if ($settings_background_color) {
        echo ' section--background-color-' . $settings_background_color;
    }
}
