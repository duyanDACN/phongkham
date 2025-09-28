<section class="gallery-section">
  <div class="container">
    <h2 class="gallery-title">Hình ảnh</h2>
    
    <div class="gallery-slider-wrapper" style="position: relative;">
      <!-- Nút Prev nằm ngoài slider -->
      <div class="gallery-prev" style="position: absolute; left: -40px; top: 50%; transform: translateY(-50%); z-index: 10; cursor: pointer;">&#10094;</div>
      
      <!-- Slider -->
      <div class="swiper gallery-swiper">
        <div class="swiper-wrapper">
          <?php 
          $gallery = get_field('image_page', 'option'); // Lấy gallery từ ACF option
          if ($gallery):
            foreach ($gallery as $image):
          ?>
          <div class="swiper-slide gallery-slide">
            <div class="gallery-box">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
          </div>
          <?php 
            endforeach;
          endif; 
          ?>
        </div>
      </div>

      <!-- Nút Next nằm ngoài slider -->
      <div class="gallery-next" style="position: absolute; right: -40px; top: 50%; transform: translateY(-50%); z-index: 10; cursor: pointer;">&#10095;</div>
    </div>
    
  </div>
</section>

<style>
    .gallery-section {
  padding: 40px 0;
}

.gallery-title {
    text-align: center;
    font-size: 40px;
    margin-bottom: 30px;
    color: #131e46;
}

.gallery-box {
  border-radius: 10px;
  overflow: hidden;
  height: 200px;
}

.gallery-box img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
}

/* Optional: custom style nút Prev/Next */
.gallery-prev,
.gallery-next {
  font-size: 30px;
  color: #131e46;
  user-select: none;
}
.gallery-prev:hover,
.gallery-next:hover {
  color: #007bff;
}

@media (max-width: 768px) {
    .gallery-next {
        right: -15px !important;
        font-size: 24px !important;
    }

    .gallery-prev {
        left: -15px !important;
        font-size: 24px !important;
    }

    .gallery-title {
        font-size: 30px;
    }
}

</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
  if (typeof Swiper !== "undefined") {
    var gallerySwiper = new Swiper(".gallery-swiper", {
      slidesPerView: 4,
      spaceBetween: 20,
      loop: true, // scroll vô tận
      navigation: {
        nextEl: ".gallery-next",
        prevEl: ".gallery-prev",
      },
      breakpoints: {
        0: { slidesPerView: 2 },
        768: { slidesPerView: 4 }
      }
    });
  }
});

</script>