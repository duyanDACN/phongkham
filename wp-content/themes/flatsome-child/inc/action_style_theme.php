<?php
add_action('wp_enqueue_scripts', 'addStylesTheme', 20);

function addStylesTheme() {
    $theme_uri = get_stylesheet_directory_uri() . '/assets/css/';
    $version   = wp_get_theme()->get('Version');

    wp_enqueue_style('style-global', $theme_uri . 'global.css', array('flatsome-main'), $version);

    if (is_page_template(array(
        'page-gad7.php',
        'page-phq9.php',
        'page-ks-gad-phq.php',
        'page-slsk.php'
    ))) {
        wp_enqueue_style('style-survey', $theme_uri . 'survey.css', array('flatsome-main'), $version);
    }

    if (is_page('bang-gia')) {
        wp_enqueue_style('style-price', $theme_uri . 'price.css', array('flatsome-main'), $version);
    }
}
