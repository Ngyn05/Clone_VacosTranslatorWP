# Conversion Strategy - Vasco Custom WordPress Theme

## Strategy Selection: PHP-First Classic Theme Architecture

- **Approach**: Traditional WordPress PHP Templates + Standard Enqueued Front-end Assets (CSS/JS) + Native WordPress Navigation & WooCommerce Integration.
- **Routing**: Managed 100% by WordPress Permalink rewrite rules.
- **Templating**:
  - `header.php` and `footer.php` encapsulate global navigation & footer DOM structures.
  - Page-specific layouts are converted to dedicated PHP templates (`front-page.php`, `page-*.php`, `single-*.php`).
  - Common visual modules are extracted into `template-parts/`.
- **Data Model**:
  - WordPress Pages for static & dynamic marketing content.
  - WordPress Posts & Categories for Blog/Articles/Newsroom.
  - WooCommerce Products & Taxonomies for Translators, Accessories & Bundles.
- **Assets**: CSS, JS, and Images from source are copied directly to `vasco-theme/assets/` and enqueued via `inc/enqueue.php`.
