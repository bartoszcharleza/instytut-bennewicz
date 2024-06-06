<div class="books__sidebar">
    <p class="btn btn--tertiary btn--medium">Kategorie produktów</p>
    <?php
    $current_cat = get_queried_object();

    $args = array(
        'taxonomy' => 'product_cat',
        'hide_empty' => false,
    );

    $categories = get_terms($args);

    foreach ($categories as $category) {
        if ($category->count > 0) :
            $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
            $image = wp_get_attachment_image_src($thumbnail_id, 'thumbnail');
            $activeClass = ($current_cat->term_id == $category->term_id) ? 'active' : '';
            $category_link = get_term_link($category);

            echo '<a href=' . $category_link . ' class="category ' . $activeClass . '">';

            if ($image) {
                echo '<img src="' . $image[0] . '" alt="' . $category->name . '">';
            }
            echo '<h3>' . $category->name . '</h3>';

            echo '</a>';
        endif;
    }
    ?>
</div>