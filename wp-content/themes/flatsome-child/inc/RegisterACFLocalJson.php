<?php
// Lưu JSON của ACF vào thư mục /acf-field trong theme
add_filter('acf/settings/save_json', function ($path) {
    $themeDir = get_stylesheet_directory() . '/acf-field';

    // Nếu thư mục chưa tồn tại thì tạo mới
    if (!is_dir($themeDir)) {
        mkdir($themeDir, 0755);
    }

    return $themeDir;
});

// Load JSON của ACF từ thư mục /acf-field trong theme
add_filter('acf/settings/load_json', function ($paths) {
    // Xóa đường dẫn mặc định
    unset($paths[0]);

    // Thêm đường dẫn mới
    $paths[] = get_stylesheet_directory() . '/acf-field';

    return $paths;
});
