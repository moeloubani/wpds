<?php
/*
  Plugin Name: WP Dash Support
  Description: Get help from your developer right from your website with this plugin.
  Version: 1.0
  Author: Moe Loubani
  Author URI: http://www.moeloubani.com
  License: GPLv2
 */

//Declare a couple of useful constants
define( 'WPDS_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WPDS_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once('lib/systemreport/system-snapshot-report.php');
require_once('inc/class-mail.php');
require_once('inc/class-dashboard.php');
require_once('inc/class-settings.php');
require_once('inc/class-init.php');