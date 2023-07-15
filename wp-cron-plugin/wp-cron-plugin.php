<?php


/* 

Plugin Name: WP cron plugin

Plugin URI:

Description: Create log file text content every 10min

Version: 1.0.0

Author: Hosni Abbes

*/




// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
    die;
}

define( 'CT_WP_ADMIN_VERSION', '1.0.0' );
defined( 'ABSPATH' ) || exit;

/**
 * Includes
 */
require plugin_dir_path( __FILE__ ) . 'includes/functions.php';
require plugin_dir_path( __FILE__ ) . 'includes/create-log-folder.php';


// On activate plugin
function activation_initial_functions() {
    createLogFolder();
}
register_activation_hook(__FILE__, 'activation_initial_functions');
