<?php


function custom_loginlogo() {
echo '<style type="text/css">
.login h1 a {
     width: 300px!important;
    height: 116px;
 }
h1 a {background-size: 100%!important;background-image: url(/prep0dong/wp-content/uploads/2025/02/logo-test-SGN.png)!important; }
</style>';
}
add_action('login_head', 'custom_loginlogo');

add_action('admin_enqueue_scripts', 'ds_admin_theme_style');
function ds_admin_theme_style() {
echo '<style>.update-nag, .updated, .error, .is-dismissible, .notice { display: none; }</style>';
}
function remove_core_updates(){
global $wp_version;return(object) array('last_checked'=> time(),'version_checked'=> $wp_version,);
}
add_filter('pre_site_transient_update_core','remove_core_updates');
add_filter('pre_site_transient_update_plugins','remove_core_updates');
add_filter('pre_site_transient_update_themes','remove_core_updates');

add_filter('use_block_editor_for_post', '__return_false');

add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );