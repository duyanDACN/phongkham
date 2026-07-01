<section class="why-choose">
    <div class="why-choose__container">
        <!-- ROW 1: Text -->
        <div class="why-choose__top">
            <div class="why-choose__title">
                <h2 class="why-choose__heading">
                    Vì sao chọn<br />
                    <span>TestSGN</span>
                </h2>
            </div>

            <div class="why-choose__content">
                <ul class="why-choose__list">
                    <li class="why-choose__item">
                        <span class="why-choose__icon" aria-hidden="true">✅</span>
                        <span class="why-choose__text">Đội ngũ chuyên gia hàng đầu</span>
                    </li>
                    <li class="why-choose__item">
                        <span class="why-choose__icon" aria-hidden="true">✅</span>
                        <span class="why-choose__text">Bảo mật thông tin tuyệt đối</span>
                    </li>
                    <li class="why-choose__item">
                        <span class="why-choose__icon" aria-hidden="true">✅</span>
                        <span class="why-choose__text">Phương pháp trị liệu khoa học</span>
                    </li>
                    <li class="why-choose__item">
                        <span class="why-choose__icon" aria-hidden="true">✅</span>
                        <span class="why-choose__text">Cá nhân hóa lộ trình trị liệu</span>
                    </li>
                    <li class="why-choose__item">
                        <span class="why-choose__icon" aria-hidden="true">✅</span>
                        <span class="why-choose__text">Cơ sở vật chất hiện đại</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- ROW 2: Images -->
        <div class="why-choose__images">
            <figure class="why-choose__card">
                <img
                    class="why-choose__img"
                    src="https://images.unsplash.com/photo-1521737604893-d14cc237f11d?auto=format&fit=crop&w=1200&q=80"
                    alt="Tư vấn 1-1"
                    loading="lazy"
                    decoding="async" />
            </figure>

            <figure class="why-choose__card">
                <img
                    class="why-choose__img"
                    src="https://images.unsplash.com/photo-1553877522-43269d4ea984?auto=format&fit=crop&w=1200&q=80"
                    alt="Nhanh chóng, dễ dàng và bảo mật"
                    loading="lazy"
                    decoding="async" />
            </figure>

            <figure class="why-choose__card why-choose__card--hide-mobile">
                <img
                    class="why-choose__img"
                    src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=1200&q=80"
                    alt="Không gian tư vấn"
                    loading="lazy"
                    decoding="async" />
            </figure>
        </div>
    </div>
</section>

<style>
    /* ===== SECTION BASE ===== */
    .why-choose {
        /* Nền kiểu banner (gradient giống ảnh mẫu) */
        background: linear-gradient(180deg, #2f72c6 0%, #a9c8ee 55%, #e8f0fb 100%);
        padding: clamp(28px, 4vw, 56px) 0;
    }

    .why-choose__container {
        width: min(1200px, 100% - 32px);
        margin: 0 auto;
    }

    /* ===== TOP (2 COLUMNS DESKTOP) ===== */
    .why-choose__top {
        display: grid;
        grid-template-columns: 1fr 1.35fr;
        gap: clamp(18px, 3vw, 40px);
        align-items: anchor-center;
    }

    .why-choose__heading {
        margin: 0;
        text-align: center;
        color: #fff;
        font-weight: 800;
        line-height: 1.05;
        letter-spacing: -0.5px;
        font-size: clamp(34px, 4.2vw, 75px);
    }



    .why-choose__heading span {
        display: inline-block;
        font-weight: 900;
    }

    /* ===== LIST ===== */
    .why-choose__list {
        list-style: none;
        padding: 0;
        margin: 0;
        display: grid;
        gap: 14px;
    }

    .why-choose__item {
        display: grid;
        grid-template-columns: 34px 1fr;
        align-items: start;
        column-gap: 14px;
    }

    .why-choose__icon {
        font-size: 28px;
        line-height: 1;
        transform: translateY(2px);
    }

    .why-choose__text {
        color: #fff;
        font-size: clamp(18px, 2.2vw, 34px);
        line-height: 1;
        font-weight: 500;
    }

    /* ===== IMAGES ROW ===== */
    .why-choose__images {
        margin-top: clamp(18px, 3vw, 34px);
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: clamp(14px, 2.4vw, 28px);
        align-items: stretch;
    }

    .why-choose__card {
        margin: 0;
        border-radius: 22px;
        overflow: hidden;
        background: rgba(255, 255, 255, 0.15);
    }

    .why-choose__img {
        display: block;
        width: 100%;
        height: auto;
        /* KHÔNG MÉO */
    }

    @media (max-width: 1200px) {
        .why-choose__item {
            align-items: baseline;
        }
    }


    /* ===== MOBILE: 1 HÀNG / 1 HÀNG / 1 HÀNG + CHỈ 2 ẢNH ===== */
    @media (max-width: 768px) {
        .why-choose__top {
            grid-template-columns: 1fr;
            /* Title 1 hàng, list 1 hàng */
            gap: 16px;
        }

        .why-choose__list {
            grid-template-columns: repeat(2, 1fr);
            gap: 14px 24px;
        }

        .why-choose__heading {
            text-align: center;
            font-size: clamp(30px, 12vw, 44px);
            margin-bottom: 15px;
        }

        .why-choose__text {
            font-size: 18px;
        }

        .why-choose__content {
            margin-bottom: 15px;
        }



        .why-choose__images {
            grid-template-columns: repeat(2, 1fr);
            /* ảnh 1 hàng, 2 cột */
            gap: 12px;
        }

        .why-choose__card--hide-mobile {
            display: none;
            /* ẨN ẢNH THỨ 3 */
        }

        .why-choose__card {
            border-radius: 18px;
        }
    }

    @media (max-width: 658px) {
    .why-choose__list {
        grid-template-columns: 1fr;
    }
    }
</style>