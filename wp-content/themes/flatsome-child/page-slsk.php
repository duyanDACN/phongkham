<?php
/* Template Name: Bảng sàng lọc SKTT */
get_header();
?>
<div class="row sktt-gad-print">
  <div class="col medium-12 small-12 large-12">
    <div class="box-header text-center">
         <div class="logo-header-gad">
          <img width="250" height="100" src="/wp-content/uploads/2025/03/481249453_661463903220155_6836010531183258319_n-e1743049861484-1024x487.jpg" class="header_logo header-logo" alt="Phòng khám TestSGN">
        </div>
      <h3>PHIẾU KHẢO SÁT <br> BẢNG SÀNG LỌC SỨC KHOẺ TINH THẦN</h3>
    </div>
    <?php
    $answers = [
      '0' => 'Không chút nào',
      '1' => 'Một vài ngày',
      '2' => 'Quá nửa số ngày',
      '3' => 'Gần như hằng ngày',
    ];
    $questions = [
      'Câu 1: Cảm thấy suy sụp, chán nản hoặc tuyệt vọng',
      'Câu 2: Ít hứng thú hoặc niềm vui khi làm việc gì đó',
      'Câu 3: Cảm thấy căng thẳng, lo lắng hoặc bất an',
      'Câu 4: Không thể ngừng hoặc kiểm soát được lo lắng'
    ];
    function render_questions($questions, $answers)
    {
      foreach ($questions as $index => $question) {
        echo "<div class='box-wh-one'>";
        echo "<p><strong>{$question}</strong></p><div class='ans-wh-o'>";
        foreach ($answers as $val => $text) {
          $id = "q{$index}_{$val}";
          echo "<div><input type='radio' id='{$id}' name='q{$index}' value='{$val}'>";
          echo "<label for='{$id}'>{$text}</label></div>";
        }
        echo "</div></div>";
      }
    }
    ?>
    <div id="quiz">
      <div class="box-wh">
        <h3 class="text-center">Trong 2 tuần qua, bạn có thường xuyên bị làm phiền bởi bất kỳ vấn đề nào sau đây không?
        </h3>
        <!-- <div id="total">Tổng điểm: 0</div> -->
        <?php render_questions($questions, $answers); ?>
      </div>
    </div>

    <div id="final-result" class="text-thank-message"></div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const BASE = window.location.origin;

    document.querySelectorAll('#quiz input[type=radio]').forEach(input => {
      input.addEventListener('change', function () {
        updateTotal();
        if (allAnswered()) {
          checkResult();
        }
      });
    });

    function allAnswered() {
      let inputs = document.querySelectorAll('#quiz input[type=radio]');
      let names = [...new Set([...inputs].map(i => i.name))];
      return names.every(name => document.querySelector(`input[name="${name}"]:checked`));
    }

    function calcScore(questionIndexes) {
      let total = 0;
      questionIndexes.forEach(i => {
        let checked = document.querySelector(`input[name="q${i}"]:checked`);
        if (checked) total += parseInt(checked.value);
      });
      return total;
    }

    function checkResult() {
      let totalPart1 = calcScore([0, 1]);
      let totalPart2 = calcScore([2, 3]);
      if (totalPart1 >= 3 && totalPart2 <= 3) {
        window.location.href = `${BASE}/phieu-khao-sat-gad7/`;
      } else if (totalPart1 <= 3 && totalPart2 >= 3) {
        window.location.href = `${BASE}/phieu-khao-sat-phq9/`;
      } else if (totalPart1 >= 3 && totalPart2 >= 3) {
        window.location.href = `${BASE}/ks-gad-phq/`;
      } else if (totalPart1 < 3 && totalPart2 < 3) {
        let thankMessage = `
          <p class="text-thank-message">
            Cảm ơn bạn đã hoàn thành khảo sát!<br>
            Bạn hiện không có dấu hiệu đáng lo ngại.
          </p>
        `;
        document.getElementById('quiz').innerHTML = thankMessage;
        let homeBtn = document.createElement('button');
        homeBtn.innerText = 'Về trang chủ';
        homeBtn.classList.add("reload-btn-page");
        homeBtn.onclick = function () {
          window.location.href = BASE;
        };
        document.getElementById('quiz').appendChild(homeBtn);
      }
    }

    function updateTotal() {
      let total = 0;
      document.querySelectorAll('#quiz input[type=radio]:checked').forEach(radio => {
        total += parseInt(radio.value);
      });
    
      document.querySelectorAll(".ans-wh-o > div").forEach(div => div.classList.remove("active"));
      document.querySelectorAll("input[type='radio']:checked").forEach(radio => {
        radio.closest("div").classList.add("active");
      });
    }
  });
</script>
<?php get_footer(); ?>