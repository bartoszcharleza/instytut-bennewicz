<?php
function my_acf_custom_wysiwyg_toolbars($toolbars)
{
    $toolbars['Full'][1][] = 'styleselect';
    return $toolbars;
}

add_filter('acf/fields/wysiwyg/toolbars', 'my_acf_custom_wysiwyg_toolbars');

function my_custom_formats($init_array)
{
    $style_formats = array(

        array(
            'title' => 'Nagłówek XXL',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'heading heading--xxl',
        ),
        array(
            'title' => 'Nagłówek XL',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'heading heading--xl',
        ),
        array(
            'title' => 'Nagłówek L',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'heading heading--l',
        ),
        array(
            'title' => 'Nagłówek M',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'heading heading--m',
        ),
        array(
            'title' => 'Nagłówek S',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'heading heading--s',
        ),
        array(
            'title' => 'Nagłówek XS',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'heading heading--xs',
        ),
        array(
            'title' => 'Nagłówek XXS',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'heading heading--xxs',
        ),
        array(
            'title' => 'Przycisk',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'btn btn--secondary',
        ),
        array(
            'title' => 'Cytat',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'quote',
        ),
        array(
            'title' => 'Linia po lewej stronie',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'line-left',
        ),
        array(
            'title' => 'Linia po lewej i prawej stronie',
            'selector' => 'h1,h2,h3,h4,h5,h6,p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'line-left-right',
        ),
        array(
            'title' => 'Tekst S',
            'selector' => 'p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'text--s',
        ),
        array(
            'title' => 'Tekst M',
            'selector' => 'p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'text--m',
        ),
        array(
            'title' => 'Tekst L',
            'selector' => 'p,ul,ol,li,span,strong,a,bold,em',
            'classes' => 'text--l',
        ),
    );
    $init_array['style_formats'] = json_encode($style_formats);
    return $init_array;
}

add_filter('tiny_mce_before_init', 'my_custom_formats');


function my_custom_colors($init)
{
    $default_colours = '"000000", "Black"';

    $custom_colours = '
"EF9700", "Główny kolor 1",
"1AD2D6", "Główny kolor 2"';

    $init['textcolor_map'] = '[' . $default_colours . ',' . $custom_colours . ']';

    $init['textcolor_rows'] = 6;

    return $init;
}

add_filter('tiny_mce_before_init', 'my_custom_colors');
