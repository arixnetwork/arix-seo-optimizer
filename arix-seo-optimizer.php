<?php
/**
 * Plugin Name: ARIX SEO Optimizer
 * Plugin URI: https://github.com/arixnetwork/arix-seo-optimizer
 * Description: Professional-grade WordPress SEO plugin with all premium features
 * Version: 1.0.0
 * Author: ARIX Network
 * Author URI: https://arixnetwork.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: arix-seo-optimizer
 * Domain Path: /languages
 * Requires at least: 5.0
 * Requires PHP: 7.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'ARIX_SEO_VERSION', '1.0.0' );
define( 'ARIX_SEO_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'ARIX_SEO_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'ARIX_SEO_PLUGIN_FILE', __FILE__ );
define( 'ARIX_SEO_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

require_once ARIX_SEO_PLUGIN_DIR . 'includes/class-arix-seo-plugin.php';

function arix_seo_init() {
    $plugin = new ARIX_SEO_Plugin();
    $plugin->run();
}

add_action( 'plugins_loaded', 'arix_seo_init' );

function arix_seo_activate() {
    do_action( 'arix_seo_activate' );
    flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'arix_seo_activate' );

function arix_seo_deactivate() {
    do_action( 'arix_seo_deactivate' );
    flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'arix_seo_deactivate' );

require_once ARIX_SEO_PLUGIN_DIR . 'uninstall.php';