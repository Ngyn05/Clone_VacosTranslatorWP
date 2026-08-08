<?php
/**
 * Single Product Template (WooCommerce / Custom Product Detail)
 *
 * @package VascoTheme
 */

global $post;
$slug = ! empty( $GLOBALS['vasco_current_product_slug'] ) ? sanitize_title( $GLOBALS['vasco_current_product_slug'] ) : ( $post ? $post->post_name : '' );
$slug = preg_replace( '/\.html$/', '', $slug );

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

$template_in_dir  = VASCO_THEME_DIR . '/templates/products/page-' . $slug . '.php';
$template_in_root = VASCO_THEME_DIR . '/page-' . $slug . '.php';
$default_template = VASCO_THEME_DIR . '/templates/products/page-vasco-translator-q1.php';

get_header();
vasco_theme_render_product_detail_page( $slug );
get_footer();


