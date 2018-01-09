<?php
/**
 * @package      CMB2 Drag and Drop - Clone field type with AJAX saving
 * @author       Freelancer Martin
 * @copyright    Copyright (c) Freelancer Martin
 *
 * Plugin Name: CMB2 Field Type: Drag and Drop(Clone)
 * Plugin URI: https://github.com/Freelancer-Martin/Wordpress-CMB2-Drag-and-Drop-Clone-type-field
 * GitHub Plugin URI: https://github.com/Freelancer-Martin/Wordpress-CMB2-Drag-and-Drop-Clone-type-field
 * Description: CMB2 Drag and Drop field type which allows drag and drop between two different containers and display output of predefined options. You could add as many options as you like, after drag and drop item will be cloned back and process starts again,
 * Version: 1.0.1
 * Author: Freelancer Martin
 * Author URI: https://developerforwebsites.com/
 * License: GPLv3+
 */
// Exit if accessed directly

if( !defined( 'ABSPATH' ) ) exit;
if( !class_exists( 'CMB2_Field_Drag_And_drop' ) ) {
    /**
     * Class CMB2_Field_Drag_And_drop
     */
    class CMB2_Field_Drag_And_drop{
        /**
         * Current version number
         */
        const VERSION = '1.0.1';
        /**
         * Initialize the plugin by hooking into CMB2
         */
        public function __construct() {
            register_activation_hook(__FILE__,  array($this, 'activation'));
            register_deactivation_hook(__FILE__,  array($this, 'deactivation'));
            add_action( 'admin_enqueue_scripts', array( $this, 'setup_admin_scripts' ) );
            add_action( 'wp_enqueue_scripts',  array( $this, 'setup_admin_scripts' ) );
            add_action('admin_head',  array( $this, 'setup_admin_scripts' ) );
            add_action('admin_init',  array( $this, 'setup_admin_scripts' ));
            add_action( 'cmb2_render_drag_and_drop', array( $this, 'render' ), 10, 5 );
            add_action( 'cmb2_sanitize_drag_and_drop', array( $this, 'sanitize' ), 10, 4 );
            add_action('wp_ajax_save_cool_options',  array($this, 'save_cool_options'));
            //add_action('wp_ajax_get_cool_options',  array($this, 'get_cool_options'));
        }

        /**** ACTIVATION ****/

        function activation() {
            require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        }

        /**** DEACTIVATION ****/
        function deactivation() {
            /* Nothing to do here */
        }
/*
        public function get_cool_options() {
            global $wpdb; // this is how you get access to the database

            $cool_options = get_option('example_1');
            echo $cool_options;

            die(); // this is required to return a proper result
        }
*/
        /**** saves ajax Valus here ****/
        public function save_cool_options() {
            global $wpdb;

            for ($x = 1; $x <=3 ; $x++) {
              $itemArray[$x] = array(
                $_POST["example_$x"],
              );
              $save_name[$x] = json_encode(array($itemArray[$x]));
              update_option("example_$x", $save_name[$x]);
            }
            echo 'true';

            die(); // this is required to return a proper result
        }
        /**
         * Render field
         */
        public function render( $field, $value, $object_id, $object_type, $field_type ) {
            $field_name = $field->_name();
            $options = (array) $field->args( 'options' );
            if ( is_callable( $field->args( 'options_cb' ) ) ) {
                $options_cb = call_user_func( $field->args( 'options_cb' ), $field );
                if ( $options_cb && is_array( $options_cb ) ) {
                    $options = $options_cb + $options;
                }
            }
            if( $options && is_array( $options ) ) {
                if( ! isset( $value ) || empty( $value ) || ! is_array( $value ) ) {
                    $value = array();
                    // Initialize value if not exists or is empty
                    foreach( $options as $key => $option) {
                        $value[] = $key;
                    }
                } else {
                    // Check if all options exists in $value
                    foreach( $options as $key => $option) {
                        if( ! in_array( $key, $value ) ) {
                            $value[] = $key;
                        }
                    }
                } ?>

<?php  //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ?>
              <body>
              <div class="col-lg-12"   >
                <div id="grid-2" style="height: 100px, width 100px;" class="grid grid-2">
                  <?php
                        $items = $options;
                        $subject = get_option('example_1');
                        preg_match_all('!\d+!', $subject, $opt_matches);
                        $keywords = preg_split("/[\s,]+/", $subject);
                        $item_name = str_replace(array('undefined', '[',']','{','}',':', '"'),"", $subject);
                        $new_item_name = preg_split("/[\s,]+/", $item_name);
                        // print_r(get_option('example_1'););
                        if(! empty(array_values($opt_matches[0]))){
                          for ($x = 0; $x <=(count(array_values($keywords)) -1) ; $x++) {
                            echo '<div id="delete_item" class="item">';
                            echo '<div data-name="'.array_values($new_item_name)[$x].'"   class="item-content">'.array_values($new_item_name)[$x].'</div>';
                            echo '</div>';
                          }
                      }
                        ?>
                </div>
                </div>
              <div class="col-lg-12"   >
                      <div id="grid-1"  class="grid grid-1">
                        <?php

                        for ($x = 0; $x <=(count($items) -1) ; $x++) {
                          echo '<div class="item">';
                          echo '<div  name="'.array_values($items)[$x].'" id="'.array_values($items)[$x].'"   class="item-content">'.array_values($items)[$x].'</div>';
                          echo '</div>';



                        } ?>


                    </div>
              </div>

              <div class="button-container"   >

                <a  style="width: 150px;padding:10px; background-color: black; color: white;margin-right: 15px;"  id="nbs-ajax-save">Save Options</a>
                  <?php
                  for ($x = 0; $x < 1  ; $x++) {
                        echo '<span><a  id="delete-button-'.array_values($items)[$x].'" style="position: relative; height:20px; width: 15px;padding:10px;z-index: 2222; background-color: black; color: white;margin: 5px;" >Remove Elements</a></span>';
                      }
                      ?>

              </div>

              <script src='https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.3.1/web-animations.min.js'></script>
              <script src='https://cdnjs.cloudflare.com/ajax/libs/hammer.js/2.0.8/hammer.min.js'></script>
              <script src='https://cdnjs.cloudflare.com/ajax/libs/muuri/0.5.3/muuri.min.js'></script>
              <?php

                for ($x = 0; $x <=(count($items) ) ; $x++) {
                echo '<script>
                      jQuery( document ).ready( function( $ ){

                            $("#delete-button-'.array_values($items)[$x].'").click(function(){
                                $("#delete_item").remove()
                            });
                      });
                    </script>';
                  }

                ?>

<?php  //----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- ?>
            <?php
            }

            $field_type->_desc( true, true );

        }

        public function sanitize( $override_value, $value, $object_id, $field_args ) {
            $fid = $field_args['id'];

            if( $field_args['render_row_cb'][0]->data_to_save[$fid] ) {
                $value = $field_args['render_row_cb'][0]->data_to_save[$fid];
            } else {
                $value = false;
            }

            return $value;
        }

        /**
         * Enqueue scripts and styles
         */
        public function setup_admin_scripts() {
          $pluginDirectory = plugins_url() .'/'. basename(dirname(__FILE__));

          wp_enqueue_script("nbs-wp-index", $pluginDirectory . '/index.js');
          wp_enqueue_style("nbs-wp-style", $pluginDirectory . '/style.css');

        }
        //add_action( 'wp_enqueue_scripts', 'setup_admin_scripts' );
    }

    $cmb2_field_drag_and_drop = new CMB2_Field_Drag_And_drop();
}
