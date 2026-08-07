<?php
/**
 * Template Name: Clean Page page-articles.php
 *
 * @package VascoTheme
 */

get_header();
?>

<style>
.articles-header-section {
    text-align: center;
    padding: 30px 0 20px 0;
}
.articles-main-title {
    font-size: 28px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #2c3e50;
    margin-bottom: 10px;
}
.articles-sub-title {
    font-size: 15px;
    color: #666;
    max-width: 700px;
    margin: 0 auto;
}

/* Grid layout 4 columns desktop / 2 columns tablet / 1 column mobile */
.articles-grid-container {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 24px;
    margin-top: 30px;
    margin-bottom: 60px;
}
@media (max-width: 1100px) {
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
    border: 1px solid #f0f0f0;
}
.article-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 30px rgba(0,0,0,0.12);
}
.article-card-img-link {
    display: block;
    overflow: hidden;
    height: 220px;
    width: 100%;
    background: #f7f9fa;
    position: relative;
    padding: 0;
}
.article-card-img {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center center !important;
    display: block;
    margin: 0 auto;
    transition: transform 0.3s ease;
}
.article-card:hover .article-card-img {
    transform: scale(1.05);
}
.article-card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}
.article-card-title {
    font-size: 17px;
    font-weight: 700;
    line-height: 1.4;
    margin-bottom: 12px;
    color: #1a1a1a;
    min-height: 48px;
}
.article-card-title a {
    color: inherit;
    text-decoration: none;
}
.article-card-title a:hover {
    color: #e30613;
}
.article-card-meta {
    font-size: 12px;
    color: #888;
    margin-bottom: 12px;
    display: flex;
    align-items: center;
    gap: 8px;
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
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.article-card-more:hover {
    text-decoration: underline;
}

/* Modern Pagination Styling */
.articles-pagination-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    margin: 40px 0 60px 0;
    gap: 16px;
}
.articles-pagination-info {
    font-size: 14px;
    color: #666;
    background: #f7f9fa;
    padding: 6px 18px;
    border-radius: 20px;
    border: 1px solid #e2e8f0;
    font-weight: 500;
}
.articles-pagination-info strong {
    color: #e30613;
}
.articles-pagination-nav {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    flex-wrap: wrap;
}
.pagination-btn {
    padding: 10px 20px;
    font-size: 14px;
    font-weight: 700;
    border-radius: 10px;
    text-decoration: none;
    transition: all 0.25s ease;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}
.pagination-btn.pagination-prev, .pagination-btn.pagination-next {
    background: #ffffff;
    color: #1a1a1a;
    border: 1px solid #e0e0e0;
}
.pagination-btn.pagination-prev:hover, .pagination-btn.pagination-next:hover {
    background: #e30613;
    color: #ffffff;
    border-color: #e30613;
    box-shadow: 0 6px 16px rgba(227,6,19,0.25);
    transform: translateY(-2px);
}
.pagination-btn.pagination-disabled {
    background: #f1f5f9;
    color: #a0aec0;
    border: 1px solid #e2e8f0;
    cursor: not-allowed;
    box-shadow: none;
}
.pagination-numbers {
    display: flex;
    align-items: center;
    gap: 6px;
}
.pagination-numbers a, .pagination-numbers .current {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    border-radius: 10px;
    font-size: 14px;
    font-weight: 700;
    text-decoration: none;
    transition: all 0.2s ease;
}
.pagination-numbers a {
    background: #ffffff;
    color: #4a5568;
    border: 1px solid #e2e8f0;
}
.pagination-numbers a:hover {
    background: #edf2f7;
    color: #e30613;
    border-color: #cbd5e0;
}
.pagination-numbers .current {
    background: #e30613;
    color: #ffffff;
    border: 1px solid #e30613;
    box-shadow: 0 4px 12px rgba(227,6,19,0.3);
}
</style>

