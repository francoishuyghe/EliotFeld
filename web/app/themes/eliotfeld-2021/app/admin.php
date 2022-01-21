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
    $columns['modified_list'] = __( 'Modified', 'Sage' );
  
    return $columns;
}
add_filter( 'manage_edit-ballet_columns', __NAMESPACE__ . '\\modified_column_register' );
 
// Display the column content
function modified_column_display( $column_name, $post_id ) {
    if ( 'modified_list' != $column_name )
        return;
    echo the_modified_date();
}
add_action( 'manage_ballet_posts_custom_column', __NAMESPACE__ . '\\modified_column_display', 10, 2 );
 
// Register the column as sortable
function modified_column_register_sortable( $columns ) {
    $columns['modified_list'] = 'modified_list';
  
    return $columns;
}
add_filter( 'manage_edit-ballet_sortable_columns', __NAMESPACE__ . '\\modified_column_register_sortable' );

// Sorting function
function ballets_orderby_custom_column( $query ) {
    global $pagenow;

    if ( ! is_admin() || 'edit.php' != $pagenow || ! $query->is_main_query() || 'ballet' != $query->get( 'post_type' ) )  {
        return;
    }

    $orderby = $query->get( 'orderby' );

    switch ( $orderby ) {
        case 'modified_list':
            $query->set( 'orderby', 'modified' );
            break;

        default:
            break;
    }

}
add_action( 'pre_get_posts', __NAMESPACE__ . '\\ballets_orderby_custom_column' );