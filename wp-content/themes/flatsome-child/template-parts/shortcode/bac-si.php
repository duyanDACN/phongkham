<section class="doctor-section">
    <div class="container">
        <h2 class="doctor-title">Đội ngũ y tế</h2>

        <div class="doctor-slider-wrapper">
            <!-- Nút Prev -->
            <div class="swiper-button-prev doctor-prev"></div>

            <!-- Slide -->
            <div class="swiper doctor-swiper">
                <div class="swiper-wrapper">
                    <?php if (have_rows('doctor_repeater', 'option')): ?>
                        <?php while (have_rows('doctor_repeater', 'option')): the_row();
                            $image = get_sub_field('doctor_image');
                            $name = get_sub_field('doctor_name');
                            $rating = get_sub_field('doctor_rating');
                            $visits = get_sub_field('doctor_visits');
                            $specialty = get_sub_field('doctor_specialty');
                            $price = get_sub_field('doctor_price');
                            $role = get_sub_field('doctor_role');
                        ?>
                            <div class="swiper-slide doctor-box">
                                <div class="doctor-img">
                                    <?php if ($image): ?>
                                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($name); ?>">
                                    <?php endif; ?>
                                </div>
                                <div class="doctor-stats">
                                    <span class="rating">Đánh giá <?php echo esc_html($rating); ?> ⭐</span>
                                    <span class="visits">Lượt khám: <?php echo esc_html($visits); ?></span>
                                </div>
                                <h3 class="doctor-name"><?php echo esc_html($name); ?></h3>
                                <p class="doctor-specialty">🩺 <?php echo esc_html($specialty); ?></p>
                                <p class="doctor-price">💰 <?php echo esc_html($price); ?></p>
                                <p class="doctor-role">👨‍⚕️ <?php echo esc_html($role); ?></p>
                                <a href="#popup-booking-form" class="doctor-btn">Tư vấn ngay</a>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Nút Next -->
            <div class="swiper-button-next doctor-next"></div>
        </div>
    </div>
</section>

<style>
    .doctor-section {
        padding: 40px 0;
        text-align: center;
    }

    .doctor-next {
        right: -55px !important;
        top: 55% !important;
    }

    .doctor-prev {
        left: -55px !important;
        top: 55% !important;
    }

    .doctor-title {
        font-size: 40px;
        margin-bottom: 30px;
        color: #131e46;
    }

    .doctor-slider-wrapper {
        position: relative;
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .doctor-swiper {
        flex: 1;
        padding: 10px;
    }

    .doctor-box {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        padding: 15px;
        text-align: center;
    }

    .doctor-img img {
        width: 130px;
        height: 130px;
        object-fit: cover;
        border-radius: 50%;
        display: block;
        margin: 0 auto 10px;
    }

    .doctor-stats {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
        font-size: 14px;
    }

    .doctor-name {
        font-size: 18px;
        margin: 8px 0;
        text-align: left;
    }

    .doctor-specialty,
    .doctor-price,
    .doctor-role {
        font-size: 14px;
        margin: 10px 0 !important;
        display: flex;
        align-items: center;
        gap: 6px;
        justify-content: center;
    }

    .doctor-btn {
        display: inline-block;
        margin-top: 10px;
        padding: 7px 16px;
        background: #131e46;
        color: #fff;
        border-radius: 6px;
        text-decoration: none;
        transition: 0.3s;
        width: 100%;
    }

    .doctor-btn:hover {
        background: #005bb5;
    }

    .doctor-btn:hover {
        background: #C70039;
        color: #fff;
    }

    .doctor-prev,
    .doctor-next {
        background: #131e46;
        color: #fff;
        border-radius: 50%;
        width: 40px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }

    .doctor-prev::after,
    .doctor-next::after {
        font-size: 18px;
        color: #fff;
    }

    .doctor-specialty,
    .doctor-price,
    .doctor-role {
        font-size: 14px;
        margin: 4px 0;
        display: flex;
        align-items: center;
        gap: 6px;
        justify-content: flex-start;
        /* Căn trái */
        text-align: left;
        /* Căn chữ bên trái */
    }

    @media (max-width: 768px) {
        .doctor-section {
            padding: 0;

        }

        .doctor-title {
            font-size: 32px;
        }

        .doctor-prev,
        .doctor-next {
            width: 35px;
            height: 35px;
        }

        .doctor-next {
            right: -11px !important;
        }

        .doctor-prev {
            left: -11px !important;
        }


    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        if (typeof Swiper !== "undefined") {
            var doctorSwiper = new Swiper(".doctor-swiper", {
                slidesPerView: 4,
                spaceBetween: 20,
                slidesPerGroup: 1,
                loop: true, // Lặp vô tận
                // autoplay: {
                //     delay: 3000, // 3 giây chuyển slide
                //     disableOnInteraction: false // User kéo tay vẫn chạy auto
                // },
                navigation: {
                    nextEl: ".doctor-next",
                    prevEl: ".doctor-prev",
                },
                breakpoints: {
                    0: {
                        slidesPerView: 1
                    },
                    768: {
                        slidesPerView: 4
                    }
                }
            });
        } else {
            console.error("Swiper library chưa load!");
        }
    });
</script>