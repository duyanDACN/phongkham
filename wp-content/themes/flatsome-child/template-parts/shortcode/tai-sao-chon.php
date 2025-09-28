<?php
$title = get_field('why_choose_title', 'option');
$desc = get_field('why_choose_desc', 'option');
$items = get_field('why_choose_items', 'option');
?>
<section class="why-choose-section">
  <div class="container">
    <div class="why-choose-row">
      <!-- Phần trái -->
      <div class="why-choose-left">
        <h2 class="why-choose-title"><?php echo esc_html($title); ?></h2>
        <div class="why-choose-text">
          <?php echo $desc; // WYSIWYG, giữ HTML ?>
        </div>
      </div>

      <!-- Phần phải -->
      <div class="why-choose-right">
        <?php if($items): ?>
          <?php foreach($items as $index => $item): ?>
            <div class="why-choose-item <?php echo $index === 0 ? 'active' : ''; ?>">
              <div class="item-header">
                <div class="header-left">
                  <img src="<?php echo esc_url($item['why_choose_item_image']['url']); ?>" alt="Icon" />
                  <h3><?php echo esc_html($item['why_choose_item_title']); ?></h3>
                </div>
                <span class="toggle-icon"><?php echo $index === 0 ? '-' : '+'; ?></span>
              </div>
              <div class="item-content">
                <?php echo $item['why_choose_item_content']; // WYSIWYG ?>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<style>
  .why-choose-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 40px;
  }

  .why-choose-left,
  .why-choose-right {
    flex: 1 1 50%;
  }

  .why-choose-title {
    font-size: 40px;
    margin-bottom: 10px;
    color: #131e46;
  }

  .why-choose-text {
    font-size: 16px;
    line-height: 1.6;
    text-align: justify;
  }

  .why-choose-item {
    border-bottom: 1px solid #ddd;
    padding: 10px 0;
  }

  .why-choose-item:last-child {
    border-bottom: none;
  }

  .why-choose-right .item-content p {
    padding-left: 45px;
    margin-bottom: 3px;
  }

  .item-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    cursor: pointer;
  }

  .header-left {
    display: flex;
    align-items: center;
    gap: 10px;
  }

  .header-left img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
  }

  .item-header h3 {
    margin: 0;
    font-size: 18px;
    color: #C70039;
  }

  .toggle-icon {
    font-size: 20px;
    font-weight: bold;
  }

  /* Nội dung với hiệu ứng */
  .item-content {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
    padding-top: 0;
  }

  .why-choose-item.active .item-content {
    padding-top: 5px;
  }

  /* Responsive */
  @media (max-width: 768px) {
    .why-choose-row {
      flex-direction: column;
      align-items: flex-start;
    }

    .why-choose-left,
    .why-choose-right {
      flex: 1 1 100%;
    }

    .why-choose-title {
        font-size: 28px;
    }

    .why-choose-text {
        margin-bottom: 0;
    }

    .item-header h3 {
        font-weight: 500;
    }

    .why-choose-right .item-content p {
        padding-left: 0;
    }

    .why-choose-row {
        gap: 0;
    }
  }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
  const items = document.querySelectorAll(".why-choose-item");

  items.forEach((item, index) => {
    const header = item.querySelector(".item-header");
    const content = item.querySelector(".item-content");
    const icon = item.querySelector(".toggle-icon");

    // Mở item đầu tiên khi load
    if(index === 0) {
      content.style.maxHeight = content.scrollHeight + "px";
      icon.textContent = "-";
      item.classList.add("active");
    }

    header.addEventListener("click", () => {
      const isActive = item.classList.contains("active");

      // Đóng tất cả item
      items.forEach((i) => {
        const c = i.querySelector(".item-content");
        i.classList.remove("active");
        c.style.maxHeight = 0;
        i.querySelector(".toggle-icon").textContent = "+";
      });

      // Mở item vừa click nếu chưa mở
      if (!isActive) {
        item.classList.add("active");
        content.style.maxHeight = content.scrollHeight + "px";
        icon.textContent = "-";
      }
    });
  });
});
</script>
