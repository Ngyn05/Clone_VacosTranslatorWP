<?php
/**
 * Template Name: Clean Page front-page.php
 *
 * @package VascoTheme
 */

get_header();
?>


		<section class="relative" id="wrapper">
			<aside id="notifications">
				<div class="container">
				</div>
			</aside>
			<div>
				<div class="js-content-wrapper" id="content-wrapper">
					<section id="main">
						<section class="page-home" id="content">
							<section class="hero-section hero-clean-minimal">
								<div class="number-one number-one-floating hero-badge-anim">
									<img alt="number one" class="nr-one"
										src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/icons/no1-badge.svg" ); ?>" />
								</div>
								<section class="doubleboxes">
									<div class="doublebox left" id="box-color-random">
										<div class="container">
											<div class="doublebox-content hero-content-anim">
												<h1 class="h1 hero-title-anim">
													Nói như người bản địa bằng <span class="counter-badge-anim">54</span> ngôn ngữ với giọng nói độc đáo của bạn.
												</h1>
												<p class="hero-subtitle hero-sub-anim">
													Vasco Translator Q1 với công nghệ nhân bản giọng nói AI.
												</p>
												<a class="btn btn-2xl btn-primary hero-btn-anim" href="<?php echo esc_url( home_url( "/translators/" ) ); ?>" id="btn-change">
													<img alt="" aria-hidden="true"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/right-arrow.svg" ); ?>" />
													Xem máy phiên dịch của chúng tôi
													<span class="text-sr-only">Đi đến cửa hàng</span>
												</a>
											</div>
										</div>
									</div>
								</section>
							</section>
							<section class="translators-carousel max-width-container">
								<div class="absolute-box">
									<h2>Máy phiên dịch của chúng tôi</h2>
									<div class="button-navigation">
										<button class="btn btn-md btn-white active" data-slide="0">Q1</button>
										<button class="btn btn-md btn-white" data-slide="1">E1</button>
										<button class="btn btn-md btn-white" data-slide="2">M4</button>
										<button class="btn btn-md btn-white" data-slide="3">V4</button>
									</div>
								</div>
								<div class="swiper swiper-background">
									<div class="swiper-wrapper">
										<div class="swiper-slide slide-bg-ghost-start"></div>
										<div class="swiper-slide slide-bg-0"></div>
										<div class="swiper-slide slide-bg-1"></div>
										<div class="swiper-slide slide-bg-2"></div>
										<div class="swiper-slide slide-bg-3"></div>
										<div class="swiper-slide slide-bg-ghost-end"></div>
									</div>
								</div>
								<div aria-label="[e1.label.carousel]" aria-roledescription="carousel"
									class="swiper swiper-foreground" role="region">
									<div class="swiper-wrapper">
										<div class="swiper-slide"
											data-product-desc="Máy phiên dịch duy nhất tích hợp công nghệ nhân bản giọng nói và dịch cuộc gọi"
											data-product-id="Q1"
											data-product-link="<?php echo esc_url( home_url( "/translators/vasco-translator-q1/" ) ); ?>"
											data-product-name="Vasco Translator Q1">
											<a class="photo-link" href="<?php echo esc_url( home_url( "/translators/vasco-translator-q1/" ) ); ?>"
												title="Go to product Vasco Translator Q1">
												<img alt="Vasco Translator Q1" decoding="async" height="480"
													loading="eager"
													sizes="(min-width: 1280px) 480px, (min-width: 992px) 360px, 320px"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/homepage-carousel/q1.webp" ); ?>"
													width="480" />
											</a>
										</div>
										<div class="swiper-slide"
											data-product-desc="Tai nghe phiên dịch cho cuộc trò chuyện trôi chảy không gián đoạn"
											data-product-id="E1"
											data-product-link="<?php echo esc_url( home_url( "/translators/vasco-translator-e1/" ) ); ?>"
											data-product-name="Vasco Translator E1">
											<a class="photo-link" href="<?php echo esc_url( home_url( "/translators/vasco-translator-e1/" ) ); ?>"
												title="Go to product Vasco Translator E1">
												<img alt="Vasco Translator E1" decoding="async" fetchpriority="low"
													height="480" loading="lazy"
													sizes="(min-width: 1280px) 480px, (min-width: 992px) 360px, 320px"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/homepage-carousel/e1.webp" ); ?>"
													width="480" />
											</a>
										</div>
										<div class="swiper-slide"
											data-product-desc="Máy phiên dịch bỏ túi siêu nhẹ và dễ sử dụng cho mọi người"
											data-product-id="M4"
											data-product-link="<?php echo esc_url( home_url( "/translators/vasco-translator-m4/" ) ); ?>"
											data-product-name="Vasco Translator M4">
											<a class="photo-link" href="<?php echo esc_url( home_url( "/translators/vasco-translator-m4/" ) ); ?>"
												title="Go to product Vasco Translator M4">
												<img alt="Vasco Translator M4" decoding="async" fetchpriority="low"
													height="480" loading="lazy"
													sizes="(min-width: 1280px) 480px, (min-width: 992px) 360px, 320px"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/homepage-carousel/m4.webp" ); ?>"
													width="480" />
											</a>
										</div>
										<div class="swiper-slide"
											data-product-desc="Thiết bị máy phiên dịch cầm tay tức thì"
											data-product-id="V4"
											data-product-link="<?php echo esc_url( home_url( "/translators/vasco-translator-v4/" ) ); ?>"
											data-product-name="Vasco Translator V4">
											<a class="photo-link" href="<?php echo esc_url( home_url( "/translators/vasco-translator-v4/" ) ); ?>"
												title="Go to product Vasco Translator V4">
												<img alt="Vasco Translator V4" decoding="async" fetchpriority="low"
													height="480" loading="lazy"
													sizes="(min-width: 1280px) 480px, (min-width: 992px) 360px, 320px"
													src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/homepage-carousel/v4.webp" ); ?>"
													width="480" />
											</a>
										</div>
									</div>
									<div class="absolute-box-product-features">
										<div class="visible" data-slide="0">
											<div class="feature" data-event="Vasco Assistant" data-product-name="Q1">
												<h4>Công nghệ nhân bản giọng nói</h4>
												<p>Công nghệ Vasco My Voice tạo bản sao kỹ thuật số cho giọng nói của
													bạn, giúp bạn cất giọng tự nhiên bằng 54 ngôn ngữ.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Vasco my voice" data-product-name="Q1">
												<h4>Dịch cuộc gọi điện thoại</h4>
												<p>Dịch các cuộc gọi điện thoại theo thời gian thực, mang lại sự an tâm
													tuyệt đối trong mọi tình huống.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Dịch cuộc gọi" data-product-name="Q1">
												<h4>Chế độ tự động</h4>
												<p>Tự động nhận diện ngôn ngữ và hỗ trợ giao tiếp dễ dàng mà không cần
													phải bấm phím liên tục.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Chế độ tự động" data-product-name="Q1">
												<h4>Internet miễn phí trọn đời</h4>
												<p>Dung lượng dữ liệu dịch thuật không giới hạn tại gần 200 quốc gia —
													hoàn toàn không mất phí hàng tháng.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Lifetime Internet miễn phí"
												data-product-name="Q1" style="order: -1;">
												<h4>Vasco Assistant</h4>
												<p>Tính năng dịch ảnh nâng cao hỗ trợ bởi trí tuệ nhân tạo. Vasco
													Assistant giải thích ký hiệu, ẩm thực địa phương, phong tục và quy
													định vùng miền.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
										</div>
										<div data-slide="1">
											<div class="feature" data-event="Hands-free mode" data-product-name="E1">
												<h4>Chế độ không chạm</h4>
												<p>Thiết bị dịch tự động nhận diện ngôn ngữ và dịch cuộc trò chuyện mà
													không cần dùng thao tác bấm nút.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="MultiTalk" data-product-name="E1">
												<h4>Trò chuyện nhóm (MultiTalk)</h4>
												<p>Hỗ trợ đối thoại trực tiếp lên đến 10 người cùng lúc bằng 51 ngôn ngữ
													khác nhau.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Hygienic design" data-product-name="E1">
												<h4>Thiết kế vệ sinh an toàn</h4>
												<p>Tai nghe phiên dịch được thiết kế để dễ dàng chia sẻ an toàn và sạch
													sẽ cho người khác dùng chung.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Connects with other Vasco devices"
												data-product-name="E1">
												<h4>Kết nối thiết bị Vasco khác</h4>
												<p>Tai nghe tương thích linh hoạt với Vasco Translator V4 và Q1 giúp mở
													rộng khả năng trải nghiệm.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
										</div>
										<div data-slide="2">
											<div class="feature" data-event="Voice, photo, and Dịch văn bản"
												data-product-name="M4">
												<h4>Dịch giọng nói, hình ảnh &amp; văn bản</h4>
												<p>Bộ tính năng toàn diện giúp việc giao tiếp khi đi du lịch nước ngoài
													trở nên vô cùng dễ dàng.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Physical buttons or touchscreen"
												data-product-name="M4">
												<h4>Phím vật lý hoặc Màn hình cảm ứng</h4>
												<p>Lựa chọn phương thức điều khiển thuận tiện và quen thuộc nhất đối với
													riêng bạn.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature"
												data-event="High-visibility display and powerful speakers"
												data-product-name="M4">
												<h4>Màn hình rõ nét &amp; Loa công suất lớn</h4>
												<p>Thiết kế tối ưu để bạn luôn nghe rõ và không bỏ lỡ bất kỳ chi tiết
													giao tiếp nào.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Internet miễn phí trọn đời"
												data-product-name="M4">
												<h4>Internet miễn phí trọn đời</h4>
												<p>Dữ liệu dịch thuật không giới hạn phủ sóng gần 200 quốc gia trên thế
													giới.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
										</div>
										<div data-slide="3">
											<div class="feature" data-event="Dịch giọng nói" data-product-name="V4">
												<h4>Dịch giọng nói tức thì</h4>
												<p>Bạn nói, Vasco dịch ngay lập tức bằng 82 ngôn ngữ bản địa.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Dịch hình ảnh" data-product-name="V4">
												<h4>Dịch hình ảnh chụp ảnh</h4>
												<p>Chụp ảnh và nội dung từ bức ảnh hiển thị rõ ràng bằng 112 ngôn ngữ.
												</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Large screen" data-product-name="V4">
												<h4>Màn hình hiển thị lớn 5 inch</h4>
												<p>Màn hình sắc nét giúp mọi bản dịch luôn rõ ràng, trực quan và cực kỳ
													dễ đọc.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
											<div class="feature" data-event="Lifetime Internet miễn phí"
												data-product-name="V4">
												<h4>Internet miễn phí trọn đời</h4>
												<p>Dữ liệu dịch thuật không giới hạn tại gần 200 quốc gia trên toàn thế
													giới.</p>
												<svg fill="none" height="24" viewbox="0 0 13 24" width="13"
													xmlns="http://www.w3.org/2000/svg">
													<path
														d="M1.52793 3.28393L10.9616 8.84745C11.4194 9.11727 11.8085 9.55796 12.0816 10.1161C12.3546 10.6742 12.5 11.3258 12.5 11.9916C12.5 12.6575 12.3546 13.3091 12.0816 13.8672C11.8085 14.4253 11.4194 14.866 10.9616 15.1358L1.54058 20.674C1.08138 20.9417 0.690979 21.3818 0.417299 21.9404C0.146288 22.4935 0.0014242 23.1389 1.04472e-05 23.7987L1.04481e-05 23.8182C-3.48573e-06 23.8117 -3.4805e-06 23.8052 1.04472e-05 23.7987L9.41488e-06 0.181873C0.00594895 0.838757 0.152921 1.47971 0.423605 2.02928C0.694289 2.57884 1.07744 3.01414 1.52793 3.28393Z"
														fill="#E0E2F2"></path>
												</svg>
											</div>
										</div>
									</div>
									<div class="absolute-box-product-info">
										<div class="product-flags-wrapper">
											<div class="product-flags visible" data-slide="0">
											</div>
											<div class="product-flags" data-slide="1">
											</div>
											<div class="product-flags" data-slide="2">
												<div class="product-flag-wrapper promotion-theme-orange">
													<div aria-label="Mới" class="body-base product-flag">Mới</div>
												</div>
											</div>
											<div class="product-flags" data-slide="3">
												<div class="product-flag-wrapper promotion-theme-blue">
													<div aria-label="Bán chạy nhất" class="body-base product-flag">
														Bán chạy nhất</div>
												</div>
											</div>
											<h3 class="product-name">Vasco Translator Q1</h3>
											<p class="product-desc">Máy phiên dịch duy nhất có tính năng nhân bản giọng
												nói và dịch cuộc gọi</p>
											<a class="product-link btn btn-md btn-white" data-product-id="Q1"
												href="<?php echo esc_url( home_url( "/translators/vasco-translator-q1/" ) ); ?>">Tìm hiểu thêm</a>
										</div>
										<div class="container">
											<button class="swiper-button-prev btn-carousel-prev"
												data-label-prev="Previous slide" type="button"></button>
											<button class="swiper-button-next btn-carousel-next"
												data-label-next="Next slide" type="button"></button>
										</div>
									</div>
									<div class="loading-spinner">
										<svg fill="none" height="320" viewbox="0 0 320 320" width="320"
											xmlns="http://www.w3.org/2000/svg">
											<path
												d="M237.247 95C241.417 95.0243 245.494 96.2155 249.004 98.435C252.514 100.655 255.313 103.811 257.074 107.537L310 223.921H278.171L243.625 143.475C241.056 137.679 239.055 131.654 237.649 125.482H237.045C235.655 131.662 233.653 137.692 231.07 143.488L196.347 223.921H164.682L217.432 107.562C219.191 103.835 221.987 100.676 225.494 98.4526C229.001 96.229 233.077 95.0318 237.247 95Z"
												fill="none" stroke="#fff" stroke-width="4"></path>
											<path
												d="M83.2238 226C79.0837 225.977 75.0353 224.787 71.5505 222.567C68.0658 220.348 65.288 217.191 63.5411 213.464L11 97.0918H42.5971L76.8919 177.529C79.4443 183.321 81.4349 189.342 82.8366 195.509H83.4361C84.815 189.333 86.802 183.307 89.3684 177.517L123.838 97.0794H155.273L102.906 213.439C101.162 217.169 98.3855 220.331 94.9007 222.555C91.4159 224.779 87.3663 225.974 83.2238 226Z"
												fill="none" stroke="#fff" stroke-width="4"></path>
										</svg>
									</div>
							</section>
							<section class="secondary-categories-section">
								<div aria-hidden="true" class="box-category-background">
									<div class="box-category-background-half left"></div>
									<div class="box-category-background-half right"></div>
								</div>
								<div class="box-category-wrapper container">
									<div class="box-category">
										<div aria-hidden="true" class="box-category-bg left"></div>
										<div class="box-category-content left">
											<img alt="Vasco Q1 Translator bundle featuring a purple Vasco Q1 translator with LED display and VA logo on the screen, along with black Vasco E1 translation earbuds and a charging case. "
												decoding="async" fetchpriority="low" loading="lazy"
												src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/secondary-categories/category-bundles.webp" ); ?>" />
											<div class="box-category-text">
												<h3 class="category-title">Bộ đôi giúp bạn hiểu nhau hơn</h3>
												<a class="btn btn-sm btn-black" href="<?php echo esc_url( home_url( "/bundles/" ) ); ?>">Khám phá gói
													combo</a>
											</div>
										</div>
									</div>
									<div class="box-category">
										<div aria-hidden="true" class="box-category-bg right"></div>
										<div class="box-category-content right">
											<img alt="Phụ kiện Vasco bao gồm kính cường lực bảo vệ màn hình, pin dự phòng, sạc và ốp bảo vệ máy phiên dịch."
												decoding="async" fetchpriority="low" loading="lazy"
												src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/secondary-categories/category-accessories.webp" ); ?>" />
											<div class="box-category-text">
												<h3 class="category-title">Bảo vệ thiết bị của bạn</h3>
												<a class="btn btn-sm btn-black" href="<?php echo esc_url( home_url( "/accessories/" ) ); ?>">Xem phụ kiện</a>
											</div>
										</div>
									</div>
								</div>
							</section>
							<div class="comparison-page-contact-container">
								<div class="container">
									<div class="comparison-page-link-module">
										<h2 class="h1">Bạn chưa biết chọn máy phiên dịch nào?</h2>
										<p>Chúng tôi đã chuẩn bị bảng so sánh các máy phiên dịch để giúp bạn lựa chọn dễ
											dàng hơn.</p>
										<a class="view-compare-button btn btn-md btn-black"
											href="<?php echo esc_url( home_url( "/comparison-engine/" ) ); ?>">
											So sánh máy phiên dịch
										</a>
									</div>
								</div>
							</div>
							<section aria-labelledby="vasco-numbers-heading" class="vasco-numbers-section">
								<div class="container">
									<h2 class="h2-notosans" id="vasco-numbers-heading">Lý do chọn Vasco Translator</h2>
									<div class="vasco-numbers-wrapper" role="list">
										<div class="vasco-numbers-single-wrapper" role="listitem" tabindex="0">
											<div class="number-paragraph">
												<h3 class="number" id="lang-number">113</h3>
											</div>
											<p class="number-description" id="lang-desc">
												ngôn ngữ trong túi bạn</p>
											<a aria-describedby="lang-number lang-desc" class="btn btn-black btn-md"
												href="<?php echo esc_url( home_url( "/translators/vasco-translator-v4/" ) ); ?>">
												Kiểm tra ngôn ngữ
											</a>
										</div>
										<div class="vasco-numbers-single-wrapper" role="listitem" tabindex="0">
											<div class="number-paragraph">
												<h3 class="number" id="country-number">200</h3>
											</div>
											<p class="number-description" id="country-desc">
												quốc gia với kết nối miễn phí để dịch</p>
											<a aria-describedby="country-number country-desc"
												class="btn btn-black btn-md" href="<?php echo esc_url( home_url( "/coverage-map/" ) ); ?>">
												Xem vùng phủ sóng internet
											</a>
										</div>
										<div class="vasco-numbers-single-wrapper" role="listitem" tabindex="0">
											<div class="number-paragraph">
												<h3 class="number" id="engines-number">10</h3>+
											</div>
											<p class="number-description" id="engines-desc">
												công cụ dịch thuật</p>
											<a aria-describedby="engines-number engines-desc"
												class="btn btn-black btn-md"
												href="<?php echo esc_url( home_url( "/all-products/" ) ); ?>">
												Tìm hiểu thêm <span class="text-sr-only">về công cụ dịch
													thuật</span></a>
										</div>
										<div class="vasco-numbers-single-wrapper" role="listitem" tabindex="0">
											<div class="number-paragraph">
												<h3 class="number" id="awards-number">11</h3>
											</div>
											<p class="number-description" id="awards-desc">
												giải thưởng danh giá</p>
											<a aria-describedby="awards-number awards-desc" class="btn btn-black btn-md"
												href="<?php echo esc_url( home_url( "/#awards-section" ) ); ?>" id="awards-scroll">
												Tìm hiểu thêm <span class="text-sr-only">về các giải thưởng</span></a>
										</div>
										<div class="vasco-numbers-single-wrapper" role="listitem" tabindex="0">
											<div class="number-paragraph">
												<h3 class="number" id="features-number">5</h3>
											</div>
											<p class="number-description" id="features-desc">
												tính năng dịch thuật hữu ích</p>
											<a aria-describedby="features-number features-desc"
												class="btn btn-black btn-md" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
												Tìm hiểu thêm <span class="text-sr-only">về các tính năng hữu ích của
													máy phiên dịch</span></a>
										</div>
									</div>
								</div>
							</section>
							<section class="key-features-section">
								<div class="container">
									<div class="key-features-flex">
										<h2 class="h2-notosans">Tính năng nổi bật</h2>
										<div aria-label="carousel with features" aria-roledescription="carousel"
											class="swiper swiper-carousel" role="region">
											<a class="sr-only focusable" href="#after-feature-carousel">Skip
												carousel</a>
											<div class="swiper-wrapper">
												<a class="swiper-slide" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
													<div class="key" role="group" tabindex="0">
														<img aria-hidden="true" decoding="async" fetchpriority="low"
															height="100px" loading="lazy"
															src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/key-features/key-section-1.svg" ); ?>"
															width="100px" />
														<h3 class="h2" id="icon1-title">Dịch <br /> Giọng nói</h3>
														<p id="icon1-desc">Tận hưởng cuộc trò chuyện lưu loát với bản
															dịch tức thì</p>
													</div>
												</a>
												<a class="swiper-slide" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
													<div class="key" role="group" tabindex="0">
														<img aria-hidden="true" decoding="async" fetchpriority="low"
															height="100px" loading="lazy"
															src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/key-features/key-section-2.svg" ); ?>"
															width="100px" />
														<h3 class="h2" id="icon2-title">Dịch <br /> Ảnh</h3>
														<p id="icon2-desc">Hiểu thực đơn, lịch trình, biển cảnh báo,
															v.v.</p>
													</div>
												</a>
												<a class="swiper-slide" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
													<div class="key" role="group" tabindex="0">
														<img aria-hidden="true" decoding="async" fetchpriority="low"
															height="100px" loading="lazy"
															src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/key-features/key-section-3.svg" ); ?>"
															width="100px" />
														<h3 class="h2" id="icon3-title">113 <br /> Ngôn ngữ</h3>
														<p id="icon3-desc">Kết nối với hơn 90% dân số thế giới</p>
													</div>
												</a>
												<a class="swiper-slide" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
													<div class="key" role="group" tabindex="0">
														<img aria-hidden="true" decoding="async" fetchpriority="low"
															height="100px" loading="lazy"
															src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/key-features/key-section-4.svg" ); ?>"
															width="100px" />
														<h3 class="h2" id="icon4-title">Internet <br /> Miễn phí
														</h3>
														<p id="icon4-desc">Tận hưởng internet miễn phí trọn đời cho việc
															dịch thuật</p>
													</div>
												</a>
												<a class="swiper-slide" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
													<div class="key" role="group" tabindex="0">
														<img aria-hidden="true" decoding="async" fetchpriority="low"
															height="100px" loading="lazy"
															src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/key-features/key-section-5.svg" ); ?>"
															width="100px" />
														<h3 class="h2" id="icon5-title">Dịch <br /> cuộc gọi</h3>
														<p id="icon5-desc">Thực hiện cuộc gọi điện thoại được dịch thời
															gian thực bằng 77 ngôn ngữ.</p>
													</div>
												</a>
												<a class="swiper-slide" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
													<div class="key" role="group" tabindex="0">
														<img aria-hidden="true" decoding="async" fetchpriority="low"
															height="100px" loading="lazy"
															src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/key-features/key-section-6.svg" ); ?>"
															width="100px" />
														<h3 class="h2" id="icon6-title">Vasco <br /> Giọng tôi</h3>
														<p id="icon6-desc">Tạo phiên bản số của giọng nói để nói như
															người bản địa bằng 54 ngôn ngữ.</p>
													</div>
												</a>
												<a class="swiper-slide" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
													<div class="key" role="group" tabindex="0">
														<img aria-hidden="true" decoding="async" fetchpriority="low"
															height="100px" loading="lazy"
															src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/key-features/key-section-7.svg" ); ?>"
															width="100px" />
														<h3 class="h2" id="icon7-title">Vasco <br /> Trợ lý</h3>
														<p id="icon7-desc">Khám phá ý nghĩa ẩn chứa và hiểu sâu hơn về
															thế giới xung quanh bạn.</p>
													</div>
												</a>
											</div>
											<div class="swiper-button-prev btn-carousel-prev"
												data-label-prev="Previous slide"></div>
											<div class="swiper-button-next btn-carousel-next"
												data-label-next="Next slide"></div>
										</div>
										<div class="flex-box">
											<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/features/" ) ); ?>">
												Tìm hiểu thêm về các tính năng máy dịch
											</a>
											<a class="btn btn-md btn-primary" href="<?php echo esc_url( home_url( "/translators/" ) ); ?>">
												Mua ngay
											</a>
										</div>
									</div>
									<div id="after-feature-carousel"></div>
								</div>
							</section>
							<section aria-labelledby="how-vasco-section-heading" class="how-vasco-section">
								<div class="how-vasco-flex container">
									<h2 class="h2-notosans" id="how-vasco-section-heading">Ứng dụng của Máy phiên dịch
										tức thì Vasco</h2>
									<div aria-roledescription="carousel" class="swiper home-applications-carousel" role="region">
										<div class="swiper-wrapper" role="list">
											<div aria-labelledby="panel1" class="card swiper-slide" role="listitem"
												tabindex="0">
												<picture>
													<source media="(min-width: 700px)" />
													<img alt="A smiling couple takes a selfie in an airport terminal; the woman holds travel documents and a passport, while sunlight streams through large windows behind them."
														decoding="async" fetchpriority="low" height="129px"
														loading="lazy"
														width="300px" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/hitchhiker-travel.png" ); ?>" >
												</picture>
												<h3 class="h2" id="panel1" tabindex="0">Du Lịch Tự Tin</h3>
												<p tabindex="0">
													Với máy phiên dịch Vasco, bạn có thể trực tiếp trải nghiệm văn hóa
													địa phương một cách chuẩn xác và hoàn toàn thoải mái. Máy dịch nhỏ
													gọn bỏ túi với thời lượng pin dài, là thiết bị phiên dịch trực tiếp
													dễ dùng và tin cậy nhất cho các chuyến du lịch của bạn.
												</p>
											</div>
											<div aria-labelledby="panel2" class="card swiper-slide card-bottom"
												role="listitem" tabindex="0">
												<picture>
													<source media="(min-width: 700px)" />
													<img alt="A manager holding a tablet smiles while addressing a group of five employees standing together in a restaurant or café setting. Everyone appears engaged and attentive."
														decoding="async" fetchpriority="low" height="129px"
														loading="lazy"
														width="300px" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/vasco-audience-presentation.png" ); ?>" >
												</picture>
												<h3 class="h2" id="panel2" tabindex="0">Kết Nối Toàn Cầu</h3>
												<p tabindex="0">
													Mở rộng mạng lưới kinh doanh của bạn mà không phải lo lắng về rào
													cản ngôn ngữ. Tính năng dịch giọng nói thời gian thực cho phép bạn
													tham gia các cuộc họp kinh doanh quốc tế, tham dự sự kiện trên toàn
													thế giới và giao tiếp tự tin với các đối tác tiềm năng mới. Đây là
													công nghệ dịch giọng nói mà bạn hoàn toàn có thể tin tưởng!
												</p>
											</div>
											<div aria-labelledby="panel3" class="card swiper-slide" role="listitem"
												tabindex="0">
												<picture>
													<source media="(min-width: 700px)" />
													<img alt="Two workers in orange safety uniforms and white hard hats have a discussion at an industrial facility, surrounded by pipes and machinery."
														decoding="async" fetchpriority="low" height="129px"
														loading="lazy"
														width="300px" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/hospitality-customer-support.png" ); ?>" >
												</picture>
												<h3 class="h2" id="panel3" tabindex="0">Làm Việc Hiệu Quả</h3>
												<p tabindex="0">
													Thiết bị máy phiên dịch tức thì Vasco giúp các công ty toàn cầu xóa
													bỏ rào cản ngôn ngữ ngay tức khắc. Giao tiếp với đồng nghiệp nước
													ngoài một cách mượt mà mà không làm giảm hiệu suất làm việc.
												</p>
											</div>
											<div aria-labelledby="panel4" class="card swiper-slide card-bottom"
												role="listitem" tabindex="0">
												<picture>
													<source media="(min-width: 700px)" />
													<img alt="Two smiling paramedics in uniform stand outside, with an ambulance parked behind them."
														decoding="async" fetchpriority="low" height="129px"
														loading="lazy"
														width="300px" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/paramedics-healthcare.png" ); ?>" >
												</picture>
												<h3 class="h2" id="panel4" tabindex="0">Ứng Phó Nhanh Chóng</h3>
												<p tabindex="0">
													Khi rào cản ngôn ngữ có thể làm chậm trễ các hành động, một máy
													phiên dịch tức thì tin cậy là công cụ thiết yếu trong các tình huống
													khẩn cấp. Vasco hoạt động thời gian thực, giúp bạn hỗ trợ kịp thời
													những người cần giúp đỡ.
												</p>
											</div>
										</div>
										<div class="swiper-button-prev btn-carousel-prev"
											data-label-prev="Previous slide"></div>
										<div class="swiper-button-next btn-carousel-next" data-label-next="Next slide">
										</div>
									</div>
								</div>
							</section>
							<section class="media-awards">
								<div class="container">
									<h2 class="h2-notosans text-center" id="media-about-us">Truyền thông nói về chúng
										tôi</h2>
									<div aria-label="carousel with quotes" aria-roledescription="carousel"
										class="swiper swiper-carousel autoplay loop carousel-media">
										<a class="sr-only focusable" href="#after-media-carousel">Skip carousel</a>
										<div class="swiper-wrapper">
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-zd_net" href="#" rel="nofollow"
													target="_blank">
													<h3 class="sr-only" id="slide-label-zd_net">quote from zd_net</h3>
													<img alt="zd net icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/zd_net.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Một trong những buổi
														demo ấn tượng nhất của tôi tại CES 2024 là với đội ngũ Vasco
														Translator E1, tai nghe sử dụng AI và ứng dụng để dịch 49 ngôn
														ngữ theo thời gian thực.</blockquote>
												</a>
											</div>
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-fox_business" href="#" rel="nofollow"
													target="_blank">
													<h3 class="sr-only" id="slide-label-fox_business">quote from
														fox_business</h3>
													<img alt="fox business icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/fox_business.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Vasco mong muốn các
														công cụ dịch thuật đáp ứng nhu cầu của những khách hàng thường
														xuyên du lịch, người sống ở nước ngoài, người làm việc trong đội
														ngũ quốc tế hoặc gia đình có rào cản ngôn ngữ do người thân đến
														từ nhiều quốc gia khác nhau.</blockquote>
												</a>
											</div>
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-cbs_news" href="#" rel="nofollow"
													target="_blank">
													<h3 class="sr-only" id="slide-label-cbs_news">quote from cbs_news
													</h3>
													<img alt="cbs news icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/cbs_news.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Bạn có thể đi du lịch
														khắp thế giới, sử dụng thiết bị này để di chuyển mà không bao
														giờ cảm thấy bỡ ngỡ hay lạc lỏng tại bất kỳ quốc gia nào.
													</blockquote>
												</a>
											</div>
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-conde_nast_traveler" href="#"
													rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-conde_nast_traveler">quote from
														conde_nast_traveler</h3>
													<img alt="conde nest traveller icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/conde_nast_traveler.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Thiết bị dịch ngôn ngữ
														này là phao cứu sinh của tôi khi sống ở nước ngoài. Nó cho phép
														cuộc trò chuyện qua lại mượt mà gần như không có độ trễ.
													</blockquote>
												</a>
											</div>
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-forbes" href="#" rel="nofollow"
													target="_blank">
													<h3 class="sr-only" id="slide-label-forbes">quote from forbes</h3>
													<img alt="forbes icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/forbes.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Trong khi hầu hết các
														máy dịch chỉ dùng 1 công cụ dịch đơn lẻ, thiết bị của Vasco sử
														dụng tới 12 công cụ dịch thuật cùng đội ngũ chuyên gia ngôn ngữ
														đảm bảo kết quả kết nối hoàn hảo.</blockquote>
												</a>
											</div>
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-the_strategist" href="#" rel="nofollow"
													target="_blank">
													<h3 class="sr-only" id="slide-label-the_strategist">quote from
														the_strategist</h3>
													<img alt="the strategist icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/the_strategist.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Tôi đánh giá Vasco là thiết bị phiên dịch xuất sắc nhất vì đi kèm dữ liệu di động trọn đời miễn phí (không cần tìm Wi-Fi!) và phiên dịch 108 ngôn ngữ tại 200 quốc gia khác nhau.</blockquote>
												</a>
											</div>
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-business_insider" href="#"
													rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-business_insider">quote from
														business_insider</h3>
													<img alt="business insider icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/business_insider.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Đạt chuẩn bảo mật Y tế HIPAA, máy phiên dịch Vasco cung cấp bản dịch bảo mật đến 108 ngôn ngữ, đảm bảo an toàn sử dụng tại mọi cơ sở y tế nhằm xóa bỏ rào cản ngôn ngữ giữa bệnh nhân và y bác sĩ.
													</blockquote>
												</a>
											</div>
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-vancouver_sun" href="#" rel="nofollow"
													target="_blank">
													<h3 class="sr-only" id="slide-label-vancouver_sun">quote from
														vancouver_sun</h3>
													<img alt="vancouver sun icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/vancouver_sun.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Công nghệ đột phá của Vasco cho phép mọi người dễ dàng thấu hiểu lẫn nhau qua máy phiên dịch, kết nối 90% dân số thế giới bằng sức mạnh ngôn ngữ.</blockquote>
												</a>
											</div>
											<div class="swiper-slide" role="listitem">
												<a aria-labelledby="slide-label-techradar" href="#" rel="nofollow"
													target="_blank">
													<h3 class="sr-only" id="slide-label-techradar">quote from techradar
													</h3>
													<img alt="tech radar icon" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Media/techradar.webp" ); ?>" />
													<blockquote class="awards-text" tabindex="0">Vasco Translator V4 mang lại khả năng dịch giọng nói tin cậy, dịch hình ảnh siêu tốc và phủ sóng toàn cầu miễn phí trọn đời trong thiết bị bỏ túi hoàn hảo cho kỳ nghỉ hay chuyến công tác.</blockquote>
												</a>
											</div>
										</div>
										<div class="swiper-button-prev btn-carousel-prev"
											data-label-prev="Previous slide"></div>
										<div class="swiper-button-next btn-carousel-next" data-label-next="Next slide">
										</div>
									</div>
									<div class="stop-autoplay-carousel">
										<button class="btn btn-md btn-stop-autoplay"
											data-text-button-pause="Dừng tự động chuyển trang"
											data-text-button-resume="Tiếp tục tự động chuyển trang">
											<span data-text-pause="Tạm dừng" data-text-resume="Tiếp tục">Tạm dừng</span>
											<img alt="" aria-hidden="true" height="24"
												src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/pause.svg" ); ?>" width="24" />
										</button>
									</div>
									<div id="after-media-carousel"></div>
								</div>
								<hr />
								<div class="container" id="awards-section">
									<h2 class="h2-notosans text-center">Giải thưởng</h2>
									<div aria-label="carousel with awards" aria-roledescription="carousel"
										class="swiper swiper-carousel autoplay loop carousel-award" role="region">
										<a class="sr-only focusable" href="#after-award-carousel">Skip carousel</a>
										<div class="swiper-wrapper" role="list">
											<div aria-labelledby="slide-label-muse_silver" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-muse_silver">muse_silver logo
													</h3>
													<img alt="MUSE SILVER" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/muse_silver.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-european_product_design_award"
												class="swiper-slide" role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-european_product_design_award">
														european_product_design_award logo</h3>
													<img alt="European Product Design Award" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/european_product_design_award.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-produkte_disq" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-produkte_disq">produkte_disq
														logo</h3>
													<img alt="PRODUKTE - DISQ" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/produkte_disq.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-red_dot_2025" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-red_dot_2025">red_dot_2025 logo
													</h3>
													<img alt="reddot 2025" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2025.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-muse_design" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-muse_design">muse_design logo
													</h3>
													<img alt="muse design" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/muse_design.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-red_dot_2022" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-red_dot_2022">red_dot_2022 logo
													</h3>
													<img alt="red dot winner 2022" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2022.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-new_york_product_design"
												class="swiper-slide" role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-new_york_product_design">
														new_york_product_design logo</h3>
													<img alt="New York product design awards" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/new_york_product_design.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-good_design" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-good_design">good_design logo
													</h3>
													<img alt="good design award" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/good_design.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-japan_good_design" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-japan_good_design">
														japan_good_design logo</h3>
													<img alt="Japan good design award" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/japan_good_design.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-red_dot_2021" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-red_dot_2021">red_dot_2021 logo
													</h3>
													<img alt="red dot winner 2021" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2021.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-glomo" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-glomo">glomo logo</h3>
													<img alt="glomo global mobile awards" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/glomo.webp" ); ?>" />
												</a>
											</div>
											<div aria-labelledby="slide-label-red_dot_2026" class="swiper-slide"
												role="listitem">
												<a href="#" rel="nofollow" target="_blank">
													<h3 class="sr-only" id="slide-label-red_dot_2026">red_dot_2026 logo
													</h3>
													<img alt="red dot winner 2026" loading="lazy"
														src="<?php echo esc_url( VASCO_THEME_URI . "/assets/modules/ve_contentmanager/src/Resources/Images/Award/red_dot_2026.webp" ); ?>" />
												</a>
											</div>
										</div>
										<div class="swiper-button-prev btn-carousel-prev"
											data-label-prev="Previous slide"></div>
										<div class="swiper-button-next btn-carousel-next" data-label-next="Next slide">
										</div>
									</div>
									<div class="stop-autoplay-carousel">
										<button class="btn btn-md btn-stop-autoplay"
											data-text-button-pause="Dừng tự động chuyển trang"
											data-text-button-resume="Tiếp tục tự động chuyển trang">
											<span data-text-pause="Tạm dừng" data-text-resume="Tiếp tục">Tạm dừng</span>
											<img alt="" aria-hidden="true" height="24"
												src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/pause.svg" ); ?>" width="24" />
										</button>
									</div>
									<div id="after-award-carousel"></div>
								</div>
							</section>
						</section>
					</section>
				</div>
			</div>
		</section>
		<section class="about-vasco-section">
			<div class="container">
				<h2 class="h2-notosans">Về VASCO VN</h2>
				<div class="about-vasco-grid">
					<div class="content-box-big">
						<h3 class="h2">Sứ mệnh của chúng tôi</h3>
						<p class="body-16">Nelson Mandela đã từng nói: "Nếu bạn nói chuyện với một người bằng ngôn ngữ
							mà họ hiểu, thông điệp sẽ tới tâm trí họ. Nhưng nếu bạn nói với họ bằng chính ngôn ngữ mẹ đẻ
							của họ, thông điệp sẽ chạm tới trái tim".</p>
						<p class="body-16">
							Sứ mệnh của chúng tôi là xóa bỏ rào cản ngôn ngữ, giúp mọi người trên khắp thế giới thấu hiểu nhau hơn. Từ năm 2008, chúng tôi đã giúp hàng triệu người tự tin giao tiếp, và ngày nay Vasco tự hào là thương hiệu dẫn đầu trong thị trường máy phiên dịch tức thì.
						</p>
						<div class="btn-wrapper">
							<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/about-us/" ) ); ?>" title="Sứ mệnh của chúng tôi">
								Tìm hiểu thêm <span class="text-sr-only">o naszej misji</span>
							</a>
						</div>
					</div>
					<div class="double-wrapper">
						<div class="box-small-first">
							<img alt="Three people stand smiling in front of a white, red, and blue ambulance parked on a paved street beside a building. Two men, one in a suit and one in a white shirt, shake hands, joined by a woman in a red shirt."
								decoding="async" fetchpriority="low" height="109px" loading="lazy"
								src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/about-vasco/about-vasco-section-new-1.webp" ); ?>"
								width="300px" />
							<h3 class="h2">Tác động xã hội</h3>
							<p class="body-16">Hợp tác cùng Sứ mệnh Y tế Ba Lan, chúng tôi thành lập Đội Cứu hộ Khẩn cấp
								PMM Vasco. Từ năm 2022, đơn vị cứu hộ đặc biệt gồm các lực lượng ứng phó tích cực đã
								cung cấp viện trợ y tế trong vòng 24–48 giờ sau sự cố. Khi thiên tai và khủng hoảng nhân
								đạo xảy ra, Đội tự hào mang lại sự giúp đỡ cho những nạn nhân gặp khó khăn.</p>
							<div class="btn-wrapper">
								<a class="btn btn-md btn-black" href="./initiatives.html" title="Tác động xã hội">
									Tìm hiểu thêm <span class="text-sr-only">o naszych inicjatywach</span>
								</a>
							</div>
						</div>
						<div class="box-small-second">
							<img alt="Two people sit at a wooden table, each holding a translator with apps open on the screens. One person gestures toward the other, and a keyboard is visible in the background."
								decoding="async" fetchpriority="low" height="109px" loading="lazy"
								src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/about-vasco/about-vasco-section-new-2.webp" ); ?>"
								width="300px" />
							<h3 class="h2">Tìm chúng tôi</h3>
							<p class="body-16">
								Thiết bị máy phiên dịch tức thì Vasco đã có mặt tại hơn 20 quốc gia trên toàn thế giới. Bạn có thể mua hàng trực tuyến hoặc ghé thăm các cửa hàng chính hãng của chúng tôi tại Đức, Ý, Pháp, Bồ Đào Nha, Tây Ban Nha, Ba Lan, Hungary và Các Tiểu vương quốc Ả Rập Thống nhất.
							</p>
							<div class="btn-wrapper">
								<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" title="Tìm chúng tôi">
									Tìm hiểu thêm <span class="text-sr-only">o naszych sklepach</span>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<hr />
		<section class="join-us-section">
			<div class="container">
				<h2 class="h2-notosans">Chúng tôi là ai?</h2>
				<div class="text-wrapper">
					<p class="body-16">Chúng tôi là một công ty toàn cầu với gần 200 chuyên gia CNTT và ngôn ngữ học đến
						từ khắp nơi trên thế giới. Sản phẩm của chúng tôi có mặt tại Châu Âu, Hoa Kỳ, Canada, Mexico và
						Châu Á. Hơn thế nữa, chúng tôi cung cấp dịch vụ hỗ trợ tận tình cho khách hàng bằng chính ngôn
						ngữ địa phương của họ.</p>
					<div class="btn-wrapper">
						<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" title="Chúng tôi là ai?">
							Tìm hiểu thêm <span class="text-sr-only">o nas</span>
						</a>
					</div>
				</div>
			</div>
			<img alt="A dotted orange world map on a black background with gray VA markers placed on various locations across North America, Europe, the Middle East, and Asia."
				decoding="async" fetchpriority="low" height="400px" loading="lazy"
				src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/home/join-us/map-section-2.webp" ); ?>" title="Vasco World Map" width="1200px" />
		</section>
		<style>
		.blogs-dynamic-grid {
			display: grid;
			grid-template-columns: repeat(4, 1fr);
			gap: 20px;
			margin-top: 30px;
		}
		@media (max-width: 1024px) {
			.blogs-dynamic-grid {
				grid-template-columns: repeat(2, 1fr);
			}
		}
		@media (max-width: 600px) {
			.blogs-dynamic-grid {
				grid-template-columns: 1fr;
			}
		}
		.blogs-dynamic-grid .box {
			background: #fff;
			border-radius: 16px;
			overflow: hidden;
			display: flex;
			flex-direction: column;
			box-shadow: 0 4px 18px rgba(0,0,0,0.06);
			transition: transform 0.25s ease, box-shadow 0.25s ease;
			border: 1px solid #eaeaea;
		}
		.blogs-dynamic-grid .box:hover {
			transform: translateY(-5px);
			box-shadow: 0 12px 28px rgba(0,0,0,0.12);
		}
		.blogs-dynamic-grid .box img {
			width: 100% !important;
			height: 190px !important;
			object-fit: cover !important;
			border-radius: 16px 16px 0 0 !important;
			display: block !important;
		}
		.blogs-dynamic-grid .blog-body {
			padding: 14px 14px 12px;
			display: flex;
			flex-direction: column;
		}
		.blogs-dynamic-grid .blog-title {
			font-size: 15.5px !important;
			font-weight: 700 !important;
			line-height: 1.35 !important;
			margin: 0 0 4px 0 !important;
			color: #1a1a1a !important;
		}
		.blogs-dynamic-grid .blog-meta {
			font-size: 12px;
			color: #888;
			margin-bottom: 6px;
			display: flex;
			align-items: center;
			gap: 6px;
		}
		.blogs-dynamic-grid .blog-text p {
			font-size: 13.5px;
			color: #555;
			line-height: 1.45;
			margin: 0 0 8px 0;
		}
		.blogs-dynamic-grid .blog-more-link {
			font-size: 13.5px;
			font-weight: 700;
			color: #e30613;
			text-decoration: none;
			display: inline-flex;
			align-items: center;
			gap: 4px;
			margin-top: 0;
		}
		.blogs-dynamic-grid .blog-more-link:hover {
			text-decoration: underline;
		}
		</style>
		<section class="blogs">
			<div class="container">
				<h2 class="h2-notosans">KHÁM PHÁ BÀI VIẾT CỦA CHÚNG TÔI</h2>
				
				<div class="blogs-dynamic-grid">
					<?php
					// Query 4 random posts from Database (post_type = 'post')
					$random_posts = new WP_Query( array(
						'post_type'      => 'post',
						'posts_per_page' => 4,
						'post_status'    => 'publish',
						'orderby'        => 'rand',
					) );

					if ( $random_posts->have_posts() ) :
						while ( $random_posts->have_posts() ) : $random_posts->the_post();
							$p_id        = get_the_ID();
							$p_link      = get_permalink();
							$p_title     = get_the_title();
							$p_excerpt   = get_the_excerpt();
							if ( empty( $p_excerpt ) ) {
								$p_excerpt = wp_strip_all_tags( get_the_content() );
							}
							$p_excerpt   = wp_trim_words( $p_excerpt, 20, '...' );
							$author_name = get_post_meta( $p_id, '_vasco_author_name', true ) ?: get_the_author();
							$read_time   = get_post_meta( $p_id, '_vasco_read_time', true ) ?: '10 phút đọc';

							$p_has_thumb = has_post_thumbnail( $p_id );
							$p_thumb     = '';
							if ( $p_has_thumb ) {
								$p_thumb = get_the_post_thumbnail_url( $p_id, 'medium_large' );
							} else {
								$post_content = get_the_content();
								if ( preg_match( '/<img[^>]+src=["\']([^"\']+)["\']/i', $post_content, $matches ) ) {
									$p_thumb = $matches[1];
								}
							}
							?>
							<div class="box">
								<a class="link-blog" href="<?php echo esc_url( $p_link ); ?>" title="<?php echo esc_attr( $p_title ); ?>">
									<?php if ( ! empty( $p_thumb ) ) : ?>
										<img alt="<?php echo esc_attr( $p_title ); ?>" src="<?php echo esc_url( $p_thumb ); ?>" loading="lazy" />
									<?php else : ?>
										<div style="width: 100%; height: 200px; background: #eef2f5; display: flex; align-items: center; justify-content: center; color: #888; font-size: 13px;">Chưa có ảnh</div>
									<?php endif; ?>
								</a>
								<div class="blog-body">
									<h3 class="h2 blog-title">
										<a href="<?php echo esc_url( $p_link ); ?>" style="color: inherit; text-decoration: none;"><?php echo esc_html( $p_title ); ?></a>
									</h3>
									
									<div class="blog-meta">
										<span><?php echo esc_html( $author_name ); ?></span>
										<span>•</span>
										<span><?php echo esc_html( $read_time ); ?></span>
									</div>

									<div class="blog-text">
										<p><?php echo esc_html( $p_excerpt ); ?></p>
									</div>

									<a class="blog-more-link" href="<?php echo esc_url( $p_link ); ?>">
										Đọc thêm &rarr;
									</a>
								</div>
							</div>
							<?php
						endwhile;
						wp_reset_postdata();
					else :
						?>
						<p style="grid-column: 1 / -1; text-align: center; color: #666;">Chưa có bài viết nào trong CSDL.</p>
					<?php endif; ?>
				</div>
				
				<div style="text-align: center; margin-top: 36px;">
					<a class="btn btn-md btn-black" href="<?php echo esc_url( home_url( '/articles/' ) ); ?>" style="display: inline-flex; width: auto;">
						Xem tất cả bài viết
					</a>
				</div>
			</div>
		</section>
		<hr />
		

<?php
get_footer();
