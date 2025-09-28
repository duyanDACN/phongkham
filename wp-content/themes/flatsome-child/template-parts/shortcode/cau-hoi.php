<section class="faq-section">
  <div class="container">
    <h2 class="faq-title">Câu hỏi thường gặp</h2>

    <?php if (have_rows('faq_list', 'option')): ?>
      <?php while (have_rows('faq_list', 'option')): the_row(); 
        $title = get_sub_field('title');
        $content = get_sub_field('content');
      ?>
        <div class="faq-item">
          <div class="faq-question">
            <?php echo esc_html($title); ?>
            <span class="faq-icon"></span>
          </div>
          <div class="faq-answer">
            <?php echo wp_kses_post($content); ?>
          </div>
        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <p>Chưa có câu hỏi nào.</p>
    <?php endif; ?>

  </div>
</section>

<style>
.faq-section {
  padding: 50px 0;
}

.faq-title {
    text-align: center;
    font-size: 40px;
    margin-bottom: 30px;
    font-weight: bold;
    color: #131e46;
}

.faq-item {
  background: #fff;
  margin-bottom: 15px;
  border-radius: 8px;
  overflow: hidden;
  box-shadow: 0 2px 8px rgb(19 30 70);
  transition: all 0.3s ease;
}

.faq-question {
  padding: 15px 20px;
  cursor: pointer;
  font-size: 18px;
  font-weight: 500;
  display: flex;
  justify-content: space-between;
  align-items: center;
  background: #f9f9f9;
}

.faq-question:hover {
  background: #f1f1f1;
}

.faq-icon {
  font-size: 20px;
  transition: transform 0.3s;
}

.faq-item.active .faq-icon::before {
  content: "-";
}

.faq-item:not(.active) .faq-icon::before {
  content: "+";
}

.faq-answer {
  max-height: 0;
  overflow: hidden;
  padding: 0 20px;
  border-top: 1px solid #ddd;
  background: #fff;
  transition: max-height 0.4s ease, padding 0.4s ease;
}

/* Khi mở ra sẽ có padding + max-height lớn */
.faq-item.active .faq-answer {
  max-height: 500px; /* Đủ lớn để chứa nội dung */
  padding: 15px 20px;
}

.faq-item.active .faq-question {
    background: #C70039;
    color: #fff;
}

/* Mobile Responsive */
@media (max-width: 768px) {
  .faq-question {
    font-size: 16px;
    padding: 12px 15px;
  }

  .faq-answer {
    font-size: 14px;
    padding: 0 15px;
  }

  .faq-title {
    font-size: 30px;
  }

}
</style>

<script>
const questions = document.querySelectorAll(".faq-question");

questions.forEach(item => {
  item.addEventListener("click", function() {
    const parent = this.parentElement;

    // Đóng tất cả câu hỏi khác
    document.querySelectorAll(".faq-item").forEach(faq => {
      if (faq !== parent) {
        faq.classList.remove("active");
      }
    });

    // Toggle câu hỏi hiện tại
    parent.classList.toggle("active");
  });
});
</script>
