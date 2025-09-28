<!-- Fancybox CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<!-- Section -->
<?php
// Lấy dữ liệu từ ACF Option Page
$title      = 'Giấy phép hoạt động - Giấy chứng nhận'; // Có thể thêm field text riêng nếu muốn quản lý title
$desc       = 'Đây là phần mô tả cho các giấy phép và chứng nhận của chúng tôi. Tất cả đều minh bạch và được cấp bởi cơ quan có thẩm quyền.'; // Có thể thêm field text/textarea riêng nếu muốn
$licenses   = get_field('license_gallery', 'option'); // Gallery field
?>

<section class="license-section">
    <div class="container">
        <?php if ($title): ?>
            <h2 class="license-title"><?php echo esc_html($title); ?></h2>
        <?php endif; ?>

        <?php if ($desc): ?>
            <p class="license-desc"><?php echo esc_html($desc); ?></p>
        <?php endif; ?>

        <?php if (!empty($licenses)): ?>
            <div class="license-grid">
                <?php foreach ($licenses as $license): ?>
                    <div class="license-item">
                        <a href="<?php echo esc_url($license['url']); ?>" data-fancybox="licenses">
                            <img src="<?php echo esc_url($license['url']); ?>" alt="<?php echo esc_attr($license['alt']); ?>">
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

<style>
    .license-section {
    padding: 40px 0;
}

.license-title {
    text-align: center;
    font-size: 40px;
    margin-bottom: 20px;
    font-weight: bold;
    color: #131e46;
}

.license-desc {
    text-align: center;
    font-size: 18px;
    max-width: 700px;
    margin: 0 auto 30px;
    line-height: 1.6;
}

.license-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
}

.license-item img {
    width: 100%;
    height: 250px;
    border-radius: 6px;
    display: block;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
}

.license-item img:hover {
    transform: scale(1.05);
}

/* Responsive */
@media (max-width: 768px) {
    .license-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .license-title {
        font-size: 30px;
        margin-bottom: 15px;
    }

    .license-desc {
        font-size: 16px;
        text-align: justify;
    }
}

</style>