<?php
/**
 * Template Name: Clean Page page-articles.php
 *
 * @package VascoTheme
 */

get_header();
?>

<style>
.articles-hero-banner {
    background-size: cover;
    background-position: center;
    min-height: 480px;
    position: relative;
    display: flex;
    align-items: center;
    color: #fff;
    padding: 60px 40px;
    border-radius: 16px;
    margin-bottom: 50px;
}
.articles-hero-overlay {
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(180deg, rgba(0,0,0,0.3) 0%, rgba(0,0,0,0.75) 100%);
    border-radius: 16px;
}
.articles-hero-content {
    position: relative;
    z-index: 2;
    max-width: 800px;
    margin: 0 auto;
    text-align: center;
}
.articles-hero-title {
    font-size: 32px;
    font-weight: 700;
    line-height: 1.3;
    margin-bottom: 15px;
}
.articles-hero-title a {
    color: #fff;
    text-decoration: none;
}
.articles-hero-title a:hover {
    text-decoration: underline;
}
.articles-hero-meta {
    font-size: 14px;
    color: #ffffff !important;
    opacity: 0.95;
    margin-bottom: 18px;
    text-shadow: 0 1px 3px rgba(0,0,0,0.8);
}
.articles-hero-excerpt {
    font-size: 16px;
    line-height: 1.6;
    margin-bottom: 25px;
    color: #ffffff !important;
    opacity: 1 !important;
    text-shadow: 0 1px 4px rgba(0,0,0,0.9);
}
.articles-hero-btn {
    display: inline-block;
    background: rgba(255,255,255,0.15);
    color: #fff !important;
    padding: 12px 36px;
    border-radius: 30px;
    font-weight: 700;
    text-decoration: none;
    border: 2px solid #ffffff;
    letter-spacing: 1px;
    text-transform: uppercase;
    font-size: 14px;
    transition: all 0.2s ease;
    backdrop-filter: blur(4px);
}
.articles-hero-btn:hover {
    background: #ffffff;
    color: #111111 !important;
}

/* Grid layout 3 columns matching original site */
.articles-grid-container {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-bottom: 60px;
}
@media (max-width: 992px) {
    .articles-grid-container {
        grid-template-columns: repeat(2, 1fr);
    }
}
@media (max-width: 600px) {
    .articles-grid-container {
        grid-template-columns: 1fr;
    }
}

