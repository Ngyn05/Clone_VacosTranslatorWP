<footer class="js-footer" id="footer">
			<div class="container">
			</div>
			<div class="footer-container">
				<!-- HIDDEN: <div class="footer-info-top-gray">...</div> -->
				<div class="footer-dark-bottom">
					<!-- CSS RESPONSIVE CHO FOOTER -->
					<style>
						.vasco-footer-top {
							padding-bottom: 24px;
							margin-bottom: 28px;
							border-bottom: 1px solid rgba(255, 255, 255, 0.12);
							display: flex;
							align-items: center;
							justify-content: space-between;
							flex-wrap: wrap;
							gap: 16px;
							width: 100%;
						}
						.vasco-support-grid {
							display: grid;
							grid-template-columns: repeat(3, 1fr);
							gap: 24px;
							align-items: stretch;
							width: 100%;
						}
						.vasco-menu-grid {
							display: grid;
							grid-template-columns: repeat(4, 1fr);
							gap: 32px 24px;
							width: 100%;
						}
						.vasco-commitments {
							margin-top: 20px;
							display: flex;
							align-items: center;
							justify-content: center;
							gap: 24px;
							font-size: 13.5px;
							color: #94A3B8 !important;
							flex-wrap: wrap;
						}
						.vasco-commitment-sep {
							color: rgba(255,255,255,0.2);
						}

						/* RESPONSIVE TABLET / MÀN HÌNH VỪA (MAX 1024PX) */
						@media (max-width: 1024px) {
							.vasco-support-grid {
								grid-template-columns: repeat(2, 1fr) !important;
								gap: 20px !important;
							}
							/* Card Hotline thứ 3 khi xuống dòng sẽ nằm chính giữa */
							.vasco-support-grid > div:nth-child(3) {
								grid-column: 1 / -1 !important;
								max-width: 500px !important;
								justify-self: center !important;
								width: 100% !important;
							}
							.vasco-menu-grid {
								grid-template-columns: repeat(2, 1fr) !important;
								gap: 32px 24px !important;
							}
						}

						/* RESPONSIVE MOBILE (MAX 768PX) - CĂN GIỮA TOÀN BỘ */
						@media (max-width: 768px) {
							.vasco-footer-top {
								flex-direction: column !important;
								align-items: center !important;
								text-align: center !important;
								gap: 12px !important;
							}
							.footer-support-header, .footer-support-header h4 {
								justify-content: center !important;
								text-align: center !important;
							}
							.vasco-support-grid {
								grid-template-columns: 1fr !important;
								gap: 20px !important;
								justify-items: center !important;
							}
							.vasco-support-grid > div {
								max-width: 480px !important;
								width: 100% !important;
							}
							/* RESPONSIVE FOOTER ACCORDION MENU ON MOBILE (<768PX) */
							@media (max-width: 768px) {
								.vasco-menu-grid {
									grid-template-columns: 1fr !important;
									gap: 8px !important;
								}
								.footer-nav {
									border-bottom: 1px solid rgba(255, 255, 255, 0.12) !important;
									padding-bottom: 8px !important;
									margin-bottom: 4px !important;
								}
								.vasco-menu-grid .footer-column-header {
									display: flex !important;
									align-items: center !important;
									justify-content: space-between !important;
									cursor: pointer !important;
									padding: 12px 4px !important;
									user-select: none !important;
									-webkit-tap-highlight-color: transparent !important;
								}
								.vasco-menu-grid .footer-column-header h4 {
									margin: 0 !important;
									font-size: 16px !important;
									font-weight: 700 !important;
									color: #FFFFFF !important;
									text-align: left !important;
								}
								.vasco-menu-grid .footer-column-header svg {
									transition: transform 0.3s ease !important;
									flex-shrink: 0 !important;
									display: block !important;
								}
								.vasco-menu-grid .footer-column-header.active svg,
								.vasco-menu-grid .footer-nav.active .footer-column-header svg {
									transform: rotate(180deg) !important;
								}
								.vasco-menu-grid .footer-column-list {
									display: none !important;
									padding: 10px 0 12px 12px !important;
									margin: 0 !important;
									list-style: none !important;
									text-align: left !important;
								}
								.vasco-menu-grid .footer-column-list li {
									margin-bottom: 10px !important;
								}
								.vasco-menu-grid .footer-column-header.active + .footer-column-list,
								.vasco-menu-grid .footer-nav.active .footer-column-list,
								.vasco-menu-grid .footer-column-list.open {
									display: block !important;
								}
								.vasco-commitments {
									flex-direction: column !important;
									gap: 8px !important;
									text-align: center !important;
								}
								.vasco-commitment-sep {
									display: none !important;
								}
								.footer-dark-bottom .footer-flex {
									flex-direction: column !important;
									align-items: center !important;
									gap: 20px !important;
									text-align: center !important;
								}
								.footer-dark-bottom .box-flex {
									justify-content: center !important;
									width: 100% !important;
								}
							}

							@media (min-width: 769px) {
								.vasco-menu-grid .footer-column-header svg {
									display: none !important;
								}
								.vasco-menu-grid .footer-column-list {
									display: block !important;
								}
							}
						</style>

					<div class="container">
						<!-- TOP LOGO & SLOGAN -->
						<div class="vasco-footer-top">
							<a href="<?php echo esc_url( home_url( "/" ) ); ?>" title="VASCO VN" style="display: inline-flex; align-items: center; text-decoration: none; gap: 10px;">
								<img alt="VASCO VN" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/logo.svg" ); ?>" style="height: 30px; width: auto; filter: brightness(0) invert(1); display: block;" />
								<span style="color: #60A5FA; font-size: 15px; font-weight: 800; letter-spacing: 1.5px; background: rgba(59, 130, 246, 0.18); border: 1px solid rgba(96, 165, 250, 0.35); padding: 2px 8px; border-radius: 6px;">VN</span>
							</a>
							<span style="color: #94A3B8; font-size: 14px; font-weight: 500;">Máy phiên dịch hàng đầu thế giới</span>
						</div>

						<!-- TẦNG 1: KHỐI HỖ TRỢ KHÁCH HÀNG ĐẶT LÊN TRÊN -->
						<nav aria-labelledby="footer-support" class="footer-suport-info" role="navigation" style="padding-bottom: 32px; margin-bottom: 32px; border-bottom: 1px solid rgba(255, 255, 255, 0.12);">
							<div class="footer-column-header footer-support-header" style="margin-bottom: 24px;">
								<h4 class="h2" id="footer-support" style="color: #FFFFFF !important; font-size: 18px; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">Hỗ trợ khách hàng</h4>
							</div>
							
							<!-- 3 Columns Layout (Hà Nội, TP.HCM, Hotline) -->
							<div class="vasco-support-grid">
								
								<!-- Column 1: Hà Nội -->
								<div style="background: linear-gradient(145deg, rgba(255,255,255,0.06) 0%, rgba(255,255,255,0.02) 100%); border: 1px solid rgba(255,255,255,0.15); border-radius: 14px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 20px rgba(0,0,0,0.25);">
									<div>
										<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
											<div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(59, 130, 246, 0.2); border: 1px solid rgba(59, 130, 246, 0.4); display: flex; align-items: center; justify-content: center;">
												<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/>
													<path d="M6 12H4a2 2 0 0 0-2 2v8h4"/>
													<path d="M18 9h2a2 2 0 0 1 2 2v11h-4"/>
													<path d="M10 6h4"/>
													<path d="M10 10h4"/>
													<path d="M10 14h4"/>
													<path d="M10 18h4"/>
												</svg>
											</div>
											<span class="body-16" style="font-size: 11px; font-weight: 700; text-transform: uppercase; background: rgba(59, 130, 246, 0.2); color: #60A5FA; padding: 4px 10px; border-radius: 20px; border: 1px solid rgba(59, 130, 246, 0.35);">Miền Bắc</span>
										</div>
										<h5 class="h2" style="font-size: 15px; margin: 0 0 10px; color: #FFFFFF !important; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">VĂN PHÒNG HÀ NỘI</h5>
										
										<div class="footer-info" style="line-height: 1.6; display: flex; gap: 10px; align-items: flex-start; margin-bottom: 16px; color: #E2E8F0 !important;">
											<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 3px;">
												<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
												<circle cx="12" cy="10" r="3"/>
											</svg>
											<span>226 Đường Láng, Phường Thịnh Quang, Quận Đống Đa, Hà Nội</span>
										</div>
									</div>
									
									<div style="padding-top: 14px; border-top: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 10px;">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
											<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
										</svg>
										<a class="footer-info" href="tel:02473048700" style="color: #60A5FA !important; font-weight: 700; font-size: 16px; letter-spacing: 0.5px; text-decoration: none;">024.7304.8700</a>
									</div>
								</div>

								<!-- Column 2: TP. Hồ Chí Minh -->
								<div style="background: linear-gradient(145deg, rgba(255,255,255,0.06) 0%, rgba(255,255,255,0.02) 100%); border: 1px solid rgba(255,255,255,0.15); border-radius: 14px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 4px 20px rgba(0,0,0,0.25);">
									<div>
										<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
											<div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(59, 130, 246, 0.2); border: 1px solid rgba(59, 130, 246, 0.4); display: flex; align-items: center; justify-content: center;">
												<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<rect x="4" y="2" width="16" height="20" rx="2" ry="2"/>
													<path d="M9 22v-4h6v4"/>
													<path d="M8 6h.01"/>
													<path d="M16 6h.01"/>
													<path d="M12 6h.01"/>
													<path d="M12 10h.01"/>
													<path d="M12 14h.01"/>
													<path d="M16 10h.01"/>
													<path d="M16 14h.01"/>
													<path d="M8 10h.01"/>
													<path d="M8 14h.01"/>
												</svg>
											</div>
											<span class="body-16" style="font-size: 11px; font-weight: 700; text-transform: uppercase; background: rgba(59, 130, 246, 0.2); color: #60A5FA; padding: 4px 10px; border-radius: 20px; border: 1px solid rgba(59, 130, 246, 0.35);">Miền Nam</span>
										</div>
										<h5 class="h2" style="font-size: 15px; margin: 0 0 10px; color: #FFFFFF !important; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">VĂN PHÒNG HỒ CHÍ MINH</h5>
										
										<div class="footer-info" style="line-height: 1.6; display: flex; gap: 10px; align-items: flex-start; margin-bottom: 16px; color: #E2E8F0 !important;">
											<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0; margin-top: 3px;">
												<path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/>
												<circle cx="12" cy="10" r="3"/>
											</svg>
											<span>137 Hòa Hưng, Phường Hòa Hưng, TP. Hồ Chí Minh</span>
										</div>
									</div>
									
									<div style="padding-top: 14px; border-top: 1px solid rgba(255,255,255,0.1); display: flex; align-items: center; gap: 10px;">
										<svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="flex-shrink: 0;">
											<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
										</svg>
										<a class="footer-info" href="tel:02873048700" style="color: #60A5FA !important; font-weight: 700; font-size: 16px; letter-spacing: 0.5px; text-decoration: none;">028.7304.8700</a>
									</div>
								</div>

								<!-- Column 3: Hotline Tổng Đài -->
								<div style="background: linear-gradient(145deg, rgba(37,99,235,0.25) 0%, rgba(29,78,216,0.1) 100%); border: 1px solid rgba(59, 130, 246, 0.6); border-radius: 14px; padding: 24px; display: flex; flex-direction: column; justify-content: space-between; box-shadow: 0 6px 24px rgba(37,99,235,0.3);">
									<div>
										<div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px;">
											<div style="width: 44px; height: 44px; border-radius: 12px; background: rgba(59, 130, 246, 0.3); border: 1px solid rgba(96, 165, 250, 0.6); display: flex; align-items: center; justify-content: center;">
												<svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#60A5FA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
													<path d="M3 18v-6a9 9 0 0 1 18 0v6"/>
													<path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"/>
												</svg>
											</div>
											<span class="body-16" style="font-size: 11px; font-weight: 700; text-transform: uppercase; background: rgba(37, 99, 235, 0.35); color: #93C5FD; padding: 4px 10px; border-radius: 20px; border: 1px solid rgba(96, 165, 250, 0.5);">Tư vấn 24/7</span>
										</div>
										<h5 class="h2" style="font-size: 15px; margin: 0 0 14px; color: #FFFFFF !important; font-weight: 700; text-transform: uppercase; letter-spacing: 0.5px;">HOTLINE TỔNG ĐÀI</h5>
										
										<a href="tel:1900638400" style="display: flex; align-items: center; justify-content: center; gap: 10px; background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%); color: #ffffff !important; padding: 12px 22px; border-radius: 30px; text-decoration: none; margin-bottom: 12px; box-shadow: 0 4px 16px rgba(37, 99, 235, 0.5); transition: transform 0.2s;">
											<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
											</svg>
											<span style="font-size: 20px; font-weight: 800; letter-spacing: 0.5px;">1900.63.8400</span>
										</a>
									</div>
									<p class="body-16" style="font-size: 12.5px; color: #CBD5E1 !important; margin: 0; text-align: center; line-height: 1.4;">
										Hỗ trợ và tư vấn khách hàng mọi lúc, mọi nơi
									</p>
								</div>

							</div>

							<!-- Commitment Badges Row (Không đóng khung & không icon) -->
							<div class="vasco-commitments">
								<span>Sản phẩm chính hãng</span>
								<span class="vasco-commitment-sep">|</span>
								<span>Bảo hành uy tín</span>
								<span class="vasco-commitment-sep">|</span>
								<span>Hỗ trợ tận tâm</span>
							</div>
						</nav>

						<!-- TẦNG 2: 4 CỘT MENU Ở PHÍA DƯỚI -->
						<div class="footer-grid" style="width: 100%; padding-bottom: 24px;">
							<div class="footer-columns vasco-menu-grid">
								<nav aria-labelledby="footer-0-heading" class="footer-nav" role="navigation">
									<div class="footer-column-header" data-id="0">
										<h4 class="h2" id="footer-0-heading">Khách hàng</h4>
										<svg fill="none" height="12" viewbox="0 0 20 12" width="20"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M2 2L10 10L18 2" stroke="white" stroke-linecap="square"
												stroke-width="2"></path>
										</svg>
									</div>
									<ul class="footer-column-list" data-id="0">
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/shipping/" ) ); ?>" rel="nofollow"
												title="Shipping &amp; Payments">
												Vận chuyển &amp; Thanh toán
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/returns/" ) ); ?>" title="Returns">
												Đổi trả
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/contact/" ) ); ?>" title="Contact">
												Liên hệ
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/seniors-traveling/" ) ); ?>"
												title="Seniors traveling">
												Người cao tuổi đi du lịch
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/articles/" ) ); ?>" title="Blog">
												Blog
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/camper-tour/" ) ); ?>" title="Vasco Camper Tour">
												Chuyến xe Vasco
											</a>
										</li>
									</ul>
								</nav>
								<nav aria-labelledby="footer-1-heading" class="footer-nav" role="navigation">
									<div class="footer-column-header" data-id="1">
										<h4 class="h2" id="footer-1-heading">Sản phẩm</h4>
										<svg fill="none" height="12" viewbox="0 0 20 12" width="20"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M2 2L10 10L18 2" stroke="white" stroke-linecap="square"
												stroke-width="2"></path>
										</svg>
									</div>
									<ul class="footer-column-list" data-id="1">
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/all-products/" ) ); ?>"
												title="All products">
												Tất cả sản phẩm
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/" ) ); ?>" title="Máy phiên dịch điện tử">
												Máy dịch điện tử
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/vasco-translator-q1/" ) ); ?>"
												title="Vasco Translator Q1">
												Vasco Translator Q1
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/vasco-translator-v4/" ) ); ?>"
												title="Vasco Translator V4">
												Vasco Translator V4
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/vasco-translator-e1/" ) ); ?>"
												title="Vasco Translator E1">
												Vasco Translator E1
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/accessories/" ) ); ?>" title="Accessories">
												Phụ kiện
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/comparison-engine/" ) ); ?>"
												title="Công cụ so sánh">
												Công cụ so sánh
											</a>
										</li>
									</ul>
								</nav>
								<nav aria-labelledby="footer-2-heading" class="footer-nav" role="navigation">
									<div class="footer-column-header" data-id="2">
										<h4 class="h2" id="footer-2-heading">Tính năng</h4>
										<svg fill="none" height="12" viewbox="0 0 20 12" width="20"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M2 2L10 10L18 2" stroke="white" stroke-linecap="square"
												stroke-width="2"></path>
										</svg>
									</div>
									<ul class="footer-column-list" data-id="2">
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/features-translate-voice/" ) ); ?>"
												title="Dịch giọng nói">
												Dịch giọng nói
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/features-translate-photos/" ) ); ?>"
												title="Dịch hình ảnh">
												Dịch ảnh
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/features-translate-text/" ) ); ?>"
												title="Dịch văn bản">
												Dịch văn bản
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/features-translate-chat/" ) ); ?>"
												title="MultiTalk">
												MultiTalk
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/coverage-map/" ) ); ?>"
												title="Bản đồ phủ sóng Internet">
												Bản đồ vùng phủ sóng Internet
											</a>
										</li>
									</ul>
								</nav>
								<nav aria-labelledby="footer-3-heading" class="footer-nav" role="navigation">
									<div class="footer-column-header" data-id="3">
										<h4 class="h2" id="footer-3-heading">Thông tin</h4>
										<svg fill="none" height="12" viewbox="0 0 20 12" width="20"
											xmlns="http://www.w3.org/2000/svg">
											<path d="M2 2L10 10L18 2" stroke="white" stroke-linecap="square"
												stroke-width="2"></path>
										</svg>
									</div>
									<ul class="footer-column-list" data-id="3">
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/about-us/" ) ); ?>" title="About us">
												Về chúng tôi
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/vasco-innovations/" ) ); ?>" title="What’s new">
												Tin mới
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/vasco-ces-2026/" ) ); ?>" title="CES 2026">
												CES 2026
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/media-about-us/" ) ); ?>"
												title="Truyền thông nói về chúng tôi">
												Truyền thông nói về chúng tôi
											</a>
										</li>

										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/privacy-policy/" ) ); ?>" rel="nofollow"
												title="Privacy policy">
												Chính sách bảo mật
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/terms-and-conditions/" ) ); ?>" rel="nofollow"
												title="Terms of service">
												Điều khoản dịch vụ
											</a>
										</li>
										<li>
											<a class="footer-info"
												href="<?php echo esc_url( home_url( "/terms-and-conditions-of-the-promotion-cheaper-in-a-set/" ) ); ?>"
												rel="nofollow"
												title="Điều khoản khuyến mãi mua theo bộ">
												Điều khoản khuyến mãi mua theo bộ
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/initiatives-polish-medical-mission-pmm/" ) ); ?>"
												title="PMM Vasco Emergency Team">
												Đội cấp cứu PMM Vasco
											</a>
										</li>
										<li>
											<a class="footer-info" href="<?php echo esc_url( home_url( "/sitemap/" ) ); ?>" rel="nofollow" title="Sitemap">
												Sơ đồ trang web
											</a>
										</li>
									</ul>
								</nav>
							</div>
						</div>
						<hr />
						<div class="footer-flex">
							<div class="box-flex payments">
								<svg fill="none" height="32" viewbox="0 0 64 32" width="64"
									xmlns="http://www.w3.org/2000/svg">
									<title>VISA</title>
									<rect fill="white" height="32" rx="4" width="64"></rect>
									<path
										d="M31.7375 7.32817L28.1276 24.6595H23.7671L27.3728 7.32817H31.7375ZM50.0943 18.5187L52.3915 12.0128L53.7124 18.5187H50.0943ZM54.9635 24.6718H59L55.4763 7.34047H51.7516C51.3495 7.33935 50.9566 7.46032 50.6248 7.68739C50.2929 7.91446 50.0379 8.23693 49.8933 8.61212L43.33 24.6718H47.912L48.8227 22.0834H54.4179L54.9635 24.6718ZM43.572 19.0109C43.5925 14.4412 37.4189 14.1869 37.4599 12.144C37.4599 11.5205 38.0506 10.8601 39.3099 10.6919C40.789 10.5445 42.2799 10.8101 43.6171 11.459L44.3801 7.76709C43.0711 7.26305 41.6808 7.00306 40.278 7C35.9626 7 32.9312 9.3546 32.8943 12.7429C32.8655 15.2411 35.0602 16.6317 36.7092 17.4603C38.3582 18.289 38.9818 18.8551 38.9736 19.6139C38.9736 20.7748 37.6158 21.2917 36.3646 21.3122C34.8122 21.3373 33.2799 20.9584 31.918 20.2128L31.1263 24.0114C32.6685 24.6262 34.3147 24.9382 35.9749 24.9303C40.5611 24.9303 43.5597 22.6044 43.572 18.9986V19.0109ZM25.5228 7.34047L18.4344 24.6595H13.8195L10.3409 10.8273C10.1317 9.97812 9.93072 9.66636 9.3031 9.30538C7.93749 8.63279 6.49136 8.13788 5 7.83272L5.10255 7.32817H12.5273C13.0193 7.33232 13.4934 7.51316 13.8631 7.83771C14.2328 8.16226 14.4736 8.6089 14.5415 9.09617L16.3792 19.1217L20.9243 7.32817L25.5228 7.34047Z"
										fill="#1A1F71"></path>
								</svg>
								<svg fill="none" height="32" viewbox="0 0 64 32" width="64"
									xmlns="http://www.w3.org/2000/svg">
									<title>Mastercard</title>
									<rect fill="white" height="32" rx="4" width="64"></rect>
									<path
										d="M21.0779 28.9404V27.2294C21.0901 27.0826 21.07 26.935 21.0193 26.7968C20.9685 26.6585 20.8882 26.5331 20.7839 26.4291C20.6797 26.3251 20.554 26.2451 20.4156 26.1947C20.2773 26.1443 20.1296 26.1246 19.9829 26.1372C19.7916 26.1296 19.6014 26.1703 19.43 26.2555C19.2586 26.3407 19.1113 26.4677 19.0019 26.6248C18.9089 26.4623 18.7723 26.3292 18.6074 26.2404C18.4426 26.1517 18.2562 26.111 18.0694 26.1229C17.9118 26.1162 17.7552 26.1496 17.614 26.2199C17.4729 26.2903 17.3519 26.3952 17.2623 26.525V26.1799H16.6692V28.9404H17.2737V27.4062C17.2737 26.9185 17.5333 26.6876 17.9353 26.6876C18.3374 26.6876 18.5428 26.9471 18.5428 27.4062V28.9318H19.1473V27.4062C19.1351 27.3138 19.1433 27.2199 19.1714 27.131C19.1995 27.0421 19.2468 26.9606 19.3099 26.892C19.373 26.8234 19.4504 26.7696 19.5366 26.7343C19.6229 26.6989 19.7158 26.683 19.8089 26.6876C20.2138 26.6876 20.4163 26.9471 20.4163 27.4062V28.9318L21.0779 28.9404ZM30.0465 26.1799H29.0626V25.3444H28.4581V26.1799H27.9106V26.7246H28.4581V27.9908C28.4581 28.6238 28.7176 28.9974 29.4105 28.9974C29.6725 28.9931 29.9293 28.9235 30.1577 28.795L29.9866 28.2788C29.8307 28.3748 29.6506 28.4243 29.4676 28.4214C29.1824 28.4214 29.0626 28.2503 29.0626 27.9623V26.7246H30.0465V26.1799ZM35.1795 26.1229C35.0347 26.1193 34.8915 26.1547 34.7651 26.2254C34.6386 26.2962 34.5335 26.3996 34.4609 26.525V26.1799H33.8535V28.9404H34.4609V27.3862C34.4609 26.9271 34.6605 26.6676 35.0312 26.6676C35.1575 26.6726 35.2828 26.6917 35.4048 26.7246L35.5787 26.1543C35.4471 26.1301 35.3133 26.1195 35.1795 26.1229ZM27.4258 26.4081C27.0877 26.204 26.6967 26.1047 26.3022 26.1229C25.6092 26.1229 25.1615 26.468 25.1615 27.0126C25.1615 27.4718 25.5066 27.7313 26.1111 27.8168L26.3963 27.8482C26.7128 27.9052 26.8868 27.9908 26.8868 28.1334C26.8868 28.3358 26.6558 28.4784 26.2537 28.4784C25.9238 28.4806 25.6011 28.381 25.3298 28.1932L25.0446 28.6524C25.394 28.8869 25.8074 29.0075 26.2281 28.9974C27.0351 28.9974 27.4942 28.6238 27.4942 28.1048C27.4942 27.5858 27.1206 27.3577 26.5446 27.2721L26.2594 27.2436C25.9999 27.2151 25.7975 27.1581 25.7975 26.9841C25.7975 26.8102 25.9999 26.6676 26.3165 26.6676C26.6148 26.6827 26.9065 26.7615 27.172 26.8986L27.4258 26.4081ZM43.5122 26.1229C43.3668 26.1187 43.2231 26.1539 43.0961 26.2247C42.9691 26.2954 42.8636 26.3992 42.7907 26.525V26.1799H42.1861V28.9404H42.7907V27.3862C42.7907 26.9271 42.9931 26.6676 43.361 26.6676C43.4882 26.6725 43.6145 26.6917 43.7374 26.7246L43.9085 26.1543C43.776 26.1297 43.6412 26.1192 43.5065 26.1229H43.5122ZM35.7869 27.5488C35.7806 27.7414 35.8146 27.9332 35.8867 28.1119C35.9589 28.2906 36.0675 28.4523 36.2058 28.5866C36.3441 28.7208 36.5089 28.8247 36.6897 28.8915C36.8705 28.9583 37.0632 28.9866 37.2555 28.9746C37.6106 28.9951 37.9604 28.8822 38.2365 28.6581L37.9514 28.1704C37.7463 28.3342 37.4923 28.4245 37.2299 28.4271C37.1146 28.4304 36.9999 28.4092 36.8934 28.3649C36.7869 28.3206 36.691 28.2542 36.612 28.1702C36.533 28.0861 36.4728 27.9862 36.4353 27.8771C36.3978 27.768 36.3838 27.6522 36.3943 27.5374C36.3894 27.4236 36.4072 27.31 36.4467 27.2032C36.4862 27.0964 36.5466 26.9985 36.6245 26.9154C36.7023 26.8323 36.7959 26.7655 36.8999 26.719C37.0038 26.6726 37.116 26.6473 37.2299 26.6448C37.4928 26.647 37.7472 26.7385 37.9514 26.9043L38.2365 26.4138C37.9593 26.1921 37.61 26.0804 37.2555 26.1001C37.0596 26.0864 36.863 26.1146 36.6789 26.1829C36.4947 26.2512 36.3273 26.358 36.1877 26.4962C36.0482 26.6344 35.9397 26.8008 35.8696 26.9843C35.7995 27.1678 35.7694 27.3641 35.7812 27.5602L35.7869 27.5488ZM41.3791 27.5488V26.1799H40.7717V26.525C40.6712 26.3949 40.5413 26.2905 40.3925 26.2206C40.2437 26.1507 40.0805 26.1172 39.9162 26.1229C39.535 26.1229 39.1694 26.2743 38.8999 26.5439C38.6303 26.8134 38.4789 27.179 38.4789 27.5602C38.4789 27.9414 38.6303 28.3069 38.8999 28.5765C39.1694 28.846 39.535 28.9974 39.9162 28.9974C40.0813 29.0095 40.2468 28.9789 40.3966 28.9085C40.5464 28.838 40.6756 28.7302 40.7717 28.5953V28.9404H41.3791V27.5488ZM39.1576 27.5488C39.151 27.4347 39.1677 27.3206 39.2067 27.2132C39.2458 27.1059 39.3063 27.0077 39.3847 26.9246C39.4631 26.8415 39.5576 26.7753 39.6625 26.7301C39.7674 26.6848 39.8804 26.6615 39.9946 26.6615C40.1088 26.6615 40.2218 26.6848 40.3267 26.7301C40.4316 26.7753 40.5261 26.8415 40.6045 26.9246C40.6828 27.0077 40.7434 27.1059 40.7825 27.2132C40.8215 27.3206 40.8382 27.4347 40.8316 27.5488C40.8382 27.6628 40.8215 27.777 40.7825 27.8843C40.7434 27.9916 40.6828 28.0898 40.6045 28.1729C40.5261 28.256 40.4316 28.3222 40.3267 28.3675C40.2218 28.4127 40.1088 28.436 39.9946 28.436C39.8804 28.436 39.7674 28.4127 39.6625 28.3675C39.5576 28.3222 39.4631 28.256 39.3847 28.1729C39.3063 28.0898 39.2458 27.9916 39.2067 27.8843C39.1677 27.777 39.151 27.6628 39.1576 27.5488ZM31.9229 26.1229C31.5417 26.1267 31.1776 26.2817 30.9108 26.554C30.6439 26.8262 30.4961 27.1932 30.4999 27.5744C30.5037 27.9556 30.6587 28.3197 30.9309 28.5865C31.2031 28.8534 31.5702 29.0012 31.9514 28.9974C32.3579 29.0067 32.755 28.8746 33.075 28.6238L32.7898 28.1932C32.5575 28.3709 32.2751 28.4707 31.9828 28.4784C31.7853 28.4958 31.5888 28.4369 31.4334 28.3138C31.278 28.1908 31.1756 28.013 31.1472 27.8168H33.1833V27.5887C33.2147 26.6961 32.6957 26.1229 31.9172 26.1229H31.9229ZM31.9229 26.6391C32.0116 26.6372 32.0999 26.6528 32.1826 26.685C32.2654 26.7172 32.3409 26.7655 32.405 26.8269C32.4691 26.8883 32.5204 26.9618 32.5561 27.0431C32.5918 27.1244 32.6111 27.2119 32.613 27.3007H31.1672C31.1845 27.1156 31.2717 26.9442 31.4111 26.8213C31.5505 26.6983 31.7314 26.6332 31.9172 26.6391H31.9229ZM46.9427 27.5602V25.0849H46.3296V26.5107C46.229 26.3808 46.099 26.2766 45.9503 26.2067C45.8016 26.1368 45.6384 26.1032 45.4741 26.1087C45.0929 26.1087 44.7274 26.2601 44.4578 26.5296C44.1883 26.7992 44.0369 27.1647 44.0369 27.5459C44.0369 27.9271 44.1883 28.2927 44.4578 28.5622C44.7274 28.8317 45.0929 28.9832 45.4741 28.9832C45.6392 28.9953 45.8047 28.9646 45.9545 28.8942C46.1044 28.8238 46.2336 28.7159 46.3296 28.5811V28.9261H46.937L46.9427 27.5602ZM44.7213 27.5602C44.7117 27.4446 44.7262 27.3284 44.7639 27.2187C44.8015 27.1091 44.8615 27.0085 44.94 26.9232C45.0186 26.8379 45.1139 26.7698 45.2201 26.7233C45.3262 26.6767 45.4409 26.6527 45.5568 26.6527C45.6727 26.6527 45.7874 26.6767 45.8936 26.7233C45.9997 26.7698 46.0951 26.8379 46.1736 26.9232C46.2521 27.0085 46.3121 27.1091 46.3498 27.2187C46.3874 27.3284 46.4019 27.4446 46.3924 27.5602C46.4019 27.6757 46.3874 27.7919 46.3498 27.9016C46.3121 28.0112 46.2521 28.1119 46.1736 28.1971C46.0951 28.2824 45.9997 28.3505 45.8936 28.3971C45.7874 28.4436 45.6727 28.4677 45.5568 28.4677C45.4409 28.4677 45.3262 28.4436 45.2201 28.3971C45.1139 28.3505 45.0186 28.2824 44.94 28.1971C44.8615 28.1119 44.8015 28.0112 44.7639 27.9016C44.7262 27.7919 44.7117 27.6757 44.7213 27.5602ZM24.4743 27.5602V26.1799H23.8754V26.525C23.7747 26.3952 23.6446 26.2911 23.4959 26.2212C23.3472 26.1514 23.1841 26.1177 23.0199 26.1229C22.6387 26.1229 22.2732 26.2743 22.0036 26.5439C21.7341 26.8134 21.5827 27.179 21.5827 27.5602C21.5827 27.9414 21.7341 28.3069 22.0036 28.5765C22.2732 28.846 22.6387 28.9974 23.0199 28.9974C23.185 29.009 23.3502 28.9781 23.5 28.9077C23.6497 28.8373 23.779 28.7298 23.8754 28.5953V28.9404H24.48L24.4743 27.5602ZM22.2271 27.5602C22.2176 27.4446 22.2321 27.3284 22.2697 27.2187C22.3074 27.1091 22.3674 27.0085 22.4459 26.9232C22.5244 26.8379 22.6198 26.7698 22.7259 26.7233C22.8321 26.6767 22.9468 26.6527 23.0627 26.6527C23.1786 26.6527 23.2933 26.6767 23.3994 26.7233C23.5056 26.7698 23.6009 26.8379 23.6795 26.9232C23.758 27.0085 23.818 27.1091 23.8556 27.2187C23.8933 27.3284 23.9078 27.4446 23.8982 27.5602C23.9078 27.6757 23.8933 27.7919 23.8556 27.9016C23.818 28.0112 23.758 28.1119 23.6795 28.1971C23.6009 28.2824 23.5056 28.3505 23.3994 28.3971C23.2933 28.4436 23.1786 28.4677 23.0627 28.4677C22.9468 28.4677 22.8321 28.4436 22.7259 28.3971C22.6198 28.3505 22.5244 28.2824 22.4459 28.1971C22.3674 28.1119 22.3074 28.0112 22.2697 27.9016C22.2321 27.7919 22.2176 27.6757 22.2271 27.5602Z"
										fill="black"></path>
									<path d="M36.2974 5.21716H27.2177V21.4918H36.2974V5.21716Z" fill="#FF5F00"></path>
									<path
										d="M27.7937 13.3531C27.7963 11.7855 28.1543 10.2389 28.8409 8.8297C29.5275 7.42048 30.5247 6.18534 31.7576 5.2172C30.2304 4.01544 28.3958 3.26774 26.4636 3.05958C24.5314 2.85142 22.5797 3.19121 20.8315 4.04009C19.0834 4.88897 17.6094 6.21268 16.5781 7.85984C15.5469 9.50701 15 11.4111 15 13.3545C15 15.2978 15.5469 17.202 16.5781 18.8491C17.6094 20.4963 19.0834 21.82 20.8315 22.6689C22.5797 23.5178 24.5314 23.8576 26.4636 23.6494C28.3958 23.4413 30.2304 22.6935 31.7576 21.4918C30.5221 20.5254 29.5231 19.2902 28.8362 17.88C28.1494 16.4698 27.7929 14.9216 27.7937 13.3531Z"
										fill="#EB001B"></path>
									<path
										d="M48.5482 13.353C48.5458 15.2975 47.9966 17.2021 46.9634 18.8494C45.9302 20.4966 44.4547 21.8202 42.7052 22.6689C40.9557 23.5176 39.0029 23.8573 37.0696 23.6491C35.1363 23.441 33.3004 22.6934 31.7717 21.4918C33.0027 20.5225 33.9976 19.2865 34.6818 17.877C35.3659 16.4675 35.7213 14.9212 35.7213 13.3545C35.7213 11.7877 35.3659 10.2414 34.6818 8.83187C33.9976 7.42237 33.0027 6.18645 31.7717 5.21716C33.3003 4.01565 35.1358 3.2681 37.0688 3.05984C39.0019 2.85159 40.9545 3.19102 42.7039 4.03939C44.4533 4.88776 45.9289 6.21088 46.9623 7.85773C47.9957 9.50458 48.5452 11.4088 48.5482 13.353Z"
										fill="#F79E1B"></path>
								</svg>
								<svg fill="none" height="32" viewbox="0 0 64 32" width="64"
									xmlns="http://www.w3.org/2000/svg">
									<title>American Express</title>
									<rect fill="white" height="32" rx="4" width="64"></rect>
									<path d="M45.9878 2H18.0059V29.9819H45.9878V2Z" fill="white"></path>
									<path
										d="M45.9879 17.1556V2.01202H18V30H45.9879V21.8293C45.9248 21.8293 45.9879 17.1556 45.9879 17.1556Z"
										fill="#006FCF"></path>
									<path
										d="M42.56 15.5998H44.6666V10.6733H42.3614V11.3594L41.928 10.6733H39.9418V11.546L39.5686 10.6733H35.8911C35.7677 10.6733 35.6413 10.7365 35.5179 10.7365C35.3945 10.7365 35.3313 10.7997 35.2169 10.8629C35.1026 10.9261 35.0273 10.9231 34.916 10.9863V10.6853H24.3829L24.082 11.4979L23.781 10.6853H21.247V11.5581L20.8618 10.6733H18.8786L18.0059 12.7799V15.5847H19.4384L19.6881 14.8986H20.1877L20.4375 15.5847H31.3949V14.9738L31.8313 15.5998H34.8859V15.2236C34.9491 15.2868 35.0725 15.2868 35.1357 15.35C35.1989 15.4132 35.3223 15.4102 35.3855 15.4734C35.5027 15.5251 35.6309 15.5469 35.7586 15.5366H38.0157L38.2655 14.8504H38.7651L39.0149 15.5366H42.0665V14.9136L42.56 15.5998ZM45.9878 21.8293V17.2188H28.8489L28.4126 17.8418L27.9762 17.2188H22.9925V22.1423H27.9762L28.4126 21.5194L28.8489 22.1423H31.9667V21.083H31.8403C32.2229 21.0917 32.6037 21.0284 32.9629 20.8964V22.2055H35.2079V21.5796L35.6413 22.2055H44.9375C45.2996 22.1166 45.6516 21.9905 45.9878 21.8293Z"
										fill="white"></path>
									<path
										d="M44.9375 20.6466H43.2552V21.3327H44.8743C45.0196 21.3456 45.1659 21.3275 45.3036 21.2796C45.4414 21.2318 45.5675 21.1553 45.6735 21.0552C45.7796 20.9551 45.8632 20.8337 45.9189 20.699C45.9747 20.5642 46.0012 20.4192 45.9968 20.2734C45.9968 19.6505 45.6236 19.3375 45.0007 19.3375H44.2513C44.1687 19.3375 44.0895 19.3047 44.0311 19.2462C43.9727 19.1878 43.9399 19.1086 43.9399 19.026C43.9399 18.9434 43.9727 18.8642 44.0311 18.8057C44.0895 18.7473 44.1687 18.7145 44.2513 18.7145H45.6868L45.9878 18.0284H44.3055C43.6193 18.0284 43.183 18.4647 43.183 19.0275C43.183 19.6505 43.5562 19.9604 44.1791 19.9604H44.9375C45.0173 19.9604 45.0939 19.9921 45.1503 20.0486C45.2067 20.105 45.2384 20.1816 45.2384 20.2614C45.3016 20.5112 45.1782 20.6466 44.9375 20.6466ZM41.8829 20.6466H40.2006V21.3327H41.8227C41.9677 21.3451 42.1137 21.3267 42.2511 21.2786C42.3885 21.2306 42.5142 21.154 42.6199 21.054C42.7256 20.954 42.809 20.8327 42.8645 20.6982C42.9201 20.5637 42.9466 20.4189 42.9422 20.2734C42.9422 19.6505 42.569 19.3375 41.9461 19.3375H41.1967C41.1141 19.3375 41.0349 19.3047 40.9765 19.2462C40.9181 19.1878 40.8853 19.1086 40.8853 19.026C40.8853 18.9434 40.9181 18.8642 40.9765 18.8057C41.0349 18.7473 41.1141 18.7145 41.1967 18.7145H42.6322L42.9332 18.0284H41.2509C40.5648 18.0284 40.1284 18.4647 40.1284 19.0275C40.1284 19.6505 40.5046 19.9604 41.1275 19.9604H41.8739C41.9537 19.9604 42.0302 19.9921 42.0867 20.0486C42.1431 20.105 42.1748 20.1816 42.1748 20.2614C42.1882 20.3072 42.1905 20.3556 42.1815 20.4025C42.1726 20.4494 42.1525 20.4935 42.1231 20.5312C42.0937 20.5688 42.0558 20.5989 42.0124 20.619C41.9691 20.639 41.9216 20.6485 41.8739 20.6466H41.8829ZM39.701 18.6513V17.9652H37.0858V21.2756H39.701V20.5834H37.8322V19.9093H39.6378V19.2141H37.8322V18.5911H39.701V18.6513ZM35.4637 18.6513C35.7647 18.6513 35.9001 18.8379 35.9001 19.0275C35.9001 19.2171 35.7767 19.4007 35.4637 19.4007H34.5308V18.5911L35.4637 18.6513ZM34.5308 20.0868H34.904L35.9001 21.2695H36.836L35.7135 20.0236C35.9552 19.9921 36.1772 19.8736 36.3379 19.6903C36.4985 19.5069 36.5868 19.2713 36.5862 19.0275C36.5911 18.8815 36.5649 18.7361 36.5093 18.601C36.4538 18.4659 36.3702 18.3441 36.2641 18.2437C36.158 18.1432 36.0318 18.0665 35.8938 18.0185C35.7558 17.9705 35.6092 17.9523 35.4637 17.9652H33.7182V21.2756H34.4676L34.5308 20.0868ZM32.5355 19.0877C32.5422 19.1466 32.5356 19.2063 32.516 19.2623C32.4965 19.3183 32.4645 19.3692 32.4226 19.4111C32.3806 19.4531 32.3298 19.485 32.2738 19.5046C32.2178 19.5241 32.1581 19.5308 32.0991 19.5241H31.094V18.6513H32.0269C32.089 18.6437 32.1521 18.6493 32.2119 18.6676C32.2717 18.686 32.327 18.7168 32.3741 18.758C32.4213 18.7991 32.4592 18.8498 32.4855 18.9066C32.5117 18.9634 32.5257 19.0251 32.5265 19.0877H32.5355ZM30.3537 17.9652V21.2756H31.094V20.147H32.0901C32.2432 20.1593 32.3971 20.1393 32.542 20.0882C32.6868 20.0371 32.8193 19.9562 32.9308 19.8506C33.0423 19.7451 33.1304 19.6172 33.1893 19.4754C33.2483 19.3336 33.2767 19.181 33.2728 19.0275C33.2792 18.8786 33.2546 18.7301 33.2006 18.5912C33.1467 18.4523 33.0645 18.3262 32.9593 18.2207C32.8541 18.1152 32.7281 18.0327 32.5894 17.9783C32.4507 17.924 32.3022 17.899 32.1533 17.905L30.3537 17.9652ZM29.2311 21.2756H30.1671L28.858 19.5933L30.1671 17.9712H29.2221L28.4126 19.0335L27.603 17.9652H26.6671L27.9762 19.5873L26.6671 21.2063H27.603L28.4126 20.147L29.2311 21.2756ZM26.4293 18.6573V17.9652H23.8111V21.2756H26.4293V20.5834H24.5484V19.9093H26.3541V19.2141H24.5484V18.5911H26.4203L26.4293 18.6573ZM41.5729 12.8009L42.873 14.7932H43.8059V11.4828H43.0596V13.6616L42.873 13.3607L41.6873 11.4828H40.6911V14.7932H41.4375V12.5451L41.5729 12.8009ZM38.3167 12.7317L38.5665 12.0456L38.8163 12.7317L39.1172 13.4781H38.0157L38.3167 12.7317ZM39.6318 14.7932H40.4414L39.0089 11.4828H38.0157L36.5832 14.7932H37.3928L37.6937 14.107H39.3128L39.6318 14.7932ZM36.1408 14.7932L36.4418 14.107H36.2522C36.1308 14.1132 36.0096 14.0927 35.897 14.0471C35.7844 14.0015 35.6831 13.9318 35.6003 13.8429C35.5174 13.7541 35.455 13.6481 35.4174 13.5326C35.3797 13.4171 35.3678 13.2947 35.3825 13.1741V13.1109C35.3678 12.9903 35.3797 12.8679 35.4174 12.7524C35.455 12.6369 35.5174 12.531 35.6003 12.4421C35.6831 12.3532 35.7844 12.2835 35.897 12.2379C36.0096 12.1923 36.1308 12.1718 36.2522 12.178H37.0648V11.4828H36.2101C35.2139 11.4828 34.6512 12.1689 34.6512 13.1019V13.1651C34.6451 14.1642 35.2079 14.7932 36.1408 14.7932ZM33.336 14.7932H34.0854V11.546H33.336V14.7932ZM31.7169 12.178C32.0179 12.178 32.1533 12.3646 32.1533 12.5511C32.1533 12.7377 32.0269 12.9243 31.7169 12.9243H30.793V12.1088L31.7169 12.178ZM30.793 13.6045H31.1692L32.1533 14.7932H33.0862L31.9667 13.5413C32.2085 13.5103 32.4305 13.3919 32.5907 13.2083C32.751 13.0248 32.8384 12.7888 32.8365 12.5451C32.8417 12.3993 32.8159 12.2539 32.7607 12.1188C32.7055 11.9837 32.6222 11.8619 32.5164 11.7614C32.4105 11.6609 32.2845 11.5841 32.1466 11.5361C32.0088 11.4881 31.8623 11.4699 31.7169 11.4828H29.9715V14.7932H30.7208L30.793 13.6045ZM29.4237 12.172V11.4828H26.8055V14.7932H29.4237V14.101H27.5398V13.4179H29.3455V12.7317H27.5398V12.1088H29.4117L29.4237 12.172ZM23.7389 14.7932H24.425L25.358 12.1148V14.7932H26.1073V11.4828H24.8614L24.112 13.7278L23.3657 11.4828H22.1198V14.7932H22.8661V12.1148L23.7389 14.7932ZM19.6881 12.7317L19.9379 12.0456L20.1877 12.7317L20.4887 13.4781H19.3782L19.6881 12.7317ZM20.9973 14.7932H21.8068L20.3743 11.4828H19.4384L18.0059 14.7932H18.8154L19.1163 14.107H20.7354L20.9973 14.7932Z"
										fill="#006FCF"></path>
								</svg>
								<svg fill="none" height="32" viewbox="0 0 64 32" width="64"
									xmlns="http://www.w3.org/2000/svg">
									<title>Sezzle</title>
									<rect fill="white" height="32" rx="4" width="64"></rect>
									<path
										d="M4.95386 18.4172C6.22319 19.6865 8.27652 19.6865 9.53652 18.4172L9.65785 18.2959C10.2925 17.6612 9.02319 14.3385 9.65785 13.7132L4.95386 18.4172Z"
										fill="url(#paint0_linear_13511_1437)"></path>
									<path
										d="M9.77916 13.5827L9.65782 13.704C9.02316 14.3387 10.2925 17.6613 9.65782 18.2867L14.3618 13.5827C13.7271 12.948 12.8965 12.6307 12.0658 12.6307C11.2445 12.6307 10.4138 12.948 9.77916 13.5827Z"
										fill="url(#paint1_linear_13511_1437)"></path>
									<path
										d="M4.9542 13.8253C3.68486 15.0947 3.68486 17.148 4.9542 18.408L9.77952 13.5827C11.0489 12.3133 11.0489 10.26 9.77952 9L4.9542 13.8253Z"
										fill="url(#paint2_linear_13511_1437)"></path>
									<path
										d="M9.53696 18.4173C8.26763 19.6866 8.26763 21.74 9.53696 23L14.3623 18.1746C15.6316 16.9053 15.6316 14.852 14.3623 13.592L9.53696 18.4173Z"
										fill="url(#paint3_linear_13511_1437)"></path>
									<path
										d="M33.1592 16.0281C33.0658 15.6921 32.9165 15.3748 32.7298 15.0854C32.4032 14.5814 31.9552 14.1614 31.4232 13.8721C30.5832 13.4148 29.5845 13.3121 28.6698 13.5734C27.7365 13.8441 26.9712 14.4601 26.5138 15.3094C26.0565 16.1587 25.9445 17.1294 26.2152 18.0534V18.0627C26.2805 18.2681 26.3738 18.5294 26.3738 18.5387C26.6818 19.2574 27.1952 19.8081 27.9512 20.2187C28.4832 20.5081 29.0805 20.6667 29.6778 20.6667C30.0232 20.6667 30.3685 20.6201 30.7045 20.5174C31.4138 20.3121 32.0298 19.9014 32.4965 19.3321L32.5245 19.2947C32.6458 19.1454 32.7485 18.9867 32.8418 18.8187C33.0098 18.5201 32.8978 18.1467 32.6085 17.9787C32.5152 17.9321 32.4125 17.9041 32.3098 17.9041C32.0858 17.9041 31.8805 18.0254 31.7685 18.2214C31.6192 18.4921 31.4138 18.7347 31.1712 18.9214C31.1525 18.9401 31.1338 18.9587 31.1152 18.9681C30.8912 19.1361 30.6298 19.2667 30.3592 19.3414C29.7525 19.5187 29.0992 19.4441 28.5392 19.1454C28.1752 18.9494 27.8672 18.6507 27.6432 18.2867L32.7392 16.7934C33.0658 16.6907 33.2525 16.3454 33.1592 16.0281ZM29.6872 14.6468C30.0792 14.6468 30.4805 14.7494 30.8258 14.9361C31.1712 15.1228 31.4698 15.4028 31.6938 15.7388C31.7032 15.7574 31.7218 15.7761 31.7312 15.7948L27.2885 17.1014C27.2792 16.6814 27.3818 16.2614 27.5778 15.8974C27.8858 15.3374 28.3898 14.9268 29.0058 14.7494C29.2298 14.6841 29.4538 14.6468 29.6872 14.6468ZM39.7018 19.4907H36.3325L40.1032 13.9468C40.1778 13.8441 40.1778 13.7041 40.1218 13.5921C40.0658 13.4801 39.9445 13.4148 39.8232 13.4148H35.0258C34.7085 13.4148 34.4472 13.6761 34.4472 13.9934C34.4472 14.3108 34.7085 14.5721 35.0258 14.5721H38.2365L34.4658 20.1161C34.3912 20.2187 34.3912 20.3587 34.4472 20.4707C34.5032 20.5827 34.6245 20.6481 34.7458 20.6481H39.7018C40.0192 20.6481 40.2805 20.3867 40.2805 20.0694C40.2805 19.7521 40.0192 19.4907 39.7018 19.4907ZM47.1685 19.4907H43.7992L47.5698 13.9468C47.6445 13.8441 47.6445 13.7041 47.5885 13.5921C47.5325 13.4801 47.4111 13.4148 47.2898 13.4148H42.4925C42.1752 13.4148 41.9138 13.6761 41.9138 13.9934C41.9138 14.3108 42.1752 14.5721 42.4925 14.5721H45.7125L41.9418 20.1161C41.8672 20.2187 41.8672 20.3587 41.9232 20.4707C41.9792 20.5827 42.1005 20.6481 42.2218 20.6481H47.1778C47.4952 20.6481 47.7565 20.3867 47.7565 20.0694C47.7471 19.7521 47.4952 19.4907 47.1685 19.4907ZM50.5005 10.2974C50.1831 10.2974 49.9218 10.5588 49.9218 10.8761V20.0974C49.9218 20.4147 50.1831 20.6761 50.5005 20.6761C50.8178 20.6761 51.0791 20.4147 51.0791 20.0974V10.8761C51.0791 10.5494 50.8178 10.2974 50.5005 10.2974ZM59.9738 16.0281C59.8805 15.6921 59.7311 15.3748 59.5445 15.0854C59.2178 14.5814 58.7698 14.1614 58.2378 13.8721C57.3978 13.4148 56.3991 13.3121 55.4845 13.5734C54.5511 13.8441 53.7858 14.4601 53.3285 15.3094C52.8618 16.1587 52.7591 17.1294 53.0298 18.0534V18.0627C53.0951 18.2681 53.1885 18.5294 53.1885 18.5387C53.4965 19.2574 54.0098 19.8081 54.7658 20.2187C55.2978 20.5081 55.8951 20.6667 56.4925 20.6667C56.8378 20.6667 57.1831 20.6201 57.5191 20.5174C58.2285 20.3121 58.8445 19.9014 59.3111 19.3321L59.3391 19.2947C59.4605 19.1454 59.5631 18.9867 59.6565 18.8187C59.8245 18.5201 59.7125 18.1467 59.4231 17.9787C59.3298 17.9321 59.2271 17.9041 59.1245 17.9041C58.9005 17.9041 58.6951 18.0254 58.5831 18.2214C58.4338 18.4921 58.2285 18.7347 57.9858 18.9214C57.9671 18.9401 57.9485 18.9587 57.9298 18.9681C57.7058 19.1361 57.4445 19.2667 57.1738 19.3414C56.5671 19.5187 55.9138 19.4441 55.3538 19.1454C54.9898 18.9494 54.6818 18.6507 54.4578 18.2867L59.5538 16.7934C59.8805 16.6907 60.0671 16.3454 59.9738 16.0281ZM56.5018 14.6468C56.8938 14.6468 57.2951 14.7494 57.6405 14.9361C57.9858 15.1228 58.2845 15.4028 58.5085 15.7388C58.5178 15.7574 58.5365 15.7761 58.5458 15.7948L54.1031 17.1014C54.0938 16.6814 54.1965 16.2614 54.3925 15.8974C54.7005 15.3374 55.2045 14.9268 55.8205 14.7494C56.0445 14.6841 56.2778 14.6468 56.5018 14.6468ZM24.2645 17.4374C24.0965 17.1854 23.8445 16.9801 23.5272 16.8121C23.0138 16.5507 22.3418 16.4294 21.6978 16.3267L21.5952 16.3081C21.1472 16.2334 20.6805 16.1681 20.3819 16.0094C20.1579 15.8974 20.0739 15.7668 20.0739 15.5148C20.0739 15.0294 20.6059 14.6561 21.3058 14.6561C22.1458 14.6561 22.6125 14.8988 23.1445 15.2254C23.2378 15.2814 23.3498 15.3188 23.4712 15.3188C23.6858 15.3188 23.8912 15.2067 24.0032 15.0201C24.0872 14.8801 24.1152 14.7121 24.0778 14.5534C24.0405 14.3948 23.9378 14.2548 23.7978 14.1708C23.5085 13.9934 23.1912 13.8068 22.7898 13.6668C22.3418 13.5081 21.8565 13.4241 21.3152 13.4241C20.6712 13.4241 20.0645 13.6201 19.6072 13.9748C19.1125 14.3668 18.8325 14.9174 18.8325 15.5241C18.8325 16.2428 19.1779 16.8027 19.8219 17.1294C20.2979 17.3721 20.8672 17.4561 21.4085 17.5401L21.5112 17.5587C22.9112 17.7827 23.3218 17.9787 23.3218 18.4361C23.3218 19.0147 22.7432 19.3881 21.8565 19.3974H21.8192C20.8672 19.3974 20.3259 19.0334 20.0365 18.8374C19.9899 18.8094 19.9525 18.7721 19.9059 18.7534C19.8032 18.6881 19.6912 18.6601 19.5792 18.6601C19.3645 18.6601 19.1685 18.7721 19.0472 18.9494C18.8699 19.2387 18.9539 19.6214 19.2432 19.8081C19.2619 19.8174 19.2805 19.8361 19.3085 19.8547L19.3272 19.8641C19.6725 20.0974 20.4659 20.6481 21.8098 20.6481H21.8565C22.6312 20.6387 23.2938 20.4334 23.7792 20.0507C24.2832 19.6494 24.5538 19.0801 24.5538 18.4547C24.5632 18.0627 24.4605 17.7267 24.2645 17.4374Z"
										fill="#392757"></path>
									<defs>
										<lineargradient gradientunits="userSpaceOnUse" id="paint0_linear_13511_1437"
											x1="9.39279" x2="7.11708" y1="18.5493" y2="15.8372">
											<stop stop-color="#CE5DCB"></stop>
											<stop offset="0.2095" stop-color="#C558CC"></stop>
											<stop offset="0.5525" stop-color="#AC4ACF"></stop>
											<stop offset="0.9845" stop-color="#8534D4"></stop>
											<stop offset="1" stop-color="#8333D4"></stop>
										</lineargradient>
										<lineargradient gradientunits="userSpaceOnUse" id="paint1_linear_13511_1437"
											x1="9.47508" x2="14.3649" y1="15.4628" y2="15.4628">
											<stop offset="0.0237" stop-color="#FF5667"></stop>
											<stop offset="0.6592" stop-color="#FC8B82"></stop>
											<stop offset="1" stop-color="#FBA28E"></stop>
										</lineargradient>
										<lineargradient gradientunits="userSpaceOnUse" id="paint2_linear_13511_1437"
											x1="4.00051" x2="10.73" y1="13.7053" y2="13.7053">
											<stop stop-color="#00B874"></stop>
											<stop offset="0.5126" stop-color="#29D3A2"></stop>
											<stop offset="0.6817" stop-color="#53DFB6"></stop>
											<stop offset="1" stop-color="#9FF4D9"></stop>
										</lineargradient>
										<lineargradient gradientunits="userSpaceOnUse" id="paint3_linear_13511_1437"
											x1="8.58636" x2="15.3159" y1="18.291" y2="18.291">
											<stop stop-color="#FCD77E"></stop>
											<stop offset="0.5241" stop-color="#FEA500"></stop>
											<stop offset="1" stop-color="#FF5B00"></stop>
										</lineargradient>
									</defs>
								</svg>
								<svg fill="none" height="32" viewbox="0 0 64 32" width="64"
									xmlns="http://www.w3.org/2000/svg">
									<title>Afterpay</title>
									<rect fill="white" height="32" rx="4" width="64"></rect>
									<g clip-path="url(#clip0_13511_1456)">
										<path
											d="M7.77354 15.8846C7.77354 14.9111 7.04134 14.2269 6.14194 14.2269C5.24254 14.2269 4.51033 14.9226 4.51033 15.8846C4.51033 16.835 5.24254 17.5423 6.14194 17.5423C7.04225 17.5414 7.77354 16.8581 7.77354 15.8846ZM7.7864 18.7821V18.0286C7.34266 18.5504 6.68213 18.8743 5.89114 18.8743C4.24759 18.8743 3 17.5991 3 15.8846C3 14.1808 4.29536 12.8834 5.92788 12.8834C6.69593 12.8834 7.34361 13.2082 7.78731 13.7175V12.9872H9.26274V18.7821H7.7864Z"
											fill="black"></path>
										<path
											d="M16.4295 17.4953C15.9132 17.4953 15.7698 17.3098 15.7698 16.8235V14.2509H16.7179V12.9872H15.7698V11.5736H14.2577V12.9872H12.31V12.6349C12.31 12.1477 12.5021 11.9623 13.0303 11.9623H13.362V10.8379H12.6343C11.3867 10.8379 10.7988 11.2319 10.7988 12.437V12.9863H9.95911V14.25H10.7988V18.7812H12.311V14.25H14.2586V17.0898C14.2586 18.2718 14.7262 18.7821 15.9499 18.7821H16.7299V17.4953H16.4295Z"
											fill="black"></path>
										<path
											d="M21.8526 15.3629C21.7451 14.6094 21.1084 14.1577 20.3652 14.1577C19.6211 14.1577 19.0092 14.5979 18.854 15.3629H21.8526ZM18.8411 16.2671C18.9495 17.1244 19.5853 17.6116 20.3891 17.6116C21.0248 17.6116 21.5173 17.3214 21.8048 16.8581H23.3528C22.9927 18.0863 21.8526 18.8744 20.3533 18.8744C18.5416 18.8744 17.2701 17.6462 17.2701 15.8962C17.2701 14.1462 18.6142 12.8825 20.39 12.8825C22.1778 12.8825 23.4732 14.1577 23.4732 15.8962C23.4732 16.024 23.4612 16.1509 23.4373 16.2671H18.8411Z"
											fill="black"></path>
										<path
											d="M33.0872 15.8846C33.0872 14.9457 32.355 14.2269 31.4556 14.2269C30.5562 14.2269 29.824 14.9226 29.824 15.8846C29.824 16.835 30.5562 17.5423 31.4556 17.5423C32.355 17.5414 33.0872 16.8235 33.0872 15.8846ZM28.3357 12.9872H29.8111V13.7406C30.2548 13.2073 30.9145 12.8834 31.7064 12.8834C33.326 12.8834 34.5975 14.1701 34.5975 15.8731C34.5975 17.5769 33.3021 18.8752 31.6706 18.8752C30.9145 18.8752 30.2907 18.585 29.8589 18.0987V21.1666H28.3357V12.9872Z"
											fill="black"></path>
										<path
											d="M39.916 15.8846C39.916 14.9111 39.1847 14.2269 38.2843 14.2269C37.385 14.2269 36.6528 14.9226 36.6528 15.8846C36.6528 16.835 37.385 17.5423 38.2843 17.5423C39.1847 17.5414 39.916 16.8581 39.916 15.8846ZM39.9289 18.7821V18.0286C39.4852 18.5504 38.8245 18.8743 38.0334 18.8743C36.39 18.8743 35.1425 17.5991 35.1425 15.8846C35.1425 14.1808 36.4378 12.8834 38.0694 12.8834C38.8374 12.8834 39.4852 13.2082 39.9289 13.7175V12.9872H41.4044V18.7821H39.9289Z"
											fill="black"></path>
										<path
											d="M25.6761 13.5551C25.6761 13.5551 26.0519 12.8834 26.9714 12.8834C27.3647 12.8834 27.6192 13.0138 27.6192 13.0138V14.4923C27.6192 14.4923 27.0642 14.1612 26.5544 14.2278C26.0445 14.2944 25.722 14.7469 25.7239 15.3522V18.7829H24.2007V12.9881H25.6761V13.5551Z"
											fill="black"></path>
										<path
											d="M48.2953 12.9872L44.57 21.148H42.9991L44.4617 17.9932L41.9886 12.9872H43.7692L45.216 16.3319L46.7006 12.9872H48.2953Z"
											fill="black"></path>
										<path
											d="M60.1868 12.8559L56.4937 10.7971C55.4095 10.1927 54.0545 10.9479 54.0545 12.1575V12.3687C54.0545 12.5595 54.1601 12.7361 54.3309 12.831L55.0283 13.2197C55.2331 13.3342 55.4885 13.1913 55.4885 12.9633V12.4379C55.4885 12.1752 55.7827 12.0111 56.0178 12.1424L59.2165 13.9261C59.452 14.0574 59.452 14.3858 59.2165 14.5163L56.0178 16.3C55.7827 16.4313 55.4885 16.2671 55.4885 16.0045V15.7249C55.4885 14.5154 54.1335 13.7593 53.0486 14.3645L49.3555 16.4233C48.2713 17.0277 48.2713 18.5398 49.3555 19.1441L53.0486 21.203C54.1325 21.8073 55.4885 21.0521 55.4885 19.8425V19.6313C55.4885 19.4405 55.3829 19.2648 55.2121 19.169L54.5147 18.7794C54.3099 18.6649 54.0545 18.8078 54.0545 19.0359V19.5612C54.0545 19.8239 53.7607 19.9881 53.5252 19.8567L50.3265 18.073C50.0913 17.9417 50.0913 17.6134 50.3265 17.482L53.5252 15.6983C53.7607 15.5669 54.0545 15.7311 54.0545 15.9938V16.2733C54.0545 17.4829 55.4095 18.239 56.4937 17.6338L60.1868 15.5749C61.271 14.9724 61.271 13.4602 60.1868 12.8559Z"
											fill="black"></path>
									</g>
									<defs>
										<clippath id="clip0_13511_1456">
											<rect fill="white" height="10.8313" transform="translate(3 10.5844)"
												width="58"></rect>
										</clippath>
									</defs>
								</svg>
							</div>
							<div class="box-flex media" style="display: flex; align-items: center; gap: 12px;">
								<a href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" title="Facebook" aria-label="Facebook" style="width: 40px; height: 40px; border-radius: 50%; border: 1.5px solid rgba(255, 255, 255, 0.4); display: inline-flex; align-items: center; justify-content: center; color: #FFFFFF !important; text-decoration: none; transition: all 0.25s ease; box-sizing: border-box;" onmouseover="this.style.borderColor='#60A5FA'; this.style.backgroundColor='rgba(96, 165, 250, 0.15)'; this.style.transform='scale(1.08)';" onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.4)'; this.style.backgroundColor='transparent'; this.style.transform='scale(1)';">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
										<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>
									</svg>
								</a>
								<a href="https://www.youtube.com/" target="_blank" rel="noopener noreferrer" title="YouTube" aria-label="YouTube" style="width: 40px; height: 40px; border-radius: 50%; border: 1.5px solid rgba(255, 255, 255, 0.4); display: inline-flex; align-items: center; justify-content: center; color: #FFFFFF !important; text-decoration: none; transition: all 0.25s ease; box-sizing: border-box;" onmouseover="this.style.borderColor='#EF4444'; this.style.backgroundColor='rgba(239, 68, 68, 0.15)'; this.style.transform='scale(1.08)';" onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.4)'; this.style.backgroundColor='transparent'; this.style.transform='scale(1)';">
									<svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
										<path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
									</svg>
								</a>
								<a href="https://www.linkedin.com/" target="_blank" rel="noopener noreferrer" title="LinkedIn" aria-label="LinkedIn" style="width: 40px; height: 40px; border-radius: 50%; border: 1.5px solid rgba(255, 255, 255, 0.4); display: inline-flex; align-items: center; justify-content: center; color: #FFFFFF !important; text-decoration: none; transition: all 0.25s ease; box-sizing: border-box;" onmouseover="this.style.borderColor='#60A5FA'; this.style.backgroundColor='rgba(96, 165, 250, 0.15)'; this.style.transform='scale(1.08)';" onmouseout="this.style.borderColor='rgba(255, 255, 255, 0.4)'; this.style.backgroundColor='transparent'; this.style.transform='scale(1)';">
									<svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
										<path d="M19 3a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h14m-.5 15.5v-5.3a3.26 3.26 0 0 0-3.26-3.26c-.85 0-1.84.52-2.28 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 0 1 1.4 1.4v4.93h2.75M6.88 8.56a1.68 1.68 0 0 0 1.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 0 0-1.69 1.69c0 .93.76 1.68 1.69 1.68m1.39 9.94v-8.37H5.5v8.37h2.77z"/>
									</svg>
								</a>
							</div>
						</div>
						<hr />
						<div class="footer-copyright">
							<div class="copyright">
								<div class="nr-one-bottom">
									<img alt="number one" class="nr-one-img"
										src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/icons/no1-badage-white.svg" ); ?>" />
									<p>*Thương hiệu máy phiên dịch điện tử được tìm kiếm nhiều nhất trên thế giới từ năm
										2023 (dựa trên dữ liệu tìm kiếm Google).
									</p>
								</div>
								<div class="logos-box">
									<svg fill="none" height="47" role="img" viewbox="0 0 113 47" width="113"
										xmlns="http://www.w3.org/2000/svg">
										<title>GDPR</title>
										<g clip-path="url(#clip0_23561_24860)">
											<path
												d="M30.2733 21.5859H16.8758C15.8188 21.5859 14.9619 22.4428 14.9619 23.4999V30.1986C14.9619 31.2556 15.8188 32.1125 16.8758 32.1125H30.2733C31.3303 32.1125 32.1872 31.2556 32.1872 30.1986V23.4999C32.1872 22.4428 31.3303 21.5859 30.2733 21.5859Z"
												stroke="white" stroke-linecap="round" stroke-linejoin="round"
												stroke-width="1.41772"></path>
											<path
												d="M18.79 21.586V17.7582C18.79 15.1141 20.9308 12.9734 23.5748 12.9734C26.2189 12.9734 28.3597 15.1141 28.3597 17.7582V21.586"
												stroke="white" stroke-linecap="round" stroke-linejoin="round"
												stroke-width="1.41772"></path>
											<path d="M21.4482 26.8457L22.866 28.2634L25.7014 25.428" stroke="white"
												stroke-linejoin="round" stroke-width="1.41772"></path>
											<path
												d="M33.1001 3.5L33.8859 5.91844H36.4288L34.3715 7.41312L35.1573 9.83156L33.1001 8.33688L31.0428 9.83156L31.8286 7.41312L29.7714 5.91844H32.3143L33.1001 3.5Z"
												fill="white"></path>
											<path
												d="M40.1001 10.5L40.8859 12.9184H43.4288L41.3715 14.4131L42.1573 16.8316L40.1001 15.3369L38.0428 16.8316L38.8286 14.4131L36.7714 12.9184H39.3143L40.1001 10.5Z"
												fill="white"></path>
											<path
												d="M43.1001 19.5L43.8859 21.9184H46.4288L44.3715 23.4131L45.1573 25.8316L43.1001 24.3369L41.0428 25.8316L41.8286 23.4131L39.7714 21.9184H42.3143L43.1001 19.5Z"
												fill="white"></path>
											<path
												d="M41.1001 29.5L41.8859 31.9184H44.4288L42.3715 33.4131L43.1573 35.8316L41.1001 34.3369L39.0428 35.8316L39.8286 33.4131L37.7714 31.9184H40.3143L41.1001 29.5Z"
												fill="white"></path>
											<path
												d="M34.1001 36.5L34.8859 38.9184H37.4288L35.3715 40.4131L36.1573 42.8316L34.1001 41.3369L32.0428 42.8316L32.8286 40.4131L30.7714 38.9184H33.3143L34.1001 36.5Z"
												fill="white"></path>
											<path
												d="M23.1001 39.5L23.8859 41.9184H26.4288L24.3715 43.4131L25.1573 45.8316L23.1001 44.3369L21.0428 45.8316L21.8286 43.4131L19.7714 41.9184H22.3143L23.1001 39.5Z"
												fill="white"></path>
											<path
												d="M13.1001 36.5L13.8859 38.9184H16.4288L14.3715 40.4131L15.1573 42.8316L13.1001 41.3369L11.0428 42.8316L11.8286 40.4131L9.7714 38.9184H12.3143L13.1001 36.5Z"
												fill="white"></path>
											<path
												d="M6.1001 29.5L6.8859 31.9184H9.4288L7.37155 33.4131L8.15735 35.8316L6.1001 34.3369L4.04285 35.8316L4.82865 33.4131L2.7714 31.9184H5.3143L6.1001 29.5Z"
												fill="white"></path>
											<path
												d="M3.1001 19.5L3.8859 21.9184H6.4288L4.37155 23.4131L5.15735 25.8316L3.1001 24.3369L1.04285 25.8316L1.82865 23.4131L-0.2286 21.9184H2.3143L3.1001 19.5Z"
												fill="white"></path>
											<path
												d="M6.1001 10.5L6.8859 12.9184H9.4288L7.37155 14.4131L8.15735 16.8316L6.1001 15.3369L4.04285 16.8316L4.82865 14.4131L2.7714 12.9184H5.3143L6.1001 10.5Z"
												fill="white"></path>
											<path
												d="M13.1001 3.5L13.8859 5.91844H16.4288L14.3715 7.41312L15.1573 9.83156L13.1001 8.33688L11.0428 9.83156L11.8286 7.41312L9.7714 5.91844H12.3143L13.1001 3.5Z"
												fill="white"></path>
											<path
												d="M23.1001 0.5L23.8859 2.91844H26.4288L24.3715 4.41312L25.1573 6.83156L23.1001 5.33688L21.0428 6.83156L21.8286 4.41312L19.7714 2.91844H22.3143L23.1001 0.5Z"
												fill="white"></path>
										</g>
										<path
											d="M64.7653 14.0409H70.3823V21.3847C69.6413 21.6361 68.8672 21.8346 68.06 21.9802C67.2661 22.1257 66.3597 22.1985 65.3409 22.1985C63.9383 22.1985 62.7408 21.9206 61.7484 21.3649C60.7692 20.8091 60.0216 19.9887 59.5055 18.9037C59.0027 17.8187 58.7513 16.4822 58.7513 14.8944C58.7513 13.4124 59.0358 12.1289 59.6048 11.0438C60.187 9.95882 61.0272 9.11858 62.1255 8.52314C63.2237 7.9277 64.5668 7.62997 66.1546 7.62997C66.9089 7.62997 67.6499 7.70937 68.3776 7.86815C69.1054 8.02694 69.767 8.23865 70.3624 8.50329L69.37 10.9049C68.9334 10.68 68.4372 10.4947 67.8814 10.3492C67.3257 10.2036 66.7435 10.1308 66.1348 10.1308C65.2615 10.1308 64.5006 10.3293 63.8522 10.7263C63.2171 11.1232 62.7209 11.6856 62.3636 12.4134C62.0196 13.1279 61.8476 13.9748 61.8476 14.9539C61.8476 15.8802 61.9733 16.7006 62.2247 17.4151C62.4761 18.1296 62.8731 18.692 63.4156 19.1022C63.9581 19.4991 64.666 19.6976 65.5393 19.6976C65.8304 19.6976 66.0819 19.691 66.2936 19.6778C66.5185 19.6513 66.7236 19.6248 66.9089 19.5984C67.0941 19.5587 67.2727 19.5256 67.4448 19.4991V16.5418H64.7653V14.0409ZM85.4992 14.7753C85.4992 16.3631 85.1949 17.693 84.5862 18.7648C83.9776 19.8366 83.091 20.6437 81.9266 21.1862C80.7754 21.7287 79.386 22 77.7585 22H73.7492V7.82846H78.1951C79.6771 7.82846 80.9606 8.0931 82.0457 8.62238C83.1439 9.15166 83.9908 9.93235 84.5862 10.9645C85.1949 11.9833 85.4992 13.2536 85.4992 14.7753ZM82.3831 14.8547C82.3831 13.8094 82.2309 12.9493 81.9266 12.2744C81.6222 11.5996 81.1657 11.1034 80.5571 10.7858C79.9616 10.455 79.2272 10.2896 78.3539 10.2896H76.7462V19.519H78.0364C79.5051 19.519 80.5968 19.1286 81.3113 18.3479C82.0258 17.5673 82.3831 16.4028 82.3831 14.8547ZM92.9668 7.82846C94.7928 7.82846 96.1226 8.22542 96.9562 9.01934C97.8031 9.80003 98.2265 10.8784 98.2265 12.2546C98.2265 12.8765 98.1339 13.4719 97.9487 14.0409C97.7634 14.5967 97.4524 15.0995 97.0158 15.5494C96.5924 15.986 96.03 16.3301 95.3287 16.5815C94.6274 16.8329 93.7607 16.9586 92.7286 16.9586H91.4385V22H88.4414V7.82846H92.9668ZM92.808 10.2896H91.4385V14.4974H92.4309C92.9999 14.4974 93.4894 14.4246 93.8996 14.2791C94.3098 14.1335 94.6274 13.902 94.8523 13.5844C95.0773 13.2668 95.1898 12.8566 95.1898 12.3538C95.1898 11.6525 94.9979 11.1365 94.6142 10.8057C94.2304 10.4616 93.6284 10.2896 92.808 10.2896ZM105.033 7.82846C106.317 7.82846 107.375 7.98724 108.209 8.30481C109.042 8.60915 109.664 9.07889 110.074 9.71403C110.485 10.3359 110.69 11.1232 110.69 12.0759C110.69 12.7243 110.564 13.2933 110.313 13.7829C110.074 14.2592 109.75 14.6694 109.34 15.0135C108.943 15.3443 108.513 15.6155 108.05 15.8272L112.218 22H108.884L105.509 16.5616H103.902V22H100.905V7.82846H105.033ZM104.815 10.2896H103.902V14.1203H104.874C105.536 14.1203 106.072 14.0475 106.482 13.902C106.892 13.7564 107.19 13.5381 107.375 13.247C107.56 12.9426 107.653 12.5788 107.653 12.1553C107.653 11.7055 107.547 11.3482 107.335 11.0835C107.137 10.8057 106.826 10.6072 106.403 10.4881C105.992 10.3558 105.463 10.2896 104.815 10.2896Z"
											fill="white"></path>
										<path
											d="M62.1708 34.6846C61.7398 34.6846 61.3504 34.7602 61.0026 34.9114C60.6548 35.0551 60.3599 35.2705 60.118 35.5579C59.876 35.8376 59.6908 36.1817 59.5622 36.59C59.4337 36.9907 59.3694 37.4444 59.3694 37.951C59.3694 38.6164 59.4715 39.1948 59.6756 39.6863C59.8874 40.1778 60.1974 40.5558 60.6057 40.8205C61.0215 41.0851 61.5395 41.2174 62.1595 41.2174C62.5149 41.2174 62.8513 41.1872 63.1689 41.1267C63.4865 41.0662 63.7965 40.9906 64.0989 40.8998V41.7845C63.7965 41.8979 63.4827 41.9811 63.1576 42.034C62.84 42.087 62.4582 42.1134 62.012 42.1134C61.1879 42.1134 60.4998 41.9433 59.9478 41.603C59.3959 41.2628 58.98 40.7789 58.7002 40.1513C58.428 39.5237 58.2919 38.7865 58.2919 37.9396C58.2919 37.3272 58.3751 36.7677 58.5415 36.2611C58.7154 35.7545 58.9649 35.3159 59.29 34.9454C59.6227 34.5749 60.031 34.2914 60.5149 34.0948C60.9988 33.8906 61.5546 33.7886 62.1822 33.7886C62.598 33.7886 62.9988 33.8301 63.3844 33.9133C63.77 33.9965 64.1141 34.1137 64.4165 34.2649L64.0082 35.1269C63.7587 35.0135 63.4789 34.9114 63.1689 34.8207C62.8665 34.7299 62.5338 34.6846 62.1708 34.6846ZM71.0156 38.9491C71.0156 39.4557 70.9475 39.9056 70.8114 40.2987C70.6829 40.6844 70.4938 41.0133 70.2443 41.2855C70.0024 41.5577 69.7037 41.7656 69.3483 41.9093C69.0005 42.0454 68.6111 42.1134 68.1801 42.1134C67.7794 42.1134 67.4089 42.0454 67.0686 41.9093C66.7284 41.7656 66.4335 41.5577 66.184 41.2855C65.9344 41.0133 65.7378 40.6844 65.5942 40.2987C65.4581 39.9056 65.39 39.4557 65.39 38.9491C65.39 38.2761 65.5035 37.709 65.7303 37.2478C65.9571 36.779 66.2823 36.4236 66.7057 36.1817C67.1291 35.9322 67.6319 35.8074 68.2141 35.8074C68.7661 35.8074 69.25 35.9322 69.6659 36.1817C70.0893 36.4236 70.4182 36.779 70.6526 37.2478C70.8946 37.709 71.0156 38.2761 71.0156 38.9491ZM66.4221 38.9491C66.4221 39.4254 66.4826 39.8413 66.6036 40.1967C66.7321 40.5445 66.9287 40.8129 67.1934 41.0019C67.458 41.191 67.7945 41.2855 68.2028 41.2855C68.6111 41.2855 68.9476 41.191 69.2122 41.0019C69.4769 40.8129 69.6697 40.5445 69.7906 40.1967C69.9192 39.8413 69.9835 39.4254 69.9835 38.9491C69.9835 38.4651 69.9192 38.0531 69.7906 37.7128C69.6621 37.3726 69.4655 37.1117 69.2009 36.9302C68.9438 36.7412 68.6073 36.6467 68.1915 36.6467C67.5714 36.6467 67.1215 36.8508 66.8418 37.2591C66.562 37.6674 66.4221 38.2308 66.4221 38.9491ZM79.2663 35.8074C79.9544 35.8074 80.4686 35.9851 80.8088 36.3405C81.1491 36.6883 81.3192 37.2554 81.3192 38.0417V42H80.3325V38.0871C80.3325 37.6107 80.2304 37.2516 80.0262 37.0096C79.8296 36.7677 79.5196 36.6467 79.0962 36.6467C78.5064 36.6467 78.083 36.8168 77.8259 37.1571C77.5764 37.4973 77.4517 37.9926 77.4517 38.6428V42H76.4649V38.0871C76.4649 37.7695 76.4196 37.5049 76.3288 37.2932C76.2381 37.0739 76.102 36.9113 75.9205 36.8055C75.739 36.6996 75.5047 36.6467 75.2173 36.6467C74.809 36.6467 74.4877 36.7336 74.2533 36.9075C74.0189 37.0739 73.8488 37.3196 73.7429 37.6448C73.6446 37.9699 73.5955 38.3706 73.5955 38.847V42H72.5974V35.9208H73.4026L73.5501 36.7488H73.6068C73.7353 36.537 73.8903 36.3631 74.0718 36.227C74.2608 36.0834 74.4688 35.9775 74.6956 35.9095C74.9224 35.8414 75.1568 35.8074 75.3988 35.8074C75.8676 35.8074 76.257 35.8906 76.567 36.0569C76.8846 36.2233 77.1152 36.4803 77.2588 36.8282H77.3156C77.5197 36.4803 77.7957 36.2233 78.1435 36.0569C78.4989 35.8906 78.8732 35.8074 79.2663 35.8074ZM86.0892 35.8074C86.8378 35.8074 87.4389 36.0683 87.8926 36.59C88.3538 37.1117 88.5844 37.8981 88.5844 38.9491C88.5844 39.6371 88.4785 40.2193 88.2668 40.6957C88.0627 41.1645 87.7716 41.5199 87.3935 41.7618C87.023 41.9962 86.5845 42.1134 86.0779 42.1134C85.7679 42.1134 85.4919 42.0718 85.2499 41.9887C85.008 41.9055 84.8 41.7996 84.6261 41.6711C84.4598 41.535 84.3161 41.3875 84.1951 41.2288H84.1271C84.1422 41.3573 84.1573 41.5199 84.1725 41.7165C84.1876 41.913 84.1951 42.0832 84.1951 42.2268V44.722H83.1971V35.9208H84.0137L84.1498 36.7488H84.1951C84.3161 36.5749 84.4598 36.4161 84.6261 36.2724C84.8 36.1287 85.0042 36.0153 85.2386 35.9322C85.4805 35.849 85.7641 35.8074 86.0892 35.8074ZM85.9077 36.6467C85.4994 36.6467 85.1705 36.7261 84.921 36.8849C84.6715 37.0361 84.49 37.2667 84.3766 37.5767C84.2632 37.8867 84.2027 38.2799 84.1951 38.7563V38.9491C84.1951 39.4481 84.2481 39.8715 84.3539 40.2193C84.4598 40.5672 84.6375 40.8318 84.887 41.0133C85.1441 41.1947 85.4919 41.2855 85.9304 41.2855C86.3009 41.2855 86.6034 41.1834 86.8378 40.9792C87.0797 40.7751 87.2574 40.4991 87.3708 40.1513C87.4918 39.7959 87.5523 39.3914 87.5523 38.9377C87.5523 38.2421 87.4162 37.6863 87.144 37.2705C86.8794 36.8546 86.4673 36.6467 85.9077 36.6467ZM91.173 42H90.1749V33.3803H91.173V42ZM94.097 35.9208V42H93.099V35.9208H94.097ZM93.6093 33.6411C93.7606 33.6411 93.8929 33.694 94.0063 33.7999C94.1273 33.8982 94.1878 34.057 94.1878 34.2763C94.1878 34.488 94.1273 34.6468 94.0063 34.7526C93.8929 34.8585 93.7606 34.9114 93.6093 34.9114C93.443 34.9114 93.3031 34.8585 93.1897 34.7526C93.0763 34.6468 93.0196 34.488 93.0196 34.2763C93.0196 34.057 93.0763 33.8982 93.1897 33.7999C93.3031 33.694 93.443 33.6411 93.6093 33.6411ZM98.3254 35.8187C99.0664 35.8187 99.6146 35.9813 99.9699 36.3064C100.325 36.6316 100.503 37.1495 100.503 37.8603V42H99.7771L99.5843 41.138H99.539C99.3651 41.3573 99.1836 41.5425 98.9946 41.6938C98.8131 41.8374 98.6014 41.9433 98.3594 42.0113C98.125 42.0794 97.8377 42.1134 97.4974 42.1134C97.1345 42.1134 96.8056 42.0491 96.5107 41.9206C96.2234 41.7921 95.9965 41.5955 95.8302 41.3308C95.6639 41.0586 95.5807 40.7184 95.5807 40.3101C95.5807 39.7052 95.8189 39.2402 96.2952 38.915C96.7716 38.5823 97.505 38.4009 98.4955 38.3706L99.5276 38.3366V37.9737C99.5276 37.4671 99.418 37.1155 99.1987 36.9189C98.9794 36.7223 98.6694 36.624 98.2687 36.624C97.9511 36.624 97.6487 36.6731 97.3613 36.7714C97.074 36.8622 96.8056 36.968 96.5561 37.089L96.2498 36.3405C96.5145 36.1968 96.8283 36.0758 97.1912 35.9775C97.5541 35.8717 97.9322 35.8187 98.3254 35.8187ZM98.6203 39.0625C97.8642 39.0927 97.3387 39.2137 97.0438 39.4254C96.7564 39.6371 96.6128 39.9358 96.6128 40.3214C96.6128 40.6617 96.7149 40.9112 96.919 41.07C97.1307 41.2288 97.3991 41.3082 97.7243 41.3082C98.2384 41.3082 98.6656 41.1683 99.0059 40.8885C99.3461 40.6012 99.5163 40.1626 99.5163 39.5729V39.0285L98.6203 39.0625ZM105.307 35.8074C106.033 35.8074 106.581 35.9851 106.951 36.3405C107.322 36.6883 107.507 37.2554 107.507 38.0417V42H106.52V38.1098C106.52 37.6183 106.411 37.2516 106.191 37.0096C105.972 36.7677 105.628 36.6467 105.159 36.6467C104.486 36.6467 104.021 36.8357 103.764 37.2138C103.507 37.5918 103.379 38.1362 103.379 38.847V42H102.381V35.9208H103.186L103.333 36.7488H103.39C103.526 36.537 103.692 36.3631 103.889 36.227C104.093 36.0834 104.316 35.9775 104.558 35.9095C104.8 35.8414 105.05 35.8074 105.307 35.8074ZM111.422 41.2968C111.573 41.2968 111.728 41.2855 111.887 41.2628C112.046 41.2325 112.174 41.2023 112.272 41.1721V41.9319C112.167 41.9849 112.015 42.0265 111.819 42.0567C111.622 42.0945 111.433 42.1134 111.252 42.1134C110.934 42.1134 110.639 42.0605 110.367 41.9546C110.102 41.8412 109.887 41.6484 109.721 41.3762C109.554 41.104 109.471 40.7222 109.471 40.2307V36.6921H108.609V36.2157L109.482 35.8187L109.879 34.5258H110.469V35.9208H112.227V36.6921H110.469V40.208C110.469 40.5785 110.556 40.8545 110.73 41.0359C110.911 41.2099 111.142 41.2968 111.422 41.2968Z"
											fill="white"></path>
										<defs>
											<clippath id="clip0_23561_24860">
												<rect fill="white" height="45.3671"
													transform="translate(0.891113 0.816406)" width="45.3671"></rect>
											</clippath>
										</defs>
									</svg>
									<svg fill="none" height="45" role="img" viewbox="0 0 113 45" width="113"
										xmlns="http://www.w3.org/2000/svg">
										<title>HIPPA</title>
										<path
											d="M23.4199 40.7329C23.4199 40.7329 38.0849 33.4039 38.0849 22.3999V9.56889L23.4199 4.06689L8.75488 9.56889V22.3999C8.75488 33.3969 23.4199 40.7329 23.4199 40.7329Z"
											stroke="white" stroke-linecap="round" stroke-linejoin="round"
											stroke-width="1.4"></path>
										<path
											d="M23.4201 36.4139C23.4201 36.4139 35.0331 30.6039 35.0331 21.8959V11.7319L23.4201 7.37793L11.8071 11.7319V21.8959C11.8071 30.6039 23.4201 36.4139 23.4201 36.4139Z"
											stroke="white" stroke-linecap="round" stroke-linejoin="round"
											stroke-width="1.4"></path>
										<path d="M17.8062 21.252L22.2652 25.704L31.1832 16.793" stroke="white"
											stroke-linejoin="round" stroke-width="1.4"></path>
										<path
											d="M64.23 22H61.2704V15.9632H55.7236V22H52.764V8.0056H55.7236V13.4936H61.2704V8.0056H64.23V22ZM72.9843 22H66.6143V20.3144L68.3195 19.5304V10.4752L66.6143 9.6912V8.0056H72.9843V9.6912L71.2791 10.4752V19.5304L72.9843 20.3144V22ZM79.8379 8.0056C81.6411 8.0056 82.9543 8.3976 83.7775 9.1816C84.6137 9.95253 85.0319 11.0175 85.0319 12.3764C85.0319 12.9905 84.9404 13.5785 84.7575 14.1404C84.5745 14.6892 84.2675 15.1857 83.8363 15.63C83.4181 16.0612 82.8628 16.4009 82.1703 16.6492C81.4777 16.8975 80.6219 17.0216 79.6027 17.0216H78.3287V22H75.3691V8.0056H79.8379ZM79.6811 10.436H78.3287V14.5912H79.3087C79.8705 14.5912 80.354 14.5193 80.7591 14.3756C81.1641 14.2319 81.4777 14.0032 81.6999 13.6896C81.922 13.376 82.0331 12.9709 82.0331 12.4744C82.0331 11.7819 81.8436 11.2723 81.4647 10.9456C81.0857 10.6059 80.4912 10.436 79.6811 10.436ZM95.2655 22L94.2463 18.668H89.1503L88.1311 22H84.9363L89.8755 7.9468H93.5015L98.4603 22H95.2655ZM92.5215 12.9252C92.4562 12.7031 92.3713 12.4221 92.2667 12.0824C92.1622 11.7427 92.0577 11.3964 91.9531 11.0436C91.8486 10.6908 91.7637 10.3837 91.6983 10.1224C91.633 10.3837 91.5415 10.7104 91.4239 11.1024C91.3194 11.4813 91.2149 11.8472 91.1103 12.2C91.0189 12.5397 90.947 12.7815 90.8947 12.9252L89.8951 16.1788H93.5407L92.5215 12.9252ZM108.798 22L107.779 18.668H102.683L101.664 22H98.4688L103.408 7.9468H107.034L111.993 22H108.798ZM106.054 12.9252C105.989 12.7031 105.904 12.4221 105.799 12.0824C105.695 11.7427 105.59 11.3964 105.486 11.0436C105.381 10.6908 105.296 10.3837 105.231 10.1224C105.165 10.3837 105.074 10.7104 104.956 11.1024C104.852 11.4813 104.747 11.8472 104.643 12.2C104.551 12.5397 104.479 12.7815 104.427 12.9252L103.428 16.1788H107.073L106.054 12.9252Z"
											fill="white"></path>
										<path
											d="M57.72 33.0032L54.864 41H53.856L51 33.0032H52.0528L53.856 38.1328C53.9381 38.3493 54.0091 38.5584 54.0688 38.76C54.1285 38.9616 54.1808 39.1557 54.2256 39.3424C54.2779 39.5216 54.3227 39.7008 54.36 39.88C54.3973 39.7008 54.4384 39.5179 54.4832 39.3312C54.5355 39.1445 54.5915 38.9504 54.6512 38.7488C54.7184 38.5472 54.7893 38.3344 54.864 38.1104L56.656 33.0032H57.72ZM60.7673 34.8848C61.2825 34.8848 61.723 34.9968 62.0889 35.2208C62.4622 35.4448 62.7459 35.7621 62.9401 36.1728C63.1417 36.576 63.2425 37.0501 63.2425 37.5952V38.1888H59.1321C59.147 38.8683 59.3187 39.3872 59.6473 39.7456C59.9833 40.0965 60.4499 40.272 61.0473 40.272C61.4281 40.272 61.7641 40.2384 62.0553 40.1712C62.3539 40.0965 62.6601 39.992 62.9737 39.8576V40.72C62.6675 40.8544 62.3651 40.9515 62.0665 41.0112C61.7678 41.0784 61.4131 41.112 61.0025 41.112C60.435 41.112 59.931 40.9963 59.4905 40.7648C59.0574 40.5333 58.7177 40.1899 58.4713 39.7344C58.2323 39.2715 58.1129 38.7077 58.1129 38.0432C58.1129 37.3861 58.2211 36.8224 58.4377 36.352C58.6617 35.8816 58.9715 35.5195 59.3673 35.2656C59.7705 35.0117 60.2371 34.8848 60.7673 34.8848ZM60.7561 35.6912C60.2857 35.6912 59.9123 35.8443 59.6361 36.1504C59.3673 36.4491 59.2067 36.8672 59.1545 37.4048H62.2121C62.2121 37.0613 62.1598 36.7627 62.0553 36.5088C61.9507 36.2549 61.7902 36.0571 61.5737 35.9152C61.3646 35.7659 61.0921 35.6912 60.7561 35.6912ZM67.5708 34.8848C67.6828 34.8848 67.8022 34.8923 67.9292 34.9072C68.0636 34.9147 68.1793 34.9296 68.2764 34.952L68.1532 35.8592C68.0561 35.8368 67.9478 35.8181 67.8284 35.8032C67.7164 35.7883 67.6081 35.7808 67.5036 35.7808C67.2721 35.7808 67.0518 35.8293 66.8428 35.9264C66.6337 36.0235 66.447 36.1616 66.2828 36.3408C66.1185 36.5125 65.9878 36.7216 65.8908 36.968C65.8012 37.2144 65.7564 37.4907 65.7564 37.7968V41H64.7708V34.9968H65.5772L65.6892 36.0944H65.734C65.8609 35.8704 66.014 35.6688 66.1932 35.4896C66.3724 35.3029 66.5777 35.1573 66.8092 35.0528C67.0406 34.9408 67.2945 34.8848 67.5708 34.8848ZM70.3829 34.9968V41H69.3973V34.9968H70.3829ZM69.9013 32.7456C70.0506 32.7456 70.1813 32.7979 70.2933 32.9024C70.4128 32.9995 70.4725 33.1563 70.4725 33.3728C70.4725 33.5819 70.4128 33.7387 70.2933 33.8432C70.1813 33.9477 70.0506 34 69.9013 34C69.737 34 69.5989 33.9477 69.4869 33.8432C69.3749 33.7387 69.3189 33.5819 69.3189 33.3728C69.3189 33.1563 69.3749 32.9995 69.4869 32.9024C69.5989 32.7979 69.737 32.7456 69.9013 32.7456ZM75.0512 35.7584H73.5392V41H72.5536V35.7584H71.5008V35.2992L72.5536 34.9632V34.616C72.5536 34.1008 72.6283 33.6827 72.7776 33.3616C72.9344 33.0405 73.1584 32.8053 73.4496 32.656C73.7408 32.5067 74.0917 32.432 74.5024 32.432C74.7413 32.432 74.9579 32.4544 75.152 32.4992C75.3536 32.5365 75.5253 32.5813 75.6672 32.6336L75.4096 33.4064C75.2901 33.3691 75.152 33.3317 74.9952 33.2944C74.8384 33.2571 74.6779 33.2384 74.5136 33.2384C74.1851 33.2384 73.9387 33.3504 73.7744 33.5744C73.6176 33.7909 73.5392 34.1344 73.5392 34.6048V34.9968H75.0512V35.7584ZM77.1232 34.9968V41H76.1376V34.9968H77.1232ZM76.6416 32.7456C76.7909 32.7456 76.9216 32.7979 77.0336 32.9024C77.1531 32.9995 77.2128 33.1563 77.2128 33.3728C77.2128 33.5819 77.1531 33.7387 77.0336 33.8432C76.9216 33.9477 76.7909 34 76.6416 34C76.4773 34 76.3392 33.9477 76.2272 33.8432C76.1152 33.7387 76.0592 33.5819 76.0592 33.3728C76.0592 33.1563 76.1152 32.9995 76.2272 32.9024C76.3392 32.7979 76.4773 32.7456 76.6416 32.7456ZM81.3407 34.8848C81.8559 34.8848 82.2964 34.9968 82.6623 35.2208C83.0356 35.4448 83.3194 35.7621 83.5135 36.1728C83.7151 36.576 83.8159 37.0501 83.8159 37.5952V38.1888H79.7055C79.7204 38.8683 79.8922 39.3872 80.2207 39.7456C80.5567 40.0965 81.0234 40.272 81.6207 40.272C82.0015 40.272 82.3375 40.2384 82.6287 40.1712C82.9274 40.0965 83.2335 39.992 83.5471 39.8576V40.72C83.241 40.8544 82.9386 40.9515 82.6399 41.0112C82.3412 41.0784 81.9866 41.112 81.5759 41.112C81.0084 41.112 80.5044 40.9963 80.0639 40.7648C79.6308 40.5333 79.2911 40.1899 79.0447 39.7344C78.8058 39.2715 78.6863 38.7077 78.6863 38.0432C78.6863 37.3861 78.7946 36.8224 79.0111 36.352C79.2351 35.8816 79.545 35.5195 79.9407 35.2656C80.3439 35.0117 80.8106 34.8848 81.3407 34.8848ZM81.3295 35.6912C80.8591 35.6912 80.4858 35.8443 80.2095 36.1504C79.9407 36.4491 79.7802 36.8672 79.7279 37.4048H82.7855C82.7855 37.0613 82.7332 36.7627 82.6287 36.5088C82.5242 36.2549 82.3636 36.0571 82.1471 35.9152C81.938 35.7659 81.6655 35.6912 81.3295 35.6912ZM87.4722 41.112C86.7255 41.112 86.1282 40.8544 85.6802 40.3392C85.2322 39.8165 85.0082 39.04 85.0082 38.0096C85.0082 36.9792 85.2322 36.2027 85.6802 35.68C86.1357 35.1499 86.7367 34.8848 87.4834 34.8848C87.797 34.8848 88.0695 34.9259 88.301 35.008C88.5325 35.0827 88.7341 35.1872 88.9058 35.3216C89.0775 35.456 89.2231 35.6053 89.3426 35.7696H89.4098C89.4023 35.6725 89.3874 35.5307 89.365 35.344C89.3501 35.1499 89.3426 34.9968 89.3426 34.8848V32.488H90.3282V41H89.533L89.3874 40.1936H89.3426C89.2231 40.3653 89.0775 40.5221 88.9058 40.664C88.7341 40.7984 88.5287 40.9067 88.2898 40.9888C88.0583 41.0709 87.7858 41.112 87.4722 41.112ZM87.629 40.2944C88.2637 40.2944 88.7079 40.1227 88.9618 39.7792C89.2231 39.4283 89.3538 38.9019 89.3538 38.2V38.0208C89.3538 37.2741 89.2306 36.7029 88.9842 36.3072C88.7378 35.904 88.2823 35.7024 87.6178 35.7024C87.0877 35.7024 86.6882 35.9152 86.4194 36.3408C86.1581 36.7589 86.0274 37.3227 86.0274 38.032C86.0274 38.7488 86.1581 39.3051 86.4194 39.7008C86.6882 40.0965 87.0914 40.2944 87.629 40.2944Z"
											fill="white"></path>
									</svg>
								</div>
							</div>
							<p class="copy-text">
								Bản quyền © 2026 VASCO VN. Bảo lưu mọi quyền.
							</p>
						</div>
					</div>
				</div>
				<div class="container">
					<dialog class="basic-dialog notify-dialog" id="notify-dialog">
						<div class="basic-dialog-header">
							<h2>
								Thông báo cho tôi khi sản phẩm có hàng trở lại
							</h2>
							<button aria-label="Close" class="close-dialog-icon" data-dismiss="modal" type="button">
								<svg fill="none" height="24" viewbox="0 0 32 32" width="24"
									xmlns="http://www.w3.org/2000/svg">
									<path clip-rule="evenodd"
										d="M18.7218 15.5862L27.6066 6.70147L24.7781 3.87305L15.8934 12.7578L7.2218 4.08625L4.39337 6.91468L13.0649 15.5862L3.56494 25.0863L6.39337 27.9147L15.8934 18.4147L25.6066 28.1279L28.435 25.2995L18.7218 15.5862Z"
										fill="white" fill-rule="evenodd"></path>
								</svg>
							</button>
						</div>
						<div class="basic-dialog-body">
							<form class="notify-form" id="notify-form" method="post">
								<div class="newsletter-form-wrapper">
									<p class="my-auto body-16 font-bold">E-mail<span class="input-required">*</span>
									</p>
									<input aria-labelledby="block-newsletter-label" class="body-16" id="notify_mail"
										name="notify_mail" placeholder="Địa chỉ email của bạn" required=""
										type="email" />
									<input name="lang_iso" type="hidden" value="en" />
									<input name="shop_id" type="hidden" value="1" />
								</div>
								<hr />
								<div class="termsandprivacy-formfields">
									<div class="form-checkbox form-terms">
										<div class="form-input">
											<span class="custom-checkbox">
												<label class="custom-checkbox-label">
													<div class="checkbox-input mr-3 leading-none">
														<input name="vasco-terms" required="" type="checkbox"
															value="1" />
													</div>
													<div>
														<p>I have read and accepted the <a class="link-to-modal"
																href="<?php echo esc_url( home_url( "/terms-and-conditions/" ) ); ?>" target="_blank">Điều
																khoản dịch vụ</a><span class="input-required">*</span>
														</p>
													</div>
												</label>
											</span>
										</div>
									</div>
									<div class="form-checkbox form-terms">
										<div class="form-input">
											<span class="custom-checkbox">
												<label class="custom-checkbox-label">
													<div class="checkbox-input mr-3 leading-none">
														<input name="vasco-privacy" required="" type="checkbox"
															value="1" />
													</div>
													<div>
														<p>I have read and accepted the <a class="link-to-modal"
																href="<?php echo esc_url( home_url( "/privacy-policy/" ) ); ?>" target="_blank">Chính sách
																bảo mật</a><span class="input-required">*</span></p>
													</div>
												</label>
											</span>
										</div>
									</div>
								</div>
								<div class="form-mandatory-information">
									<span class="input-required">*</span>Các trường bắt buộc
								</div>
								<div class="alert alert-success toast-animation notify-alert" style="display:none">Email
									has been added</div>
								<input id="notify-form-g-recaptcha-response" name="g-recaptcha-response" type="hidden"
									value="" />
								<input id="notify-form-g-recaptcha-action" name="g-recaptcha-action" type="hidden"
									value="notify_submit" />
								<div aria-hidden="true" class="ve-hp">
									<label for="notify-form-ve_hp">Leave this field empty</label>
									<input autocomplete="off" id="notify-form-ve_hp" name="ve_hp" tabindex="-1"
										type="text" value="" />
								</div>
								<input name="ve_ts" type="hidden" value="1785403442" />
								<div class="btn-wrapper">
									<button class="btn btn-md btn-secondary font-semibold" disabled="" id="notify_save"
										name="submitNotify" type="submit">
										<img alt="Notify" src="<?php echo esc_url( VASCO_THEME_URI . "/assets/img/notify.svg" ); ?>" />
										Thông báo cho tôi khi có hàng
									</button>
								</div>
							</form>
						</div>
					</dialog>
				</div>
			</div>
		</footer>

