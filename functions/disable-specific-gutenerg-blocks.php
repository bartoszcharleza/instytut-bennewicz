<?php
// add_filter('allowed_block_types_all', 'limit_gutenberg_blocks_to_acf_only', 10, 2);
// function limit_gutenberg_blocks_to_acf_only($allowed_blocks, $editor_context)
// {
//     if (!empty($editor_context->post)) {
//         $registered_blocks = WP_Block_Type_Registry::get_instance()->get_all_registered();

//         $acf_blocks = array_filter(array_keys($registered_blocks), function ($block_name) {
//             return strpos($block_name, 'acf/') === 0;
//         });

//         return $acf_blocks;
//     }

//     return $allowed_blocks;
// }
