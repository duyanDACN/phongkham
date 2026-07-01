<?php
$use_combo_form = is_page(array('combo-thuoc', 'lien-he'));

// Lấy field theo v1 / v2
$title_tieu_chi = get_field(
    $use_combo_form ? 'title_tieu_chi_v2' : 'title_tieu_chi',
    'option'
);

$anh_form = get_field(
    $use_combo_form ? 'anh_form_v2' : 'anh_form',
    'option'
);

$danh_sach_tieu_chi = get_field(
    $use_combo_form ? 'danh_sach_tieu_chi_v2' : 'danh_sach_tieu_chi',
    'option'
);
?>

<section id="form-tu-van" class="register-section">
    <div class="container container-1200">
        <!-- Title section -->
        <h2 class="section-title">MẪU ĐĂNG KÝ TƯ VẤN</h2>

        <!-- Row chia 2 phần -->
        <div class="register-row">

            <!-- Phần trái: content -->
            <div class="register-left">
                <?php if ($title_tieu_chi): ?>
                    <h3 class="content-title"><?php echo esc_html($title_tieu_chi); ?></h3>
                <?php endif; ?>

                <?php if (!empty($danh_sach_tieu_chi)): ?>
                    <ul class="content-list">
                        <?php foreach ($danh_sach_tieu_chi as $item): ?>
                            <?php
                            $text = $use_combo_form
                                ? ($item['tieu_chi_text_v2'] ?? '')
                                : ($item['tieu_chi_text'] ?? '');
                            ?>
                            <?php if ($text): ?>
                                <li><?php echo esc_html($text); ?></li>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <?php if ($anh_form): ?>
                    <div class="form-image">
                        <img src="<?php echo esc_url($anh_form); ?>" alt="">
                    </div>
                <?php endif; ?>
            </div>

            <!-- Phần phải: form -->
            <div id="form-right" class="register-right clinic-info">
                <h3 class="clinic-title">Thông tin phòng khám</h3>
                <ul class="clinic-list contact-list">
                    <li>
                        <span class="icon">💬</span>
                        <a href="https://zalo.me/0869188815" target="_blank">
                            Zalo: 0869 18 8815
                        </a>
                    </li>
                    <li>
                        <span class="icon">📨</span>
                        <a href="https://m.me/testsgnclinic" target="_blank">
                            Messenger
                        </a>
                    </li>
                    <li>
                        <span class="icon">📞</span>
                        <a href="tel:0869188815">
                            Hotline: 0869 18 8815
                        </a>
                    </li>
                    <li>
                        <span class="icon">📅</span>
                        <a href="https://calendar.google.com/calendar/u/0/appointments/schedules/AcZssZ36LylqEd6jMPKmlj6-BF9hP_PjzL7yWExwe0ARkhnztKkjouiJYr8Tln_CyoZK1FdGlR7dcL2W" class="booking-link">
                            Đặt lịch hẹn
                        </a>
                    </li>

                </ul>

                <div class="clinic-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.5753375468303!2d106.6621603967896!3d10.767175099999989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752fc8ef043953%3A0xd847865cbed5056a!2zUGjDsm5nIGtow6FtIFRlc3RTR04!5e0!3m2!1svi!2s!4v1742289224123!5m2!1svi!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

            </div>

        </div>
    </div>
</section>


