<?php 
function sc_related_posts_by_cat() {
    $categories = get_the_category(get_the_ID());
    if (!$categories) return 'Không có bài viết nào phù hợp';

    $category_ids = wp_list_pluck($categories, 'term_id');

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
        'post__not_in'   => array(get_the_ID()),
        'category__in'   => $category_ids,
    );

    $related_posts = new WP_Query($args);

    $output = '<div class="box-related-posts">';
    $output .= '<h3 class="title">Bài Viết Liên Quan</h3>';

    if ($related_posts->have_posts()) {
        $output .= '<div class="list-top related-posts row ">';
        while ($related_posts->have_posts()) {
            $related_posts->the_post();
            $output .= '<div class="related-post col medium-6 small-12 large-6"><a href="' . get_permalink() . '">';
            if (has_post_thumbnail()) {
                $output .= get_the_post_thumbnail(get_the_ID(), 'large');
            }
            $output .= '<div class="box-title"><h3>' . get_the_title() . '</h3>';
            $output .= '<p class="desc">' . wp_trim_words(get_the_excerpt(), 10,'...'). '</p></div>';
            $output .= '</a></div>';
        }
        $output .= '</div>';
        wp_reset_postdata();
    } else {
        $output .= '<p>Không có bài viết nào phù hợp</p>';
    }

    $output .= '</div>';
    
    return $output;
}
add_shortcode('sc_related_posts', 'sc_related_posts_by_cat');

function test() {
    echo 'test nè';
}
add_shortcode('sc_test', 'test');

function gioiThieu() {
    ob_start();
    if (locate_template('/template-parts/shortcode/gioi-thieu.php')) {
        get_template_part('/template-parts/shortcode/gioi-thieu');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_gioi_thieu', 'gioiThieu');

function taiSaoChon() {
    ob_start();
    if (locate_template('/template-parts/shortcode/tai-sao-chon.php')) {
        get_template_part('/template-parts/shortcode/tai-sao-chon');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_tai_sao_chon', 'taiSaoChon');

function cauHoi() {
    ob_start();
    if (locate_template('/template-parts/shortcode/cau-hoi.php')) {
        get_template_part('/template-parts/shortcode/cau-hoi');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_cau_hoi', 'cauHoi');

function bacSi() {
    ob_start();
    if (locate_template('/template-parts/shortcode/bac-si.php')) {
        get_template_part('/template-parts/shortcode/bac-si');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_bac_si', 'bacSi');

function giayPhepHoatDong() {
    ob_start();
    if (locate_template('/template-parts/shortcode/giay-phep.php')) {
        get_template_part('/template-parts/shortcode/giay-phep');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_giay_phep', 'giayPhepHoatDong');

function doiTac() {
    ob_start();
    if (locate_template('/template-parts/shortcode/doi-tac.php')) {
        get_template_part('/template-parts/shortcode/doi-tac');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_doi_tac', 'doiTac');

function hinhAnh() {
    ob_start();
    if (locate_template('/template-parts/shortcode/hinh-anh.php')) {
        get_template_part('/template-parts/shortcode/hinh-anh');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_hinh_anh', 'hinhAnh');

function form_dang_ky_tv() {
    ob_start();
    if (locate_template('/template-parts/shortcode/form-dang-ky.php')) {
        get_template_part('/template-parts/shortcode/form-dang-ky');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_form_dk', 'form_dang_ky_tv');

function arcodition() {
    ob_start();
    if (locate_template('/template-parts/shortcode/arcodition.php')) {
        get_template_part('/template-parts/shortcode/arcodition');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_arcodition', 'arcodition');

function khuyenMai() {
    ob_start();
    if (locate_template('/template-parts/shortcode/khuyen-mai.php')) {
        get_template_part('/template-parts/shortcode/khuyen-mai');
    } else {
        echo __('Template not found', 'textdomain');
    }
    return ob_get_clean();
}
add_shortcode('sc_khuyen_mai', 'khuyenMai');