</main><?php // End main ?>
<!-- Nút Về đầu trang đã được xóa theo yêu cầu -->

<script id="footer-inline-click-handlers">
(function() {
	function initMobileMenuNav() {
		var burger = document.getElementById('open-menu') || document.querySelector('.open-menu, #open-menu, .burger-menu');
		var nav = document.getElementById('desktop-nav') || document.querySelector('.desktop-nav, .mobile-menu, .mobile-nav');
		var overlay = document.getElementById('overlay-menu') || document.querySelector('.overlay-menu');
		var header = document.getElementById('header');

		function updateMobileNavPosition() {
			if (nav && header) {
				var h = header.offsetHeight;
				nav.style.top = h + 'px';
				nav.style.height = 'calc(100vh - ' + h + 'px)';
			}
		}

		function openMobileMenu() {
			if (!nav) return;
			updateMobileNavPosition();
			nav.classList.add('active', 'open', 'show-mobile');
			if (burger) burger.classList.add('is-active', 'active', 'open');
			if (overlay) overlay.classList.add('active', 'show');
			document.body.classList.add('menu-open', 'noscroll');
		}

		function closeMobileMenu() {
			if (!nav) return;
			nav.classList.remove('active', 'open', 'show-mobile');
			if (burger) burger.classList.remove('is-active', 'active', 'open');
			if (overlay) overlay.classList.remove('active', 'show');
			document.body.classList.remove('menu-open', 'noscroll');
		}

		function toggleMobileMenu(e) {
			if (e) {
				e.preventDefault();
				e.stopPropagation();
			}
			if (!nav) return;
			var isOpen = nav.classList.contains('active') || nav.classList.contains('open') || nav.classList.contains('show-mobile');
			if (isOpen) {
				closeMobileMenu();
			} else {
				openMobileMenu();
			}
		}

		if (burger) {
			burger.addEventListener('click', toggleMobileMenu);
		}

		if (overlay) {
			overlay.addEventListener('click', closeMobileMenu);
		}

		// Global click handler for mobile nav dropdown toggle icons vs actual page links
		document.addEventListener('click', function(e) {
			if (window.innerWidth > 991) return;

			// Handle main menu item dropdown toggles
			var hasChildTarget = e.target.closest('.nav-link.has-child, .arrow-rotate');
			if (hasChildTarget) {
				var linkEl = hasChildTarget.closest('.has-child') || hasChildTarget;
				var parentWrapper = linkEl.closest('.menu-item-wrapper');
				if (parentWrapper) {
					var submenu = parentWrapper.querySelector('.megamenu-childs-wrapper');
					if (submenu) {
						e.preventDefault();
						e.stopPropagation();
						var isHidden = submenu.hasAttribute('hidden') || getComputedStyle(submenu).display === 'none';
						if (isHidden) {
							submenu.removeAttribute('hidden');
							submenu.style.setProperty('display', 'block', 'important');
							if (linkEl) linkEl.setAttribute('aria-expanded', 'true');
							parentWrapper.classList.add('open', 'is-open');
						} else {
							submenu.setAttribute('hidden', '');
							submenu.style.setProperty('display', 'none', 'important');
							if (linkEl) linkEl.setAttribute('aria-expanded', 'false');
							parentWrapper.classList.remove('open', 'is-open');
						}
						updateMobileNavPosition();
					}
				}
				return;
			}

			// Sub-column header accordion inside megamenu for mobile
			var colTitle = e.target.closest('.megamenu-column-title, .arrow-rotate-sub');
			if (colTitle) {
				var colWrapper = colTitle.closest('.megamenu-column-wrapper');
				if (colWrapper) {
					var colContent = colWrapper.querySelector('.megamenu-column-content, ul');
					if (colContent) {
						e.preventDefault();
						e.stopPropagation();
						var isColHidden = colContent.hasAttribute('hidden') || getComputedStyle(colContent).display === 'none';
						if (isColHidden) {
							colContent.removeAttribute('hidden');
							colContent.style.setProperty('display', 'block', 'important');
							colWrapper.classList.add('open');
						} else {
							colContent.setAttribute('hidden', '');
							colContent.style.setProperty('display', 'none', 'important');
							colWrapper.classList.remove('open');
						}
						updateMobileNavPosition();
					}
				}
				return;
			}
		});

				// Product Detail Tab Switcher Fix (Về sản phẩm, Thông số kỹ thuật, Ngôn ngữ hỗ trợ, FAQ)
				document.addEventListener('click', function(e) {
					var tabBtn = e.target.closest('button.menu-link, .product-menu-container button, [data-id^="product-"]');
					if (tabBtn) {
						var href = tabBtn.getAttribute('href');
						if (href && href !== '#' && !href.startsWith('javascript:')) {
							return; // Allow category navigation links (/bundles/, /accessories/) to proceed
						}
						var targetId = tabBtn.getAttribute('data-id') || tabBtn.getAttribute('aria-controls');
						if (!targetId) return;

						e.preventDefault();
						e.stopPropagation();

						// Update button active state
						var menuContainer = tabBtn.closest('.tab-menu, .product-menu-container, nav');
						if (menuContainer) {
							menuContainer.querySelectorAll('.menu-link').forEach(function(b) {
								b.classList.remove('current', 'active', 'active-tab');
							});
							tabBtn.classList.add('current', 'active');
						}

						// Display target tab content and hide others
						var allTabs = document.querySelectorAll('.tab-content > .tab, .tab-content > div[id^="product-"]');
						allTabs.forEach(function(tab) {
							if (tab.id === targetId || tab.classList.contains(targetId)) {
								tab.classList.add('active-tab', 'active', 'current');
								tab.style.setProperty('display', 'block', 'important');
								tab.style.setProperty('visibility', 'visible', 'important');
								tab.style.setProperty('opacity', '1', 'important');
							} else {
								tab.classList.remove('active-tab', 'active', 'current');
								tab.style.setProperty('display', 'none', 'important');
							}
						});
					}

					// FAQ Accordion Toggle Fix
					var faqHeader = e.target.closest('.accordion-header, .accordion-title, .faq-question, .accordion-single');
					if (faqHeader) {
						var parentAccordion = faqHeader.closest('.accordion-single, .accordion-item, .faq-item');
						if (parentAccordion) {
							var content = parentAccordion.querySelector('.accordion-hidden, .accordion-content, .faq-answer');
							var icon = parentAccordion.querySelector('svg, .arrow, .icon');
							if (content) {
								content.classList.toggle('show');
								if (content.classList.contains('show')) {
									content.style.setProperty('display', 'block', 'important');
								} else {
									content.style.setProperty('display', 'none', 'important');
								}
							}
							if (icon) icon.classList.toggle('rotate');
						}
					}
				});

			}

			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', initMobileMenuNav);
			} else {
				initMobileMenuNav();
			}
		})();
	</script>
	<script id="translators-carousel-engine">
		(function () {
			function initSingleCarousel(carousel) {
				if (!carousel || carousel.dataset.initialized === 'true') return;
				carousel.dataset.initialized = 'true';

				var navButtons = carousel.querySelectorAll('.button-navigation .btn');
				var featuresBlocks = carousel.querySelectorAll('.absolute-box-product-features [data-slide]');
				var flagsBlocks = carousel.querySelectorAll('.product-flags-wrapper [data-slide]');
				var productNameEl = carousel.querySelector('.product-name');
				var productDescEl = carousel.querySelector('.product-desc');
				var productLinkEl = carousel.querySelector('.product-link');
				var bgSlides = carousel.querySelectorAll('.swiper-background .swiper-slide');
				var fgSlides = carousel.querySelectorAll('.swiper-foreground .swiper-slide');

				// Product Data Mapping (Q1, E1, M4, V4)
				var productsData = [
					{
						name: 'Vasco Translator Q1',
						desc: 'Máy phiên dịch duy nhất có tính năng nhân bản giọng nói và dịch cuộc gọi',
						link: '<?php echo esc_url( home_url( "/translators/vasco-translator-q1/" ) ); ?>',
						id: 'Q1'
					},
					{
						name: 'Vasco Translator E1',
						desc: 'Tai nghe phiên dịch cho cuộc trò chuyện tự nhiên và mượt mà',
						link: '<?php echo esc_url( home_url( "/translators/vasco-translator-e1/" ) ); ?>',
						id: 'E1'
					},
					{
						name: 'Vasco Translator M4',
						desc: 'Máy phiên dịch bỏ túi nhỏ gọn, dễ sử dụng dành cho mọi người',
						link: '<?php echo esc_url( home_url( "/translators/vasco-translator-m4/" ) ); ?>',
						id: 'M4'
					},
					{
						name: 'Vasco Translator V4',
						desc: 'Máy phiên dịch tức thì màn hình lớn 5 inch sắc nét',
						link: '<?php echo esc_url( home_url( "/translators/vasco-translator-v4/" ) ); ?>',
						id: 'V4'
					}
				];

				var currentIndex = 0;
				var autoPlayTimer = null;
				var autoPlayDelay = 3500; // 3.5s smooth auto scroll

				function goToSlide(index) {
					if (index < 0) index = productsData.length - 1;
					if (index >= productsData.length) index = 0;
					currentIndex = index;

					// 1. Update Navigation Buttons
					navButtons.forEach(function (btn, idx) {
						if (idx === currentIndex) {
							btn.classList.add('active');
						} else {
							btn.classList.remove('active');
						}
					});

					// 2. Update Features List (Left Column) with animation
					featuresBlocks.forEach(function (block) {
						var slideAttr = parseInt(block.getAttribute('data-slide'), 10);
						if (slideAttr === currentIndex) {
							block.classList.add('visible');
							block.style.display = 'flex';
							setTimeout(function() {
								block.style.opacity = '1';
								block.style.transform = 'translateX(0)';
							}, 20);
						} else {
							block.classList.remove('visible');
							block.style.opacity = '0';
							block.style.transform = 'translateX(-15px)';
							setTimeout(function() {
								if (!block.classList.contains('visible')) {
									block.style.display = 'none';
								}
							}, 350);
						}
					});

					// 3. Update Flags & Product Info (Right Column)
					flagsBlocks.forEach(function (block) {
						var slideAttr = parseInt(block.getAttribute('data-slide'), 10);
						if (slideAttr === currentIndex) {
							block.classList.add('visible');
							block.style.display = 'flex';
						} else {
							block.classList.remove('visible');
							block.style.display = 'none';
						}
					});

					var currentProduct = productsData[currentIndex];
					if (productNameEl) productNameEl.textContent = currentProduct.name;
					if (productDescEl) productDescEl.textContent = currentProduct.desc;
					if (productLinkEl) {
						productLinkEl.href = currentProduct.link;
						productLinkEl.setAttribute('data-product-id', currentProduct.id);
					}

					// 4. Update Product Foreground Slide (Center image matched by data-product-id or index)
					fgSlides.forEach(function (slide, idx) {
						var prodId = slide.getAttribute('data-product-id');
						var isTarget = prodId ? (prodId === currentProduct.id) : (idx === currentIndex);

						if (isTarget) {
							slide.classList.add('active-slide');
							slide.style.display = 'flex';
							setTimeout(function() {
								slide.style.opacity = '1';
								slide.style.transform = 'scale(1) translateY(0)';
							}, 20);
						} else {
							slide.classList.remove('active-slide');
							slide.style.opacity = '0';
							slide.style.transform = 'scale(0.88) translateY(10px)';
							setTimeout(function() {
								if (!slide.classList.contains('active-slide')) {
									slide.style.display = 'none';
								}
							}, 350);
						}
					});

					// 5. Update Background color slide
					bgSlides.forEach(function (slide) {
						slide.style.display = 'none';
					});
					var activeBg = carousel.querySelector('.swiper-background .slide-bg-' + currentIndex);
					if (activeBg) {
						activeBg.style.display = 'block';
					}
				}

				// Click handler for top navigation buttons (Q1, E1, M4, V4)
				navButtons.forEach(function (btn, idx) {
					btn.addEventListener('click', function (e) {
						e.preventDefault();
						goToSlide(idx);
						restartAutoScroll();
					});
				});

				// Prev / Next button handlers
				var prevBtn = carousel.querySelector('.btn-carousel-prev, .swiper-button-prev');
				var nextBtn = carousel.querySelector('.btn-carousel-next, .swiper-button-next');

				if (prevBtn) {
					prevBtn.addEventListener('click', function (e) {
						e.preventDefault();
						goToSlide(currentIndex - 1);
						restartAutoScroll();
					});
				}

				if (nextBtn) {
					nextBtn.addEventListener('click', function (e) {
						e.preventDefault();
						goToSlide(currentIndex + 1);
						restartAutoScroll();
					});
				}

				// Auto Scroll Engine
				function startAutoScroll() {
					stopAutoScroll();
					autoPlayTimer = setInterval(function () {
						goToSlide(currentIndex + 1);
					}, autoPlayDelay);
				}

				function stopAutoScroll() {
					if (autoPlayTimer) {
						clearInterval(autoPlayTimer);
						autoPlayTimer = null;
					}
				}

				function restartAutoScroll() {
					stopAutoScroll();
					startAutoScroll();
				}

				carousel.addEventListener('mouseenter', stopAutoScroll);
				carousel.addEventListener('mouseleave', startAutoScroll);

				// Initial setup to Slide 0 (Q1)
				goToSlide(0);
				startAutoScroll();
			}

			function initAllCarousels() {
				document.querySelectorAll('.translators-carousel').forEach(initSingleCarousel);
			}

			if (document.readyState === 'loading') {
				document.addEventListener('DOMContentLoaded', initAllCarousels);
			} else {
				initAllCarousels();
			}
		})();
	</script>