<style>
    /* Section tổng */
    .register-section {
        padding: 60px 20px;
        background: linear-gradient(135deg, #ffffff 0%, #e6f2ff 100%);
        background-attachment: fixed;
    }

    .register-right .wpcf7-submit {
        background: #0073e6 !important;
    }

    .form-image img {
        height: 250px;
        width: 100%;
        object-fit: cover;
        border-radius: 12px;
    }

    .wpcf7 form .wpcf7-textarea {
        resize: none !important;
    }

    /* Title section */
    .register-section .section-title {
        text-align: center;
        font-size: 40px;
        margin-bottom: 50px;
        font-weight: bold;
        justify-content: center;
        color: #0073e6;
    }

    /* Row chia 2 phần */
    .register-row {
        display: flex;
        gap: 40px;
        justify-content: space-between;
        flex-wrap: wrap;
    }

    .register-section .wpcf7-form-control {
        border-radius: 8px;
    }

    .register-section .wpcf7-submit {
        padding: 0px 50px !important;
        margin-top: 20px !important;
    }

    /* Phần trái */
    .register-left {
        flex: 1 1 45%;
    }

    .register-left .content-title {
        font-size: 30px;
        margin-bottom: 20px;
        font-weight: 600;
        color: #0073e6;
    }

    .register-left .content-list {
        list-style: none;
        padding: 0;
    }

    .register-left .content-list li {
        margin-bottom: 12px;
        font-size: 16px;
        position: relative;
        padding-left: 25px;
    }

    .register-left .content-list li::before {
        content: "✔️";
        position: absolute;
        left: 0;
        top: -1px;
    }

    /* Phần phải */
    .register-right {
        flex: 1 1 45%;
        background: linear-gradient(to right, rgb(217 163 178 / 70%) 0%,
                /* đỏ nhạt */
                #ffffff 50%,
                /* trắng ở giữa */
                rgb(100 116 177 / 70%) 100%
                /* xanh đậm nhạt */
            );
        padding: 30px;
        border-radius: 8px;
        background: #fff;
        box-shadow: 0 2px 8px rgba(0, 115, 230, 0.4);
    }

    .register-right .form-title {
        font-size: 24px;
        margin-bottom: 6px;
        text-align: center;
        color: #090e21;
    }

    .register-right .form-subtitle {
        font-size: 14px;
        color: red;
        margin-bottom: 20px;
        text-align: center;
        font-style: italic;
    }

    .register-right .form-wrapper {
        width: 100%;
    }

    /* Thông tin phòng khám */
    .register-right.clinic-info {
        background: transparent;
        box-shadow: none;
        padding: 0;
    }

    .clinic-title {
        text-align: left;
    color: #0073e6;
    font-size: 30px;
    margin-bottom: 20px;
    font-weight: 600;
    }

    .clinic-list {
        padding-left: 18px;
    }

    .clinic-list li {
        font-size: 16px;
        margin-bottom: 10px;
        line-height: 1.6;
    }

    .clinic-list a {
        color: inherit;
        text-decoration: none;
    }

    /* Icon list */
.contact-list li {
    display: flex;
    align-items: center;
    gap: 8px;
}

.contact-list .icon {
    font-size: 18px;
    line-height: 1;
}

.contact-list a {
    color: inherit;
    text-decoration: none;
}

.contact-list .booking-link {
    font-weight: 600;
}
/* Contact buttons */
.contact-list {
    margin-top: 10px;
}

.contact-list li {
    display: inline-flex;          /* QUAN TRỌNG */
    align-items: center;
    gap: 10px;
    padding: 10px 16px;
    margin-bottom: 14px;
    border-radius: 999px;
    background: #f3f6fb;
    transition: 0.25s;
}

.contact-list li:hover {
    background: #0073e6;
}

.contact-list li {
    width: fit-content;
}

.contact-list li:hover,
.contact-list li:hover a {
    color: #fff;
}

.contact-list .icon {
    font-size: 18px;
    min-width: 20px;
}

.contact-list a {
    color: inherit;
    text-decoration: none;
    font-weight: 500;
    flex: 1;
}

.contact-list li {
    display: inline-flex;
    width: fit-content;
}
.contact-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.contact-list {
    display: flex;
    flex-direction: column;
    gap: 14px;
}

.contact-list li {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    padding: 12px 20px;
    border-radius: 999px;
    background: #0073e6;
    color: #fff;
    width: fit-content;
    min-width: 260px; /* QUAN TRỌNG */
}

.contact-list .icon {
    font-size: 18px;
}

.contact-list a {
    color: inherit;
    text-decoration: none;
    font-weight: 500;
}

/* Riêng nút đặt lịch */
.contact-list .booking-link {
    font-weight: 600;
}

.contact-list li {
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}

.contact-list li:hover {
    transform: scale(1.06);              /* TO LÊN */
    box-shadow: 0 8px 20px rgba(0,0,0,.18);
}

.contact-list {
    display: grid;
    grid-template-columns: repeat(2, max-content);
    gap: 14px 16px; /* dọc | ngang */
}

/* Google map */
.clinic-map {
    margin-top: 24px;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0,0,0,.15);
}

.clinic-map iframe {
    display: block;
    height: 363px; /* chỉnh số này */
    width: 100%;
}

    /* Responsive mobile */
    @media (max-width: 768px) {
        /* .register-row {
            flex-direction: column;
        } */

        .clinic-title {
            font-size: 20px;
        }

        .contact-list {
        grid-template-columns: 1fr;
    }

    .contact-list li {
        width: 100%;
        min-width: unset;
        justify-content: center;
    }

        .register-left,
        .register-right {
            flex: 1 1 100%;
        }

        .register-left {
            margin-bottom: 30px;
        }

        .register-section .section-title {
            font-size: 30px;
            margin-bottom: 20px;
        }

        .register-left .content-title {
            font-size: 20px;
            margin-bottom: 14px;
        }

        .register-left .content-list {
            padding-left: 12px;
            font-size: 16px;
        }

        .register-section {
            padding: 25px 0;
            padding-bottom: 0;
        }

        .register-row {
            gap: 10px;
        }

        .register-right {
            padding-bottom: 0;
            padding-left: 15px;
            padding-right: 15px;
        }

        body .wpcf7-textarea {
            resize: none !important;
        }


    }
