<?php 
// Add custom Theme Functions here

// Add Custom_post_type & taxonomies
//  require get_stylesheet_directory() .'/inc/add_posttype_and_taxonomies.php';
// Add require uxblock custom
//  require get_stylesheet_directory() .'/inc/uxbuilder/elements/ux_service_custom.php';
// End require uxblock custom
 require get_stylesheet_directory() .'/inc/shortcode.php';
//Add Action Theme Style
 require get_stylesheet_directory() .'/inc/action_style_theme.php';
 require_once get_stylesheet_directory() . '/inc/RegisterACFLocalJson.php';

function setupThemeOption()
 {
   if (function_exists('acf_add_options_page')) {

     acf_add_options_page([
       'page_title'     => 'Option Theme',
       'menu_title'     => 'Option Theme',
       'menu_slug'     => 'acf-option-theme',
       'redirect'        => false
     ]);
    //  acf_add_options_sub_page([
    //    'page_title' => 'Option Single',
    //    'menu_title' => 'Option Single',
    //    'parent_slug' => 'acf-option-theme'
    //  ]);
   }
 }
 add_action('acf/init', 'setupThemeOption');