<?php
define( 'WP_CACHE', true );

/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung 
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt, 
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define('DB_NAME', 'qvnifnwf_prep0dong');

/** MySQL database username */
define('DB_USER', 'qvnifnwf_prep0dong');

/** MySQL database password */
define('DB_PASSWORD', 'prep0dong///123');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '}p&%zR%,)0&#le3,-^*,$Q+*~@AOg+iW2}^D>dl;w1Hcy;4.7Q0f&yR/D%o#4OcM' );
define( 'SECURE_AUTH_KEY',  ']b;~b<Kc*fa:5=<g=VP$(x%m*d]waIpMDO_7m@8yw,LRWO;f[76z9g~H#VwnU1kw' );
define( 'LOGGED_IN_KEY',    'z)~Ri*6vbmDtdD;T/#g@PH=wTSG69OKG8UhVlQE2ji&P-K(z<M!OB@ Y[skIh>A6' );
define( 'NONCE_KEY',        '}kCxKe%MU4z8Z9hte2(Dd15U4M|&t ]U?>Ru77u`4$}4g=fnu<P1v~jsuieA0_*>' );
define( 'AUTH_SALT',        '!jn,~MrVJFu7co:?#CD0tn>Bf<|sZaF?g3Cc3_bTfgLz$XF3mYJRz>L/L%-g/7pe' );
define( 'SECURE_AUTH_SALT', 'W45+P;8IXWh0OFs_Y=AfTSfrBl^}W%]29oaNp@,$%?g<r#t^.6X9A(q_7Ix(5a{d' );
define( 'LOGGED_IN_SALT',   'rqE^.MW82Ng;ubmLV<dII[&~N8B)4CP/D#X/Bxb(ar#*{!U*@)uiv}Z(tE{8|gv#' );
define( 'NONCE_SALT',       '?,qG<)8qvZOTc8>MhR]^1JL^ n@BM@:EP4M#q<jA?+INr-7s_0Dm/;.6*=uvMYt%' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
