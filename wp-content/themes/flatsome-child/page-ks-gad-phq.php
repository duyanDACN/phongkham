<?php
/* Template Name: Bảng sàng lọc SKTT (PHQ-9 + GAD-7) */
get_header();
?>
<div class="row sktt-gad-print">
  <div class="col medium-12 small-12 large-12">
    <div class="header-sktt-gad">
      <div class="box-header text-center">
        <div class="logo-header-gad">
          <img width="250" height="100" src="/wp-content/uploads/2025/03/481249453_661463903220155_6836010531183258319_n-e1743049861484-1024x487.jpg" class="header_logo header-logo" alt="Phòng khám TestSGN">
        </div>
        <h3>BẢNG SÀNG LỌC SỨC KHOẺ TINH THẦN</h3>
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
      <?php
      $prefix = 'Trong 2 tuần qua, bạn có thường xuyên cảm thấy/bị ';
      $phq9_questions = [
          $prefix . 'ít hứng thú hay niềm vui khi làm việc gì đó?',
          $prefix . 'buồn bã, chán nản hoặc tuyệt vọng?',
          $prefix . 'khó ngủ, ngủ không ngon hoặc ngủ quá nhiều?',
          $prefix . 'mệt mỏi hoặc thiếu năng lượng?',
          $prefix . 'chán ăn hoặc ăn quá nhiều?',
          $prefix . 'cảm thấy bản thân tệ hại, thất bại hoặc khiến gia đình thất vọng?',
          $prefix . 'khó tập trung (ví dụ: khi đọc báo hoặc xem tivi)?',
          $prefix . 'cử động hoặc nói chậm đến mức người khác nhận thấy, hoặc ngược lại bồn chồn, bứt rứt hơn bình thường?',
          $prefix . 'có suy nghĩ rằng mình nên chết hoặc làm tổn thương bản thân?',
      ];

      $gad7_questions = [
          $prefix . 'lo lắng, bồn chồn hoặc căng thẳng?',
          $prefix . 'khó kiểm soát lo lắng?',
          $prefix . 'lo lắng quá nhiều về nhiều vấn đề khác nhau?',
          $prefix . 'khó thư giãn?',
          $prefix . 'bồn chồn đến mức khó ngồi yên?',
          $prefix . 'dễ bị kích thích hoặc cáu gắt?',
          $prefix . 'cảm thấy sợ hãi như thể có điều khủng khiếp sắp xảy ra?',
      ];

      $answers = [
        '0' => 'Không chút nào',
        '1' => 'Một vài ngày',
        '2' => 'Quá nửa số ngày',
        '3' => 'Gần như hằng ngày',
      ];

      echo "<h4>Phần 1: Thang tự đánh giá trầm cảm (PHQ-9)</h4>";
      foreach ($phq9_questions as $i => $q) {
        $num = $i + 1;
        echo "<div class='box-wh-one'>";
        echo "<p><strong>Câu {$num}:</strong> " . esc_html($q) . "</p><div class='ans-wh-o'>";
        foreach ($answers as $val => $text) {
          echo "<div><input type='radio' id='phq{$num}_{$val}' name='phq{$num}' value='{$val}'>";
          echo "<label for='phq{$num}_{$val}'>{$text}</label></div>";
        }
        echo "</div></div>";
      }

      echo "<h4>Phần 2: Thang tự đánh giá lo âu (GAD-7)</h4>";
      foreach ($gad7_questions as $i => $q) {
        $num = $i + 1;
        echo "<div class='box-wh-one'>";
        echo "<p><strong>Câu {$num}:</strong> " . esc_html($q) . "</p><div class='ans-wh-o'>";
        foreach ($answers as $val => $text) {
          echo "<div><input type='radio' id='gad{$num}_{$val}' name='gad{$num}' value='{$val}'>";
          echo "<label for='gad{$num}_{$val}'>{$text}</label></div>";
        }
        echo "</div></div>";
      }
      ?>
      <div id="resultView"></div>
      <p class="resultViewNote"></p>
    </div>
  </div>
</div>

