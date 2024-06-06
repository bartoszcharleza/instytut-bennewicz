<?php get_header();
the_post(); ?>

<?php
if (sfwd_lms_has_access(get_the_ID(),  get_current_user_id()) || current_user_can('administrator')) :
    get_template_part('partials/client-panel-tabs'); ?>

    <section class="section">
        <div class="section-container"></div>
    </section>
    <section class="section learndash-course">
        <div class="section-container">
            <h1 class="heading heading--xl"><?php the_title(); ?></h1>
            <?php
            the_content(); ?>
        </div>
    </section>


<?php
endif;
get_footer(); ?>