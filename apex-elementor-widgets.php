<?php
/**
 * Plugin Name:     Apex Elementor Widgets
 * Plugin URI:      https://yoursite.com
 * Description:     Custom Elementor widgets for the Apex landing page.
 * Version:         1.0.0
 * Author:          Your Name
 * Author URI:      https://yoursite.com
 * Text Domain:     apex-widgets
 * Requires Plugins: elementor
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Block direct access

// ── 1. Define Constants ────────────────────────────────────────────
define( 'APEX_WIDGETS_VERSION',  '1.0.0' );
define( 'APEX_WIDGETS_PATH',     plugin_dir_path( __FILE__ ) );
define( 'APEX_WIDGETS_URL',      plugin_dir_url( __FILE__ ) );

// ── 2. Check Elementor is active before doing anything ─────────────
function apex_widgets_check_elementor() {
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', function() {
            echo '<div class="notice notice-error"><p>';
            echo '<strong>Apex Widgets</strong> requires <strong>Elementor</strong> to be installed and activated.';
            echo '</p></div>';
        });
        return false;
    }
    return true;
}

// ── 3. Register Widget Category ────────────────────────────────────
function apex_widgets_register_category( $elements_manager ) {
    $elements_manager->add_category(
        'apex-widgets',
        [
            'title' => __( 'Apex Widgets', 'apex-widgets' ),
            'icon'  => 'eicon-font',
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'apex_widgets_register_category' );

// ── 4. Auto-load all widget files and register them ────────────────
function apex_widgets_register_all() {

    if ( ! apex_widgets_check_elementor() ) return;

    // Every widget file dropped in /widgets/ is auto-loaded
    $widget_files = glob( APEX_WIDGETS_PATH . 'widgets/*.php' );
    //print APEX_WIDGETS_PATH;exit;
    //print_r($widget_files);
    foreach ( $widget_files as $file ) {
        require_once $file;

        // Convert filename to class name
        // e.g. navbar-widget.php → Apex_Navbar_Widget
        $filename   = basename( $file, '.php' );          // navbar-widget
        $parts      = explode( '-', $filename );           // ['navbar', 'widget']
        $class_name = implode( '_', array_map( 'ucfirst', $parts ) ); // Navbar_Widget
        $class_name = 'Apex_' . $class_name;              // Apex_Navbar_Widget

        if ( class_exists( $class_name ) ) {
            \Elementor\Plugin::instance()->widgets_manager->register( new $class_name() );
        }
    }
}
add_action( 'elementor/widgets/register', 'apex_widgets_register_all' ); 