.article-card {
    background: #fff;
    border-radius: 16px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0,0,0,0.06);
    display: flex;
    flex-direction: column;
    transition: transform 0.25s ease, box-shadow 0.25s ease;
}
.article-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
}
.article-card-img {
    width: 100%;
    height: 220px;
    object-fit: cover;
}
.article-card-body {
    padding: 24px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.article-card-title {
    font-size: 20px;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 12px;
    color: #1a1a1a;
}
.article-card-title a {
    color: inherit;
    text-decoration: none;
}
.article-card-title a:hover {
    color: #e30613;
}
.article-card-meta {
    font-size: 13px;
    color: #777;
    margin-bottom: 14px;
}
.article-card-excerpt {
    font-size: 14px;
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
    flex-grow: 1;
}
.article-card-more {
    font-size: 14px;
    font-weight: 600;
    color: #e30613;
    text-decoration: none;
    text-transform: lowercase;
}
.article-card-more:hover {
    text-decoration: underline;
}
</style>

<div id="et-main-area">
<div id="main-content">
<div class="container" style="max-width: 1200px; margin: 40px auto; padding: 0 20px;">

    <!-- Featured Top Article Banner -->
    <div class="articles-hero-banner" style="background-image: url('https://vasco-translator.com/articles/wp-content/uploads/2026/07/2026_07-Blog-Travel_1200x750_01.jpg');">
        <div class="articles-hero-overlay"></div>
        <div class="articles-hero-content">
            <h2 class="articles-hero-title">
                <a href="<?php echo esc_url( home_url( "/articles-travel-how-to-choose-the-right-translator-for-travel/" ) ); ?>">Cách chọn máy dịch phù hợp cho du lịch: Hướng dẫn thực tế</a>
            </h2>
            <div class="articles-hero-meta">bởi <strong>Weronika Górecka</strong> | 30 tháng 7, 2026 | Du lịch | 11 phút đọc</div>
            <p class="articles-hero-excerpt">Bạn đã dành nhiều tuần để lên kế hoạch cho chuyến đi hoàn hảo – xây dựng lịch trình, chọn những nhà hàng ngon nhất, đặt khách sạn... Nhưng rồi bạn hạ cánh và đối mặt với rào cản ngôn ngữ. Cho dù bạn cần trình báo mất hành lý hay giao tiếp thường ngày, máy dịch Vasco sẽ là giải pháp tối ưu.</p>
            <a class="articles-hero-btn" href="<?php echo esc_url( home_url( "/articles-travel-how-to-choose-the-right-translator-for-travel/" ) ); ?>">ĐỌC THÊM</a>
        </div>
    </div>

    <!-- 3 Columns Articles Grid -->
    <div class="articles-grid-container">

        <!-- Card 1 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-news-vasco-expert-how-hotels-overcome-world-cup-language-barriers/" ) ); ?>">
                <img class="article-card-img" alt="Chuyên gia Vasco" src="https://vasco-translator.com/articles/wp-content/uploads/2026/06/Aleksanderalski-crop.jpeg" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-news-vasco-expert-how-hotels-overcome-world-cup-language-barriers/" ) ); ?>">Chuyên gia Vasco: Cách các khách sạn vượt qua rào cản ngôn ngữ trong World Cup</a>
                </h3>
                <div class="article-card-meta">bởi <strong>PR TEAM</strong> | 25 tháng 6, 2026 | Tin tức | 1 phút đọc</div>
                <p class="article-card-excerpt">Bài viết từ Aleksander Alski, Trưởng khu vực Mỹ &amp; Canada tại Vasco trên Hotel Business Magazine về giải pháp nâng cao trải nghiệm khách sạn.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-news-vasco-expert-how-hotels-overcome-world-cup-language-barriers/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-vasco-how-do-translation-earbuds-work/" ) ); ?>">
                <img class="article-card-img" alt="Tai nghe dịch" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/happy-people.webp" ); ?>" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-vasco-how-do-translation-earbuds-work/" ) ); ?>">Tai nghe dịch hoạt động thế nào? Từ công nghệ đến hiệu suất thực tế</a>
                </h3>
                <div class="article-card-meta">bởi <strong>Mateusz Lewandowski</strong> | 26 tháng 3, 2026 | Vasco | 14 phút đọc</div>
                <p class="article-card-excerpt">Khi đi du lịch hoặc làm việc với đồng nghiệp quốc tế, rào cản ngôn ngữ gây ra nhiều hiểu lầm. Tai nghe dịch không dây công nghệ AI giúp giao tiếp chính xác.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-vasco-how-do-translation-earbuds-work/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-travel-best-time-to-visit-japan/" ) ); ?>">
                <img class="article-card-img" alt="Du lịch Nhật Bản" src="https://vasco-translator.com/articles/wp-content/uploads/2026/03/d2b6d218-e526-4862-aeca-d12ecdc4c9cc.jpeg" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-travel-best-time-to-visit-japan/" ) ); ?>">Thời điểm tốt nhất để đến Nhật Bản: Hướng dẫn toàn diện về các mùa, lễ hội và du lịch tiết kiệm</a>
                </h3>
                <div class="article-card-meta">bởi <strong>Weronika Górecka</strong> | 11 tháng 3, 2026 | Du lịch | 16 phút đọc</div>
                <p class="article-card-excerpt">Lên kế hoạch cho chuyến đi Đất nước Mặt trời mọc với những gợi ý về hoa anh đào, mùa lá đỏ và văn hóa công nghệ Nhật Bản.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-travel-best-time-to-visit-japan/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-languages-exploring-the-celtic-languages-from-the-irish-language-to-the-manx-gaelic/" ) ); ?>">
                <img class="article-card-img" alt="Ngôn ngữ Celtic" src="https://vasco-translator.com/articles/wp-content/uploads/2026/02/2c3e4a23-822c-475e-bb34-dc6da32fb8e7.jpeg" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-languages-exploring-the-celtic-languages-from-the-irish-language-to-the-manx-gaelic/" ) ); ?>">Khám phá các ngôn ngữ Celtic: Từ tiếng Ireland đến tiếng Manx Gaelic</a>
                </h3>
                <div class="article-card-meta">bởi <strong>Mateusz Lewandowski</strong> | 13 tháng 2, 2026 | Ngôn ngữ | 23 phút đọc</div>
                <p class="article-card-excerpt">Huyền thoại cổ xưa và những bờ biển hiểm trở của Ireland - khám phá lịch sử hình thành các ngôn ngữ Celtic độc đáo.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-languages-exploring-the-celtic-languages-from-the-irish-language-to-the-manx-gaelic/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

        <!-- Card 5 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-languages-thank-you-in-different-languages/" ) ); ?>">
                <img class="article-card-img" alt="Cảm ơn các ngôn ngữ" src="https://vasco-translator.com/articles/wp-content/uploads/2026/01/da3844b1-96d4-4e46-a1a3-6ae7a9b676bc.jpeg" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-languages-thank-you-in-different-languages/" ) ); ?>">Cách nói lời cảm ơn bằng các ngôn ngữ khác nhau: Hướng dẫn đầy đủ</a>
                </h3>
                <div class="article-card-meta">bởi <strong>Mateusz Lewandowski</strong> | 5 tháng 1, 2026 | Ngôn ngữ | 25 phút đọc</div>
                <p class="article-card-excerpt">Thể hiện lòng biết ơn bằng ngôn ngữ mẹ đẻ của người bản xứ giúp tạo nên những kết nối con người ấm áp và ý nghĩa.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-languages-thank-you-in-different-languages/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

        <!-- Card 6 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-travel-top-10-best-christmas-markets-in-europe/" ) ); ?>">
                <img class="article-card-img" alt="Chợ Giáng sinh Châu Âu" src="https://vasco-translator.com/articles/wp-content/uploads/2025/11/blogpost-christmas_markets-2025-01-okladka.jpg" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-travel-top-10-best-christmas-markets-in-europe/" ) ); ?>">Top 10 chợ Giáng sinh đẹp nhất châu Âu</a>
                </h3>
                <div class="article-card-meta">bởi <strong>Weronika Górecka</strong> | 27 tháng 11, 2025 | Du lịch | 20 phút đọc</div>
                <p class="article-card-excerpt">Hòa mình vào không khí Giáng sinh lung linh huyền ảo tại những khu chợ truyền thống nổi tiếng nhất khắp Châu Âu.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-travel-top-10-best-christmas-markets-in-europe/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

        <!-- Card 7 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-travel-spooky-travel-destinations/" ) ); ?>">
                <img class="article-card-img" alt="Địa danh rùng rợn" src="https://vasco-translator.com/articles/wp-content/uploads/2025/10/e4141f2e-db60-4674-ad69-02a1bbb2f593.jpeg" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-travel-spooky-travel-destinations/" ) ); ?>">Điểm đến du lịch rùng rợn: Ghé thăm những địa danh thực sự phía sau các bộ phim kinh dị yêu thích của bạn</a>
                </h3>
                <div class="article-card-meta">bởi <strong>Mateusz Lewandowski</strong> | 28 tháng 10, 2025 | Du lịch | 16 phút đọc</div>
                <p class="article-card-excerpt">Ghé thăm những bối cảnh có thật của Wednesday, Stranger Things và các địa danh huyền bí nổi tiếng thế giới.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-travel-spooky-travel-destinations/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

        <!-- Card 8 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-travel-fall-travel-ideas-hoa-hoa-season/" ) ); ?>">
                <img class="article-card-img" alt="Mùa Thu Hoa Hoa Hoa" src="https://vasco-translator.com/articles/wp-content/uploads/2025/10/blogpost-hoa_hoa-2025-01-okladka.jpg" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-travel-fall-travel-ideas-hoa-hoa-season/" ) ); ?>">Ý tưởng du lịch mùa thu hay nhất và sự kỳ diệu của Mùa Hoa Hoa Hoa: Từ không khí hoàng hôn đến những điểm đến ấm cúng</a>
                </h3>
                <div class="article-card-meta">bởi <strong>Weronika Górecka</strong> | 20 tháng 10, 2025 | Du lịch | 17 phút đọc</div>
                <p class="article-card-excerpt">Tận hưởng không khí mùa thu lãng mạn và danh sách những điểm đến tuyệt vời nhất cho mùa thu năm nay.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-travel-fall-travel-ideas-hoa-hoa-season/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

        <!-- Card 9 -->
        <div class="article-card">
            <a href="<?php echo esc_url( home_url( "/articles-languages-languages-of-star-trek-klingon-vs-vulcan/" ) ); ?>">
                <img class="article-card-img" alt="Ngôn ngữ Star Trek" src="https://vasco-translator.com/articles/wp-content/uploads/2025/10/Blog_2026_Klingon_01.jpg" />
            </a>
            <div class="article-card-body">
                <h3 class="article-card-title">
                    <a href="<?php echo esc_url( home_url( "/articles-languages-languages-of-star-trek-klingon-vs-vulcan/" ) ); ?>">Ngôn ngữ trong Star Trek: Klingon so với Vulcan</a>
                </h3>
                <div class="article-card-meta">bởi <strong>Weronika Górecka</strong> | 16 tháng 10, 2025 | Ngôn ngữ | 11 phút đọc</div>
                <p class="article-card-excerpt">Những ngôn ngữ viễn tưởng ngoài hành tinh dạy chúng ta điều gì về giao tiếp và công nghệ dịch thuật hiện đại.</p>
                <a class="article-card-more" href="<?php echo esc_url( home_url( "/articles-languages-languages-of-star-trek-klingon-vs-vulcan/" ) ); ?>">đọc thêm</a>
            </div>
        </div>

    </div>

</div>
</div>
</div>

<?php
get_footer();
