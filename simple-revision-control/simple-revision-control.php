<?php
/**
 * Simple Revision Control
 *
 * @package           simple-revision-control
 * @author            Marcin Pietrzak
 * @copyright         2013-2025 Marcin Pietrzak (marcin@iworks.pl)
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Simple Revision Control
 * Plugin URI:        http://iworks.pl/en/plugins/simple-revision-control/
 * Description:       Simple Revision Control is a plugin which gives the user simple control over the Revision functionality.
 * Version:           2.2.1
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            Marcin Pietrzak
 * Author URI:        http://iworks.pl/
 * Text Domain:       simple-revision-control
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * static options
 */
define( 'SIMPLE_REVISION_CONTROL_VERSION', '2.2.1' );
define( 'SIMPLE_REVISION_CONTROL_PREFIX', 'simple_revision_control_' );

// require_once dirname(__FILE__).'/includes/common.php';

/**
 * static options
 */
$base     = dirname( __FILE__ );
$includes = $base . '/includes';

/**
 * get plugin settings
 *
 * @since 1.0.1
 */
include_once $base . '/etc/options.php';

/**
 * @since 1.0.6
 */
if ( ! class_exists( 'iworks_options' ) ) {
	include_once $includes . '/iworks/options/options.php';
}

/**
 * load
 */
require_once $includes . '/iworks/simple-revision-control/class-simple-revision-control.php';

/**
 * run
 */
new iWorks_Simple_Revision_Control;


/**
 * load options
 *
 * since 2.6.8
 *
 */
global $simple_revision_control_options;
$simple_revision_control_options = null;

function get_simple_revision_control_options() {
	global $simple_revision_control_options;
	if ( is_object( $simple_revision_control_options ) ) {
		return $simple_revision_control_options;
	}
	$simple_revision_control_options = new iworks_options();
	$simple_revision_control_options->set_option_function_name( 'simple_revision_control_options' );
	$simple_revision_control_options->set_option_prefix( 'simple_revision_control_' );
	if ( method_exists( $simple_revision_control_options, 'set_plugin' ) ) {
		$simple_revision_control_options->set_plugin( basename( __FILE__ ) );
	}
	return $simple_revision_control_options;
}

