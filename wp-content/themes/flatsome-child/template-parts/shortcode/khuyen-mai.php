<section class="promotion-section">
    <div class="container">
        <h2 class="promotion-title">Khuyến mãi chính</h2>

        <div class="promotion-slider-wrapper">
            <!-- Nút prev/next bên ngoài slider -->
            <div class="promotion-prev">❮</div>
            <div class="promotion-next">❯</div>

            <div class="promotion-slider swiper">
                <div class="swiper-wrapper">
                    <?php if (have_rows('promotion_boxes', 'option')): ?>
                        <?php while (have_rows('promotion_boxes', 'option')): the_row();
                            $promotion_name = get_sub_field('promotion_name');
                        ?>
                            <div class="swiper-slide promotion-box">
                                <h3 class="promotion-subtitle"><?php echo esc_html($promotion_name); ?></h3>
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
                                    </ul>
                                <?php endif; ?>
                                <div class="btn-dk-km">
                                    <a href="#popup-booking-form" class="promotion-btn">Đăng ký ngay</a>
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
        padding: 30px 0;
        padding-bottom: 60px;
    }

    .btn-dk-km {
        text-align: center;
    }

    .promotion-btn {
        display: inline-block;
        margin-top: 15px;
        padding: 5px 10px;
        background-color: #131e46;
        color: #fff;
        font-weight: 600;
        text-decoration: none;
        border-radius: 6px;
        transition: background-color 0.3s;
    }

    .promotion-btn:hover {
        background-color: #a3002f;
        color: #fff;
    }

    .promotion-title {
        text-align: center;
        font-size: 40px;
        margin-bottom: 30px;
        color: #131e46;
        font-weight: bold;
    }

    /* Slider wrapper */
    .promotion-slider-wrapper {
        position: relative;
        overflow: visible;
        /* cho prev/next hiển thị ngoài */
    }

    /* Prev/Next bên ngoài slider */
    .promotion-prev,
    .promotion-next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        font-size: 30px;
        font-weight: bold;
        color: #007bff;
        cursor: pointer;
        user-select: none;
        z-index: 10;
        transition: color 0.3s;
    }

    .promotion-prev:hover,
    .promotion-next:hover {
        color: #C70039;
    }

    .promotion-prev {
        left: -14px !important;
        font-size: 17px !important;
        color: #131e46 !important;
    }

    .promotion-next {
        right: -14px !important;
        font-size: 17px !important;
        color: #131e46 !important;
    }

    .promotion-slider {
        display: flex;
        padding: 10px 0;
    }

    .promotion-box {
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .promotion-box h3 {
        margin-bottom: 1rem;
        font-size: 25px;
        color: #C70039;
        font-weight: 400;
    }

    .promotion-list li {
        display: flex;
        align-items: center;
        margin-bottom: 0.5rem;
        font-size: 0.95rem;
    }

    .promotion-list li svg {
        margin-right: 0.5rem;
    }

    .promotion-list {
        min-height: 210px;
    }

    /* Hover effect desktop */
    @media(min-width: 768px) {
        .promotion-slider-wrapper .swiper-wrapper {
            display: flex;
        }

        .promotion-slider-wrapper .swiper-slide {
            flex: 1 1 30%;
            margin-right: 20px;
        }

        /* Ẩn prev/next trên desktop */
        .promotion-prev,
        .promotion-next {
            display: none;
        }

        .promotion-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        }

    }

    @media(max-width: 768px) {
        .promotion-section {
            padding: 0;
            padding-bottom: 60px;
        }

        .promotion-title {
            font-size: 30px;
        }

        .promotion-title {
            margin-bottom: 20px;
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
                        spaceBetween: 20
                    }
                }
            });
        }
    });
</script>