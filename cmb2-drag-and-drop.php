<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              www.developerforwebsites.com
 * @since             1.0.0
 * @package           Cmb2_Drag_And_Drop
 *
 * @wordpress-plugin
 * Plugin Name:       CMB2 Drag and Drop
 * Plugin URI:        www.github.com
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Freelancer Martin
 * Author URI:        www.developerforwebsites.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cmb2-drag-and-drop
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cmb2-drag-and-drop-activator.php
 */
function activate_cmb2_drag_and_drop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cmb2-drag-and-drop-activator.php';
	Cmb2_Drag_And_Drop_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cmb2-drag-and-drop-deactivator.php
 */
function deactivate_cmb2_drag_and_drop() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cmb2-drag-and-drop-deactivator.php';
	Cmb2_Drag_And_Drop_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cmb2_drag_and_drop' );
register_deactivation_hook( __FILE__, 'deactivate_cmb2_drag_and_drop' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cmb2-drag-and-drop.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cmb2_drag_and_drop() {

	$plugin = new Cmb2_Drag_And_Drop();
	$plugin->run();

}
run_cmb2_drag_and_drop();
