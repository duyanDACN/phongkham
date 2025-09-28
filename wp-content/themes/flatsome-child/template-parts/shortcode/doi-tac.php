<?php
// Lấy dữ liệu từ ACF Option Page cho đối tác
$partner_title    = 'Đối tác phòng khám'; // Có thể dùng field text trong ACF nếu muốn
$partner_desc     = 'Chúng tôi trân trọng sự đồng hành và hỗ trợ từ các nhà tài trợ, tổ chức và đối tác chiến lược. Chính nhờ sự tin tưởng và hợp tác này, TestSGN có thể mở rộng dịch vụ, nâng cao chất lượng chăm sóc sức khỏe và lan tỏa giá trị tích cực đến cộng đồng.';
$partners_gallery = get_field('partners_gallery', 'option'); // Field Gallery cho đối tác
?>

<section class="partner-section">
    <div class="container">
        <?php if ($partner_title): ?>
            <h2 class="partner-title"><?php echo esc_html($partner_title); ?></h2>
        <?php endif; ?>

        <?php if ($partner_desc): ?>
            <p class="partner-desc"><?php echo esc_html($partner_desc); ?></p>
        <?php endif; ?>

        <?php if (!empty($partners_gallery)): ?>
            <div class="partner-grid">
                <?php foreach ($partners_gallery as $partner): ?>
                    <div class="partner-item">
                        <a href="<?php echo esc_url($partner['url']); ?>" data-fancybox="partners">
                            <img src="<?php echo esc_url($partner['url']); ?>" alt="<?php echo esc_attr($partner['alt']); ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
    .partner-section {
        padding: 40px 0;
    }

    .partner-title {
        text-align: center;
        font-size: 30px;
        margin-bottom: 20px;
        font-weight: bold;
        color: #131e46;
    }

    .partner-desc {
        text-align: center;
        font-size: 18px;
        max-width: 1200px;
        margin: 0 auto 30px;
        line-height: 1.6;
    }

    .partner-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 15px;
    }

    .partner-item img {
        width: 100%;
        height: 200px;
        object-fit: contain;
        border-radius: 6px;
        display: block;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    .partner-item img:hover {
        transform: scale(1.05);
    }

    /* Responsive */
    @media (max-width: 768px) {
        .partner-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .partner-section {
            padding: 20px 0;
        }

        .partner-desc {
            text-align: justify;
            font-size: 16px;
        }
    }
</style>