<div class="box-btn-print-file">
   <p id="missingNote">
    * Vui lòng trả lời đầy đủ tất cả các câu hỏi trước khi xem kết quả
  </p>
  <button type="button" id="btnViewResult">Xem kết quả</button>
  <button type="btton" id="btnPrint">Điền thông tin</button>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
  const totalQuestions = 16;
  const btnViewResult   = document.getElementById('btnViewResult');
  const btnPrint        = document.getElementById('btnPrint');
  const btnGroup        = document.querySelector('.box-btn-print-file');
  const resultView      = document.getElementById('resultView');
  const resultNote      = document.querySelector('.resultViewNote');
  const missingNote     = document.getElementById('missingNote');

  function countAnswered() {
    return document.querySelectorAll('input[type="radio"]:checked').length;
  }

  function updateState() {
    const answered = countAnswered();

    if (answered === totalQuestions) {
      btnViewResult.classList.add("show");
      missingNote.style.display = 'none';
    } else {
      btnViewResult.classList.remove("show");
    }

    document.querySelectorAll(".ans-wh-o>div").forEach(d => d.classList.remove("active"));
    document.querySelectorAll("input[type='radio']:checked")
      .forEach(r => r.closest("div").classList.add("active"));
  }

  function calculateLevel() {
    let gad7 = 0;
    let phq9 = 0;

    for (let i = 1; i <= 9; i++) {
      const val = parseInt(document.querySelector(`input[name="phq${i}"]:checked`)?.value || 0);
      phq9 += val;
    }

    for (let i = 1; i <= 7; i++) {
      const val = parseInt(document.querySelector(`input[name="gad${i}"]:checked`)?.value || 0);
      gad7 += val;
    }

    let gadLevel = '';
    if (gad7 >= 15) gadLevel = 'Mức độ lo âu nặng';
    else if (gad7 >= 10) gadLevel = 'Mức độ lo âu trung bình';
    else if (gad7 >= 5)  gadLevel = 'Mức độ lo âu nhẹ';
    else gadLevel = 'Không lo âu';

    let phqLevel = '';
    if (phq9 >= 20) phqLevel = 'Mức độ trầm cảm rất nặng';
    else if (phq9 >= 15) phqLevel = 'Mức độ trầm cảm nặng';
    else if (phq9 >= 10) phqLevel = 'Mức độ trầm cảm trung bình';
    else if (phq9 >= 5)  phqLevel = 'Mức độ trầm cảm nhẹ';
    else phqLevel = 'Không trầm cảm';

    return { gad7, gadLevel, phq9, phqLevel };
  }

  document.querySelectorAll('input[type="radio"]').forEach(r =>
    r.addEventListener('change', updateState)
  );
  updateState();

  btnViewResult.addEventListener('click', function () {
    const answered = countAnswered();
    if (answered < totalQuestions) {
      missingNote.style.display = 'block';
      return;
    }
    missingNote.style.display = 'none';

    const result = calculateLevel();
    resultView.innerHTML =
      `Kết quả khảo sát:<br>` +
      `Lo âu (GAD-7): ${result.gadLevel}<br>` +
      `Trầm cảm (PHQ-9): ${result.phqLevel}`;
    resultNote.innerHTML =
      `* Nếu bạn cần biết thêm thông tin chi tiết, vui lòng điền form để được bác sĩ tư vấn trực tiếp.`;
        btnViewResult.classList.remove("show");
        btnPrint.classList.add("show");
  });

  btnPrint.addEventListener('click', function () {
    const cf7Link = document.querySelector('a[href="#popup-booking-form"]');
    if (cf7Link) {
      setTimeout(() => {
        const textarea = document.querySelector('#popup-booking-form textarea');
        if (textarea) {
          const pageTitle = document.title;
          textarea.value =
            `${resultView.innerText}\nTrang: ${pageTitle}\nLink: ${window.location.href}`;
        }
      }, 500);
      cf7Link.click();
    }
  });
  const ngaySL = document.getElementById('ngaySL');
  if (ngaySL) ngaySL.value = new Date().toISOString().split('T')[0];
  document.addEventListener('wpcf7mailsent', function (event) {
    const inputs = event.detail.inputs;
    let maKH = '', phoneKH = '';
    inputs.forEach(input => {
      if (input.name === 'your-name')   maKH = input.value;
      if (input.name === 'your-subject') phoneKH = input.value;
    });

    const maInput = document.getElementById('maKH');
    const phoneInput = document.getElementById('phoneKH');
    if (maInput)   maInput.value   = maKH;
    if (phoneInput) phoneInput.value = phoneKH;

    window.print();
    window.location.reload();
  });

});

</script>
<?php get_footer(); ?>
