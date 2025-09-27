<?php
/* Template Name: Bảng sàng lọc SKTT GAD-7 */
get_header();
?>
<div class="row sktt-gad-print">
  <div class="col medium-12 small-12 large-12">
    <div class="header-sktt-gad">
      <div class="box-header text-center">
        <div class="logo-header-gad">
          <img width="250" height="100"
            src="/wp-content/uploads/2025/03/481249453_661463903220155_6836010531183258319_n-e1743049861484-1024x487.jpg"
            class="header_logo header-logo" alt="Phòng khám TestSGN">
        </div>
        <h3>BẢNG SÀNG LỌC SỨC KHOẺ TINH THẦN <strong>(GAD-7)</strong></h3>
      </div>

      <div class="box-customer">
        <div class="customer-box-l">
          <p><strong>Mã khách hàng:</strong> <input type="text" id="maKH"></p>
          <p><strong>Ngày sàng lọc:</strong> <input type="date" id="ngaySL"></p>
        </div>
        <div class="customer-box-l">
          <p><strong>Số điện thoại:</strong> <input type="text" id="phoneKH"></p>
          <p><strong>Chữ ký khách hàng:</strong> <input type="text" id="signKH"></p>
        </div>
      </div>
    </div>

    <div class="box-wh">
      <h3>Trong 2 tuần qua, bạn có thường xuyên bị làm phiền bởi bất kỳ vấn đề nào sau đây không?</h3>
      <?php
      $questions = [
        'Cảm thấy căng thẳng, lo lắng hoặc bất an',
        'Không thể ngừng hoặc kiểm soát được lo lắng',
        'Lo lắng quá mức về các vấn đề khác nhau',
        'Khó cảm thấy thư giãn',
        'Bứt rứt, bồn chồn không thể ngồi yên',
        'Dễ bực tức hoặc dễ bị làm phiền',
        'Cảm thấy sợ sắp có điều gì đó tồi tệ có thể xảy ra',
      ];

      $answers = [
        '0' => 'Không chút nào',
        '1' => 'Một vài ngày',
        '2' => 'Quá nửa số ngày',
        '3' => 'Gần như hằng ngày',
      ];

      foreach ($questions as $index => $question) {
        $qNum = $index + 1;
        echo '<div class="box-wh-one">';
        echo "<p><strong>{$qNum}. {$question}</strong></p><div class='ans-wh-o'>";
        foreach ($answers as $val => $text) {
          echo "<div>";
          echo "<input type='radio' id='q{$qNum}_{$val}' name='q{$qNum}' value='{$val}'>";
          echo "<label for='q{$qNum}_{$val}'>{$text}</label>";
          echo "</div>";
        }
        echo '</div></div>';
      }
      ?>
      <div id="resultView"></div>
      <p class="resultViewNote"></p>
    </div>

  </div>
</div>

<div class="box-btn-print-file">
  <button type="button" id="btnViewResult">Xem kết quả</button>
  <button type="button" id="btnPrint">Điền thông tin</button>
</div>

<script>
  const today = new Date().toISOString().split('T')[0];
  document.getElementById('ngaySL').value = today;

  function updateTotal() {
    let total = 0, answered = 0;

    for (let i = 1; i <= 7; i++) {
      const sel = document.querySelector(`input[name="q${i}"]:checked`);
      if (sel) {
        total += parseInt(sel.value);
        answered++;
      }
    }

    document.querySelectorAll(".ans-wh-o > div").forEach(d => d.classList.remove("active"));
    document.querySelectorAll("input[type='radio']:checked").forEach(r => r.closest("div").classList.add("active"));

    const viewResultBtn = document.querySelector("#btnViewResult");
    if (answered === 7) viewResultBtn.classList.add("show");
    else viewResultBtn.classList.remove("show");
  }

  document.querySelectorAll('input[type="radio"]').forEach(r => r.addEventListener('change', updateTotal));
  updateTotal();

  document.getElementById('btnViewResult').addEventListener('click', function () {
    const result = calculateLevel();
    document.getElementById("resultView").innerHTML =
      `Kết quả khảo sát:<br>` +
      `Lo âu (GAD-7): ${result.gadLevel}`;
    document.querySelector(".resultViewNote").innerHTML =
      `* Nếu bạn cần biết thêm thông tin chi tiết vui lòng điền vào form tư vấn để bác sĩ hỗ trợ trực tiếp.`;

    this.classList.remove("show");
    document.querySelector("#btnPrint").classList.add("show");
  });

  function calculateLevel() {
    let gad7 = 0;

    for (let i = 1; i <= 7; i++) {
      gad7 += parseInt(document.querySelector(`input[name="q${i}"]:checked`)?.value || 0);
    }
    let gadLevel = '';
    if (gad7 >= 15) {
      gadLevel = `Mức độ lo âu nặng`;
    } else if (gad7 >= 10) {
      gadLevel = `Mức độ lo âu trung bình`;
    } else if (gad7 >= 5) {
      gadLevel = `Mức độ lo âu nhẹ`;
    } else {
      gadLevel = `Không lo âu`;
    }
    return { gad7, gadLevel };
  }

  document.getElementById('btnPrint').addEventListener('click', function () {
    const cf7Link = document.querySelector('a[href="#popup-booking-form"]');
    if (cf7Link) {
      setTimeout(() => {
        const textarea = document.querySelector('#popup-booking-form textarea');
        if (textarea) {
          const pageTitle = document.title;
          textarea.value = `${document.getElementById("resultView").innerText}\nTrang: ${pageTitle}\nLink: ${window.location.href}`;
        }
      }, 500);
      cf7Link.click();
    }
  });

  document.addEventListener('wpcf7mailsent', function (event) {
    const inputs = event.detail.inputs;
    let maKH = '', phoneKH = '';
    inputs.forEach(input => {
      if (input.name === 'your-name') maKH = input.value;
      if (input.name === 'your-subject') phoneKH = input.value;
    });

    document.querySelector('#maKH').value = maKH;
    document.querySelector('#phoneKH').value = phoneKH;

    window.print();
    const BASE = window.location.origin;
    window.location.href = `${BASE}/phieu-khao-sat-slsk/`;
  });
</script>
<?php get_footer(); ?>