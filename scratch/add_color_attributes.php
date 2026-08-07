<?php
require_once dirname(__DIR__) . '/wp-load.php';

if ( ! class_exists( 'WooCommerce' ) ) {
    die("WooCommerce is not active.\n");
}

// Ensure attribute taxonomy pa_color exists
$attribute_slug = 'color';
$attribute_name = 'Color';

$attribute_id = wc_attribute_taxonomy_id_by_name( $attribute_slug );

if ( ! $attribute_id ) {
    $attribute_id = wc_create_attribute( array(
        'name'         => $attribute_name,
        'slug'         => $attribute_slug,
        'type'         => 'select',
        'order_by'     => 'menu_order',
        'has_archives' => false,
    ) );
    echo "Created WooCommerce Attribute 'pa_color' (ID: $attribute_id)\n";
} else {
    echo "Attribute 'pa_color' already exists (ID: $attribute_id)\n";
}

// Register taxonomy if not yet registered in current request
$taxonomy = 'pa_color';
if ( ! taxonomy_exists( $taxonomy ) ) {
    register_taxonomy( $taxonomy, array( 'product' ), array(
        'label'        => 'Color',
        'public'       => false,
        'hierarchical' => false,
        'show_ui'      => false,
    ) );
}

// Colors definition per product slug
$product_colors = array(
    'vasco-translator-q1' => array(
        array( 'slug' => 'phantom-black', 'name' => 'Phantom Black' ),
        array( 'slug' => 'slate-blue', 'name' => 'Slate Blue' ),
        array( 'slug' => 'mystic-plum', 'name' => 'Mystic Plum' ),
        array( 'slug' => 'scarlet-pulse', 'name' => 'Scarlet Pulse' ),
    ),
    'vasco-translator-m4' => array(
        array( 'slug' => 'matte-black', 'name' => 'Matte Black' ),
        array( 'slug' => 'frosty-turquoise', 'name' => 'Frosty Turquoise' ),
        array( 'slug' => 'misty-purple', 'name' => 'Misty Purple' ),
    ),
    'vasco-translator-v4' => array(
        array( 'slug' => 'black-onyx', 'name' => 'Black Onyx' ),
        array( 'slug' => 'stone-gray', 'name' => 'Stone Gray' ),
        array( 'slug' => 'cobalt-blue', 'name' => 'Cobalt Blue' ),
        array( 'slug' => 'ruby-red', 'name' => 'Ruby Red' ),
        array( 'slug' => 'pearl-white', 'name' => 'Pearl White' ),
    ),
    'q1-phantomblack-e1' => array(
        array( 'slug' => 'phantom-black', 'name' => 'Phantom Black' ),
        array( 'slug' => 'slate-blue', 'name' => 'Slate Blue' ),
        array( 'slug' => 'mystic-plum', 'name' => 'Mystic Plum' ),
        array( 'slug' => 'scarlet-pulse', 'name' => 'Scarlet Pulse' ),
    ),
    'v4-blackonyx-e1' => array(
        array( 'slug' => 'black-onyx', 'name' => 'Black Onyx' ),
        array( 'slug' => 'stone-gray', 'name' => 'Stone Gray' ),
        array( 'slug' => 'cobalt-blue', 'name' => 'Cobalt Blue' ),
        array( 'slug' => 'ruby-red', 'name' => 'Ruby Red' ),
        array( 'slug' => 'pearl-white', 'name' => 'Pearl White' ),
    ),
);

foreach ( $product_colors as $product_slug => $colors ) {
    $product_post = get_page_by_path( $product_slug, OBJECT, 'product' );
    if ( ! $product_post ) {
        echo "Product not found: $product_slug\n";
        continue;
    }

    $product_id = $product_post->ID;
    $term_slugs = array();

    foreach ( $colors as $c ) {
        $term = get_term_by( 'slug', $c['slug'], $taxonomy );
        if ( ! $term ) {
            $inserted = wp_insert_term( $c['name'], $taxonomy, array( 'slug' => $c['slug'] ) );
            if ( ! is_wp_error( $inserted ) ) {
                $term_slugs[] = $c['slug'];
                echo "  Inserted term: {$c['name']} ({$c['slug']})\n";
            }
        } else {
            $term_slugs[] = $c['slug'];
        }
    }

    // Set terms for product
    wp_set_object_terms( $product_id, $term_slugs, $taxonomy );

    // Set product attributes meta
    $attributes = get_post_meta( $product_id, '_product_attributes', true );
    if ( ! is_array( $attributes ) ) {
        $attributes = array();
    }

    $attributes['pa_color'] = array(
        'name'         => 'pa_color',
        'value'        => '',
        'position'     => 0,
        'is_visible'   => 1,
        'is_variation' => 0,
        'is_taxonomy'  => 1,
    );

    update_post_meta( $product_id, '_product_attributes', $attributes );
    echo "Updated product ID $product_id ($product_slug) with color terms: " . implode( ', ', $term_slugs ) . "\n";
}

echo "DONE adding color attributes to WooCommerce products.\n";
