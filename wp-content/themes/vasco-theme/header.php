<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta content="ie=edge" http-equiv="x-ua-compatible" />
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<?php wp_head(); ?>
</head>

<body <?php body_class( 'lang-en country-us currency-usd layout-full-width page-index tax-display-disabled' ); ?><?php echo is_front_page() ? ' id="index"' : ''; ?>>
<?php wp_body_open(); ?>

<a class="screen-reader-text" href="#wrapper">
	<?php esc_html_e( 'Skip to main content', 'vasco-theme' ); ?>
</a>
<main>
<header id="header">
			<div id="banners-wrapper">
				<a href="<?php echo esc_url( home_url( "/translators/vasco-translator-m4/" ) ); ?>">
					<div class="banner promotion-theme-orange">
						<div class="container">
							<div class="banner-wrapper banner-wrapper-main">
								<div class="banner-copy" id="banner-copy">
									<p>
										Ra mắt: Vasco Translator M4 | Khám phá tính năng mới &gt;&gt;
									</p>
								</div>
								<div class="marquee" id="marquee">
									<p class="marquee__content">
										Ra mắt: Vasco Translator M4 | Khám phá tính năng mới &gt;&gt; <span
											class="text-divider">•</span>
									</p>
									<p aria-hidden="true" class="marquee__content">
										Ra mắt: Vasco Translator M4 | Khám phá tính năng mới &gt;&gt; <span
											class="text-divider">•</span>
									</p>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="header-container">
				<div class="header-box">
					<div class="icon open lg:hidden" id="open-menu">
						<img alt="Menu" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/icon-burger.svg" ); ?>" />
					</div>
					<div class="logo">
						<a href="<?php echo esc_url( home_url( "/" ) ); ?>">
							<img alt="VASCO VN" class="img-fluid" height="20px"
								src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/logo.svg" ); ?>" width="110px" />
						</a>
					</div>
					<!-- Cờ VN + Phone icon hiển thị trên mobile -->
					<div class="lg:hidden" style="display:flex;align-items:center;gap:10px;">
						<svg width="28" height="28" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg" style="border-radius:50%;flex-shrink:0;display:block;">
							<circle cx="20" cy="20" r="20" fill="#DA251D"/>
							<polygon fill="#FFFF00" points="20,8 22.47,15.09 30,15.09 24.26,19.27 26.18,26.91 20,22.36 13.82,26.91 15.74,19.27 10,15.09 17.53,15.09"/>
						</svg>
						<a class="icon phone-icon-link" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" title="Liên hệ hỗ trợ" style="display:flex;align-items:center;">
							<img alt="Phone" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/phone-icon.svg" ); ?>" />
						</a>
					</div>
				</div>
				<div class="desktop-nav" id="desktop-nav">
					<nav aria-label="Main menu" role="navigation">
						<div class="menu-item-wrapper" role="none">
							<a aria-controls="submenu-shop" aria-expanded="false" aria-haspopup="true"
								class="nav-link has-child" href="<?php echo esc_url( home_url( "/translators/" ) ); ?>" id="nav-title-shop"
								role="menuitem">
								Cửa Hàng
								<img alt="" aria-hidden="true" class="arrow-rotate"
									src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
							</a>
							<div class="megamenu-childs-wrapper" hidden="" id="submenu-shop" role="menu">
								<div class="megamenu-container">
									<div class="megamenu-grid-section">
										<!-- Cột 1: Máy phiên dịch (Lấy 4 sản phẩm đại diện từ DB WooCommerce) -->
										<div class="megamenu-column-wrapper">
											<p class="megamenu-column-title">
												Máy phiên dịch
												<img alt="" aria-hidden="true" class="arrow-rotate-sub"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
											</p>
											<div class="megamenu-column-content">
												<ul aria-labelledby="nav-title-shop" role="menu">
													<?php
													$translators = vasco_theme_get_wc_products_for_category( 'translators', 3 );
													if ( ! empty( $translators ) ) :
														foreach ( $translators as $prod ) :
															$img_url = vasco_theme_get_wc_product_image_url( $prod, 'thumbnail' );
															?>
															<li>
																<a href="<?php echo esc_url( $prod->get_permalink() ); ?>" role="menuitem" style="display:flex;align-items:center;gap:12px;padding:6px 0;">
																	<?php if ( $img_url ) : ?>
																		<img alt="<?php echo esc_attr( $prod->get_name() ); ?>" class="js-menu-lazy-image"
																			src="<?php echo esc_url( $img_url ); ?>"
																			data-src="<?php echo esc_url( $img_url ); ?>"
																			decoding="async" fetchpriority="low" loading="lazy" style="width:48px;height:48px;object-fit:contain;flex-shrink:0;border-radius:6px;background:#f5f6f8;padding:2px;" />
																	<?php endif; ?>
																	<span><?php echo esc_html( $prod->get_name() ); ?></span>
																</a>
															</li>
															<?php
														endforeach;
													else :
														?>
														<li><a href="<?php echo esc_url( home_url( "/translators/vasco-translator-q1/" ) ); ?>">Vasco Translator Q1</a></li>
														<li><a href="<?php echo esc_url( home_url( "/translators/vasco-translator-m4/" ) ); ?>">Vasco Translator M4</a></li>
														<li><a href="<?php echo esc_url( home_url( "/translators/vasco-translator-v4/" ) ); ?>">Vasco Translator V4</a></li>
													<?php endif; ?>
												</ul>
												<a class="link-all" href="<?php echo esc_url( home_url( "/translators/" ) ); ?>"><svg fill="none"
														height="19" viewbox="0 0 11 19" width="11"
														xmlns="http://www.w3.org/2000/svg">
														<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
															stroke="#3E5AEE" stroke-linecap="square" stroke-width="2">
														</path>
													</svg>Xem tất cả máy phiên dịch</a>
											</div>
										</div>

										<!-- Cột 2: Gói combo (Lấy 3 sản phẩm đại diện từ DB WooCommerce) -->
										<div class="megamenu-column-wrapper">
											<p class="megamenu-column-title">
												gói combo
												<img alt="" aria-hidden="true" class="arrow-rotate-sub"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
											</p>
											<div class="megamenu-column-content">
												<ul aria-labelledby="nav-title-shop" role="menu">
													<?php
													$combos = vasco_theme_get_wc_products_for_category( 'bundles', 3 );
													if ( ! empty( $combos ) ) :
														foreach ( $combos as $prod ) :
															$img_url = vasco_theme_get_wc_product_image_url( $prod, 'thumbnail' );
															?>
															<li>
																<a href="<?php echo esc_url( $prod->get_permalink() ); ?>" role="menuitem" style="display:flex;align-items:center;gap:12px;padding:6px 0;">
																	<?php if ( $img_url ) : ?>
																		<img alt="<?php echo esc_attr( $prod->get_name() ); ?>" class="js-menu-lazy-image"
																			src="<?php echo esc_url( $img_url ); ?>"
																			data-src="<?php echo esc_url( $img_url ); ?>"
																			decoding="async" fetchpriority="low" loading="lazy" style="width:48px;height:48px;object-fit:contain;flex-shrink:0;border-radius:6px;background:#f5f6f8;padding:2px;" />
																	<?php endif; ?>
																	<span><?php echo esc_html( $prod->get_name() ); ?></span>
																</a>
															</li>
															<?php
														endforeach;
													else :
														?>
														<li><a href="<?php echo esc_url( home_url( "/translators/q1-phantomblack-e1/" ) ); ?>">Vasco Translator Q1 + E1</a></li>
														<li><a href="<?php echo esc_url( home_url( "/translators/v4-blackonyx-e1/" ) ); ?>">Vasco Translator V4 + E1</a></li>
													<?php endif; ?>
												</ul>
												<a class="link-all" href="<?php echo esc_url( home_url( "/bundles/" ) ); ?>"><svg fill="none"
														height="19" viewbox="0 0 11 19" width="11"
														xmlns="http://www.w3.org/2000/svg">
														<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
															stroke="#3E5AEE" stroke-linecap="square" stroke-width="2">
														</path>
													</svg>Xem gói combo</a>
											</div>
										</div>

										<!-- Cột 3: Phụ kiện (Lấy 4 sản phẩm đại diện từ DB WooCommerce) -->
										<div class="megamenu-column-wrapper">
											<p class="megamenu-column-title">
												phụ kiện
												<img alt="" aria-hidden="true" class="arrow-rotate-sub"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
											</p>
											<div class="megamenu-column-content">
												<ul aria-labelledby="nav-title-shop" role="menu">
													<?php
													$accessories = vasco_theme_get_wc_products_for_category( 'accessories', 3 );
													if ( ! empty( $accessories ) ) :
														foreach ( $accessories as $prod ) :
															$img_url = vasco_theme_get_wc_product_image_url( $prod, 'thumbnail' );
															?>
															<li>
																<a href="<?php echo esc_url( $prod->get_permalink() ); ?>" role="menuitem" style="display:flex;align-items:center;gap:12px;padding:6px 0;">
																	<?php if ( $img_url ) : ?>
																		<img alt="<?php echo esc_attr( $prod->get_name() ); ?>" class="js-menu-lazy-image"
																			src="<?php echo esc_url( $img_url ); ?>"
																			data-src="<?php echo esc_url( $img_url ); ?>"
																			decoding="async" fetchpriority="low" loading="lazy" style="width:48px;height:48px;object-fit:contain;flex-shrink:0;border-radius:6px;background:#f5f6f8;padding:2px;" />
																	<?php endif; ?>
																	<span><?php echo esc_html( $prod->get_name() ); ?></span>
																</a>
															</li>
															<?php
														endforeach;
													else :
														?>
														<li><a href="<?php echo esc_url( home_url( "/accessories/tempered-glass-q1/" ) ); ?>">Kính cường lực bảo vệ màn hình Vasco Translator Q1</a></li>
														<li><a href="<?php echo esc_url( home_url( "/accessories/tempered-glass-m4/" ) ); ?>">Kính cường lực bảo vệ màn hình Vasco Translator M4</a></li>
														<li><a href="<?php echo esc_url( home_url( "/accessories/case-for-vasco-translator-q1/" ) ); ?>">Bao da khoá kéo cho Vasco Translator Q1</a></li>
													<?php endif; ?>
												</ul>
												<a class="link-all" href="<?php echo esc_url( home_url( "/accessories/" ) ); ?>"><svg fill="none"
														height="19" viewbox="0 0 11 19" width="11"
														xmlns="http://www.w3.org/2000/svg">
														<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
															stroke="#3E5AEE" stroke-linecap="square" stroke-width="2">
														</path>
													</svg>Xem tất cả phụ kiện</a>
											</div>
										</div>
										<div class="megamenu-column-wrapper megamenu-column-image">
											<a href="<?php echo esc_url( home_url( "/translators/vasco-translator-m4/" ) ); ?>" role="menuitem">
												<div class="img-wrapper">
													<img alt="Vasco Translator M4"
														class="js-menu-lazy-image"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_shop_img.webp" ); ?>"
														decoding="async" fetchpriority="low" loading="lazy" />
												</div>
												<div class="text-absolute">
													<p>Xem máy phiên dịch mới nhất</p>
													<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="white" stroke-linecap="square" stroke-width="2">
															</path>
														</svg>Xem thêm</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="menu-item-wrapper" role="none">
							<a aria-controls="submenu-about_us" aria-expanded="false" aria-haspopup="true"
								class="nav-link has-child" id="nav-title-about_us" role="menuitem" type="button" href="<?php echo esc_url( home_url( "/about-us/" ) ); ?>">
								Về Chúng Tôi
								<img alt="" aria-hidden="true" class="arrow-rotate"
									src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
							</a>
							<div class="megamenu-childs-wrapper" hidden="" id="submenu-about_us" role="menu">
								<div class="megamenu-container">
									<div class="megamenu-grid-section">
										<div class="megamenu-column-wrapper">
											<div class="megamenu-column-content">
												<ul aria-labelledby="nav-title-about_us" role="menu">
													<li>
														<a href="<?php echo esc_url( home_url( "/vasco-innovations/" ) ); ?>" role="menuitem">
															Tin mới
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/vasco-ces-2026/" ) ); ?>" role="menuitem">
															CES 2026
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/about-us/" ) ); ?>" role="menuitem">
															Về Chúng Tôi
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/newsroom/" ) ); ?>" role="menuitem">
															Tin tức
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/initiatives/" ) ); ?>" role="menuitem">
															Tác động xã hội
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/articles/" ) ); ?>" role="menuitem">
															Blog
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div
											class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
											<a href="<?php echo esc_url( home_url( "/vasco-innovations/" ) ); ?>" role="menuitem">
												<div class="img-wrapper">
													<img alt="Vasco logo" class="js-menu-lazy-image"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_about_us_img1.webp" ); ?>"
														decoding="async" fetchpriority="low" loading="lazy" />
												</div>
												<div class="text-absolute">
													<p>Tin mới</p>
													<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="white" stroke-linecap="square" stroke-width="2">
															</path>
														</svg>Xem thêm</p>
												</div>
											</a>
										</div>
										<div
											class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
											<a href="<?php echo esc_url( home_url( "/about-us/" ) ); ?>" role="menuitem">
												<div class="img-wrapper">
													<img alt="Vasco About Us"
														class="js-menu-lazy-image"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_about_us_img1_default.webp" ); ?>"
														decoding="async" fetchpriority="low" loading="lazy" />
												</div>
												<div class="text-absolute">
													<p>Về Chúng Tôi</p>
													<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="white" stroke-linecap="square" stroke-width="2">
															</path>
														</svg>Xem thêm</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="menu-item-wrapper" role="none">
							<a aria-controls="submenu-how_it_works" aria-expanded="false" aria-haspopup="true"
								class="nav-link has-child" id="nav-title-how_it_works" role="menuitem" type="button" href="<?php echo esc_url( home_url( "/how-it-works/" ) ); ?>">
								Cách Hoạt Động
								<img alt="" aria-hidden="true" class="arrow-rotate"
									src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
							</a>
							<div class="megamenu-childs-wrapper" hidden="" id="submenu-how_it_works" role="menu">
								<div class="megamenu-container">
									<div class="megamenu-grid-section">
										<div class="megamenu-column-wrapper">
											<div class="megamenu-column-content">
												<ul aria-labelledby="nav-title-how_it_works" role="menu">
													<li>
														<a href="<?php echo esc_url( home_url( "/meet-vasco/" ) ); ?>" role="menuitem">
															Giới thiệu Vasco
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/how-it-works/" ) ); ?>" role="menuitem">
															Cách Hoạt Động
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/features-translate-voice/" ) ); ?>" role="menuitem">
															Dịch giọng nói
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/features-translate-photos/" ) ); ?>" role="menuitem">
															Dịch ảnh
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/features-translate-text/" ) ); ?>" role="menuitem">
															Dịch văn bản
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/call-translator/" ) ); ?>" role="menuitem">
															Dịch cuộc gọi
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/features-translate-chat/" ) ); ?>" role="menuitem">
															Nhiều người nói chuyện
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div
											class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
											<a href="<?php echo esc_url( home_url( "/meet-vasco/" ) ); ?>" role="menuitem">
												<div class="img-wrapper">
													<img alt="Meet Vasco"
														class="js-menu-lazy-image"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_how_it_works_img1.webp" ); ?>"
														decoding="async" fetchpriority="low" loading="lazy" />
												</div>
												<div class="text-absolute">
													<p>Giới thiệu Vasco</p>
													<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="white" stroke-linecap="square" stroke-width="2">
															</path>
														</svg>Xem thêm</p>
												</div>
											</a>
										</div>
										<div
											class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
											<a href="<?php echo esc_url( home_url( "/how-it-works/" ) ); ?>" role="menuitem">
												<div class="img-wrapper">
													<img alt="How it works"
														class="js-menu-lazy-image"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_how_it_works_img2.webp" ); ?>"
														decoding="async" fetchpriority="low" loading="lazy" />
												</div>
												<div class="text-absolute">
													<p>Cách Hoạt Động</p>
													<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="white" stroke-linecap="square" stroke-width="2">
															</path>
														</svg>Xem thêm</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="menu-item-wrapper" role="none">
							<a aria-controls="submenu-for_business" aria-expanded="false" aria-haspopup="true"
								class="nav-link has-child" id="nav-title-for_business" role="menuitem" type="button" href="<?php echo esc_url( home_url( "/business-healthcare/" ) ); ?>">
								Cho Doanh Nghiệp
								<img alt="" aria-hidden="true" class="arrow-rotate"
									src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
							</a>
							<div class="megamenu-childs-wrapper" hidden="" id="submenu-for_business" role="menu">
								<div class="megamenu-container">
									<div class="megamenu-grid-section">
										<div class="megamenu-column-wrapper">
											<p class="megamenu-column-title">
												Ngành nghề
												<img alt="" aria-hidden="true" class="arrow-rotate-sub"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
											</p>
											<div class="megamenu-column-content">
												<ul aria-labelledby="nav-title-for_business" role="menu">
													<li>
														<a href="<?php echo esc_url( home_url( "/business-education/" ) ); ?>" role="menuitem">
															Giáo dục
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/business-healthcare/" ) ); ?>" role="menuitem">
															Y tế
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/business-manufacturing/" ) ); ?>" role="menuitem">
															Sản xuất
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/business-ngo/" ) ); ?>" role="menuitem">
															Phi chính phủ (NGO)
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/business-hospitality/" ) ); ?>"
															role="menuitem">
															Du lịch &amp; Khách sạn
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/business-law-enforcement/" ) ); ?>" role="menuitem">
															Thực thi pháp luật
														</a>
													</li>
													<li>
														<a href="<?php echo esc_url( home_url( "/business-law-enforcement/" ) ); ?>" role="menuitem">
															Chính quyền địa phương
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div class="megamenu-column-wrapper">
											<p class="megamenu-column-title">
												Tính năng
												<img alt="" aria-hidden="true" class="arrow-rotate-sub"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
											</p>
											<div class="megamenu-column-content">
												<ul aria-labelledby="nav-title-for_business" role="menu">
													<li>
														<a href="<?php echo esc_url( home_url( "/business-healthcare/" ) ); ?>" role="menuitem">
															Vasco Audience - Dịch nhóm
														</a>
													</li>
												</ul>
											</div>
										</div>
										<div
											class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
											<a href="<?php echo esc_url( home_url( "/business-healthcare/" ) ); ?>" role="menuitem">
												<div class="img-wrapper">
													<img alt="Vasco Audience"
														class="js-menu-lazy-image"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_for_business_img1.webp" ); ?>"
														decoding="async" fetchpriority="low" loading="lazy" />
												</div>
												<div class="text-absolute">
													<p>Vasco Audience - Dịch nhóm</p>
													<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="white" stroke-linecap="square" stroke-width="2">
															</path>
														</svg>Xem thêm</p>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="menu-item-wrapper" role="none">
							<a class="nav-link" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" role="menuitem">
								Liên Hệ
							</a>
						</div>
					</nav>
				</div>
				<div class="right-nav">
					<!-- Phone icon (desktop) -->
					<div class="phone-number" id="phone-numbers">
						<a class="icon phone-icon-link" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" title="Liên hệ hỗ trợ">
							<img alt="Phone" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/phone-icon.svg" ); ?>" />
						</a>
						<div class="phone-numbers-wrapper">
							<div class="phone-numbers-list">
								<div class="phone-numbers-list-header">
									<p>Hỗ trợ khách hàng</p>
									<button aria-label="Close" class="close-icon" data-dismiss="modal" type="button">
										<svg fill="none" height="24" viewbox="0 0 32 32" width="24"
											xmlns="http://www.w3.org/2000/svg">
											<path clip-rule="evenodd"
												d="M18.7218 15.5862L27.6066 6.70147L24.7781 3.87305L15.8934 12.7578L7.2218 4.08625L4.39337 6.91468L13.0649 15.5862L3.56494 25.0863L6.39337 27.9147L15.8934 18.4147L25.6066 28.1279L28.435 25.2995L18.7218 15.5862Z"
												fill="white" fill-rule="evenodd"></path>
										</svg>
									</button>
								</div>
								<div class="phone-number-wrapper">
									<a class="phone-number-item" href="tel:0917834532" title="Việt Nam" style="display:flex;align-items:center;gap:10px;">
										<svg width="24" height="24" viewBox="0 0 40 40" fill="none"><circle cx="20" cy="20" r="20" fill="#DA251D"/><polygon fill="#FFFF00" points="20,8 22.47,15.09 30,15.09 24.26,19.27 26.18,26.91 20,22.36 13.82,26.91 15.74,19.27 10,15.09 17.53,15.09"/></svg>
										0917.834.532
									</a>
									<div class="phone-number-working-hours">
										<div class="phone-number-placeholder"></div>
										<div class="phone-number-working-hours-list">
											<p class="phone-number-working-hours-list-header">Giờ làm việc:</p>
											<p>Thứ 2 - Thứ 7: 08:00 SA - 08:00 CH</p>
										</div>
									</div>
								</div>
								<div class="phone-number-wrapper contact-link">
									<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" title="LIÊN HỆ NGAY">
										LIÊN HỆ NGAY
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="language_selector icon" id="language_selector">
						<button aria-label="Việt Nam" class="switcher">
							<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
								xmlns="http://www.w3.org/2000/svg">
								<g clip-path="url(#clip-vn-main2)">
									<circle cx="20" cy="20" fill="#DA251D" r="20"></circle>
									<polygon fill="#FFFF00"
										points="20,8 22.47,15.09 30,15.09 24.26,19.27 26.18,26.91 20,22.36 13.82,26.91 15.74,19.27 10,15.09 17.53,15.09">
									</polygon>
								</g>
								<defs>
									<clippath id="clip-vn-main2">
										<rect fill="white" height="40" rx="20" width="40"></rect>
									</clippath>
								</defs>
							</svg>
						</button>
						<div class="languages-wrapper-box">
							<div class="languages-box">
								<p class="lang-box-title">Địa điểm giao hàng</p>
								<button aria-label="Việt Nam" class="lang-flex selectorSwitcher switcher">
									<div class="lang_box">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip-vn-main2)">
												<circle cx="20" cy="20" fill="#DA251D" r="20"></circle>
												<polygon fill="#FFFF00"
													points="20,8 22.47,15.09 30,15.09 24.26,19.27 26.18,26.91 20,22.36 13.82,26.91 15.74,19.27 10,15.09 17.53,15.09">
												</polygon>
											</g>
											<defs>
												<clippath id="clip-vn-main2">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<p>Việt Nam</p>
									</div>
									<p class="switch-text">thay đổi</p>
								</button>
							</div>
						</div>
					</div>
					<dialog class="basic-dialog selector-dialog" data-modal="">
						<div class="product-icons-modal-header basic-dialog-header">
							<h2>Chọn địa điểm giao hàng của bạn</h2>
							<button aria-label="Close" class="close-dialog-icon" data-dismiss="modal" type="button">
								<svg fill="none" height="24" viewbox="0 0 32 32" width="24"
									xmlns="http://www.w3.org/2000/svg">
									<path clip-rule="evenodd"
										d="M18.7218 15.5862L27.6066 6.70147L24.7781 3.87305L15.8934 12.7578L7.2218 4.08625L4.39337 6.91468L13.0649 15.5862L3.56494 25.0863L6.39337 27.9147L15.8934 18.4147L25.6066 28.1279L28.435 25.2995L18.7218 15.5862Z"
										fill="white" fill-rule="evenodd"></path>
								</svg>
							</button>
						</div>
						<div class="product-icons-modal-body basic-dialog-body">
							<p>Địa điểm giao hàng của bạn</p>
							<div class="selector-dialog-grid">
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN България">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1567)">
											<path
												d="M38.8227 13.0078L20.0039 6.50781L1.18516 13.0078C0.3875 15.2109 0 17.6016 0 20C0 22.3984 0.398438 24.8047 1.19531 27L20.0039 36.0625L38.8047 27C39.6016 24.7969 40 22.3984 40 20C40 17.6016 39.6203 15.2109 38.8227 13.0078Z"
												fill="#496E2D"></path>
											<path
												d="M20.0078 40C28.6094 40 36.0078 34.6016 38.8047 27H1.19531C4 34.6016 11.3984 40 20.0078 40Z"
												fill="#D80027"></path>
											<path
												d="M19.9977 0C11.3883 0 3.98203 5.40625 1.18516 13.0078H38.8234C36.0258 5.40625 28.5992 0 19.9977 0Z"
												fill="#F0F0F0"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1567">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>България</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>"
									title="VASCO VN Česká republika">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1559)">
											<path
												d="M39.9998 20C39.9998 20.1328 39.9998 20.2656 39.9998 20.3984H23.203L23.0702 20.3203L4.18738 7.75C7.85144 3.03125 13.5702 0 19.9999 0C31.0467 0 39.9998 8.95312 39.9998 20Z"
												fill="#F0F0F0"></path>
											<path
												d="M23.0703 20.3203L4.1875 7.75C1.57031 11.1328 0.0078125 15.375 0 19.9766C0 19.9844 0 19.9922 0 20C0 24.8828 1.75 29.3594 4.66406 32.8281L23.2188 20.4063L23.0703 20.3203Z"
												fill="#11457E"></path>
											<path
												d="M22.5155 39.8438C22.5936 39.8359 22.6717 39.8203 22.7499 39.8125C32.367 38.4922 39.8045 30.3359 39.9998 20.3984H23.1874L4.578 32.7344C8.24206 37.1719 13.7889 39.9922 19.9921 40C20.8358 40 21.6796 39.9453 22.5155 39.8438C22.5155 39.8438 22.5077 39.8438 22.5155 39.8438Z"
												fill="#D7141A"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1559">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Česká republika</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Danmark">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1558)">
											<path
												d="M10.3983 2.45312V17.3984H0.171692C1.00763 10.9453 4.92169 5.45312 10.3983 2.45312Z"
												fill="#D80027"></path>
											<path
												d="M39.8279 17.3984H15.6014V0.484375C17.0154 0.171875 18.492 0 19.9998 0C30.1639 0 38.5545 7.57812 39.8279 17.3984Z"
												fill="#D80027"></path>
											<path
												d="M0.171692 22.6016H10.3983V37.5469C4.92169 34.5469 1.00763 29.0547 0.171692 22.6016Z"
												fill="#D80027"></path>
											<path
												d="M39.8279 22.6016C38.5545 32.4219 30.1639 40 19.9998 40C18.492 40 17.0154 39.8281 15.6014 39.5156V22.6016H39.8279Z"
												fill="#D80027"></path>
											<path
												d="M40 20C40 20.8828 39.9453 21.75 39.8281 22.6016H15.6016V39.5156C13.7578 39.1016 12.0078 38.4375 10.3984 37.5469V22.6016H0.171875C0.0546875 21.75 0 20.8828 0 20C0 19.1172 0.0546875 18.25 0.171875 17.3984H10.3984V2.45313C12.0078 1.57031 13.7578 0.898438 15.6016 0.484375V17.3984H39.8281C39.9453 18.25 40 19.1172 40 20Z"
												fill="#F0F0F0"></path>
											<path
												d="M15.6015 0.484375V39.5156C13.7577 39.1016 12.0077 38.4375 10.3983 37.5469V2.45313C12.0077 1.57031 13.7577 0.898438 15.6015 0.484375Z"
												fill="#F0F0F0"></path>
											<path
												d="M40 20C40 20.8828 39.9453 21.75 39.8281 22.6016H0.171875C0.0546875 21.75 0 20.8828 0 20C0 19.1172 0.0546875 18.25 0.171875 17.3984H39.8359C39.9453 18.25 40 19.1172 40 20Z"
												fill="#F0F0F0"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1558">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Danmark</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Deutschland">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M1.20309 27C3.99997 34.6016 11.3984 40 20 40C28.6015 40 36 34.6016 38.7968 27L20 25.2032L1.20309 27Z"
											fill="#FFDA44"></path>
										<path
											d="M20 0C11.3984 0 3.99997 5.39844 1.20309 13L20 14.7969L38.7968 13C36 5.39844 28.6015 0 20 0Z"
											fill="black"></path>
										<path
											d="M1.20312 13C0.398437 15.2031 0 17.6015 0 20C0 22.3984 0.398437 24.7968 1.20312 27H38.7969C39.5938 24.7968 40 22.3984 40 20C40 17.6015 39.6016 15.2031 38.7969 13H1.20312Z"
											fill="#D80027"></path>
									</svg>
									<span>Deutschland</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>"
									title="VASCO VN United Kingdom">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1556)">
											<path
												d="M39.4218 15.2031C39.0703 13.7656 38.5624 12.3984 37.914 11.1016L32.1718 15.2031H39.4218Z"
												fill="#000066"></path>
											<path
												d="M0.687515 25.2031C1.06252 26.5938 1.57814 27.9219 2.22658 29.1797L7.78908 25.2031H0.687515Z"
												fill="#000066"></path>
											<path
												d="M5.78125 34.0625C8.32812 36.6406 11.5703 38.5234 15.2031 39.4141V27.3281L5.78125 34.0625Z"
												fill="#000066"></path>
											<path
												d="M25 39.3672C28.6406 38.4297 31.8828 36.4922 34.4062 33.8672L25 27.1484V39.3672Z"
												fill="#000066"></path>
											<path
												d="M37.8985 28.9375C38.4922 27.7578 38.9688 26.5078 39.3204 25.2031H32.6719L37.8985 28.9375Z"
												fill="#000066"></path>
											<path
												d="M15.2031 0.578125C11.5469 1.47656 8.28906 3.38281 5.74219 5.97656L15.2031 12.7344V0.578125Z"
												fill="#000066"></path>
											<path
												d="M34.4375 6.15625C31.9062 3.51563 28.6563 1.57031 25 0.632812V12.9062L34.4375 6.15625Z"
												fill="#000066"></path>
											<path
												d="M2.1953 10.875C1.49998 12.2344 0.95311 13.6797 0.57811 15.2031H8.2578L2.1953 10.875Z"
												fill="#000066"></path>
											<path
												d="M31.0468 25.2031L37.4453 29.7734C37.6015 29.5 37.75 29.2187 37.8906 28.9297L32.664 25.1953H31.0468V25.2031Z"
												fill="#F0F0F0"></path>
											<path
												d="M9.92967 15.2031L2.67186 10.0156C2.5078 10.2969 2.35155 10.5859 2.20311 10.875L8.26561 15.2031H9.92967Z"
												fill="#F0F0F0"></path>
											<path
												d="M25 25.2031V27.1562L34.4062 33.875C35.125 33.1328 35.7812 32.3281 36.3828 31.4766L27.6016 25.2031H25Z"
												fill="#F0F0F0"></path>
											<path
												d="M15.2031 15.2031V12.7344L5.7422 5.97656C5.02345 6.71094 4.35939 7.49219 3.75783 8.32812L13.375 15.1953H15.2031V15.2031Z"
												fill="#F0F0F0"></path>
											<path
												d="M32.1719 15.2031L37.9141 11.1016C37.4532 10.1719 36.9141 9.27344 36.3203 8.42969L26.8438 15.2031H32.1719Z"
												fill="#F0F0F0"></path>
											<path
												d="M15.2031 26.0938L5.08595 33.3203C5.31252 33.5703 5.54689 33.8203 5.78127 34.0625L15.2031 27.3281V26.0938Z"
												fill="#F0F0F0"></path>
											<path
												d="M7.78906 25.2031L2.22656 29.1797C2.69531 30.0859 3.22656 30.9453 3.82031 31.7656L13 25.2109H7.78906V25.2031Z"
												fill="#F0F0F0"></path>
											<path
												d="M25 14.0625L35.0781 6.86719C34.8672 6.625 34.6562 6.39062 34.4375 6.16406L25 12.8984V14.0625Z"
												fill="#F0F0F0"></path>
											<path
												d="M25 15.2031H26.8438L36.3203 8.42969C35.9297 7.88281 35.5156 7.35938 35.0781 6.85938L25 14.0625V15.2031Z"
												fill="#CC0000"></path>
											<path
												d="M13.375 15.2031L3.7578 8.33594C3.36717 8.875 3.0078 9.4375 2.67186 10.0156L9.92967 15.2031H13.375Z"
												fill="#CC0000"></path>
											<path
												d="M15.2031 25.2031H13L3.8203 31.7578C4.21092 32.2969 4.6328 32.8203 5.07811 33.3203L15.2031 26.0937V25.2031Z"
												fill="#CC0000"></path>
											<path
												d="M15.2032 15.2031H17V0.226562C16.3907 0.320312 15.7891 0.4375 15.2032 0.585937V12.7344V15.2031Z"
												fill="#F0F0F0"></path>
											<path
												d="M25 25.2031H23V39.7734C23.6797 39.6719 24.3437 39.5391 25 39.3672V27.1562V25.2031Z"
												fill="#F0F0F0"></path>
											<path
												d="M17 25.2031H15.2032V26.0937V27.3359V39.4219C15.7891 39.5703 16.3907 39.6875 17 39.7812V25.2031Z"
												fill="#F0F0F0"></path>
											<path
												d="M23 15.2031H25V14.0625V12.9062V0.632812C24.3437 0.460938 23.6797 0.328125 23 0.226562V15.2031Z"
												fill="#F0F0F0"></path>
											<path
												d="M27.6016 25.2031L36.3828 31.4766C36.7656 30.9297 37.125 30.3672 37.4531 29.7813L31.0547 25.2109H27.6016V25.2031Z"
												fill="#CC0000"></path>
											<path
												d="M32.1718 15.2031H26.8437H25H23V17.2031H39.8047C39.7109 16.5234 39.5781 15.8594 39.4218 15.2031H32.1718Z"
												fill="#F0F0F0"></path>
											<path
												d="M17 17.2031V15.2031H15.2031H13.375H9.92969H8.25781H0.578125C0.414063 15.8594 0.289062 16.5234 0.195312 17.2031H17Z"
												fill="#F0F0F0"></path>
											<path
												d="M23 23.2031V25.2031H25H27.6015H31.0468H32.6718H39.3203C39.4922 24.5469 39.6406 23.8828 39.75 23.2031H23Z"
												fill="#F0F0F0"></path>
											<path
												d="M13 25.2031H15.2031H17V23.2031H0.257828C0.367203 23.8828 0.507828 24.5469 0.687515 25.2031H7.78908H13Z"
												fill="#F0F0F0"></path>
											<path
												d="M39.8047 17.2031H23V15.2031V0.226562C22.0234 0.078125 21.0234 0 20 0C18.9766 0 17.9766 0.078125 17 0.226562V15.2031V17.2031H0.195312C0.0703125 18.1172 0 19.0469 0 20C0 21.0938 0.0859375 22.1562 0.257812 23.2031H17V25.2031V39.7734C17.9766 39.9219 18.9766 40 20 40C21.0234 40 22.0234 39.9219 23 39.7734V25.2031V23.2031H39.7422C39.9062 22.1562 40 21.0938 40 20C40 19.0469 39.9297 18.1172 39.8047 17.2031Z"
												fill="#CC0000"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1556">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>United Kingdom</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>"
									title="VASCO VN United States">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1555)">
											<path
												d="M19.9609 39.9609C31.0066 39.9609 39.9609 31.0066 39.9609 19.9609C39.9609 8.91524 31.0066 -0.0390625 19.9609 -0.0390625C8.91524 -0.0390625 -0.0390625 8.91524 -0.0390625 19.9609C-0.0390625 31.0066 8.91524 39.9609 19.9609 39.9609Z"
												fill="#F0F0F0"></path>
											<path
												d="M19.1641 19.9609H39.961C39.961 18.1641 39.7579 16.3594 39.3594 14.7578H19.1641V19.9609Z"
												fill="#D80027"></path>
											<path
												d="M19.1641 9.5625H37.1641C35.961 7.5625 34.3672 5.76563 32.5626 4.35938H19.1641C19.1641 4.35937 19.1641 9.5625 19.1641 9.5625Z"
												fill="#D80027"></path>
											<path
												d="M19.961 39.9609C24.7579 39.9609 28.961 38.3594 32.3594 35.5625H7.56256C10.961 38.3594 15.1641 39.9609 19.961 39.9609Z"
												fill="#D80027"></path>
											<path
												d="M2.96097 30.3594H37.1641C38.1641 28.7578 38.961 26.9609 39.3672 25.1562H0.562531C1.16409 26.9609 1.96097 28.7578 2.96097 30.3594Z"
												fill="#D80027"></path>
											<path
												d="M9.16406 3.16406H10.9609L9.35938 4.36719L9.96094 6.36719L8.35938 5.16406L6.5625 6.35938L7.16406 4.5625C5.75781 5.75781 4.35938 7.35938 3.35938 8.96094H3.96094L2.75781 9.75781C2.55469 9.96094 2.55469 10.1563 2.35938 10.5547L2.96094 12.1562L1.96094 11.3594C1.5625 11.9609 1.35938 12.3594 1.16406 12.9609L1.76562 14.7578H3.76562L2.16406 15.9609L2.76562 17.9609L1.16406 16.7578L0.164062 17.5625C-0.0390625 18.3594 -0.0390625 19.1641 -0.0390625 19.9609H19.9609C19.9609 8.96094 19.9609 7.5625 19.9609 -0.0390625C15.9609 -0.0390625 12.3594 1.16406 9.16406 3.16406ZM9.96094 17.9609L8.35938 16.7578L6.5625 17.9609L7.16406 15.9609L5.5625 14.7578H7.5625L8.16406 12.7578L8.76562 14.7578H10.7656L9.36719 15.9609L9.96094 17.9609ZM9.35938 10.1641L9.96094 12.1641L8.35938 10.9609L6.5625 12.1641L7.16406 10.1641L5.5625 8.96094H7.5625L8.16406 6.96094L8.76562 8.96094H10.7656L9.35938 10.1641ZM17.1641 17.9609L15.5625 16.7578L13.7656 17.9609L14.3672 15.9609L12.7656 14.7578H14.7656L15.3672 12.7578L15.9688 14.7578H17.9688L16.5625 15.9609L17.1641 17.9609ZM16.5625 10.1641L17.1641 12.1641L15.5625 10.9609L13.7656 12.1641L14.3672 10.1641L12.7656 8.96094H14.7656L15.3672 6.96094L15.9688 8.96094H17.9688L16.5625 10.1641ZM16.5625 4.35938L17.1641 6.35938L15.5625 5.15625L13.7656 6.35938L14.3672 4.35938L12.7656 3.15625H14.7656L15.3672 1.15625L15.9688 3.15625H17.9688L16.5625 4.35938Z"
												fill="#0052B4"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1555">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>United States</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN España">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M20 0C13.1875 0 7.1797 3.40625 3.56252 8.60156H36.4297C32.8203 3.40625 26.8125 0 20 0Z"
											fill="#D80228"></path>
										<path
											d="M20 40.0001C26.8906 40.0001 32.9765 36.5079 36.5703 31.2032H3.42967C7.02342 36.5079 13.1094 40.0001 20 40.0001Z"
											fill="#D80228"></path>
										<path
											d="M0 19.9999C0 24.1483 1.26562 28.0077 3.42969 31.203H36.5703C38.7344 28.0077 40 24.1483 40 19.9999C40 15.7655 38.6797 11.8358 36.4375 8.60147H3.5625C1.32031 11.8358 0 15.7655 0 19.9999Z"
											fill="#FEDB45"></path>
									</svg>
									<span>España</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Suomi">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1551)">
											<path
												d="M19.9999 40C31.0413 40 39.9921 31.0457 39.9921 20C39.9921 8.9543 31.0413 0 19.9999 0C8.95856 0 0.00775146 8.9543 0.00775146 20C0.00775146 31.0457 8.95856 40 19.9999 40Z"
												fill="#F0F0F0"></path>
											<path
												d="M39.789 17.3984H15.6015V0.398438C13.8046 0.796875 11.9999 1.60156 10.3984 2.39844V17.3984H0.210876C0.00775148 18.2031 0.00775146 19.2031 0.00775146 20C0.00775146 20.7969 0.00775148 21.7969 0.210876 22.6016H10.4062V37.6016C12.0077 38.3984 13.8046 39.2031 15.6093 39.6016V22.6016H39.8046C40.0077 21.8047 40.0077 20.8047 40.0077 20C39.9921 19.2031 39.9921 18.2031 39.789 17.3984Z"
												fill="#0052B4"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1551">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Suomi</span>
								</a>
								<a class="lang_box switcher" href="#" title="VASCO VN Belgique">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<path
											d="M27 38.7969C34.6016 36 40 28.6016 40 20C40 11.3985 34.6016 4.00002 27 1.20315L25.2032 20L27 38.7969Z"
											fill="#C8102E"></path>
										<path
											d="M0 20C0 28.6016 5.39844 36 13 38.7969L14.7969 20L13 1.20315C5.39844 4.00002 0 11.3985 0 20Z"
											fill="#2D2926"></path>
										<path
											d="M13 38.7969C15.2031 39.6016 17.6015 40 20 40C22.3984 40 24.7969 39.6016 27 38.7969V1.20315C24.7969 0.406272 22.3984 0 20 0C17.6015 0 15.2031 0.398459 13 1.20315V38.7969Z"
											fill="#FFCD00"></path>
									</svg>
									<span>Belgique</span>
								</a>
								<a class="lang_box switcher" href="#" title="VASCO VN Canada">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1550)">
											<path
												d="M11.3984 1.9375V38.0547C4.65625 34.8437 0 27.9687 0 20C0 12.0312 4.65625 5.15625 11.3984 1.9375Z"
												fill="#D80027"></path>
											<path
												d="M39.9999 20C39.9999 27.9688 35.3436 34.8438 28.6015 38.0625V1.9375C35.3436 5.15625 39.9999 12.0313 39.9999 20Z"
												fill="#D80027"></path>
											<path
												d="M28.6017 1.9375V38.0547C26.0001 39.3047 23.0782 40 20.0001 40C16.922 40 14.0001 39.3047 11.3985 38.0625V1.9375C14.0001 0.695312 16.922 0 20.0001 0C23.0782 0 26.0001 0.695312 28.6017 1.9375Z"
												fill="#F0F0F0"></path>
											<path
												d="M23.3985 22.6016L27.0001 20.7969L25.2032 20V18.2031L21.797 20L23.3985 16.6016H21.797L20.0001 14L18.2032 16.6016H16.6017L18.2032 20L14.797 18.2031V20L13.0001 20.7969L16.6017 22.6016L15.6017 24.3984H19.2032V27H20.797V24.3984H24.3985L23.3985 22.6016Z"
												fill="#D80027"></path>
											<path
												d="M23.3985 22.6016L27.0001 20.7969L25.2032 20V18.2031L21.797 20L23.3985 16.6016H21.797L20.0001 14L18.2032 16.6016H16.6017L18.2032 20L14.797 18.2031V20L13.0001 20.7969L16.6017 22.6016L15.6017 24.3984H19.2032V27H20.797V24.3984H24.3985L23.3985 22.6016Z"
												fill="#D80027"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1550">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Canada</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN France">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1549)">
											<path
												d="M20.0001 40C22.461 40 24.8204 39.5547 27.0001 38.7422V1.25781C24.8204 0.445313 22.461 0 20.0001 0C17.5391 0 15.1798 0.445313 13.0001 1.25781V38.7344C15.1798 39.5547 17.5391 40 20.0001 40Z"
												fill="#F0F0F0"></path>
											<path
												d="M39.9296 21.5469C39.9296 21.5391 39.9296 21.5312 39.9296 21.5234C39.9374 21.3828 39.953 21.2344 39.9608 21.0937C39.9608 21.0547 39.9686 21.0078 39.9686 20.9687C39.9764 20.8516 39.9764 20.7344 39.9843 20.6172C39.9843 20.5703 39.9843 20.5312 39.9921 20.4844C39.9921 20.3281 39.9999 20.1719 39.9999 20.0156C39.9999 19.8594 39.9999 19.7031 39.9921 19.5469C39.9921 19.5 39.9921 19.4609 39.9843 19.4141C39.9843 19.2969 39.9764 19.1797 39.9686 19.0625C39.9686 19.0234 39.9608 18.9766 39.9608 18.9375C39.953 18.7891 39.9452 18.6484 39.9296 18.5078C39.9296 18.5 39.9296 18.4922 39.9296 18.4844C39.328 10.5469 34.1249 3.92969 26.9999 1.25781V38.7344C34.1249 36.0703 39.328 29.4531 39.9296 21.5469Z"
												fill="#D80027"></path>
											<path
												d="M0.015625 20.6016C0.015625 20.7187 0.0234375 20.8359 0.03125 20.9531C0.03125 20.9922 0.0390625 21.0391 0.0390625 21.0781C0.046875 21.2266 0.0546875 21.3672 0.0703125 21.5078C0.0703125 21.5156 0.0703125 21.5234 0.0703125 21.5312C0.671875 29.4375 5.875 36.0625 13 38.7266V1.25781C5.875 3.92969 0.671875 10.5469 0.0703125 18.4531C0.0703125 18.4609 0.0703125 18.4687 0.0703125 18.4766C0.0625 18.6172 0.046875 18.7656 0.0390625 18.9062C0.0390625 18.9453 0.03125 18.9922 0.03125 19.0312C0.0234375 19.1484 0.0234375 19.2656 0.015625 19.3828C0.015625 19.4297 0.015625 19.4687 0.0078125 19.5156C0.0078125 19.6719 0 19.8281 0 19.9844C0 20.1406 0 20.2969 0.0078125 20.4531C0.015625 20.5156 0.015625 20.5625 0.015625 20.6016Z"
												fill="#0052B4"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1549">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>France</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Hrvatska">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1560)">
											<path
												d="M40 19.9609C40 17.5625 39.6016 15.1641 38.7969 12.9609L20 12.1641L1.20312 12.9609C0.398437 15.1641 0 17.5625 0 19.9609C0 22.3594 0.398437 24.7578 1.20312 26.9609L20 27.7578L38.7969 26.9609C39.6016 24.7578 40 22.3594 40 19.9609Z"
												fill="#F0F0F0"></path>
											<path
												d="M20.0001 39.9609C28.6016 39.9609 36.0001 34.5625 38.7969 26.9609H1.20319C4.00006 34.5625 11.3985 39.9609 20.0001 39.9609Z"
												fill="#0052B4"></path>
											<path
												d="M1.20319 12.9609H38.8047C36.0001 5.35937 28.6016 -0.0390625 20.0001 -0.0390625C11.3985 -0.0390625 4.00006 5.35937 1.20319 12.9609Z"
												fill="#D80027"></path>
											<path
												d="M20.3984 13.9609H18.2031L18.6016 10.3594L20 8.96094L21.3984 10.3594V13.1641L20.3984 13.9609Z"
												fill="#338AF3"></path>
											<path
												d="M26.0001 13.9609H23.797L24.2032 10.3594L25.6017 8.96094L27.0001 10.3594V13.1641L26.0001 13.9609Z"
												fill="#338AF3"></path>
											<path
												d="M14.0001 13.9609H16.2032L15.7969 10.3594L14.3985 8.96094L13.0001 10.3594V13.1641L14.0001 13.9609Z"
												fill="#338AF3"></path>
											<path
												d="M18.6016 13.9609H15.7969V10.3594L17.2031 8.96094L18.6016 10.3594V13.9609Z"
												fill="#0052B4"></path>
											<path
												d="M24.2032 13.9609H21.3985V10.3594L22.7969 8.96094L24.2032 10.3594V13.9609Z"
												fill="#0052B4"></path>
											<path
												d="M13.0001 12.9609V22.5625C13.0001 24.7656 14.2032 26.9609 15.7969 28.1641L17.0001 27.7656L18.6016 29.3672C19.0001 29.3672 19.6016 29.5703 20.0001 29.5703C20.3985 29.5703 21.0001 29.5703 21.3985 29.3672L23.1954 27.9688L24.1954 28.1719C25.7969 26.9688 26.9922 24.9688 26.9922 22.5703V12.9609H13.0001Z"
												fill="#F0F0F0"></path>
											<path d="M15.7969 12.9609H13.0001V15.7578H15.7969V12.9609Z" fill="#D80027">
											</path>
											<path d="M21.3986 12.9609H18.6017V15.7578H21.3986V12.9609Z" fill="#D80027">
											</path>
											<path d="M27.0001 12.9609H24.2032V15.7578H27.0001V12.9609Z" fill="#D80027">
											</path>
											<path d="M18.5938 15.7578H15.7969V18.5547H18.5938V15.7578Z" fill="#D80027">
											</path>
											<path d="M24.1954 15.7578H21.3985V18.5547H24.1954V15.7578Z" fill="#D80027">
											</path>
											<path d="M15.7969 18.5625H13.0001V21.3594H15.7969V18.5625Z" fill="#D80027">
											</path>
											<path d="M18.5938 21.3594H15.7969V24.1562H18.5938V21.3594Z" fill="#D80027">
											</path>
											<path d="M21.3986 18.5625H18.6017V21.3594H21.3986V18.5625Z" fill="#D80027">
											</path>
											<path d="M27.0001 18.5625H24.2032V21.3594H27.0001V18.5625Z" fill="#D80027">
											</path>
											<path d="M24.1954 21.3594H21.3985V24.1562H24.1954V21.3594Z" fill="#D80027">
											</path>
											<path d="M21.3986 24.1641H18.6017V26.9609H21.3986V24.1641Z" fill="#D80027">
											</path>
											<path
												d="M15.7969 24.1641H13.2031C13.4062 25.1641 14 26.1641 14.6016 26.9609H15.8047C15.7969 26.9609 15.7969 24.1641 15.7969 24.1641Z"
												fill="#D80027"></path>
											<path
												d="M24.2032 26.9609H25.4064C26.0079 26.1641 26.6095 25.1641 26.8048 24.1641H24.2032V26.9609Z"
												fill="#D80027"></path>
											<path
												d="M15.7969 26.9609V28.1641C16.5937 28.7656 17.5938 29.1641 18.5938 29.3672V26.9688L15.7969 26.9609Z"
												fill="#D80027"></path>
											<path
												d="M21.3985 26.9609V29.3594C22.3985 29.1562 23.3985 28.7578 24.1954 28.1562V26.9531H21.3985V26.9609Z"
												fill="#D80027"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1560">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Hrvatska</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Magyarország">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1536)">
											<path
												d="M1.20312 13C0.398437 15.2031 0 17.6015 0 20C0 22.3984 0.398437 24.7968 1.20312 27L20 28.7968L38.7969 27C39.5938 24.7968 40 22.3984 40 20C40 17.6015 39.6016 15.2031 38.7969 13L20 11.3984L1.20312 13Z"
												fill="#F0F0F0"></path>
											<path
												d="M20 0C11.3984 0 3.99997 5.39844 1.20309 13H38.8047C36 5.39844 28.6015 0 20 0Z"
												fill="#D80027"></path>
											<path
												d="M20 40C28.6015 40 36 34.6016 38.7968 27H1.20309C3.99997 34.6016 11.3984 40 20 40Z"
												fill="#6DA544"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1536">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Magyarország</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Italia">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1531)">
											<path
												d="M27.0039 1.26169C24.8242 0.449188 22.457 0.00387573 19.9961 0.00387573C17.5352 0.00387573 15.1758 0.449188 12.9961 1.26169L12.9922 18.3304L12.9883 38.7461C15.168 39.5586 17.5352 39.9961 19.9961 39.9961C22.457 39.9961 24.832 39.5429 27.0117 38.7304L27.0078 18.9508L27.0039 1.26169Z"
												fill="#F0F0F0"></path>
											<path
												d="M39.9999 20C39.9999 11.4141 34.5937 4.10391 26.9999 1.26016V38.7344C34.5937 35.8984 39.9999 28.5859 39.9999 20Z"
												fill="#D80027"></path>
											<path
												d="M0 20C0 28.5859 5.40391 35.9063 12.9977 38.75L13.0008 1.26016C5.40703 4.10391 0 11.4141 0 20Z"
												fill="#6DA544"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1531">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Italia</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN 日本">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1530)">
											<path
												d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40Z"
												fill="#F0F0F0"></path>
											<path
												d="M20.0001 28.6015C24.7506 28.6015 28.6017 24.7505 28.6017 20C28.6017 15.2495 24.7506 11.3984 20.0001 11.3984C15.2496 11.3984 11.3985 15.2495 11.3985 20C11.3985 24.7505 15.2496 28.6015 20.0001 28.6015Z"
												fill="#D80027"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1530">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>日本</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Lietuva">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1526)">
											<path
												d="M38.7969 27C39.5938 24.7968 40 22.3984 40 20C40 17.6015 39.6016 15.2031 38.7969 13L20 11.3984L1.20312 13C0.398437 15.2031 0 17.6015 0 20C0 22.3984 0.398437 24.7968 1.20312 27L20 28.7968L38.7969 27Z"
												fill="#6DA544"></path>
											<path
												d="M38.797 13C36.0001 5.39844 28.6017 0 20.0001 0C11.3985 0 4.00009 5.39844 1.20322 13H38.797Z"
												fill="#FFDA44"></path>
											<path
												d="M20.0001 40C28.6017 40 36.0001 34.6016 38.797 27H1.20322C4.00009 34.6016 11.3985 40 20.0001 40Z"
												fill="#D80027"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1526">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Lietuva</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Nederland">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1557)">
											<path
												d="M38.9297 13.5312H1.07031C3.75781 5.66406 11.2187 0 20 0C28.7812 0 36.2422 5.66406 38.9297 13.5312Z"
												fill="#A2001D"></path>
											<path
												d="M38.5313 27.5312C35.5547 34.8438 28.3828 40 20 40C11.6172 40 4.44531 34.8438 1.46875 27.5312H38.5313Z"
												fill="#0052B4"></path>
											<path
												d="M40 20C40 22.6641 39.4766 25.2109 38.5312 27.5312H1.46875C0.523437 25.2109 0 22.6641 0 20C0 17.7344 0.375 15.5625 1.07031 13.5312H38.9297C39.625 15.5625 40 17.7344 40 20Z"
												fill="#F0F0F0"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1557">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Nederland</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Polska">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1502)">
											<path d="M0 20C0 8.95312 8.95312 0 20 0C31.0469 0 40 8.95312 40 20H0Z"
												fill="#F0F0F0"></path>
											<path d="M40 20C40 31 31 40 20 40C9 40 0 31 0 20H40Z" fill="#BE0026"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1502">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Polska</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Portugal">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1504)">
											<path
												d="M-0.0390625 20.0001C-0.0390625 28.6017 5.35937 36.0001 12.9609 38.797L14.7578 20.0001L12.9609 1.20322C5.35937 4.00009 -0.0390625 11.3985 -0.0390625 20.0001Z"
												fill="#6DA544"></path>
											<path
												d="M39.961 20C39.961 9 30.961 0 19.961 0C17.5626 0 15.1641 0.398437 12.961 1.20312V38.7969C15.1641 39.5938 17.5626 40 19.961 40C30.961 40 39.961 31 39.961 20Z"
												fill="#D80027"></path>
											<path
												d="M13.0079 27.0001C16.8739 27.0001 20.0079 23.8661 20.0079 20.0001C20.0079 16.1341 16.8739 13.0001 13.0079 13.0001C9.14194 13.0001 6.00793 16.1341 6.00793 20.0001C6.00793 23.8661 9.14194 27.0001 13.0079 27.0001Z"
												fill="#FFDA44"></path>
											<path
												d="M9.00775 16.6016V20.9297C9.00775 23.1172 10.7343 24.9531 12.9296 25C15.1718 25.0469 17.0078 23.2344 17.0078 21V16.6016H9.00775Z"
												fill="#D80027"></path>
											<path
												d="M13.0704 22.2032C12.2735 22.2032 11.6719 21.6016 11.6719 20.8047V19H14.3438V20.7344C14.3907 21.5313 13.8672 22.2032 13.0704 22.2032Z"
												fill="#F0F0F0"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1504">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Portugal</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN România">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1506)">
											<path
												d="M13.2812 38.8421L18.6906 19.9999L13.2812 1.15775C5.54062 3.91868 0 11.3117 0 19.9999C0 28.6882 5.54062 36.0812 13.2812 38.8421Z"
												fill="#0052B4"></path>
											<path
												d="M26.7189 38.8421L21.747 19.9999L26.7189 1.15775C34.4595 3.91868 40.0001 11.3117 40.0001 19.9999C40.0001 28.6882 34.4595 36.0812 26.7189 38.8421Z"
												fill="#D80027"></path>
											<path
												d="M26.7188 1.15781C24.6187 0.409375 22.357 0 20 0C17.643 0 15.3812 0.409375 13.2812 1.15781V38.8422C15.3812 39.5914 17.643 40 20 40C22.357 40 24.6187 39.5906 26.7188 38.8422V1.15781Z"
												fill="#FFDA44"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1506">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>România</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Slovensko">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1495)">
											<path
												d="M38.75 13.0141C35.914 5.42813 28.5804 0 20.0023 0C11.4242 0 4.09607 5.41406 1.25232 13.0078L20.2758 15.7875L38.75 13.0141Z"
												fill="#F0F0F0"></path>
											<path
												d="M38.7266 27C39.5469 24.8203 40 22.4531 40 20C40 19.8281 40 19.664 39.9922 19.4922C39.9922 19.4765 39.9922 19.4609 39.9922 19.4453C39.9297 17.1797 39.4922 15.0078 38.7422 12.9922H1.25781C0.507812 15.0156 0.0703125 17.1875 0.0078125 19.4531C0.0078125 19.4687 0.0078125 19.4844 0.0078125 19.5C0 19.664 0 19.8281 0 20C0 22.4609 0.445313 24.8437 1.26562 27.0234L18.9766 29.1633L38.7266 27Z"
												fill="#0052B4"></path>
											<path
												d="M20.6093 39.9844C20.7265 39.9844 20.8437 39.9766 20.9609 39.9688C21 39.9688 21.0468 39.9609 21.0859 39.9609C21.2343 39.9531 21.375 39.9453 21.5156 39.9297C21.5234 39.9297 21.5312 39.9297 21.539 39.9297C29.4453 39.3281 36.0656 34.125 38.7296 26.9922H1.25386C3.92574 34.125 10.5546 39.3281 18.4609 39.9297C18.4687 39.9297 18.4765 39.9297 18.4843 39.9297C18.625 39.9375 18.7734 39.9531 18.914 39.9609C18.9531 39.9609 19 39.9688 19.039 39.9688C19.1562 39.9766 19.2734 39.9766 19.3906 39.9844C19.4375 39.9844 19.4765 39.9844 19.5234 39.9922C19.6796 39.9922 19.8359 40 19.9921 40C20.1484 40 20.3046 40 20.4609 39.9922C20.5234 39.9844 20.5703 39.9844 20.6093 39.9844Z"
												fill="#D80027"></path>
											<path
												d="M5.20303 11.3985V21.3985C5.20303 27.0001 12.6015 28.797 12.6015 28.797C12.6015 28.797 19.9999 27.0001 19.9999 21.3985V11.3985H5.20303Z"
												fill="#F0F0F0"></path>
											<path
												d="M6.99991 11.3985V21.3985C6.99991 22.0001 7.20303 22.6017 7.39835 23.1954C10.3983 23.1954 14.6015 23.1954 17.7968 23.1954C17.9999 22.5938 18.1952 21.9923 18.1952 21.3985V11.3985H6.99991Z"
												fill="#D80027"></path>
											<path
												d="M16 18.2032H13.3984V16.6017H15.2031V14.797H13.3984V13.0001H11.7968V14.797H9.99995V16.6017H11.7968V18.2032H9.20308V20.0001H11.7968V21.797H13.3984V20.0001H16V18.2032Z"
												fill="#F0F0F0"></path>
											<path
												d="M9.79692 25.6015C11 26.3984 12 26.8046 12.5938 26.8046C13.1954 26.6015 14.3907 26.2031 15.3907 25.6015C16.5938 24.8046 17.3907 23.9999 17.7891 23.2031C17.3907 22.8046 16.586 22.6015 15.9922 22.6015C15.7891 22.6015 15.5938 22.6015 15.3907 22.6015C14.9922 21.6015 13.7891 20.8046 12.5938 20.8046C11.3985 20.8046 10.1954 21.6015 9.79692 22.6015C9.5938 22.6015 9.39848 22.6015 9.19536 22.6015C8.5938 22.6015 7.99223 22.8046 7.39848 23.2031C7.79692 23.9999 8.60161 24.7968 9.79692 25.6015Z"
												fill="#0052B4"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1495">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Slovensko</span>
								</a>
								<a class="lang_box switcher" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Sverige">
									<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
										xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_30_1482)">
											<path
												d="M40 19.9999C40 20.8827 39.9062 21.7499 39.7969 22.6015H15.6016V39.6015C13.7578 39.1874 12.0156 38.4843 10.4062 37.6015V22.6015H0.203125C0.09375 21.7499 0 20.8827 0 19.9999C0 19.1171 0.09375 18.2499 0.203125 17.3983L10.4062 17.4062L10.3984 2.39835C12.0078 1.51553 13.7578 0.812408 15.6016 0.398346V17.3983L39.8047 17.3905C39.9141 18.2499 40 19.1171 40 19.9999Z"
												fill="#FFDA44"></path>
											<path
												d="M15.6016 17.3984H39.8047C38.6016 7.60156 30.2032 0 20.0001 0C18.6016 0 17.0001 0.203125 15.6016 0.398438V17.3984Z"
												fill="#0052B4"></path>
											<path
												d="M10.3984 17.3985V2.3985C4.99994 5.3985 0.999939 10.7969 0.203064 17.3985H10.3984Z"
												fill="#0052B4"></path>
											<path
												d="M10.3984 22.6015H0.203064C0.999939 28.9999 4.99994 34.6015 10.4062 37.6015V22.6015H10.3984Z"
												fill="#0052B4"></path>
											<path
												d="M15.6016 22.6015V39.6015C17.0001 39.9999 18.3985 39.9999 20.0001 39.9999C30.2032 39.9999 38.6016 32.3984 39.7969 22.6015H15.6016Z"
												fill="#0052B4"></path>
										</g>
										<defs>
											<clippath id="clip0_30_1482">
												<rect fill="white" height="40" rx="20" width="40"></rect>
											</clippath>
										</defs>
									</svg>
									<span>Sverige</span>
								</a>
							</div>
						</div>
					</dialog>
					<div id="blockcart-wrapper" style="display:none !important;">
						<div class="blockcart cart-preview"
							data-refresh-url="//vasco-translator.com/module/ps_shoppingcart/ajax">
							<div class="header">
								<a class="cart-link-icon" href="<?php echo esc_url( home_url( "/cart/" ) ); ?>" rel="nofollow"
									title="Giỏ hàng">
									<div class="shopping_cart icon">
										<img alt="Shopping cart" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/basket-dark.svg" ); ?>" />
										<div class="cart-count cart-count-badge">0</div>
									</div>
								</a>
							</div>
							<div aria-labelledby="cart-modal-title" aria-modal="true" class="body" role="dialog"
								tabindex="-1">
								<div class="body-in">
									<div class="cart-preview-header">
										<h2 id="cart-modal-title">Giỏ hàng</h2>
										<button aria-label="Close" class="close-cart-icon" data-dismiss="modal"
											type="button">
											<svg fill="none" height="24" viewbox="0 0 32 32" width="24"
												xmlns="http://www.w3.org/2000/svg">
												<path clip-rule="evenodd"
													d="M18.7218 15.5862L27.6066 6.70147L24.7781 3.87305L15.8934 12.7578L7.2218 4.08625L4.39337 6.91468L13.0649 15.5862L3.56494 25.0863L6.39337 27.9147L15.8934 18.4147L25.6066 28.1279L28.435 25.2995L18.7218 15.5862Z"
													fill="white" fill-rule="evenodd"></path>
											</svg>
										</button>
									</div>
									<div class="cart-preview-content">
										<div aria-live="polite" class="cart-preview-lazy-content"
											data-cart-drawer-content=""></div>
										<div class="cart-preview-loader" data-cart-drawer-loader="">
											<div aria-hidden="true" class="loading-spinner">
												<svg fill="none" height="320" viewbox="0 0 320 320" width="320"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z"
														fill="none" stroke="#2D3139" stroke-width="4"></path>
													<path
														d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z"
														fill="none" stroke="#2D3139" stroke-width="4"></path>
												</svg>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="mobile-menu" id="mobile-menu">
					<div class="mobile-menu-content">
						<nav aria-label="Main menu" role="navigation">
							<div class="menu-item-wrapper" role="none">
								<a aria-controls="submenu-shop" aria-expanded="false" aria-haspopup="true"
									class="nav-link has-child" href="<?php echo esc_url( home_url( "/translators/" ) ); ?>" id="nav-title-shop"
									role="menuitem">
									Cửa Hàng
									<img alt="" aria-hidden="true" class="arrow-rotate"
										src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
								</a>
								<div class="megamenu-childs-wrapper" hidden="" id="submenu-shop" role="menu">
									<div class="megamenu-container">
										<div class="megamenu-grid-section">
											<div class="megamenu-column-wrapper">
												<p class="megamenu-column-title">
													May phien dich
													<img alt="" aria-hidden="true" class="arrow-rotate-sub"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
												</p>
												<div class="megamenu-column-content">
													<ul aria-labelledby="nav-title-shop" role="menu">
														<li>
															<a href="<?php echo esc_url( home_url( "/translators/vasco-translator-q1/" ) ); ?>"
																role="menuitem">
																<img alt="" aria-hidden="true"
																	class="js-menu-lazy-image"
																	data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/385-thumb_60/vasco-translator-q1.jpg" ); ?>"
																	decoding="async" fetchpriority="low"
																	loading="lazy" />
																Vasco Translator Q1
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/translators/vasco-translator-m4/" ) ); ?>"
																role="menuitem">
																<img alt="" aria-hidden="true"
																	class="js-menu-lazy-image"
																	data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/488-thumb_60/vasco-translator-m4.jpg" ); ?>"
																	decoding="async" fetchpriority="low"
																	loading="lazy" />
																Vasco Translator M4
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/translators/vasco-translator-v4/" ) ); ?>"
																role="menuitem">
																<img alt="" aria-hidden="true"
																	class="js-menu-lazy-image"
																	data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/343-thumb_60/vasco-translator-v4.jpg" ); ?>"
																	decoding="async" fetchpriority="low"
																	loading="lazy" />
																Vasco Translator V4
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/translators/vasco-translator-e1/" ) ); ?>"
																role="menuitem">
																<img alt="" aria-hidden="true"
																	class="js-menu-lazy-image"
																	data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/323-thumb_60/vasco-translator-e1.jpg" ); ?>"
																	decoding="async" fetchpriority="low"
																	loading="lazy" />
																Vasco Translator E1
															</a>
														</li>
													</ul>
													<a class="link-all" href="<?php echo esc_url( home_url( "/translators/" ) ); ?>"><svg fill="none"
															height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="#3E5AEE" stroke-linecap="square"
																stroke-width="2"></path>
														</svg>Xem tất cả máy phiên dịch</a>
												</div>
											</div>
											<div class="megamenu-column-wrapper">
												<p class="megamenu-column-title">
													Goi combo
													<img alt="" aria-hidden="true" class="arrow-rotate-sub"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
												</p>
												<div class="megamenu-column-content">
													<ul aria-labelledby="nav-title-shop" role="menu">
														<li>
															<a href="<?php echo esc_url( home_url( "/translators/q1-phantomblack-e1/" ) ); ?>"
																role="menuitem">
																<img alt="" aria-hidden="true"
																	class="js-menu-lazy-image"
																	data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/426-thumb_60/q1-phantomblack-e1.jpg" ); ?>"
																	decoding="async" fetchpriority="low"
																	loading="lazy" />
																Vasco Translator Q1 + E1
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/translators/v4-blackonyx-e1/" ) ); ?>"
																role="menuitem">
																<img alt="" aria-hidden="true"
																	class="js-menu-lazy-image"
																	data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/images/products/330-thumb_60/v4-blackonyx-e1.jpg" ); ?>"
																	decoding="async" fetchpriority="low"
																	loading="lazy" />
																Vasco Translator V4 + E1
															</a>
														</li>
													</ul>
													<a class="link-all" href="<?php echo esc_url( home_url( "/bundles/" ) ); ?>"><svg fill="none"
															height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="#3E5AEE" stroke-linecap="square"
																stroke-width="2"></path>
														</svg>Xem gói combo</a>
												</div>
											</div>
											<div class="megamenu-column-wrapper">
												<p class="megamenu-column-title">
													Phu kien
													<img alt="" aria-hidden="true" class="arrow-rotate-sub"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
												</p>
												<div class="megamenu-column-content">
													<ul aria-labelledby="nav-title-shop" role="menu">
														<li>
															<a href="<?php echo esc_url( home_url( "/accessories/tempered-glass-q1/" ) ); ?>"
																role="menuitem">
																Kính cường lực bảo vệ màn hình Vasco Translator Q1
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/accessories/tempered-glass-m4/" ) ); ?>"
																role="menuitem">
																Kính cường lực bảo vệ màn hình Vasco Translator M4
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/accessories/case-for-vasco-translator-q1/" ) ); ?>"
																role="menuitem">
																Bao da khoá kéo cho Vasco Translator Q1
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/accessories/case-for-vasco-translator-m4/" ) ); ?>"
																role="menuitem">
																Bao da khoá kéo cho Vasco Translator M4
															</a>
														</li>
													</ul>
													<a class="link-all" href="<?php echo esc_url( home_url( "/accessories/" ) ); ?>"><svg fill="none"
															height="19" viewbox="0 0 11 19" width="11"
															xmlns="http://www.w3.org/2000/svg">
															<path d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																stroke="#3E5AEE" stroke-linecap="square"
																stroke-width="2"></path>
														</svg>Xem tất cả phụ kiện</a>
												</div>
											</div>
											<div class="megamenu-column-wrapper megamenu-column-image">
												<a href="<?php echo esc_url( home_url( "/translators/vasco-translator-m4/" ) ); ?>" role="menuitem">
													<div class="img-wrapper">
														<img alt='A close-up of a hand holding a purple Vasco Translator M4 electronic translator device against a bright outdoor background. The screen displays the greetings "Hello!", "¡Hola!", and the "VASCO Translator" logo.'
															class="js-menu-lazy-image"
															data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_shop_img.webp" ); ?>"
															decoding="async" fetchpriority="low" loading="lazy" />
													</div>
													<div class="text-absolute">
														<p>Xem máy phiên dịch mới nhất</p>
														<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																	stroke="white" stroke-linecap="square"
																	stroke-width="2"></path>
															</svg>Xem thêm</p>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="menu-item-wrapper" role="none">
								<a aria-controls="submenu-about_us" aria-expanded="false" aria-haspopup="true"
									class="nav-link has-child" id="nav-title-about_us" role="menuitem" type="button" href="<?php echo esc_url( home_url( "/about-us/" ) ); ?>">
									Về Chúng Tôi
									<img alt="" aria-hidden="true" class="arrow-rotate"
										src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
								</a>
								<div class="megamenu-childs-wrapper" hidden="" id="submenu-about_us" role="menu">
									<div class="megamenu-container">
										<div class="megamenu-grid-section">
											<div class="megamenu-column-wrapper">
												<div class="megamenu-column-content">
													<ul aria-labelledby="nav-title-about_us" role="menu">
														<li>
															<a href="<?php echo esc_url( home_url( "/vasco-innovations/" ) ); ?>" role="menuitem">
																Tin mới
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/vasco-ces-2026/" ) ); ?>" role="menuitem">
																CES 2026
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/about-us/" ) ); ?>" role="menuitem">
																Về Chúng Tôi
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/newsroom/" ) ); ?>" role="menuitem">
																Tin tức
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/initiatives/" ) ); ?>" role="menuitem">
																Tác động xã hội
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/articles/" ) ); ?>" role="menuitem">
																Blog
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div
												class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
												<a href="<?php echo esc_url( home_url( "/vasco-innovations/" ) ); ?>" role="menuitem">
													<div class="img-wrapper">
														<img alt="Vasco logo – ‘VA’ initials" class="js-menu-lazy-image"
															data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_about_us_img1.webp" ); ?>"
															decoding="async" fetchpriority="low" loading="lazy" />
													</div>
													<div class="text-absolute">
														<p>Tin mới</p>
														<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																	stroke="white" stroke-linecap="square"
																	stroke-width="2"></path>
															</svg>Xem thêm</p>
													</div>
												</a>
											</div>
											<div
												class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
												<a href="<?php echo esc_url( home_url( "/about-us/" ) ); ?>" role="menuitem">
													<div class="img-wrapper">
														<img alt="Three men sit on modern white chairs outside a building, working together on a laptop. They appear relaxed and engaged, with one man smiling while looking at his translator. Lush grass and flowers surround them."
															class="js-menu-lazy-image"
															data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_about_us_img1_default.webp" ); ?>"
															decoding="async" fetchpriority="low" loading="lazy" />
													</div>
													<div class="text-absolute">
														<p>Về Chúng Tôi</p>
														<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																	stroke="white" stroke-linecap="square"
																	stroke-width="2"></path>
															</svg>Xem thêm</p>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="menu-item-wrapper" role="none">
								<a aria-controls="submenu-how_it_works" aria-expanded="false" aria-haspopup="true"
									class="nav-link has-child" id="nav-title-how_it_works" role="menuitem"
									type="button" href="<?php echo esc_url( home_url( "/how-it-works/" ) ); ?>">
									Cách Hoạt Động
									<img alt="" aria-hidden="true" class="arrow-rotate"
										src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
								</a>
								<div class="megamenu-childs-wrapper" hidden="" id="submenu-how_it_works" role="menu">
									<div class="megamenu-container">
										<div class="megamenu-grid-section">
											<div class="megamenu-column-wrapper">
												<div class="megamenu-column-content">
													<ul aria-labelledby="nav-title-how_it_works" role="menu">
														<li>
															<a href="<?php echo esc_url( home_url( "/meet-vasco/" ) ); ?>" role="menuitem">
																Giới thiệu Vasco
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/how-it-works/" ) ); ?>" role="menuitem">
																Cách Hoạt Động
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/features-translate-voice/" ) ); ?>" role="menuitem">
																Dịch giọng nói
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/features-translate-photos/" ) ); ?>" role="menuitem">
																Dịch ảnh
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/features-translate-text/" ) ); ?>" role="menuitem">
																Dịch văn bản
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/call-translator/" ) ); ?>" role="menuitem">
																Dịch cuộc gọi
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/features-translate-chat/" ) ); ?>" role="menuitem">
																Nhiều người nói chuyện
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div
												class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
												<a href="<?php echo esc_url( home_url( "/meet-vasco/" ) ); ?>" role="menuitem">
													<div class="img-wrapper">
														<img alt="A product lineup of VASCO VN devices on a light purple background, featuring the large-screen Vasco Translator V4, the purple Vasco Translator Q1, the teal Vasco Translator M4, and the Vasco Translator E1 earbuds with their charging cases."
															class="js-menu-lazy-image"
															data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_how_it_works_img1.webp" ); ?>"
															decoding="async" fetchpriority="low" loading="lazy" />
													</div>
													<div class="text-absolute">
														<p>Giới thiệu Vasco</p>
														<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																	stroke="white" stroke-linecap="square"
																	stroke-width="2"></path>
															</svg>Xem thêm</p>
													</div>
												</a>
											</div>
											<div
												class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
												<a href="<?php echo esc_url( home_url( "/how-it-works/" ) ); ?>" role="menuitem">
													<div class="img-wrapper">
														<img alt="Four smiling people with briefcases walking through a modern office lobby, each wearing a Vasco Translator E1 in their ear. They appear relaxed and confident, engaged in conversation, with a professional and friendly atmosphere."
															class="js-menu-lazy-image"
															data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_how_it_works_img2.webp" ); ?>"
															decoding="async" fetchpriority="low" loading="lazy" />
													</div>
													<div class="text-absolute">
														<p>Cách Hoạt Động</p>
														<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																	stroke="white" stroke-linecap="square"
																	stroke-width="2"></path>
															</svg>Xem thêm</p>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="menu-item-wrapper" role="none">
								<a aria-controls="submenu-for_business" aria-expanded="false" aria-haspopup="true"
									class="nav-link has-child" id="nav-title-for_business" role="menuitem"
									type="button" href="<?php echo esc_url( home_url( "/business-healthcare/" ) ); ?>">
									Cho Doanh Nghiệp
									<img alt="" aria-hidden="true" class="arrow-rotate"
										src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
								</a>
								<div class="megamenu-childs-wrapper" hidden="" id="submenu-for_business" role="menu">
									<div class="megamenu-container">
										<div class="megamenu-grid-section">
											<div class="megamenu-column-wrapper">
												<p class="megamenu-column-title">
													Ngành nghề
													<img alt="" aria-hidden="true" class="arrow-rotate-sub"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
												</p>
												<div class="megamenu-column-content">
													<ul aria-labelledby="nav-title-for_business" role="menu">
														<li>
															<a href="<?php echo esc_url( home_url( "/business-education/" ) ); ?>" role="menuitem">
																Giáo dục
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/business-healthcare/" ) ); ?>" role="menuitem">
																Y tế
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/business-manufacturing/" ) ); ?>" role="menuitem">
																Sản xuất
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/business-ngo/" ) ); ?>" role="menuitem">
																Phi chính phủ (NGO)
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/business-hospitality/" ) ); ?>"
																role="menuitem">
																Du lịch &amp; Khách sạn
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/business-law-enforcement/" ) ); ?>" role="menuitem">
																Thực thi pháp luật
															</a>
														</li>
														<li>
															<a href="<?php echo esc_url( home_url( "/business-law-enforcement/" ) ); ?>" role="menuitem">
																Chính quyền địa phương
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div class="megamenu-column-wrapper">
												<p class="megamenu-column-title">
													Tính năng
													<img alt="" aria-hidden="true" class="arrow-rotate-sub"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/arrow-submenu.svg" ); ?>" />
												</p>
												<div class="megamenu-column-content">
													<ul aria-labelledby="nav-title-for_business" role="menu">
														<li>
															<a href="<?php echo esc_url( home_url( "/business-healthcare/" ) ); ?>" role="menuitem">
																Vasco Audience - Dịch nhóm
															</a>
														</li>
													</ul>
												</div>
											</div>
											<div
												class="megamenu-column-wrapper megamenu-column-image megamenu-column-image-square">
												<a href="<?php echo esc_url( home_url( "/business-healthcare/" ) ); ?>" role="menuitem">
													<div class="img-wrapper">
														<img alt="A large conference room screen displays the “Join Vasco Audience” instructions, showing guidance for participants on how to access the session."
															class="js-menu-lazy-image"
															data-src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_for_business_img1.webp" ); ?>"
															decoding="async" fetchpriority="low" loading="lazy" />
													</div>
													<div class="text-absolute">
														<p>Vasco Audience - Dịch nhóm</p>
														<p><svg fill="none" height="19" viewbox="0 0 11 19" width="11"
																xmlns="http://www.w3.org/2000/svg">
																<path
																	d="M1.41406 17.4141L9.41406 9.41406L1.41406 1.41406"
																	stroke="white" stroke-linecap="square"
																	stroke-width="2"></path>
															</svg>Xem thêm</p>
													</div>
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="menu-item-wrapper" role="none">
								<a class="nav-link" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" role="menuitem">
									Liên Hệ
								</a>
							</div>
						</nav>
						<hr />
						<div class="lang-selector-mobile">
							<p class="lang-box-title">Địa điểm giao hàng</p>
							<div class="lang-current">
								<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
									xmlns="http://www.w3.org/2000/svg">
									<g clip-path="url(#clip-vn-mob)">
										<circle cx="20" cy="20" fill="#DA251D" r="20"></circle>
										<polygon fill="#FFFF00"
											points="20,8 22.47,15.09 30,15.09 24.26,19.27 26.18,26.91 20,22.36 13.82,26.91 15.74,19.27 10,15.09 17.53,15.09">
										</polygon>
									</g>
									<defs>
										<clippath id="clip-vn-mob">
											<rect fill="white" height="40" rx="20" width="40"></rect>
										</clippath>
									</defs>
								</svg>
								<p>Việt Nam</p>
								<img alt="Arrow" class="arrow-rotate"
									src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/dropdown-arrow.svg" ); ?>" />
							</div>
							<div class="languages-wrapper-box-mobile">
								<div class="languages-box-mobile">
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN България">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1567)">
												<path
													d="M38.8227 13.0078L20.0039 6.50781L1.18516 13.0078C0.3875 15.2109 0 17.6016 0 20C0 22.3984 0.398438 24.8047 1.19531 27L20.0039 36.0625L38.8047 27C39.6016 24.7969 40 22.3984 40 20C40 17.6016 39.6203 15.2109 38.8227 13.0078Z"
													fill="#496E2D"></path>
												<path
													d="M20.0078 40C28.6094 40 36.0078 34.6016 38.8047 27H1.19531C4 34.6016 11.3984 40 20.0078 40Z"
													fill="#D80027"></path>
												<path
													d="M19.9977 0C11.3883 0 3.98203 5.40625 1.18516 13.0078H38.8234C36.0258 5.40625 28.5992 0 19.9977 0Z"
													fill="#F0F0F0"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1567">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>България</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>"
										title="VASCO VN Česká republika">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1559)">
												<path
													d="M39.9998 20C39.9998 20.1328 39.9998 20.2656 39.9998 20.3984H23.203L23.0702 20.3203L4.18738 7.75C7.85144 3.03125 13.5702 0 19.9999 0C31.0467 0 39.9998 8.95312 39.9998 20Z"
													fill="#F0F0F0"></path>
												<path
													d="M23.0703 20.3203L4.1875 7.75C1.57031 11.1328 0.0078125 15.375 0 19.9766C0 19.9844 0 19.9922 0 20C0 24.8828 1.75 29.3594 4.66406 32.8281L23.2188 20.4063L23.0703 20.3203Z"
													fill="#11457E"></path>
												<path
													d="M22.5155 39.8438C22.5936 39.8359 22.6717 39.8203 22.7499 39.8125C32.367 38.4922 39.8045 30.3359 39.9998 20.3984H23.1874L4.578 32.7344C8.24206 37.1719 13.7889 39.9922 19.9921 40C20.8358 40 21.6796 39.9453 22.5155 39.8438C22.5155 39.8438 22.5077 39.8438 22.5155 39.8438Z"
													fill="#D7141A"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1559">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Česká republika</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Danmark">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1558)">
												<path
													d="M10.3983 2.45312V17.3984H0.171692C1.00763 10.9453 4.92169 5.45312 10.3983 2.45312Z"
													fill="#D80027"></path>
												<path
													d="M39.8279 17.3984H15.6014V0.484375C17.0154 0.171875 18.492 0 19.9998 0C30.1639 0 38.5545 7.57812 39.8279 17.3984Z"
													fill="#D80027"></path>
												<path
													d="M0.171692 22.6016H10.3983V37.5469C4.92169 34.5469 1.00763 29.0547 0.171692 22.6016Z"
													fill="#D80027"></path>
												<path
													d="M39.8279 22.6016C38.5545 32.4219 30.1639 40 19.9998 40C18.492 40 17.0154 39.8281 15.6014 39.5156V22.6016H39.8279Z"
													fill="#D80027"></path>
												<path
													d="M40 20C40 20.8828 39.9453 21.75 39.8281 22.6016H15.6016V39.5156C13.7578 39.1016 12.0078 38.4375 10.3984 37.5469V22.6016H0.171875C0.0546875 21.75 0 20.8828 0 20C0 19.1172 0.0546875 18.25 0.171875 17.3984H10.3984V2.45313C12.0078 1.57031 13.7578 0.898438 15.6016 0.484375V17.3984H39.8281C39.9453 18.25 40 19.1172 40 20Z"
													fill="#F0F0F0"></path>
												<path
													d="M15.6015 0.484375V39.5156C13.7577 39.1016 12.0077 38.4375 10.3983 37.5469V2.45313C12.0077 1.57031 13.7577 0.898438 15.6015 0.484375Z"
													fill="#F0F0F0"></path>
												<path
													d="M40 20C40 20.8828 39.9453 21.75 39.8281 22.6016H0.171875C0.0546875 21.75 0 20.8828 0 20C0 19.1172 0.0546875 18.25 0.171875 17.3984H39.8359C39.9453 18.25 40 19.1172 40 20Z"
													fill="#F0F0F0"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1558">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Danmark</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>"
										title="VASCO VN Deutschland">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<path
												d="M1.20309 27C3.99997 34.6016 11.3984 40 20 40C28.6015 40 36 34.6016 38.7968 27L20 25.2032L1.20309 27Z"
												fill="#FFDA44"></path>
											<path
												d="M20 0C11.3984 0 3.99997 5.39844 1.20309 13L20 14.7969L38.7968 13C36 5.39844 28.6015 0 20 0Z"
												fill="black"></path>
											<path
												d="M1.20312 13C0.398437 15.2031 0 17.6015 0 20C0 22.3984 0.398437 24.7968 1.20312 27H38.7969C39.5938 24.7968 40 22.3984 40 20C40 17.6015 39.6016 15.2031 38.7969 13H1.20312Z"
												fill="#D80027"></path>
										</svg>
										<span>Deutschland</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>"
										title="VASCO VN United Kingdom">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1556)">
												<path
													d="M39.4218 15.2031C39.0703 13.7656 38.5624 12.3984 37.914 11.1016L32.1718 15.2031H39.4218Z"
													fill="#000066"></path>
												<path
													d="M0.687515 25.2031C1.06252 26.5938 1.57814 27.9219 2.22658 29.1797L7.78908 25.2031H0.687515Z"
													fill="#000066"></path>
												<path
													d="M5.78125 34.0625C8.32812 36.6406 11.5703 38.5234 15.2031 39.4141V27.3281L5.78125 34.0625Z"
													fill="#000066"></path>
												<path
													d="M25 39.3672C28.6406 38.4297 31.8828 36.4922 34.4062 33.8672L25 27.1484V39.3672Z"
													fill="#000066"></path>
												<path
													d="M37.8985 28.9375C38.4922 27.7578 38.9688 26.5078 39.3204 25.2031H32.6719L37.8985 28.9375Z"
													fill="#000066"></path>
												<path
													d="M15.2031 0.578125C11.5469 1.47656 8.28906 3.38281 5.74219 5.97656L15.2031 12.7344V0.578125Z"
													fill="#000066"></path>
												<path
													d="M34.4375 6.15625C31.9062 3.51563 28.6563 1.57031 25 0.632812V12.9062L34.4375 6.15625Z"
													fill="#000066"></path>
												<path
													d="M2.1953 10.875C1.49998 12.2344 0.95311 13.6797 0.57811 15.2031H8.2578L2.1953 10.875Z"
													fill="#000066"></path>
												<path
													d="M31.0468 25.2031L37.4453 29.7734C37.6015 29.5 37.75 29.2187 37.8906 28.9297L32.664 25.1953H31.0468V25.2031Z"
													fill="#F0F0F0"></path>
												<path
													d="M9.92967 15.2031L2.67186 10.0156C2.5078 10.2969 2.35155 10.5859 2.20311 10.875L8.26561 15.2031H9.92967Z"
													fill="#F0F0F0"></path>
												<path
													d="M25 25.2031V27.1562L34.4062 33.875C35.125 33.1328 35.7812 32.3281 36.3828 31.4766L27.6016 25.2031H25Z"
													fill="#F0F0F0"></path>
												<path
													d="M15.2031 15.2031V12.7344L5.7422 5.97656C5.02345 6.71094 4.35939 7.49219 3.75783 8.32812L13.375 15.1953H15.2031V15.2031Z"
													fill="#F0F0F0"></path>
												<path
													d="M32.1719 15.2031L37.9141 11.1016C37.4532 10.1719 36.9141 9.27344 36.3203 8.42969L26.8438 15.2031H32.1719Z"
													fill="#F0F0F0"></path>
												<path
													d="M15.2031 26.0938L5.08595 33.3203C5.31252 33.5703 5.54689 33.8203 5.78127 34.0625L15.2031 27.3281V26.0938Z"
													fill="#F0F0F0"></path>
												<path
													d="M7.78906 25.2031L2.22656 29.1797C2.69531 30.0859 3.22656 30.9453 3.82031 31.7656L13 25.2109H7.78906V25.2031Z"
													fill="#F0F0F0"></path>
												<path
													d="M25 14.0625L35.0781 6.86719C34.8672 6.625 34.6562 6.39062 34.4375 6.16406L25 12.8984V14.0625Z"
													fill="#F0F0F0"></path>
												<path
													d="M25 15.2031H26.8438L36.3203 8.42969C35.9297 7.88281 35.5156 7.35938 35.0781 6.85938L25 14.0625V15.2031Z"
													fill="#CC0000"></path>
												<path
													d="M13.375 15.2031L3.7578 8.33594C3.36717 8.875 3.0078 9.4375 2.67186 10.0156L9.92967 15.2031H13.375Z"
													fill="#CC0000"></path>
												<path
													d="M15.2031 25.2031H13L3.8203 31.7578C4.21092 32.2969 4.6328 32.8203 5.07811 33.3203L15.2031 26.0937V25.2031Z"
													fill="#CC0000"></path>
												<path
													d="M15.2032 15.2031H17V0.226562C16.3907 0.320312 15.7891 0.4375 15.2032 0.585937V12.7344V15.2031Z"
													fill="#F0F0F0"></path>
												<path
													d="M25 25.2031H23V39.7734C23.6797 39.6719 24.3437 39.5391 25 39.3672V27.1562V25.2031Z"
													fill="#F0F0F0"></path>
												<path
													d="M17 25.2031H15.2032V26.0937V27.3359V39.4219C15.7891 39.5703 16.3907 39.6875 17 39.7812V25.2031Z"
													fill="#F0F0F0"></path>
												<path
													d="M23 15.2031H25V14.0625V12.9062V0.632812C24.3437 0.460938 23.6797 0.328125 23 0.226562V15.2031Z"
													fill="#F0F0F0"></path>
												<path
													d="M27.6016 25.2031L36.3828 31.4766C36.7656 30.9297 37.125 30.3672 37.4531 29.7813L31.0547 25.2109H27.6016V25.2031Z"
													fill="#CC0000"></path>
												<path
													d="M32.1718 15.2031H26.8437H25H23V17.2031H39.8047C39.7109 16.5234 39.5781 15.8594 39.4218 15.2031H32.1718Z"
													fill="#F0F0F0"></path>
												<path
													d="M17 17.2031V15.2031H15.2031H13.375H9.92969H8.25781H0.578125C0.414063 15.8594 0.289062 16.5234 0.195312 17.2031H17Z"
													fill="#F0F0F0"></path>
												<path
													d="M23 23.2031V25.2031H25H27.6015H31.0468H32.6718H39.3203C39.4922 24.5469 39.6406 23.8828 39.75 23.2031H23Z"
													fill="#F0F0F0"></path>
												<path
													d="M13 25.2031H15.2031H17V23.2031H0.257828C0.367203 23.8828 0.507828 24.5469 0.687515 25.2031H7.78908H13Z"
													fill="#F0F0F0"></path>
												<path
													d="M39.8047 17.2031H23V15.2031V0.226562C22.0234 0.078125 21.0234 0 20 0C18.9766 0 17.9766 0.078125 17 0.226562V15.2031V17.2031H0.195312C0.0703125 18.1172 0 19.0469 0 20C0 21.0938 0.0859375 22.1562 0.257812 23.2031H17V25.2031V39.7734C17.9766 39.9219 18.9766 40 20 40C21.0234 40 22.0234 39.9219 23 39.7734V25.2031V23.2031H39.7422C39.9062 22.1562 40 21.0938 40 20C40 19.0469 39.9297 18.1172 39.8047 17.2031Z"
													fill="#CC0000"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1556">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>United Kingdom</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>"
										title="VASCO VN United States">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1555)">
												<path
													d="M19.9609 39.9609C31.0066 39.9609 39.9609 31.0066 39.9609 19.9609C39.9609 8.91524 31.0066 -0.0390625 19.9609 -0.0390625C8.91524 -0.0390625 -0.0390625 8.91524 -0.0390625 19.9609C-0.0390625 31.0066 8.91524 39.9609 19.9609 39.9609Z"
													fill="#F0F0F0"></path>
												<path
													d="M19.1641 19.9609H39.961C39.961 18.1641 39.7579 16.3594 39.3594 14.7578H19.1641V19.9609Z"
													fill="#D80027"></path>
												<path
													d="M19.1641 9.5625H37.1641C35.961 7.5625 34.3672 5.76563 32.5626 4.35938H19.1641C19.1641 4.35937 19.1641 9.5625 19.1641 9.5625Z"
													fill="#D80027"></path>
												<path
													d="M19.961 39.9609C24.7579 39.9609 28.961 38.3594 32.3594 35.5625H7.56256C10.961 38.3594 15.1641 39.9609 19.961 39.9609Z"
													fill="#D80027"></path>
												<path
													d="M2.96097 30.3594H37.1641C38.1641 28.7578 38.961 26.9609 39.3672 25.1562H0.562531C1.16409 26.9609 1.96097 28.7578 2.96097 30.3594Z"
													fill="#D80027"></path>
												<path
													d="M9.16406 3.16406H10.9609L9.35938 4.36719L9.96094 6.36719L8.35938 5.16406L6.5625 6.35938L7.16406 4.5625C5.75781 5.75781 4.35938 7.35938 3.35938 8.96094H3.96094L2.75781 9.75781C2.55469 9.96094 2.55469 10.1563 2.35938 10.5547L2.96094 12.1562L1.96094 11.3594C1.5625 11.9609 1.35938 12.3594 1.16406 12.9609L1.76562 14.7578H3.76562L2.16406 15.9609L2.76562 17.9609L1.16406 16.7578L0.164062 17.5625C-0.0390625 18.3594 -0.0390625 19.1641 -0.0390625 19.9609H19.9609C19.9609 8.96094 19.9609 7.5625 19.9609 -0.0390625C15.9609 -0.0390625 12.3594 1.16406 9.16406 3.16406ZM9.96094 17.9609L8.35938 16.7578L6.5625 17.9609L7.16406 15.9609L5.5625 14.7578H7.5625L8.16406 12.7578L8.76562 14.7578H10.7656L9.36719 15.9609L9.96094 17.9609ZM9.35938 10.1641L9.96094 12.1641L8.35938 10.9609L6.5625 12.1641L7.16406 10.1641L5.5625 8.96094H7.5625L8.16406 6.96094L8.76562 8.96094H10.7656L9.35938 10.1641ZM17.1641 17.9609L15.5625 16.7578L13.7656 17.9609L14.3672 15.9609L12.7656 14.7578H14.7656L15.3672 12.7578L15.9688 14.7578H17.9688L16.5625 15.9609L17.1641 17.9609ZM16.5625 10.1641L17.1641 12.1641L15.5625 10.9609L13.7656 12.1641L14.3672 10.1641L12.7656 8.96094H14.7656L15.3672 6.96094L15.9688 8.96094H17.9688L16.5625 10.1641ZM16.5625 4.35938L17.1641 6.35938L15.5625 5.15625L13.7656 6.35938L14.3672 4.35938L12.7656 3.15625H14.7656L15.3672 1.15625L15.9688 3.15625H17.9688L16.5625 4.35938Z"
													fill="#0052B4"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1555">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>United States</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN España">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<path
												d="M20 0C13.1875 0 7.1797 3.40625 3.56252 8.60156H36.4297C32.8203 3.40625 26.8125 0 20 0Z"
												fill="#D80228"></path>
											<path
												d="M20 40.0001C26.8906 40.0001 32.9765 36.5079 36.5703 31.2032H3.42967C7.02342 36.5079 13.1094 40.0001 20 40.0001Z"
												fill="#D80228"></path>
											<path
												d="M0 19.9999C0 24.1483 1.26562 28.0077 3.42969 31.203H36.5703C38.7344 28.0077 40 24.1483 40 19.9999C40 15.7655 38.6797 11.8358 36.4375 8.60147H3.5625C1.32031 11.8358 0 15.7655 0 19.9999Z"
												fill="#FEDB45"></path>
										</svg>
										<span>España</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Suomi">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1551)">
												<path
													d="M19.9999 40C31.0413 40 39.9921 31.0457 39.9921 20C39.9921 8.9543 31.0413 0 19.9999 0C8.95856 0 0.00775146 8.9543 0.00775146 20C0.00775146 31.0457 8.95856 40 19.9999 40Z"
													fill="#F0F0F0"></path>
												<path
													d="M39.789 17.3984H15.6015V0.398438C13.8046 0.796875 11.9999 1.60156 10.3984 2.39844V17.3984H0.210876C0.00775148 18.2031 0.00775146 19.2031 0.00775146 20C0.00775146 20.7969 0.00775148 21.7969 0.210876 22.6016H10.4062V37.6016C12.0077 38.3984 13.8046 39.2031 15.6093 39.6016V22.6016H39.8046C40.0077 21.8047 40.0077 20.8047 40.0077 20C39.9921 19.2031 39.9921 18.2031 39.789 17.3984Z"
													fill="#0052B4"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1551">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Suomi</span>
									</a>
									<a class="lang-box-mobile" href="#" title="VASCO VN Belgique">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<path
												d="M27 38.7969C34.6016 36 40 28.6016 40 20C40 11.3985 34.6016 4.00002 27 1.20315L25.2032 20L27 38.7969Z"
												fill="#C8102E"></path>
											<path
												d="M0 20C0 28.6016 5.39844 36 13 38.7969L14.7969 20L13 1.20315C5.39844 4.00002 0 11.3985 0 20Z"
												fill="#2D2926"></path>
											<path
												d="M13 38.7969C15.2031 39.6016 17.6015 40 20 40C22.3984 40 24.7969 39.6016 27 38.7969V1.20315C24.7969 0.406272 22.3984 0 20 0C17.6015 0 15.2031 0.398459 13 1.20315V38.7969Z"
												fill="#FFCD00"></path>
										</svg>
										<span>Belgique</span>
									</a>
									<a class="lang-box-mobile" href="#" title="VASCO VN Canada">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1550)">
												<path
													d="M11.3984 1.9375V38.0547C4.65625 34.8437 0 27.9687 0 20C0 12.0312 4.65625 5.15625 11.3984 1.9375Z"
													fill="#D80027"></path>
												<path
													d="M39.9999 20C39.9999 27.9688 35.3436 34.8438 28.6015 38.0625V1.9375C35.3436 5.15625 39.9999 12.0313 39.9999 20Z"
													fill="#D80027"></path>
												<path
													d="M28.6017 1.9375V38.0547C26.0001 39.3047 23.0782 40 20.0001 40C16.922 40 14.0001 39.3047 11.3985 38.0625V1.9375C14.0001 0.695312 16.922 0 20.0001 0C23.0782 0 26.0001 0.695312 28.6017 1.9375Z"
													fill="#F0F0F0"></path>
												<path
													d="M23.3985 22.6016L27.0001 20.7969L25.2032 20V18.2031L21.797 20L23.3985 16.6016H21.797L20.0001 14L18.2032 16.6016H16.6017L18.2032 20L14.797 18.2031V20L13.0001 20.7969L16.6017 22.6016L15.6017 24.3984H19.2032V27H20.797V24.3984H24.3985L23.3985 22.6016Z"
													fill="#D80027"></path>
												<path
													d="M23.3985 22.6016L27.0001 20.7969L25.2032 20V18.2031L21.797 20L23.3985 16.6016H21.797L20.0001 14L18.2032 16.6016H16.6017L18.2032 20L14.797 18.2031V20L13.0001 20.7969L16.6017 22.6016L15.6017 24.3984H19.2032V27H20.797V24.3984H24.3985L23.3985 22.6016Z"
													fill="#D80027"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1550">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Canada</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN France">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1549)">
												<path
													d="M20.0001 40C22.461 40 24.8204 39.5547 27.0001 38.7422V1.25781C24.8204 0.445313 22.461 0 20.0001 0C17.5391 0 15.1798 0.445313 13.0001 1.25781V38.7344C15.1798 39.5547 17.5391 40 20.0001 40Z"
													fill="#F0F0F0"></path>
												<path
													d="M39.9296 21.5469C39.9296 21.5391 39.9296 21.5312 39.9296 21.5234C39.9374 21.3828 39.953 21.2344 39.9608 21.0937C39.9608 21.0547 39.9686 21.0078 39.9686 20.9687C39.9764 20.8516 39.9764 20.7344 39.9843 20.6172C39.9843 20.5703 39.9843 20.5312 39.9921 20.4844C39.9921 20.3281 39.9999 20.1719 39.9999 20.0156C39.9999 19.8594 39.9999 19.7031 39.9921 19.5469C39.9921 19.5 39.9921 19.4609 39.9843 19.4141C39.9843 19.2969 39.9764 19.1797 39.9686 19.0625C39.9686 19.0234 39.9608 18.9766 39.9608 18.9375C39.953 18.7891 39.9452 18.6484 39.9296 18.5078C39.9296 18.5 39.9296 18.4922 39.9296 18.4844C39.328 10.5469 34.1249 3.92969 26.9999 1.25781V38.7344C34.1249 36.0703 39.328 29.4531 39.9296 21.5469Z"
													fill="#D80027"></path>
												<path
													d="M0.015625 20.6016C0.015625 20.7187 0.0234375 20.8359 0.03125 20.9531C0.03125 20.9922 0.0390625 21.0391 0.0390625 21.0781C0.046875 21.2266 0.0546875 21.3672 0.0703125 21.5078C0.0703125 21.5156 0.0703125 21.5234 0.0703125 21.5312C0.671875 29.4375 5.875 36.0625 13 38.7266V1.25781C5.875 3.92969 0.671875 10.5469 0.0703125 18.4531C0.0703125 18.4609 0.0703125 18.4687 0.0703125 18.4766C0.0625 18.6172 0.046875 18.7656 0.0390625 18.9062C0.0390625 18.9453 0.03125 18.9922 0.03125 19.0312C0.0234375 19.1484 0.0234375 19.2656 0.015625 19.3828C0.015625 19.4297 0.015625 19.4687 0.0078125 19.5156C0.0078125 19.6719 0 19.8281 0 19.9844C0 20.1406 0 20.2969 0.0078125 20.4531C0.015625 20.5156 0.015625 20.5625 0.015625 20.6016Z"
													fill="#0052B4"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1549">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>France</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Hrvatska">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1560)">
												<path
													d="M40 19.9609C40 17.5625 39.6016 15.1641 38.7969 12.9609L20 12.1641L1.20312 12.9609C0.398437 15.1641 0 17.5625 0 19.9609C0 22.3594 0.398437 24.7578 1.20312 26.9609L20 27.7578L38.7969 26.9609C39.6016 24.7578 40 22.3594 40 19.9609Z"
													fill="#F0F0F0"></path>
												<path
													d="M20.0001 39.9609C28.6016 39.9609 36.0001 34.5625 38.7969 26.9609H1.20319C4.00006 34.5625 11.3985 39.9609 20.0001 39.9609Z"
													fill="#0052B4"></path>
												<path
													d="M1.20319 12.9609H38.8047C36.0001 5.35937 28.6016 -0.0390625 20.0001 -0.0390625C11.3985 -0.0390625 4.00006 5.35937 1.20319 12.9609Z"
													fill="#D80027"></path>
												<path
													d="M20.3984 13.9609H18.2031L18.6016 10.3594L20 8.96094L21.3984 10.3594V13.1641L20.3984 13.9609Z"
													fill="#338AF3"></path>
												<path
													d="M26.0001 13.9609H23.797L24.2032 10.3594L25.6017 8.96094L27.0001 10.3594V13.1641L26.0001 13.9609Z"
													fill="#338AF3"></path>
												<path
													d="M14.0001 13.9609H16.2032L15.7969 10.3594L14.3985 8.96094L13.0001 10.3594V13.1641L14.0001 13.9609Z"
													fill="#338AF3"></path>
												<path
													d="M18.6016 13.9609H15.7969V10.3594L17.2031 8.96094L18.6016 10.3594V13.9609Z"
													fill="#0052B4"></path>
												<path
													d="M24.2032 13.9609H21.3985V10.3594L22.7969 8.96094L24.2032 10.3594V13.9609Z"
													fill="#0052B4"></path>
												<path
													d="M13.0001 12.9609V22.5625C13.0001 24.7656 14.2032 26.9609 15.7969 28.1641L17.0001 27.7656L18.6016 29.3672C19.0001 29.3672 19.6016 29.5703 20.0001 29.5703C20.3985 29.5703 21.0001 29.5703 21.3985 29.3672L23.1954 27.9688L24.1954 28.1719C25.7969 26.9688 26.9922 24.9688 26.9922 22.5703V12.9609H13.0001Z"
													fill="#F0F0F0"></path>
												<path d="M15.7969 12.9609H13.0001V15.7578H15.7969V12.9609Z"
													fill="#D80027"></path>
												<path d="M21.3986 12.9609H18.6017V15.7578H21.3986V12.9609Z"
													fill="#D80027"></path>
												<path d="M27.0001 12.9609H24.2032V15.7578H27.0001V12.9609Z"
													fill="#D80027"></path>
												<path d="M18.5938 15.7578H15.7969V18.5547H18.5938V15.7578Z"
													fill="#D80027"></path>
												<path d="M24.1954 15.7578H21.3985V18.5547H24.1954V15.7578Z"
													fill="#D80027"></path>
												<path d="M15.7969 18.5625H13.0001V21.3594H15.7969V18.5625Z"
													fill="#D80027"></path>
												<path d="M18.5938 21.3594H15.7969V24.1562H18.5938V21.3594Z"
													fill="#D80027"></path>
												<path d="M21.3986 18.5625H18.6017V21.3594H21.3986V18.5625Z"
													fill="#D80027"></path>
												<path d="M27.0001 18.5625H24.2032V21.3594H27.0001V18.5625Z"
													fill="#D80027"></path>
												<path d="M24.1954 21.3594H21.3985V24.1562H24.1954V21.3594Z"
													fill="#D80027"></path>
												<path d="M21.3986 24.1641H18.6017V26.9609H21.3986V24.1641Z"
													fill="#D80027"></path>
												<path
													d="M15.7969 24.1641H13.2031C13.4062 25.1641 14 26.1641 14.6016 26.9609H15.8047C15.7969 26.9609 15.7969 24.1641 15.7969 24.1641Z"
													fill="#D80027"></path>
												<path
													d="M24.2032 26.9609H25.4064C26.0079 26.1641 26.6095 25.1641 26.8048 24.1641H24.2032V26.9609Z"
													fill="#D80027"></path>
												<path
													d="M15.7969 26.9609V28.1641C16.5937 28.7656 17.5938 29.1641 18.5938 29.3672V26.9688L15.7969 26.9609Z"
													fill="#D80027"></path>
												<path
													d="M21.3985 26.9609V29.3594C22.3985 29.1562 23.3985 28.7578 24.1954 28.1562V26.9531H21.3985V26.9609Z"
													fill="#D80027"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1560">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Hrvatska</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>"
										title="VASCO VN Magyarország">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1536)">
												<path
													d="M1.20312 13C0.398437 15.2031 0 17.6015 0 20C0 22.3984 0.398437 24.7968 1.20312 27L20 28.7968L38.7969 27C39.5938 24.7968 40 22.3984 40 20C40 17.6015 39.6016 15.2031 38.7969 13L20 11.3984L1.20312 13Z"
													fill="#F0F0F0"></path>
												<path
													d="M20 0C11.3984 0 3.99997 5.39844 1.20309 13H38.8047C36 5.39844 28.6015 0 20 0Z"
													fill="#D80027"></path>
												<path
													d="M20 40C28.6015 40 36 34.6016 38.7968 27H1.20309C3.99997 34.6016 11.3984 40 20 40Z"
													fill="#6DA544"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1536">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Magyarország</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Italia">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1531)">
												<path
													d="M27.0039 1.26169C24.8242 0.449188 22.457 0.00387573 19.9961 0.00387573C17.5352 0.00387573 15.1758 0.449188 12.9961 1.26169L12.9922 18.3304L12.9883 38.7461C15.168 39.5586 17.5352 39.9961 19.9961 39.9961C22.457 39.9961 24.832 39.5429 27.0117 38.7304L27.0078 18.9508L27.0039 1.26169Z"
													fill="#F0F0F0"></path>
												<path
													d="M39.9999 20C39.9999 11.4141 34.5937 4.10391 26.9999 1.26016V38.7344C34.5937 35.8984 39.9999 28.5859 39.9999 20Z"
													fill="#D80027"></path>
												<path
													d="M0 20C0 28.5859 5.40391 35.9063 12.9977 38.75L13.0008 1.26016C5.40703 4.10391 0 11.4141 0 20Z"
													fill="#6DA544"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1531">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Italia</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN 日本">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1530)">
												<path
													d="M20 40C31.0457 40 40 31.0457 40 20C40 8.9543 31.0457 0 20 0C8.9543 0 0 8.9543 0 20C0 31.0457 8.9543 40 20 40Z"
													fill="#F0F0F0"></path>
												<path
													d="M20.0001 28.6015C24.7506 28.6015 28.6017 24.7505 28.6017 20C28.6017 15.2495 24.7506 11.3984 20.0001 11.3984C15.2496 11.3984 11.3985 15.2495 11.3985 20C11.3985 24.7505 15.2496 28.6015 20.0001 28.6015Z"
													fill="#D80027"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1530">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>日本</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Lietuva">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1526)">
												<path
													d="M38.7969 27C39.5938 24.7968 40 22.3984 40 20C40 17.6015 39.6016 15.2031 38.7969 13L20 11.3984L1.20312 13C0.398437 15.2031 0 17.6015 0 20C0 22.3984 0.398437 24.7968 1.20312 27L20 28.7968L38.7969 27Z"
													fill="#6DA544"></path>
												<path
													d="M38.797 13C36.0001 5.39844 28.6017 0 20.0001 0C11.3985 0 4.00009 5.39844 1.20322 13H38.797Z"
													fill="#FFDA44"></path>
												<path
													d="M20.0001 40C28.6017 40 36.0001 34.6016 38.797 27H1.20322C4.00009 34.6016 11.3985 40 20.0001 40Z"
													fill="#D80027"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1526">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Lietuva</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Nederland">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1557)">
												<path
													d="M38.9297 13.5312H1.07031C3.75781 5.66406 11.2187 0 20 0C28.7812 0 36.2422 5.66406 38.9297 13.5312Z"
													fill="#A2001D"></path>
												<path
													d="M38.5313 27.5312C35.5547 34.8438 28.3828 40 20 40C11.6172 40 4.44531 34.8438 1.46875 27.5312H38.5313Z"
													fill="#0052B4"></path>
												<path
													d="M40 20C40 22.6641 39.4766 25.2109 38.5312 27.5312H1.46875C0.523437 25.2109 0 22.6641 0 20C0 17.7344 0.375 15.5625 1.07031 13.5312H38.9297C39.625 15.5625 40 17.7344 40 20Z"
													fill="#F0F0F0"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1557">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Nederland</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Polska">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1502)">
												<path d="M0 20C0 8.95312 8.95312 0 20 0C31.0469 0 40 8.95312 40 20H0Z"
													fill="#F0F0F0"></path>
												<path d="M40 20C40 31 31 40 20 40C9 40 0 31 0 20H40Z" fill="#BE0026">
												</path>
											</g>
											<defs>
												<clippath id="clip0_30_1502">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Polska</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Portugal">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1504)">
												<path
													d="M-0.0390625 20.0001C-0.0390625 28.6017 5.35937 36.0001 12.9609 38.797L14.7578 20.0001L12.9609 1.20322C5.35937 4.00009 -0.0390625 11.3985 -0.0390625 20.0001Z"
													fill="#6DA544"></path>
												<path
													d="M39.961 20C39.961 9 30.961 0 19.961 0C17.5626 0 15.1641 0.398437 12.961 1.20312V38.7969C15.1641 39.5938 17.5626 40 19.961 40C30.961 40 39.961 31 39.961 20Z"
													fill="#D80027"></path>
												<path
													d="M13.0079 27.0001C16.8739 27.0001 20.0079 23.8661 20.0079 20.0001C20.0079 16.1341 16.8739 13.0001 13.0079 13.0001C9.14194 13.0001 6.00793 16.1341 6.00793 20.0001C6.00793 23.8661 9.14194 27.0001 13.0079 27.0001Z"
													fill="#FFDA44"></path>
												<path
													d="M9.00775 16.6016V20.9297C9.00775 23.1172 10.7343 24.9531 12.9296 25C15.1718 25.0469 17.0078 23.2344 17.0078 21V16.6016H9.00775Z"
													fill="#D80027"></path>
												<path
													d="M13.0704 22.2032C12.2735 22.2032 11.6719 21.6016 11.6719 20.8047V19H14.3438V20.7344C14.3907 21.5313 13.8672 22.2032 13.0704 22.2032Z"
													fill="#F0F0F0"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1504">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Portugal</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN România">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1506)">
												<path
													d="M13.2812 38.8421L18.6906 19.9999L13.2812 1.15775C5.54062 3.91868 0 11.3117 0 19.9999C0 28.6882 5.54062 36.0812 13.2812 38.8421Z"
													fill="#0052B4"></path>
												<path
													d="M26.7189 38.8421L21.747 19.9999L26.7189 1.15775C34.4595 3.91868 40.0001 11.3117 40.0001 19.9999C40.0001 28.6882 34.4595 36.0812 26.7189 38.8421Z"
													fill="#D80027"></path>
												<path
													d="M26.7188 1.15781C24.6187 0.409375 22.357 0 20 0C17.643 0 15.3812 0.409375 13.2812 1.15781V38.8422C15.3812 39.5914 17.643 40 20 40C22.357 40 24.6187 39.5906 26.7188 38.8422V1.15781Z"
													fill="#FFDA44"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1506">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>România</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Slovensko">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1495)">
												<path
													d="M38.75 13.0141C35.914 5.42813 28.5804 0 20.0023 0C11.4242 0 4.09607 5.41406 1.25232 13.0078L20.2758 15.7875L38.75 13.0141Z"
													fill="#F0F0F0"></path>
												<path
													d="M38.7266 27C39.5469 24.8203 40 22.4531 40 20C40 19.8281 40 19.664 39.9922 19.4922C39.9922 19.4765 39.9922 19.4609 39.9922 19.4453C39.9297 17.1797 39.4922 15.0078 38.7422 12.9922H1.25781C0.507812 15.0156 0.0703125 17.1875 0.0078125 19.4531C0.0078125 19.4687 0.0078125 19.4844 0.0078125 19.5C0 19.664 0 19.8281 0 20C0 22.4609 0.445313 24.8437 1.26562 27.0234L18.9766 29.1633L38.7266 27Z"
													fill="#0052B4"></path>
												<path
													d="M20.6093 39.9844C20.7265 39.9844 20.8437 39.9766 20.9609 39.9688C21 39.9688 21.0468 39.9609 21.0859 39.9609C21.2343 39.9531 21.375 39.9453 21.5156 39.9297C21.5234 39.9297 21.5312 39.9297 21.539 39.9297C29.4453 39.3281 36.0656 34.125 38.7296 26.9922H1.25386C3.92574 34.125 10.5546 39.3281 18.4609 39.9297C18.4687 39.9297 18.4765 39.9297 18.4843 39.9297C18.625 39.9375 18.7734 39.9531 18.914 39.9609C18.9531 39.9609 19 39.9688 19.039 39.9688C19.1562 39.9766 19.2734 39.9766 19.3906 39.9844C19.4375 39.9844 19.4765 39.9844 19.5234 39.9922C19.6796 39.9922 19.8359 40 19.9921 40C20.1484 40 20.3046 40 20.4609 39.9922C20.5234 39.9844 20.5703 39.9844 20.6093 39.9844Z"
													fill="#D80027"></path>
												<path
													d="M5.20303 11.3985V21.3985C5.20303 27.0001 12.6015 28.797 12.6015 28.797C12.6015 28.797 19.9999 27.0001 19.9999 21.3985V11.3985H5.20303Z"
													fill="#F0F0F0"></path>
												<path
													d="M6.99991 11.3985V21.3985C6.99991 22.0001 7.20303 22.6017 7.39835 23.1954C10.3983 23.1954 14.6015 23.1954 17.7968 23.1954C17.9999 22.5938 18.1952 21.9923 18.1952 21.3985V11.3985H6.99991Z"
													fill="#D80027"></path>
												<path
													d="M16 18.2032H13.3984V16.6017H15.2031V14.797H13.3984V13.0001H11.7968V14.797H9.99995V16.6017H11.7968V18.2032H9.20308V20.0001H11.7968V21.797H13.3984V20.0001H16V18.2032Z"
													fill="#F0F0F0"></path>
												<path
													d="M9.79692 25.6015C11 26.3984 12 26.8046 12.5938 26.8046C13.1954 26.6015 14.3907 26.2031 15.3907 25.6015C16.5938 24.8046 17.3907 23.9999 17.7891 23.2031C17.3907 22.8046 16.586 22.6015 15.9922 22.6015C15.7891 22.6015 15.5938 22.6015 15.3907 22.6015C14.9922 21.6015 13.7891 20.8046 12.5938 20.8046C11.3985 20.8046 10.1954 21.6015 9.79692 22.6015C9.5938 22.6015 9.39848 22.6015 9.19536 22.6015C8.5938 22.6015 7.99223 22.8046 7.39848 23.2031C7.79692 23.9999 8.60161 24.7968 9.79692 25.6015Z"
													fill="#0052B4"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1495">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Slovensko</span>
									</a>
									<a class="lang-box-mobile" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN Sverige">
										<svg fill="none" height="40" viewbox="0 0 40 40" width="40"
											xmlns="http://www.w3.org/2000/svg">
											<g clip-path="url(#clip0_30_1482)">
												<path
													d="M40 19.9999C40 20.8827 39.9062 21.7499 39.7969 22.6015H15.6016V39.6015C13.7578 39.1874 12.0156 38.4843 10.4062 37.6015V22.6015H0.203125C0.09375 21.7499 0 20.8827 0 19.9999C0 19.1171 0.09375 18.2499 0.203125 17.3983L10.4062 17.4062L10.3984 2.39835C12.0078 1.51553 13.7578 0.812408 15.6016 0.398346V17.3983L39.8047 17.3905C39.9141 18.2499 40 19.1171 40 19.9999Z"
													fill="#FFDA44"></path>
												<path
													d="M15.6016 17.3984H39.8047C38.6016 7.60156 30.2032 0 20.0001 0C18.6016 0 17.0001 0.203125 15.6016 0.398438V17.3984Z"
													fill="#0052B4"></path>
												<path
													d="M10.3984 17.3985V2.3985C4.99994 5.3985 0.999939 10.7969 0.203064 17.3985H10.3984Z"
													fill="#0052B4"></path>
												<path
													d="M10.3984 22.6015H0.203064C0.999939 28.9999 4.99994 34.6015 10.4062 37.6015V22.6015H10.3984Z"
													fill="#0052B4"></path>
												<path
													d="M15.6016 22.6015V39.6015C17.0001 39.9999 18.3985 39.9999 20.0001 39.9999C30.2032 39.9999 38.6016 32.3984 39.7969 22.6015H15.6016Z"
													fill="#0052B4"></path>
											</g>
											<defs>
												<clippath id="clip0_30_1482">
													<rect fill="white" height="40" rx="20" width="40"></rect>
												</clippath>
											</defs>
										</svg>
										<span>Sverige</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			<div class="overlay-menu" id="overlay-menu"></div>
			<script>
				(function() {
					var header = document.getElementById("header");
					if (!header) return;

					function updateHeaderDimensions() {
						if (header) {
							var h = header.offsetHeight;
							document.body.style.paddingTop = h + "px";
							document.documentElement.style.setProperty('--header-height', h + 'px');

							var activeNav = document.querySelector('.desktop-nav.active, .mobile-menu.active, .mobile-nav.active');
							if (activeNav) {
								activeNav.style.top = h + "px";
								activeNav.style.height = "calc(100vh - " + h + "px)";
							}
						}
					}

					updateHeaderDimensions();
					window.addEventListener("resize", updateHeaderDimensions);
					window.addEventListener("orientationchange", updateHeaderDimensions);
					window.addEventListener("load", updateHeaderDimensions);
					setTimeout(updateHeaderDimensions, 100);
					setTimeout(updateHeaderDimensions, 400);

					var lastScrollTop = window.pageYOffset || document.documentElement.scrollTop;
					var scrollThreshold = 4;

					window.addEventListener("scroll", function() {
						var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
						if (scrollTop < 0) scrollTop = 0;

						// Khi menu mobile đang mở, giữ header luôn hiển thị
						var isMobileMenuOpen = document.querySelector('.desktop-nav.active, .mobile-menu.active, .mobile-nav.active, #open-menu.is-active, .is-active');
						if (isMobileMenuOpen) {
							header.classList.remove("header--hide");
							header.classList.add("header--show");
							return;
						}

						if (scrollTop <= 40) {
							header.classList.remove("header--hide");
							header.classList.add("header--show");
							lastScrollTop = scrollTop;
							return;
						}

						if (Math.abs(scrollTop - lastScrollTop) <= scrollThreshold) {
							return;
						}

						if (scrollTop > lastScrollTop) {
							// Cuộn xuống (Scroll Down) -> Hiện thanh trên
							header.classList.remove("header--hide");
							header.classList.add("header--show");
						} else {
							// Cuộn lên (Scroll Up) -> Ẩn thanh trên
							header.classList.remove("header--show");
							header.classList.add("header--hide");
						}

						lastScrollTop = scrollTop;
					}, { passive: true });
				})();
			</script>

		</header>