</body>

</html>

<script id="global-dom-helpers">
(function() {
    // Global Image Error Fallback Handler
    document.addEventListener('error', function(e) {
        if (e.target && e.target.tagName === 'IMG') {
            if (e.target.closest('#vasco-side-drawer, #cart-content-area, .product-miniature, .product-cover')) {
                return;
            }
            var defaultPlaceholder = '<?php echo esc_url( VASCO_THEME_URI . "/assets/img/menu/megamenu_shop_img.webp" ); ?>';
            if (e.target.src !== defaultPlaceholder) {
                e.target.src = defaultPlaceholder;
                e.target.style.objectFit = 'contain';
            }
        }
    }, true);

    // Translate Payment Installment Text (Klarna / Sezzle / Afterpay / Square)
    function translatePaymentInstallments() {
        function processNode(node) {
            if (!node || !node.parentNode) return;
            var parentTag = node.parentNode.tagName;
            if (parentTag === 'SCRIPT' || parentTag === 'STYLE' || parentTag === 'NOSCRIPT') return;

            if (node.nodeType === 3 && node.nodeValue) {
                if (node.nodeValue.indexOf('interest-free') !== -1 || node.nodeValue.indexOf('payments of') !== -1) {
                    var val = node.nodeValue;
                    val = val.replace(/or 4 interest-free payments of/gi, 'hoặc 4 kỳ thanh toán không lãi suất chỉ');
                    val = val.replace(/interest-free payments/gi, 'thanh toán không lãi suất');
                    val = val.replace(/ with /gi, ' với ');
                    node.nodeValue = val;
                }
            }
        }

        var walker = document.createTreeWalker(document.body, NodeFilter.SHOW_TEXT, null, false);
        var n;
        while (n = walker.nextNode()) {
            processNode(n);
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', translatePaymentInstallments);
    } else {
        translatePaymentInstallments();
    }

    // Tab Blur / Switch Tab Title Animation Effect ("Your translator is waiting 🌍")
    var originalTitle = document.title;
    var isBlurred = false;
    var titleInterval = null;

    var awayTitles = [
        "Your translator is waiting 🌍",
        "Vasco Translator 🌍",
        "Đừng quên Vasco nhé! 🌍"
    ];
    var titleIndex = 0;

    window.addEventListener('blur', function() {
        isBlurred = true;
        titleIndex = 0;
        document.title = awayTitles[0];
        
        titleInterval = setInterval(function() {
            titleIndex = (titleIndex + 1) % awayTitles.length;
            document.title = awayTitles[titleIndex];
        }, 2000);
    });

    window.addEventListener('focus', function() {
        isBlurred = false;
        if (titleInterval) {
            clearInterval(titleInterval);
            titleInterval = null;
        }
        document.title = originalTitle;
    });
})();
</script>

<!-- Floating Contact Quick Menu Widget (1 Khung Sổ Ra) -->
<div id="vasco-contact-widget-wrapper" style="position: fixed; bottom: 25px; right: 25px; z-index: 999999; display: flex; flex-direction: column; align-items: flex-end;">

	<!-- Quick Contact Popup Box -->
	<div id="vasco-contact-popup" class="vasco-contact-popup" style="display: none; width: 290px; background: #ffffff; border-radius: 18px; box-shadow: 0 12px 40px rgba(0, 0, 0, 0.18); border: 1px solid rgba(0, 0, 0, 0.08); margin-bottom: 14px; overflow: hidden; transform-origin: bottom right; transition: transform 0.25s cubic-bezier(0.16, 1, 0.3, 1), opacity 0.25s ease; opacity: 0;">
		<div style="background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%); padding: 14px 18px; color: #ffffff; display: flex; align-items: center; justify-content: space-between;">
			<div style="display: flex; align-items: center; gap: 8px;">
				<span style="font-weight: 700; font-size: 15px; letter-spacing: 0.3px;">Liên hệ với Vasco VN</span>
			</div>
			<button id="vasco-contact-close-btn" type="button" aria-label="Đóng" style="background: rgba(255,255,255,0.2); border: none; color: #fff; border-radius: 50%; width: 24px; height: 24px; display: flex; align-items: center; justify-content: center; cursor: pointer; padding: 0;">
				<svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
			</button>
		</div>
		<div style="padding: 10px; display: flex; flex-direction: column; gap: 8px; background: #f8fafc;">
			<!-- Option 1: SĐT / Hotline -->
			<a href="tel:1900638400" class="vasco-contact-item" style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; background: #ffffff; border-radius: 12px; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease;">
				<div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 10px rgba(37, 99, 235, 0.35);">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
					</svg>
				</div>
				<div style="display: flex; flex-direction: column;">
					<span style="font-size: 12.5px; font-weight: 700; color: #1e293b;">Số điện thoại Hotline</span>
					<span style="font-size: 13.5px; font-weight: 800; color: #2563EB;">1900.63.8400</span>
				</div>
			</a>

			<!-- Option 2: Zalo Chat -->
			<a href="https://zalo.me/0917834532" target="_blank" rel="noopener noreferrer" class="vasco-contact-item" style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; background: #ffffff; border-radius: 12px; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease;">

				<div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #0068FF 0%, #0052C4 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 10px rgba(0, 104, 255, 0.35);">
					<svg width="24" height="24" viewBox="0 0 32 32" fill="none">
						<path d="M16 3C8.8 3 3 8.4 3 15c0 3.7 1.8 6.9 4.6 9.2L6 29l5.3-2.6c1.5.4 3.1.6 4.7.6 7.2 0 13-5.4 13-12S23.2 3 16 3z" fill="#FFFFFF"/>
						<text x="16" y="18.5" font-family="-apple-system, BlinkMacSystemFont, Arial, sans-serif" font-size="8.5" font-weight="900" fill="#0068FF" text-anchor="middle" letter-spacing="-0.3px">Zalo</text>
					</svg>
				</div>
				<div style="display: flex; flex-direction: column;">
					<span style="font-size: 12.5px; font-weight: 700; color: #1e293b;">Chat qua Zalo</span>
					<span style="font-size: 12px; font-weight: 600; color: #0068FF;">Nhắn tin tư vấn ngay</span>
				</div>
			</a>


			<!-- Option 3: Địa chỉ Hà Nội -->
			<a href="https://www.google.com/maps/place/C%C3%B4ng+Ty+C%C3%B4ng+Ngh%E1%BB%87+Vi%E1%BB%85n+Th%C3%B4ng+Vi%E1%BB%87t+Nam/@21.0085992,105.8147659,20z/data=!4m6!3m5!1s0x3135ac9c09dd5847:0xe0ce01e78ea4164f!8m2!3d21.006971!4d105.815825!16s%2Fg%2F11bbw_4s1h?entry=ttu&amp;g_ep=EgoyMDI2MDgwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer" class="vasco-contact-item" style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; background: #ffffff; border-radius: 12px; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease;">
				<div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #EA4335 0%, #DC2626 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 10px rgba(234, 67, 53, 0.35);">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
						<circle cx="12" cy="10" r="3"></circle>
					</svg>
				</div>
				<div style="display: flex; flex-direction: column;">
					<span style="font-size: 12.5px; font-weight: 700; color: #1e293b;">Văn phòng Hà Nội</span>
					<span style="font-size: 11px; font-weight: 500; color: #64748b; line-height: 1.3;">226 Đường Láng, Đống Đa, HN</span>
				</div>
			</a>

			<!-- Option 4: Địa chỉ TP.HCM -->
			<a href="https://www.google.com/maps/place/137+Ho%C3%A0+H%C6%B0ng,+H%C3%B2a+H%C6%B0ng,+H%E1%BB%93+Ch%C3%AD+Minh,+Vietnam/@10.7778946,106.6715067,20z/data=!4m6!3m5!1s0x31752ed99682b5d1:0x63a96bd76a356b6d!8m2!3d10.7780958!4d106.6716272!16s%2Fg%2F11rmzj4ghr?entry=ttu&amp;g_ep=EgoyMDI2MDgwMy4wIKXMDSoASAFQAw%3D%3D" target="_blank" rel="noopener noreferrer" class="vasco-contact-item" style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; background: #ffffff; border-radius: 12px; text-decoration: none; border: 1px solid #e2e8f0; transition: all 0.2s ease;">
				<div style="width: 38px; height: 38px; border-radius: 10px; background: linear-gradient(135deg, #EA4335 0%, #DC2626 100%); display: flex; align-items: center; justify-content: center; flex-shrink: 0; box-shadow: 0 3px 10px rgba(234, 67, 53, 0.35);">
					<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
						<path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
						<circle cx="12" cy="10" r="3"></circle>
					</svg>
				</div>
				<div style="display: flex; flex-direction: column;">
					<span style="font-size: 12.5px; font-weight: 700; color: #1e293b;">Văn phòng TP.HCM</span>
					<span style="font-size: 11px; font-weight: 500; color: #64748b; line-height: 1.3;">137 Hòa Hưng, P.12, Q.10, HCM</span>
				</div>
			</a>


		</div>
	</div>

	<!-- Floating Main Button -->
	<button id="vasco-floating-hotline" title="Liên hệ tư vấn" type="button" aria-label="Liên hệ tư vấn" style="position: relative; display: flex; align-items: center; justify-content: center; width: 56px; height: 56px; background: linear-gradient(135deg, #2563EB 0%, #1D4ED8 100%); border-radius: 50%; box-shadow: 0 6px 22px rgba(37, 99, 235, 0.55); border: none; cursor: pointer; transition: transform 0.25s ease, box-shadow 0.25s ease; outline: none;">
		<span class="vasco-pulse-ring"></span>
		<svg id="vasco-phone-icon" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" style="transition: transform 0.3s ease;">
			<path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/>
		</svg>
		<svg id="vasco-close-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" style="display: none; transition: transform 0.3s ease;">
			<line x1="18" y1="6" x2="6" y2="18"></line>
			<line x1="6" y1="6" x2="18" y2="18"></line>
		</svg>
	</button>
</div>

<style>
.global-back-to-top, .global-back-to-top-button, [data-global-back-to-top] {
	display: none !important;
	opacity: 0 !important;
	pointer-events: none !important;
}
#vasco-floating-hotline:hover {
	transform: scale(1.08);
	box-shadow: 0 8px 28px rgba(37, 99, 235, 0.75);
}
.vasco-contact-item:hover {
	background: #f1f5f9 !important;
	border-color: #cbd5e1 !important;
	transform: translateX(-3px);
}
.vasco-pulse-ring {
	position: absolute;
	top: -4px;
	left: -4px;
	right: -4px;
	bottom: -4px;
	border-radius: 50%;
	border: 2px solid rgba(37, 99, 235, 0.6);
	animation: vascoPulse 2s infinite;
	pointer-events: none;
}
@keyframes vascoPulse {
	0% {
		transform: scale(1);
		opacity: 0.8;
	}
	70% {
		transform: scale(1.3);
		opacity: 0;
	}
	100% {
		transform: scale(1.3);
		opacity: 0;
	}
}
</style>