</style>

<script>
    (function() {
        // sanitize functions
        function sanitizeNameValue(v) {
            // cho phép tất cả chữ (unicode letters) và khoảng trắng, dấu gạch ngang, dấu ' (nếu cần)
            return v.replace(/[^\p{L}\s'\-]/gu, '');
        }

        function sanitizePhoneValue(v) {
            // chỉ giữ chữ số
            return v.replace(/[^0-9]/g, '');
        }

        // xử lý input/paste cho một element cụ thể
        function attachSanitizers(el) {
            if (!el) return;
            // set attributes helpful for mobile
            if (el.getAttribute('name') === 'your-subject') {
                el.setAttribute('inputmode', 'numeric');
                el.setAttribute('pattern', '\\d*');
                el.setAttribute('autocomplete', 'tel');
            } else if (el.getAttribute('name') === 'your-name') {
                el.setAttribute('inputmode', 'text');
                el.setAttribute('autocomplete', 'name');
            }

            // input event (gõ, dán, auto-fill)
            el.addEventListener('input', function() {
                const name = this.getAttribute('name');
                if (name === 'your-name') {
                    const s = sanitizeNameValue(this.value);
                    if (this.value !== s) this.value = s;
                } else if (name === 'your-subject') {
                    const s = sanitizePhoneValue(this.value);
                    if (this.value !== s) this.value = s;
                }
            }, {
                passive: true
            });

            // keydown to prevent some unwanted key presses (UX)
            el.addEventListener('keydown', function(e) {
                const name = this.getAttribute('name');
                if (name === 'your-subject') {
                    // allow control keys
                    if (
                        e.key.length === 1 && // printable
                        !/[0-9]/.test(e.key)
                    ) {
                        e.preventDefault();
                    }
                } else if (name === 'your-name') {
                    if (
                        e.key.length === 1 &&
                        /[0-9~`!@#$%^&*()_=+\[\]{}\\|;:"<>/?]/.test(e.key)
                    ) {
                        e.preventDefault();
                    }
                }
            });

            // paste: sanitize pasted content
            el.addEventListener('paste', function(e) {
                e.preventDefault();
                const text = (e.clipboardData || window.clipboardData).getData('text') || '';
                const name = this.getAttribute('name');
                const sanitized = name === 'your-subject' ? sanitizePhoneValue(text) : sanitizeNameValue(text);
                // insert at cursor position
                const start = this.selectionStart || 0;
                const end = this.selectionEnd || 0;
                const newVal = this.value.slice(0, start) + sanitized + this.value.slice(end);
                this.value = newVal;
                // set caret after inserted text
                const pos = start + sanitized.length;
                this.setSelectionRange(pos, pos);
                // trigger input event in case other listeners depend on it
                this.dispatchEvent(new Event('input', {
                    bubbles: true
                }));
            });
        }

        // attach to currently existing inputs matching CF7 names
        function attachToExisting() {
            document.querySelectorAll('input[name="your-name"], input[name="your-subject"]').forEach(attachSanitizers);
        }

        // observe DOM to catch CF7 dynamic inserts
        const mo = new MutationObserver(function(muts) {
            for (const m of muts) {
                if (m.addedNodes && m.addedNodes.length) {
                    m.addedNodes.forEach(node => {
                        if (node.nodeType !== 1) return;
                        if (node.matches && node.matches('input[name="your-name"], input[name="your-subject"]')) {
                            attachSanitizers(node);
                        } else {
                            // tìm con trong node
                            node.querySelectorAll && node.querySelectorAll('input[name="your-name"], input[name="your-subject"]').forEach(attachSanitizers);
                        }
                    });
                }
            }
        });
        mo.observe(document.body, {
            childList: true,
            subtree: true
        });

        // CF7 events: chạy lại attach khi CF7 khởi tạo/submit/được reset
        document.addEventListener('wpcf7DOMContentLoaded', attachToExisting);
        document.addEventListener('wpcf7submit', attachToExisting);
        document.addEventListener('wpcf7mailsent', attachToExisting);
        document.addEventListener('wpcf7reset', attachToExisting);

        // fallback: khi DOMContentLoaded
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', attachToExisting);
        } else {
            attachToExisting();
        }
    })();
</script>
