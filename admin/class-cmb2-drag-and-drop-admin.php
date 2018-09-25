<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       www.developerforwebsites.com
 * @since      1.0.0
 *
 * @package    Cmb2_Drag_And_Drop
 * @subpackage Cmb2_Drag_And_Drop/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cmb2_Drag_And_Drop
 * @subpackage Cmb2_Drag_And_Drop/admin
 * @author     Freelancer Martin <developerforwebsites@gmail.com>
 */
class Cmb2_Drag_And_Drop_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Cmb2_Drag_And_Drop_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cmb2_Drag_And_Drop_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cmb2-drag-and-drop-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {



		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cmb2-drag-and-drop-admin.js', array( 'jquery', 'jquery-ui-core' ,'jquery-ui-droppable','jquery-ui-draggable', 'jquery-ui-sortable' ), $this->version, false );




	}




}
