<section class="clinic-section">
    <div class="container">
        <?php
        $title = get_field('clinic-title', 'option');
        $intro = get_field('clinic-intro', 'option');
        $list  = get_field('clinic-list', 'option');
        $image = get_field('clinic-image', 'option');
        ?>

        <?php if ($title): ?>
            <h2 class="clinic-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <div class="clinic-row">
            <!-- Phần trái -->
            <div class="clinic-left">
                <?php if ($intro): ?>
                    <p class="clinic-intro"><?php echo esc_html($intro); ?></p>
                <?php endif; ?>

                <?php if ($list): ?>
                    <ul class="clinic-list">
                        <?php foreach ($list as $item): ?>
                            <li><?php echo esc_html($item['item']); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <div class="btn-dang-ky">
                    <a href="#popup-booking-form">Đăng ký</a>
                </div>
            </div>

            <!-- Phần phải -->
            <div class="clinic-right">
                <?php if ($image): ?>
                    <img src="<?php echo esc_url($image); ?>" alt="Ảnh phòng khám" />
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<style>
    .clinic-section {
        padding: 60px 0;
    }

    .clinic-title {
        text-align: center;
        font-size: 40px;
        margin-bottom: 60px;
        color: #131e46;
    }

    .btn-dang-ky {
        text-align: center;
        margin-top: 10px;
    }

    .btn-dang-ky a {
        padding: 8px 30px;
        background: #131e46;
        color: #fff;
        border-radius: 8px;
    }

    /* Layout 2 cột */
    .clinic-row {
        display: flex;
        align-items: stretch;
        /* 2 cột cao bằng nhau */
        justify-content: space-between;
        flex-wrap: nowrap;
    }

    .clinic-left,
    .clinic-right {
        width: 50%;
        box-sizing: border-box;
        padding: 0 10px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        /* Căn giữa dọc */
    }

    /* Text intro */
    .clinic-intro {
        font-size: 26px;
        margin-bottom: 10px;
        color: #C70039;
        font-weight: 500;
    }

    /* List tiêu chí */
    .clinic-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .clinic-list li {
        font-size: 18px;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
    }

    /* Ảnh full box bên phải */
    .clinic-right img {
        width: 100%;
        height: auto;
        /* giữ tỉ lệ ảnh */
        max-height: 400px;
        /* giới hạn chiều cao */
        object-fit: cover;
        display: block;
        margin: 0 auto;
        /* căn giữa ngang */
        border-radius: 16px;
    }

    /* Mobile: mỗi phần chiếm 100% */
    @media (max-width: 768px) {
        .clinic-row {
            flex-wrap: wrap;
        }

        .clinic-left,
        .clinic-right {
            width: 100%;
            padding: 0;
            justify-content: flex-start;
            /* Mobile thì căn trên tự nhiên */
        }

        .clinic-right img {
            max-height: none;
        }

        .clinic-section {
            padding: 45px 0;
        }

        .clinic-title {
            font-size: 26px;
            margin-bottom: 17px;
        }

        .clinic-intro {
            font-size: 18px;
            margin-bottom: 15px;
        }

        .clinic-list li {
            font-size: 16px;
            margin-bottom: 12px;
            padding-left: 10px;
        }

        .clinic-right {
            margin-top: 13px;
        }

        .btn-dang-ky {
            margin-bottom: 20px;
        }

    }
</style>