<div id="et-main-area">
<div id="main-content">
<div class="container" style="max-width: 1200px; margin: 30px auto; padding: 0 20px;">

    <div class="articles-header-section">
        <h1 class="articles-main-title">KHÁM PHÁ BÀI VIẾT CỦA CHÚNG TÔI</h1>
        <p class="articles-sub-title">Cập nhật tin tức, kiến thức ngôn ngữ học và kinh nghiệm du lịch toàn cầu với máy dịch thông minh Vasco.</p>
    </div>

    <!-- Articles Grid dynamically loaded from Posts -->
    <div class="articles-grid-container">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : ( ( get_query_var( 'page' ) ) ? get_query_var( 'page' ) : 1 );
        $args  = array(
            'post_type'      => 'post',
            'posts_per_page' => 8,
            'post_status'    => 'publish',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'paged'          => $paged,
        );
        $articles_query = new WP_Query( $args );

        if ( $articles_query->have_posts() ) :
            while ( $articles_query->have_posts() ) :
                $articles_query->the_post();
                $post_id     = get_the_ID();
                $permalink   = get_permalink();
                $title       = get_the_title();
                $excerpt     = get_the_excerpt();
                $author_name = get_post_meta( $post_id, '_vasco_author_name', true ) ?: get_the_author();
                $read_time   = get_post_meta( $post_id, '_vasco_read_time', true ) ?: '10 phút đọc';

                $has_thumb = has_post_thumbnail( $post_id );
                $thumb_src = $has_thumb ? get_the_post_thumbnail_url( $post_id, 'medium_large' ) : '';
                $card_index = $articles_query->current_post;
                $loading_attr = ( $card_index < 4 ) ? 'eager' : 'lazy';
                ?>
                <!-- Article Item with GEO / Schema Markup -->
                <article class="article-card" itemscope itemtype="https://schema.org/BlogPosting">
                    <meta itemprop="mainEntityOfPage" content="<?php echo esc_url( $permalink ); ?>">
                    <meta itemprop="inLanguage" content="vi-VN">
                    
                    <a class="article-card-img-link" href="<?php echo esc_url( $permalink ); ?>" title="<?php echo esc_attr( $title ); ?>">
                        <?php if ( $has_thumb && $thumb_src ) : ?>
                            <img class="article-card-img" src="<?php echo esc_url( $thumb_src ); ?>" alt="<?php echo esc_attr( $title ); ?>" itemprop="image" loading="<?php echo $loading_attr; ?>" />
                        <?php else : ?>
                            <div class="article-card-img-placeholder" style="width:100%;height:100%;background:#1a1a1a;display:flex;align-items:center;justify-content:center;color:#666;font-size:13px;">Chưa có ảnh</div>
                        <?php endif; ?>
                    </a>

                    <div class="article-card-body">
                        <h2 class="article-card-title" itemprop="headline">
                            <a href="<?php echo esc_url( $permalink ); ?>" itemprop="url"><?php echo esc_html( $title ); ?></a>
                        </h2>

                        <div class="article-card-meta">
                            <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                                <span itemprop="name"><?php echo esc_html( $author_name ); ?></span>
                            </span>
                            <span>•</span>
                            <span><?php echo esc_html( $read_time ); ?></span>
                        </div>

                        <p class="article-card-excerpt" itemprop="description">
                            <?php echo esc_html( wp_trim_words( $excerpt, 28, '...' ) ); ?>
                        </p>

                        <a class="article-card-more" href="<?php echo esc_url( $permalink ); ?>">
                            Đọc thêm &rarr;
                        </a>
                    </div>
                </article>
                <?php
            endwhile;
        else :
            ?>
            <p style="grid-column: 1/-1; text-align: center; color: #777; font-size: 16px; padding: 40px 0;">Chưa có bài viết nào.</p>
        <?php endif; ?>
    </div>

    <!-- Pagination Section -->
    <?php
    $total_pages = $articles_query->max_num_pages;
    if ( $total_pages > 1 ) :
        ?>
        <div class="articles-pagination-wrapper">
            <div class="articles-pagination-info">
                Trang <strong><?php echo esc_html( $paged ); ?></strong> / <strong><?php echo esc_html( $total_pages ); ?></strong>
            </div>

            <div class="articles-pagination-nav">
                <?php if ( $paged > 1 ) : ?>
                    <a href="<?php echo esc_url( get_pagenum_link( $paged - 1 ) ); ?>" class="pagination-btn pagination-prev">
                        &larr; Trang trước
                    </a>
                <?php else : ?>
                    <span class="pagination-btn pagination-disabled">&larr; Trang trước</span>
                <?php endif; ?>

                <div class="pagination-numbers">
                    <?php
                    echo paginate_links( array(
                        'base'      => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                        'format'    => '?paged=%#%',
                        'current'   => max( 1, $paged ),
                        'total'     => $total_pages,
                        'prev_next' => false,
                        'type'      => 'plain',
                    ) );
                    ?>
                </div>

                <?php if ( $paged < $total_pages ) : ?>
                    <a href="<?php echo esc_url( get_pagenum_link( $paged + 1 ) ); ?>" class="pagination-btn pagination-next">
                        Trang sau &rarr;
                    </a>
                <?php else : ?>
                    <span class="pagination-btn pagination-disabled">Trang sau &rarr;</span>
                <?php endif; ?>
            </div>
        </div>
        <?php
    endif;
    wp_reset_postdata();
    ?>

</div>
</div>
</div>

<!-- Geo & ItemList Schema Structured Data for Search Engine Crawlers -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Blog",
  "name": "Khám Phá Bài Viết Vasco",
  "description": "Các bài viết về ngôn ngữ, văn hóa du lịch và công nghệ máy dịch Vasco.",
  "publisher": {
    "@type": "Organization",
    "name": "VASCO VN",
    "url": "<?php echo esc_url( home_url() ); ?>"
  }
}
</script>

<?php
get_footer();

