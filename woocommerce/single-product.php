<?php get_header();
the_post();

$categories = get_the_terms(get_the_ID(), 'product_cat');
if ($categories) {
    if ($categories[0]->slug != 'kursy-rozwojowe' && $categories[0]->slug != 'kursy-zawodowe') {
?>
        <section class="section books">
            <div data-aos="fade-up" class="section-container">
                <?php get_template_part('partials/store-and-product-header'); ?>
            </div>
            <div data-aos="fade-up" class="section-container">
                <?php get_template_part('partials/store-and-product-sidebar'); ?>
                <div class="gutenberg-content">
                    <?php the_content(); ?>
                </div>
            </div>
        </section>
        <?php
        $newsletter_acf_block = get_template_directory() . '/acf-blocks/newsletter/newsletter.php';
        include $newsletter_acf_block;
        ?>

        <?php
        $accordion_acf_block = get_template_directory() . '/acf-blocks/accordion/accordion.php';
        include $accordion_acf_block;
        ?>
<?php
    } else {
        the_content();
    }
}
get_footer();
