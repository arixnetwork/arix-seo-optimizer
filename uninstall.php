<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

global $wpdb;

// Delete all plugin options
delete_option( 'arix_seo_settings' );

// Delete all post meta
$wpdb->query( "DELETE FROM {$wpdb->postmeta} WHERE meta_key LIKE '_arix_%'" );

// Drop plugin tables
$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}arix_seo_redirects" );
$wpdb->query( "DROP TABLE IF EXISTS {$wpdb->prefix}arix_seo_keywords" );