<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       www.developerforwebsites.com
 * @since      1.0.0
 *
 * @package    Cmb2_Drag_And_Drop
 * @subpackage Cmb2_Drag_And_Drop/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Cmb2_Drag_And_Drop
 * @subpackage Cmb2_Drag_And_Drop/includes
 * @author     Freelancer Martin <developerforwebsites@gmail.com>
 */
class Cmb2_Drag_And_Drop_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'cmb2-drag-and-drop',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
