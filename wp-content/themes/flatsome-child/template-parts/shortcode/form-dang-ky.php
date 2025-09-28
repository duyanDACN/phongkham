<?php
// Lấy dữ liệu từ ACF Option Page
$title_tieu_chi = get_field('title_tieu_chi', 'option');
$anh_form = get_field('anh_form', 'option');
$danh_sach_tieu_chi = get_field('danh_sach_tieu_chi', 'option');
?>

<section class="register-section">
    <div class="container container-1200">
        <!-- Title section -->
        <h2 class="section-title">Form đăng ký tư vấn</h2>

        <!-- Row chia 2 phần -->
        <div class="register-row">

            <!-- Phần trái: content -->
            <div class="register-left">
                <?php if ($title_tieu_chi): ?>
                    <h3 class="content-title"><?php echo esc_html($title_tieu_chi); ?></h3>
                <?php endif; ?>

                <?php if ($danh_sach_tieu_chi): ?>
                    <ul class="content-list">
                        <?php foreach ($danh_sach_tieu_chi as $item): ?>
                            <?php if (!empty($item['tieu_chi_text'])): ?>
                                <li><?php echo esc_html($item['tieu_chi_text']); ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($anh_form): ?>
                    <div class="form-image">
                        <img src="<?php echo esc_url($anh_form); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>

            <!-- Phần phải: form -->
            <div class="register-right">
                <h3 class="form-title">Đăng ký nhận tư vấn</h3>
                <p class="form-subtitle">(Mọi thông tin khách hàng đều được bảo mật tuyệt đối)</p>
                <!-- Form 7 shortcode -->
                <div class="form-wrapper">
                    <?php echo do_shortcode('[contact-form-7 id="754f1f7" title="Form liên hệ 1"]'); ?>
                </div>
            </div>

        </div>
    </div>
</section>


<style>
    /* Section tổng */
    .register-section {
        padding: 60px 20px;
    }

    .form-image img {
        height: 250px;
        width: 100%;
        object-fit: cover;
        border-radius: 12px;
    }

    /* Title section */
    .register-section .section-title {
        text-align: center;
        font-size: 40px;
        margin-bottom: 50px;
        font-weight: 600;
        justify-content: center;
        color: #131e46;
    }

    /* Row chia 2 phần */
    .register-row {
        display: flex;
        gap: 40px;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .register-section .wpcf7-form-control {
        border-radius: 8px;
    }

    .register-section .wpcf7-submit {
        padding: 0px 50px !important;
        margin-top: 20px !important;
    }

    /* Phần trái */
    .register-left {
        flex: 1 1 45%;
    }

    .register-left .content-title {
        font-size: 30px;
        margin-bottom: 20px;
        font-weight: 600;
        color: #C70039;
    }

    .register-left .content-list {
        list-style: none;
        padding: 0;
        padding-left: 17px;
    }

    .register-left .content-list li {
        margin-bottom: 12px;
        font-size: 16px;
        position: relative;
        padding-left: 25px;
    }

    .register-left .content-list li::before {
        content: "✔️";
        position: absolute;
        left: 0;
        top: 0;
    }

    /* Phần phải */
    .register-right {
        flex: 1 1 45%;
        background: linear-gradient(to right, rgb(217 163 178 / 70%) 0%,
                /* đỏ nhạt */
                #ffffff 50%,
                /* trắng ở giữa */
                rgb(100 116 177 / 70%) 100%
                /* xanh đậm nhạt */
            );
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 0 15px rgba(0, 0, 0, 0.05);
    }

    .register-right .form-title {
        font-size: 24px;
        margin-bottom: 6px;
        text-align: center;
        color: #131e46;
    }

    .register-right .form-subtitle {
        font-size: 14px;
        color: #C70039;
        margin-bottom: 20px;
        text-align: center;
        font-style: italic;
    }

    .register-right .form-wrapper {
        width: 100%;
    }

    /* Responsive mobile */
    @media (max-width: 768px) {
        .register-row {
            flex-direction: column;
        }

        .register-left,
        .register-right {
            flex: 1 1 100%;
        }

        .register-left {
            margin-bottom: 30px;
        }

        .register-section .section-title {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .register-left .content-title {
            font-size: 20px;
            margin-bottom: 14px;
        }

        .register-left .content-list {
            padding-left: 12px;
            font-size: 16px;
        }

        .register-section {
            padding: 25px 0;
            padding-bottom: 0;
        }

        .register-row {
            gap: 10px;
        }

        .register-right { 
            padding-bottom: 0;
            padding-left: 15px;
            padding-right: 15px;
        }


    }
</style>