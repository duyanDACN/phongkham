<section class="promotion-section">
    <div class="container">
        <h2 class="promotion-title">Khuyến mãi chính</h2>

        <!-- PHẦN MỚI THÊM -->
        <div class="promotion-header-extra">
            <div class="promotion-left">
                <div class="promo-line-1">XÉT NGHIỆM HIV</div>
                <div class="promo-line-2">MIỄN PHÍ</div>
            </div>
            <div class="promotion-right">
                <a href="#form-tu-van" class="promotion-btn promo-btn-header">Đăng ký ngay</a>
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
                                    <img src="<?php echo $pro_image['url']?>" alt="<?php echo $pro_image['alt']?>" />
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
        gap: 12px;
        justify-content: center;
    }

    .promotion-slider {
        padding: 10px;
    }

    .promotion-title {
        text-align: center;
        font-size: 40px;
        margin-bottom: 20px;
        color: #131e46;
        font-weight: bold;
    }

    /* --- PHẦN MỚI --- */
    .promotion-header-extra {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        flex-wrap: wrap;
    }

    .promotion-left {
        width: 50%;
        text-align: left;
    }

    .promo-line-1 {
        font-size: 24px;
        font-weight: 600;
        color: #131e46;
    }

    .promo-line-2 {
        font-size: 60px;
        font-weight: 800;
        color: #c70039;
        margin-top: 4px;
    }

    .promotion-right {
        width: 50%;
        text-align: right;
    }

    .promo-btn-header {
        font-size: 18px;
        padding: 10px 24px;
        border-radius: 8px;
        background-color: #131e46;
        color: #fff;
        text-decoration: none;
        font-weight: 600;
        transition: background-color 0.3s;
    }

    .promo-btn-header:hover {
        background-color: #c70039;
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
    }

    .price-before {
        color: #df1111;
        text-decoration: line-through;
        font-weight: bold;
    }

    .price-after {
        color: #001F3F;
        font-weight: bold;
    }

    .btn-dk-km a {
        display: inline-block;
        margin-top: 15px;
        padding: 9px 17px;
        font-size: 18px;
        background-color: #0073e6;
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        border-radius: 6px;
        transition: background-color 0.3s;
        cursor: pointer;
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
        box-shadow: 0 2px 3px rgb(19 30 70);
        background: #fff;
        min-height: 575px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .promotion-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .promotion-subtitle {
        font-size: 30px;
        color: #C70039;
        font-weight: 600;
        margin-bottom: 0;
        text-align: left;
    }

    .title-2-pro {
        margin-bottom: 20px;
        font-size: 25px;
        color: #C70039;
        font-weight: 600;
        text-align: left;
    }

    .promotion-list {
        min-height: 250px;
    }

    .promotion-list li {
        display: flex;
        font-size: 17px;
        font-weight: 400;
    }

    .promotion-list li svg {
        margin-right: 0.5rem;
        margin-top: 5px;
    }

    .promotion-list li {
    display: flex;
    align-items: center; /* canh giữa icon và chữ theo chiều dọc */
    font-size: 17px;
    font-weight: 400;
    line-height: 1.5;
    margin-bottom: 6px;
}

.promotion-list li svg {
    flex-shrink: 0; /* không bị co lại */
    width: 18px; /* cố định kích thước icon */
    height: 18px;
    margin-right: 8px;
    fill: green; /* đảm bảo màu icon đồng nhất */
}

    /* Responsive */
    @media(max-width: 768px) {
        .promotion-header-extra {
            flex-direction: column;
            text-align: center;
        }

        .promotion-left,
        .promotion-right {
            width: 100%;
        }

        .promo-line-1 {
            font-size: 16px;
        }

        .promo-line-2 {
            font-size: 35px;
        }

        .promotion-right {
            margin-top: 15px;
        }

        .promotion-title {
            font-size: 30px;
            margin-top: 30px;
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