<script>
(function() {
	function initContactWidget() {
		var btn = document.getElementById("vasco-floating-hotline");
		var popup = document.getElementById("vasco-contact-popup");
		var closeBtn = document.getElementById("vasco-contact-close-btn");
		var phoneIcon = document.getElementById("vasco-phone-icon");
		var closeIcon = document.getElementById("vasco-close-icon");

		if (!btn || !popup) return;

		function togglePopup(e) {
			if (e) {
				e.preventDefault();
				e.stopPropagation();
			}
			var isOpen = popup.style.display === "block" && popup.style.opacity === "1";

			if (isOpen) {
				closeMenu();
			} else {
				openMenu();
			}
		}

		function openMenu() {
			popup.style.display = "block";
			setTimeout(function() {
				popup.style.transform = "scale(1)";
				popup.style.opacity = "1";
			}, 10);
			if (phoneIcon && closeIcon) {
				phoneIcon.style.display = "none";
				closeIcon.style.display = "block";
			}
		}

		function closeMenu() {
			popup.style.transform = "scale(0.9)";
			popup.style.opacity = "0";
			setTimeout(function() {
				popup.style.display = "none";
			}, 250);
			if (phoneIcon && closeIcon) {
				phoneIcon.style.display = "block";
				closeIcon.style.display = "none";
			}
		}

		btn.addEventListener("click", togglePopup);
		if (closeBtn) {
			closeBtn.addEventListener("click", closeMenu);
		}

		document.addEventListener("click", function(e) {
			var wrapper = document.getElementById("vasco-contact-widget-wrapper");
			if (wrapper && !wrapper.contains(e.target)) {
				closeMenu();
			}
		});
	}

	if (document.readyState === "loading") {
		document.addEventListener("DOMContentLoaded", initContactWidget);
	} else {
		initContactWidget();
	}
})();
</script>




<!-- Mobile Footer Accordion JS -->
<script>
(function() {
    function initFooterAccordion() {
        var headers = document.querySelectorAll('.vasco-menu-grid .footer-column-header');
        headers.forEach(function(header) {
            header.addEventListener('click', function(e) {
                if (window.innerWidth <= 768) {
                    e.preventDefault();
                    e.stopPropagation();
                    var nav = header.closest('.footer-nav');
                    var list = nav ? nav.querySelector('.footer-column-list') : null;
                    var isActive = header.classList.contains('active') || (nav && nav.classList.contains('active'));
                    
                    if (isActive) {
                        header.classList.remove('active');
                        if (nav) nav.classList.remove('active');
                        if (list) {
                            list.classList.remove('open');
                            list.style.display = 'none';
                        }
                    } else {
                        header.classList.add('active');
                        if (nav) nav.classList.add('active');
                        if (list) {
                            list.classList.add('open');
                            list.style.display = 'block';
                        }
                    }
                }
            });
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initFooterAccordion);
    } else {
        initFooterAccordion();
    }
})();
</script>

<?php wp_footer(); ?>
</body>
</html>
