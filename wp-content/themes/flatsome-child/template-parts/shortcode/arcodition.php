<?php
// Lấy dữ liệu từ ACF Options Page
$accordions = get_field('accordion_items', 'option'); 
if($accordions):
?>
<section class="knowledge-section">
  <div class="container">
    <?php foreach($accordions as $item): ?>
      <div class="accordion">
        <div class="accordion-header">
          <span><?php echo esc_html($item['title']); ?></span>
          <span class="accordion-icon">+</span>
        </div>
        <div class="accordion-body">
          <?php echo $item['content']; // WYSIWYG đã có HTML ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>
<style>
/* Container và tiêu đề */
.knowledge-section {
  padding: 50px 0;
}
.knowledge-section .section-title {
  text-align: center;
  font-size: 2rem;
  margin-bottom: 30px;
  font-weight: bold;
}

/* Accordion */
.accordion {
  background: #fff;
  margin-bottom: 15px;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  overflow: hidden;
  transition: all 0.3s ease;
  cursor: pointer;
}

/* Header như button */
.accordion-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 15px 20px;
  font-weight: 500;
  border-bottom: 1px solid #eee;
  transition: background 0.3s, border 0.3s;
}

.accordion-header:hover {
  background: #f0f0f0;
}


/* Icon + / - */
.accordion-icon {
  font-size: 1.5rem;
  transition: transform 0.3s;
}

.accordion.active .accordion-header {
    background: #C70039;
    color: #fff;
}

/* Body */
.accordion-body {
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.3s ease, padding 0.3s ease;
  padding: 0 20px;
}

.accordion.active .accordion-body {
  padding: 15px 20px;
}

/* Khi active đổi icon */
.accordion.active .accordion-icon {
  transform: rotate(45deg);
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function() {
  const accordions = document.querySelectorAll(".accordion");

  accordions.forEach(acc => {
    acc.querySelector(".accordion-header").addEventListener("click", function() {
      
      accordions.forEach(a => {
        const body = a.querySelector(".accordion-body");
        if(a !== acc) {
          a.classList.remove("active");
          body.style.maxHeight = null;
        }
      });

      // Toggle accordion vừa click
      acc.classList.toggle("active");
      const body = acc.querySelector(".accordion-body");
      if(acc.classList.contains("active")) {
        body.style.maxHeight = body.scrollHeight + "px";
      } else {
        body.style.maxHeight = null;
      }

    });
  });
});
</script>
