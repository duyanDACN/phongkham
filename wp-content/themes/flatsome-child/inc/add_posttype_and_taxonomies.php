<?php
// Bergin Custom_post_type_dichvu & create_dichvu_taxonomies
function custom_post_type_dichvu() {
    $labels = array(
        'name'               => 'Dịch Vụ',
        'singular_name'      => 'Dịch Vụ',
        'menu_name'          => 'Dịch Vụ',
        'name_admin_bar'     => 'Dịch Vụ',
        'add_new'            => 'Thêm mới',
        'add_new_item'       => 'Thêm dịch vụ mới',
        'new_item'           => 'Dịch vụ mới',
        'edit_item'          => 'Chỉnh sửa dịch vụ',
        'view_item'          => 'Xem dịch vụ',
        'all_items'          => 'Tất cả dịch vụ',
        'search_items'       => 'Tìm kiếm dịch vụ',
        'not_found'          => 'Không tìm thấy dịch vụ nào',
        'not_found_in_trash' => 'Không tìm thấy dịch vụ nào trong thùng rác'
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'dich-vu'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-hammer', // Icon trong menu admin
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields'),
        'show_in_rest'       => true // Hỗ trợ Gutenberg
    );

    register_post_type('dichvu', $args);
}


function create_dichvu_taxonomies() {
    register_taxonomy('dichvu_category', 'dichvu', array(
        'label'        => 'Danh mục Dịch Vụ',
        'rewrite'      => array('slug' => 'danh-muc-dich-vu'),
        'hierarchical' => true, // Giống category (phân cấp)
        'show_admin_column' => true,
        'show_in_rest' => true
    ));

    register_taxonomy('dichvu_tag', 'dichvu', array(
        'label'        => 'Thẻ Dịch Vụ',
        'rewrite'      => array('slug' => 'the-dich-vu'),
        'hierarchical' => false, // Giống tag (không phân cấp)
        'show_admin_column' => true,
        'show_in_rest' => true
    ));
}

add_action('init', 'custom_post_type_dichvu');
add_action('init', 'create_dichvu_taxonomies');