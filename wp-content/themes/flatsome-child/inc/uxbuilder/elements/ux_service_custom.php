<?php
/**
 * Plugin Name: Dịch Vụ Shortcode for Flatsome
 * Description: Tạo shortcode [dichvu_posts] để hiển thị danh sách bài viết của post type 'dichvu' trong Flatsome UX Builder.
 * Version: 1.0
 * Author: Your Name
 */

// Đảm bảo không bị truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

// Đăng ký shortcode [dichvu_posts]
function shortcode_latest_from_dichvu($atts, $content = null, $tag) {
    extract(shortcode_atts(array(
        "_id" => 'row-'.rand(),
        'style' => '',
        'class' => '',
        'visibility' => '',
        "columns" => '4',
        "columns__sm" => '1',
        "columns__md" => '',
        'col_spacing' => '',
        "type" => 'grid',
        'posts' => '8',
        'ids' => false,
        'cat' => '',
        'excerpt' => 'visible',
        'excerpt_length' => 15,
        'offset' => '',
        'show_date' => 'text',
        'show_category' => 'true',
        'title_size' => 'large',
        'image_size' => 'medium',
        'image_height' => '56%',
    ), $atts));

    if ($visibility == 'hidden') return;
    ob_start();

    $args = array(
        'post_status' => 'publish',
        'post_type' => 'dichvu',
        'offset' => $offset,
        'posts_per_page' => $posts,
        'ignore_sticky_posts' => true,
    );

    if (!empty($ids)) {
        $ids = explode(',', $ids);
        $ids = array_map('trim', $ids);
        $args['post__in'] = $ids;
        $args['orderby'] = 'post__in';
    }

    $recentPosts = new WP_Query($args);
    
    echo '<div class="dichvu-posts row">';
    while ($recentPosts->have_posts()) : $recentPosts->the_post();
        ?>
        <div class="col medium-<?php echo esc_attr($columns); ?>">
            <div class="box has-hover">
                <div class="box-image">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail($image_size); ?>
                    </a>
                </div>
                <div class="box-text text-<?php echo esc_attr($title_size); ?>">
                    <h4 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <?php if ($excerpt == 'visible') : ?>
                        <p><?php echo wp_trim_words(get_the_excerpt(), $excerpt_length); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
    endwhile;
    echo '</div>';

    wp_reset_postdata();
    return ob_get_clean();
}
add_shortcode('dichvu_posts', 'shortcode_latest_from_dichvu');

// Đăng ký shortcode vào UX Builder
function flatsome_ux_builder_dichvu() {
    if (!function_exists('ux_builder_register')) return;

    ux_builder_register('dichvu_posts', array(
        'name' => __('Dịch Vụ Posts', 'flatsome'),
        'category' => __('Content', 'flatsome'),
        'options' => array(
            'columns' => array(
                'type' => 'slider',
                'heading' => __('Số cột', 'flatsome'),
                'default' => '4',
                'max' => '6',
                'min' => '1',
            ),
            'posts' => array(
                'type' => 'slider',
                'heading' => __('Số bài viết', 'flatsome'),
                'default' => '8',
                'max' => '20',
                'min' => '1',
            ),
            'excerpt_length' => array(
                'type' => 'slider',
                'heading' => __('Độ dài mô tả', 'flatsome'),
                'default' => '15',
                'max' => '50',
                'min' => '5',
            ),
        ),
    ));
}
add_action('ux_builder_setup', 'flatsome_ux_builder_dichvu');
