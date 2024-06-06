<?php get_header();
the_post(); ?>
<section class="section learndash-course">
    <div class="section-container">
        <h1 class="heading--xl"><?php the_title(); ?></h1>
        <?php the_content(); ?>
    </div>
</section>


<?php get_footer(); ?>