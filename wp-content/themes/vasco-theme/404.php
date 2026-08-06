<?php
/**
 * 404 Error Page Template
 *
 * @package VascoTheme
 */

$request_uri = $_SERVER['REQUEST_URI'] ?? '';
$path        = trim( parse_url( $request_uri, PHP_URL_PATH ), '/' );
$parts       = explode( '/', $path );
$slug        = end( $parts );
$slug        = preg_replace( '/\.html$/', '', (string) $slug );
$slug        = sanitize_title( $slug );

if ( ! empty( $slug ) ) {
	$aliases = array(
		'q1'                                                         => 'vasco-translator-q1',
		'v4'                                                         => 'vasco-translator-v4',
		'm4'                                                         => 'vasco-translator-m4',
		'e1'                                                         => 'vasco-translator-e1',
		'vasco-q1'                                                   => 'vasco-translator-q1',
		'vasco-v4'                                                   => 'vasco-translator-v4',
		'vasco-m4'                                                   => 'vasco-translator-m4',
		'vasco-e1'                                                   => 'vasco-translator-e1',
		'q1-slateblue-e1'                                           => 'q1-phantomblack-e1',
		'q1-mysticplum-e1'                                          => 'q1-phantomblack-e1',
		'q1-scarletpulse-e1'                                         => 'q1-phantomblack-e1',
		'v4-stonegray-e1'                                           => 'v4-blackonyx-e1',
		'v4-cobaltblue-e1'                                          => 'v4-blackonyx-e1',
		'v4-rubyred-e1'                                             => 'v4-blackonyx-e1',
		'v4-pearlwhite-e1'                                          => 'v4-blackonyx-e1',
		'zipped-case-for-vasco-translator-q1'                        => 'case-for-vasco-translator-q1',
		'case-q1'                                                    => 'case-for-vasco-translator-q1',
		'zipped-case-for-vasco-translator-v4'                        => 'case-for-vasco-translator-v4',
		'case-v4'                                                    => 'case-for-vasco-translator-v4',
		'zipped-case-for-vasco-translator-m4'                        => 'case-for-vasco-translator-m4',
		'case-m4'                                                    => 'case-for-vasco-translator-m4',
		'light-case-q1'                                              => 'light-case-for-vasco-translator-q1',
		'light-case-m4'                                              => 'light-case-for-vasco-translator-m4',
		'tempered-glass-screen-protector-for-vasco-translator-q1'    => 'tempered-glass-q1',
		'screen-protector-for-vasco-translator-q1'                 => 'tempered-glass-q1',
		'tempered-glass-screen-protector-for-vasco-translator-v4'    => 'tempered-glass-v4',
		'screen-protector-for-vasco-translator-v4'                 => 'tempered-glass-v4',
		'tempered-glass-screen-protector-for-vasco-translator-m4'    => 'tempered-glass-m4',
		'screen-protector-for-vasco-translator-m4'                 => 'tempered-glass-m4',
		'power-adapter-us-plug'                                      => 'power-adapter-us',
		'power-adapter-us-plug-name'                                 => 'power-adapter-us',
		'phone-call-translator-top-up'                               => 'call-translator',
		'phone-call-translator'                                      => 'call-translator',
	);

	if ( isset( $aliases[ $slug ] ) ) {
		$slug = $aliases[ $slug ];
	}

	$product_file = VASCO_THEME_DIR . '/templates/products/page-' . $slug . '.php';
	if ( file_exists( $product_file ) ) {
		include $product_file;
		exit;
	}

	// Dynamic fallback for any product/translators/accessories route
	if ( strpos( $request_uri, '/product/' ) !== false || strpos( $request_uri, '/translators/' ) !== false || strpos( $request_uri, '/accessories/' ) !== false ) {
		$default_file = VASCO_THEME_DIR . '/templates/products/page-vasco-translator-q1.php';
		if ( file_exists( $default_file ) ) {
			include $default_file;
			exit;
		}
	}
}

get_header();
?>

<div class="container my-5 py-5 text-center">
	<div class="card p-5 shadow-sm border-0 max-w-500 mx-auto">
		<h1 class="display-3 font-weight-bold text-primary mb-3">404</h1>
		<h2 class="h4 mb-3">Không Tìm Thấy Trang</h2>
		<p class="text-secondary mb-4">Trang thông tin bạn chọn đang được cập nhật thêm nội dung. Bạn có thể quay lại trang chủ để khám phá các sản phẩm máy phiên dịch mới nhất.</p>
		<div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary rounded-pill px-4">Quay Về Trang Chủ</a>
		</div>
	</div>
</div>

<?php
get_footer();
