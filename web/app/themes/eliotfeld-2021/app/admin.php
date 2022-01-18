<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
    $wp_customize->selective_refresh->add_partial('blogname', [
        'selector' => '.brand',
        'render_callback' => function () {
            bloginfo('name');
        }
    ]);
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

// Register the column
function modified_column_register( $columns ) {
    $columns['modified_list'] = __( 'Modified', 'my-plugin' );
  
    return $columns;
}
add_filter( 'manage_edit-post_columns', 'modified_column_register' );
 
// Display the column content
function modified_column_display( $column_name, $post_id ) {
    if ( 'modified_list' != $column_name )
        return;
    echo the_modified_date();
}
add_action( 'manage_posts_custom_column', 'modified_column_display', 10, 2 );
 
// Register the column as sortable
function modified_column_register_sortable( $columns ) {
    $columns['modified_list'] = 'modified_list';
  
    return $columns;
}
add_filter( 'manage_edit-post_sortable_columns', 'modified_column_register_sortable' );