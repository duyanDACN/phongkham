<section class="promotion-section">
    <div class="container">
        <h2 class="promotion-title">Khuyến mãi chính</h2>

        <!-- PHẦN MỚI THÊM -->
         <div class="container-header-extra">
        <div class="promotion-header-extra">
            <div class="promotion-left">
                    <div class="tit-head-mb">
                <div class="promo-line-1">XÉT NGHIỆM HIV</div>
                <div class="promo-line-2">MIỄN PHÍ</div>
                </div>
                <!-- Đưa nút xuống dưới -->
                 <div class="promotion-btn-mb">
                <a href="#form-tu-van" class="promotion-btn promo-btn-header promo-btn-under">Đăng ký ngay</a>
                </div>
            </div>
            <div class="promotion-right">
                <?php $image_header = get_field('promotion_image_header','option')?>
                <!-- Thêm ảnh tạm (link ảnh còn hoạt động) -->
                <img src="<?php echo $image_header['url']?>"
                    alt="Khuyến mãi xét nghiệm"
                    class="promotion-right-image">
            </div>
        </div>
        </div>
        <!-- KẾT THÚC PHẦN MỚI -->

        <div class="promotion-slider-wrapper">
            <div class="promotion-prev">❮</div>
            <div class="promotion-next">❯</div>

            <div class="promotion-slider swiper">
                <div class="swiper-wrapper">
                    <?php if (have_rows('promotion_boxes', 'option')): ?>
                        <?php while (have_rows('promotion_boxes', 'option')): the_row();
                            $promotion_name = get_sub_field('promotion_name');
                            $promotion_name_2 = get_sub_field('promotion_name_2');
                            $price_before = get_sub_field('price_before');
                            $price_after = get_sub_field('price_after');
                            $pro_image = get_sub_field('promotion_image');
                        ?>
                            <div class="swiper-slide promotion-box">
                                <!-- HÌNH ẢNH THÊM MỚI -->
                                <div class="promotion-image">
                                    <img src="<?php echo $pro_image['url'] ?>" alt="<?php echo $pro_image['alt'] ?>" />
                                </div>
                                <!-- HẾT HÌNH ẢNH -->

                                <h3 class="promotion-subtitle"><?php echo esc_html($promotion_name); ?></h3>
                                <div class="title-2-pro"><?php echo esc_html($promotion_name_2); ?></div>
                                <div class="price">
                                    Giá :
                                    <span class="price-before"><?php echo $price_before ?></span> /
                                    <span class="price-after"><?php echo $price_after ?></span>
                                </div>

                                <?php if (have_rows('promotion_items')): ?>
                                    <ul class="promotion-list">
                                        <?php while (have_rows('promotion_items')): the_row();
                                            $item_text = get_sub_field('item_text');
                                        ?>
                                            <li>
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="green" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M6 10.2L3.3 7.5 2.6 8.2 6 11.6 14 3.6 13.3 2.9 6 10.2Z" />
                                                </svg>
                                                <?php echo esc_html($item_text); ?>
                                            </li>
                                        <?php endwhile; ?>
                                        <li>*Chưa bao gồm phí thăm khám và các xét nghiệm bắt buộc quy định bởi Sở Y Tế</li>
                                    </ul>
                                <?php endif; ?>
                                <div class="row-btn-km">
                                    <div class="btn-dk-km">
                                        <a href="https://calendar.google.com/calendar/u/0/appointments/schedules/AcZssZ36LylqEd6jMPKmlj6-BF9hP_PjzL7yWExwe0ARkhnztKkjouiJYr8Tln_CyoZK1FdGlR7dcL2W" class="promotion-btn btn-zoom-animation">Đặt lịch ngay</a>
                                    </div>

                                    <div class="btn-dk-km">
                                        <a href="#form-tu-van" class="promotion-btn btn-zoom-animation">Tư vấn ngay</a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .promotion-section {
        padding: 30px 0 60px;
        background: linear-gradient(135deg, #ffffff 0%, #e6f2ff 100%);
        background-attachment: fixed;
    }

    .row-btn-km {
        display: flex;
        gap: 20px;
        justify-content: center;
    }

    .promotion-slider {
        padding: 10px;
    }

    .container-header-extra {
        padding: 0 10px;
    }

    .promotion-title {
        text-align: center;
        font-size: 40px;
        margin-bottom: 50px;
        color: #0073e6;
        font-weight: bold;
    }

    /* --- PHẦN MỚI --- */
    .promotion-header-extra {
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        border-radius: 14px;
        /* background: #7cbeff; */
        box-shadow: 0 2px 8px rgba(0, 115, 230, 0.4);
    }

    .promotion-left {
        width: 50%;
        text-align: left;
    }

    .promo-line-1 {
        font-size: 20px;
        font-weight: 600;
        color: #090e21;
    }

    .promo-line-2 {
        font-size: 45px;
        font-weight: 800;
        color: #0073e6;
        margin-top: 4px;
    }

    .promotion-right {
        width: 50%;
        text-align: right;
    }

    .promo-btn-header {
        font-size: 21px;
        padding: 17px 24px;
        border-radius: 8px;
        background-color: #0073e6;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .promo-btn-header:hover {
        background-color: #005bb5;
        color: #fff;
    }

    /* --- HÌNH ẢNH TRONG BOX --- */
    .promotion-image {
        text-align: center;
        margin-bottom: 15px;
    }

    .promotion-image img {
        width: 100%;
        height: 270px;
        object-fit: cover;
        border-radius: 12px;
    }

    /* --- PHẦN CŨ --- */
    .price {
        padding: 14px 0px;
        font-weight: 700;
        color: #fff;
    }

    .price-before {
        color: #fff;
        text-decoration: line-through;
        font-weight: bold;
    }

    .price-after {
        color: #fff;
        font-weight: bold;
    }

    .btn-dk-km a {
        display: inline-block;
        margin-top: 15px;
        padding: 9px 17px;
        font-size: 18px;
        background-color: #fff;
        color: #090e21;
        font-weight: 600;
        text-decoration: none;
        border-radius: 6px;
        transition: background-color 0.3s;
        cursor: pointer;
        animation: pulse 2s infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1);
            box-shadow: 0 0 0 0 rgba(0, 115, 230, 0.4);
        }

        50% {
            transform: scale(1.06);
            box-shadow: 0 0 15px rgba(0, 115, 230, 0.4);
        }
    }

    .btn-dk-km a:hover {
        background-color: #005bb5;
    }

    .promotion-slider-wrapper {
        position: relative;
        overflow: visible;
    }

    .promotion-prev,
    .promotion-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 17px;
        color: #131e46;
        cursor: pointer;
        z-index: 10;
    }

    .promotion-prev {
        left: -14px !important;
    }

    .promotion-next {
        right: -14px !important;
    }

    .promotion-box {
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 115, 230, 0.4);
        background: #0073e6;
        min-height: 575px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .promotion-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .promotion-subtitle {
        font-size: 30px;
        color: #fff;
        font-weight: 600;
        margin-bottom: 0;
        text-align: left;
    }

    .title-2-pro {
        font-size: 26px;
        color: #fff;
        font-weight: 600;
        text-align: left;
    }

    .promotion-list {
        min-height: 225px;
        margin-bottom: 0;
    }

    .promotion-list li {
        display: flex;
        font-size: 17px;
        font-weight: 400;
        color: #fff;
    }

    .promotion-list li svg {
        margin-right: 0.5rem;
        margin-top: 5px;
    }

    .promotion-list li {
        display: flex;
        font-size: 17px;
        font-weight: 400;
        line-height: 1.5;
        margin-bottom: 6px;
    }

    .promotion-list li svg {
        flex-shrink: 0;
        /* không bị co lại */
        width: 18px;
        /* cố định kích thước icon */
        height: 18px;
        margin-right: 8px;
        fill: #fff;
        /* đảm bảo màu icon đồng nhất */
    }

    /* Đưa nút xuống dưới và căn giữa theo layout */
    .promo-btn-under {
        display: inline-block;
        font-size: 21px;
        padding: 14px 24px;
        border-radius: 8px;
        background-color: #0073e6;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .promo-btn-under:hover {
        background-color: #005bb5;
    }

    /* Ảnh bên phải */
    .promotion-right-image {
        height: 200px;
        width: 300px;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
    }

    /* Responsive */
    @media(max-width: 768px) {
        .promotion-header-extra {
            flex-direction: column;
            text-align: center;
        }

        .title-2-pro {
            font-size: 22px;
        }


        .promotion-section {
            padding: 0px 0 20px;
        }

        .promotion-left,
        .promotion-right {
            width: 100%;
        }

        .promo-line-1 {
            font-size: 16px;
        }

        .promo-line-2 {
            font-size: 33px;
        }

        .promotion-right {
            margin-top: 15px;
        }

        .promotion-title {
            font-size: 30px;
            padding-top: 30px;
            margin-bottom: 30px;
        }

        .promotion-header-extra {
            margin-bottom: 30px;
        }

        .promotion-box {
            min-height: auto;
            box-shadow: none;
        }

        .promotion-slider {
            padding: 0;
        }

        .promotion-right {
            text-align: right;
        }

        .btn-dk-km a {
            font-size: 16px;
        }

        .promotion-image {
            margin-bottom: 20px;
        }

        .promotion-image img {
            height: 220px;
        }

        .promotion-subtitle {
            font-size: 28px;
        }

        .promotion-list li {
            font-size: 16px;
        }

        .promotion-header-extra {
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        .promotion-right {
            margin-top: 20px;
        }

        .promotion-right-image {
            width: 100%;
        }

        .container-header-extra {
            padding: 0;
        }

        .promotion-header-extra {
            padding: 0;
            box-shadow :none;
        }

        .promotion-left {
            display: flex;
            text-align: left;
            justify-content: space-between;   
            align-items: center;
        }

        .promo-btn-under {
            font-size: 19px;
            padding: 12px 18px;
        }


    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof Swiper !== "undefined") {
            var promoSlider = new Swiper(".promotion-slider", {
                slidesPerView: 1,
                loop: false,
                navigation: {
                    nextEl: ".promotion-next",
                    prevEl: ".promotion-prev",
                },
                breakpoints: {
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    }
                }
            });
        }
    });
</script>