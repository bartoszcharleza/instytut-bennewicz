<!-- <h1 class="heading--xl">
    <?php
    $categories = get_the_terms(get_the_ID(), 'product_cat');
    $categorie_id = $categories[0]->term_id;
    $term = get_term($categorie_id, 'product_cat');
    echo $term->description;
    ?>
</h1> -->
<?php
if (function_exists('yoast_breadcrumb')) {
    yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
}
?>