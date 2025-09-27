<?php get_header(); ?>
<section class="price-table-s">
  <div class="row">
    <div class="col">
      <div class="price-table">
          <div class="style--title-section">
             <h2 class="text-center"><strong>BẢNG GIÁ DỊCH VỤ</strong></h2>
             <p class="desc text-center">Nhấn chọn một hoặc nhiều dịch vụ bạn quan tâm, sau đó bấm nút <strong>Đăng ký khám</strong> bên dưới.</br> Đội ngũ của chúng tôi sẽ liên hệ và tư vấn chi tiết cho bạn.</p>
          </div>
        <div class="price-section">
          <h3>DỰ PHÒNG SAU PHƠI NHIỄM (PEP)</h3>
          <table>
            <tbody>
              <tr>
                <td>3D Het</td>
                <td class="price">800.000đ</td>
              </tr>
              <tr>
                <td>Khám chuyên khoa</td>
                <td class="price">Miễn phí</td>
              </tr>
              <tr>
                <td>Xét nghiệm HIV</td>
                <td class="price">Miễn phí</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="price-section">
          <h3>ĐIỀU TRỊ ARV</h3>
          <table>
            <tbody>
              <tr>
                <td>Gói xét nghiệm điều trị</td>
                <td class="price">1.735.000đ</td>
              </tr>
              <tr>
                <td>TCD4-TCD8</td>
                <td class="price">600.000đ</td>
              </tr>
              <tr>
                <td>Tải lượng virút</td>
                <td class="price">900.000đ</td>
              </tr>
              <tr>
                <td>Acriptega</td>
                <td class="price">650.000đ</td>
              </tr>
              <tr>
                <td>Avonza</td>
                <td class="price">650.000đ</td>
              </tr>
              <tr>
                <td>Khám chuyên khoa</td>
                <td class="price">150.000đ</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="price-section">
          <h3>XÉT NGHIỆM STIs</h3>
          <table>
            <tbody>
              <tr>
                <td>Giang mai (test nhanh)</td>
                <td class="price">100.000đ</td>
              </tr>
              <tr>
                <td>Giang mai (RPR Định lượng)</td>
                <td class="price">150.000đ</td>
              </tr>
              <tr>
                <td>Giang mai (TPHA)</td>
                <td class="price">200.000đ</td>
              </tr>
              <tr>
                <td>Lậu/Chlamydia PCR</td>
                <td class="price">300.000đ</td>
              </tr>
              <tr>
                <td>Viêm gan B (HBsAg)</td>
                <td class="price">140.000đ</td>
              </tr>
              <tr>
                <td>Viêm gan B (Anti HBs)</td>
                <td class="price">180.000đ</td>
              </tr>
              <tr>
                <td>Viêm gan C</td>
                <td class="price">200.000đ</td>
              </tr>
              <tr>
                <td>HPV Genotype (PCR)</td>
                <td class="price">800.000đ</td>
              </tr>
              <tr>
                <td>Xét nghiệm HIV</td>
                <td class="price">Miễn phí</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="price-section">
          <h3>ĐIỀU TRỊ STIs</h3>
          <table>
            <tbody>
              <tr>
                <td>Giang mai (một mũi)</td>
                <td class="price">350.000đ</td>
              </tr>
              <tr>
                <td>Lậu/Chlamydia</td>
                <td class="price">650.000đ</td>
              </tr>
              <tr>
                <td>Khám chuyên khoa</td>
                <td class="price">150.000đ</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="text-center" style="margin-top:30px;">
          <button id="register-btn" class="btn btn-primary" style="padding:10px 25px; font-size:16px; border-radius:6px; background:#141E46; color:#fff; border:none; cursor:pointer;">
            Đăng ký khám
          </button>
        </div>

      </div>
    </div>
  </div>
</section>
<script>
  document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".price-table tr").forEach(function (row) {
      row.addEventListener("click", function () {
        row.classList.toggle("selected");
      });
    });

    document.getElementById("register-btn").addEventListener("click", function () {
      let selectedRows = document.querySelectorAll(".price-table tr.selected");
      if (selectedRows.length === 0) {
        alert("Vui lòng chọn ít nhất một dịch vụ trước khi đăng ký.");
        return;
      }
      let servicesText = "Tôi muốn tìm hiểu và đăng ký các dịch vụ sau:\n";
      selectedRows.forEach(function (row) {
        let service = row.querySelector("td:first-child")?.innerText.trim() || "Dịch vụ";
        let section = row.closest(".price-section")?.querySelector("h3")?.innerText.trim() || "";
        servicesText += "- " + service + (section ? " ( " + section + " )" : "") + "\n";
      });
      document.querySelector('a[href="#popup-booking-form"]').click();
      setTimeout(function () {
        let textarea = document.querySelector("textarea.wpcf7-form-control.wpcf7-textarea.wpcf7-validates-as-required");
        if (textarea) {
          textarea.value = servicesText;
        }
      }, 300);
    });
  });
</script>
<?php get_footer(); ?>