<section class="approach-banner" aria-label="Phương pháp tiếp cận">
  <picture>
    <!-- Mobile <= 768px -->
    <source
      media="(max-width: 768px)"
      srcset="https://testsgn.clinic/wp-content/uploads/2026/01/layout-trang-suc-khoe-tinh-than-6-1.png"
    />

    <!-- PC -->
    <img
      class="approach-banner__img"
      src="https://testsgn.clinic/wp-content/uploads/2026/01/layout-trang-suc-khoe-tinh-than-2-1.png"
      alt="Phương pháp tiếp cận"
      loading="lazy"
      decoding="async"
    />
  </picture>
</section>


<style>
    /* SECTION FULL-WIDTH (full bleed) */
    .approach-banner {
        /* Full ra sát mép màn hình dù đang nằm trong container của theme */
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;

        /* Màu nền dự phòng (nếu ảnh load chậm) */
        background: #cfe7fb;

        /* Không tạo khoảng trắng lạ */
        line-height: 0;
        padding: 0;
    }

    /* ẢNH: không biến dạng, tự co giãn theo width */
    .approach-banner__img {
        display: block;
        width: 100%;
        height: auto;
        /* QUAN TRỌNG: không méo */
        max-width: none;
        /* cho phép full 100vw */
    }

    /* Nếu theme/elementor có rule làm ảnh bị giới hạn */
    .approach-banner img {
        max-width: none;
    }

 
</style>