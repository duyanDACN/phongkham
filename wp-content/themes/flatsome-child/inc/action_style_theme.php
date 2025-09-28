<?php
add_action('wp_enqueue_scripts', 'addStylesTheme', 20);

function addStylesTheme() {
    $theme_uri = get_stylesheet_directory_uri() . '/assets/css/';
    $version   = wp_get_theme()->get('Version');

    // CSS chung
    wp_enqueue_style('style-global', $theme_uri . 'global.css', array('flatsome-main'), $version);

    // Thêm thư viện Swiper CSS
    wp_enqueue_style(
        'swiper-css',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        '11.0.0'
    );

    // Thêm thư viện Swiper JS
    wp_enqueue_script(
        'swiper-js',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array('jquery'),
        '11.0.0',
        true
    );

    // Chỉ load CSS riêng cho các trang survey
    if (is_page_template(array(
        'page-gad7.php',
        'page-phq9.php',
        'page-ks-gad-phq.php',
        'page-slsk.php'
    ))) {
        wp_enqueue_style('style-survey', $theme_uri . 'survey.css', array('flatsome-main'), $version);
    }

    // Chỉ load CSS cho trang Bảng Giá
    if (is_page('bang-gia')) {
        wp_enqueue_style('style-price', $theme_uri . 'price.css', array('flatsome-main'), $version);
    }
}
