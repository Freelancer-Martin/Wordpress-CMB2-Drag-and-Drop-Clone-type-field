<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class CMB2_Drag_and_Drop_Field {

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



	function get_cool_options() {
			global $wpdb; // this is how you get access to the database

			$cool_options = get_option('cool_json_option_1');
			$data_array = json_decode($cool_options, TRUE);
			print_r($data);
			//echo $cool_options;

			die(); // this is required to return a proper result
	}

	/**** saves ajax Valus here ****/
	 public function save_cool_options() {
			 global $wpdb;


			 $cool_options = get_option('cool_json_option_1');
 			 $data_array = json_decode($cool_options, TRUE);
			 $pure_data_array = array_unique($data_array[0]['id_1']);
			 $nopure_data_array = $data_array[0]['id_1'];
			 $compare = array_intersect($pure_data_array ,$nopure_data_array);

			 /*
			 for ($x = 0; $x <=5 ; $x++) {
				 $itemArray[$x] = array(

					 'email_'.$x.'' => $_POST['email_'.$x.''],
					 'name_'.$x.'' => $_POST['name_'.$x.''],
					 'boxes_'.$x.'' => $_POST['boxes_'.$x.''],
				 );
				 $save_name[$x] = json_encode(array($itemArray[$x]));
				 print_r($data);
				 if(! in_array( array_values($test1) ,$test, TRUE)) {
						update_option("cool_json_option_$x", $save_name[$x]);
				 }

			 }
			 */
			 //$boxes_array_column_top = array_column($boxes, 'top');
		   //$boxes_array_column_left = array_column($boxes, 'left');
		//	foreach ( $data_array[0]['boxes_1'] as $data_key => $data) {
			//	if($data_key%2 != 0){
					//print_r($data_array);
					 for ($x = 1; $x <=5 ; $x++) {
						 $itemArray[$x] = array(

							 'PosTop_'.$x.'' => $_POST['PosTop_'.$x.''],
							 'PosLeft_'.$x.'' => $_POST['PosLeft_'.$x.''],
							 'id_'.$x.'' => $_POST['id_'.$x.''],
						 );
						 $save_name[$x] = json_encode(array($itemArray[$x]));

						 //if( in_array( $data ,$compare, false )) {
							 	update_option("cool_json_option_$x", $save_name[$x]);
						// }

					 }

			// }
		// }
			 echo 'true';

			 die(); // this is required to return a proper result
	 }

    /**
     * Render Address Field
     */
    function cmb2_drag_and_drop_field_callback( $field, $value, $object_id, $object_type, $field_type ) { ?>

      <?php
          $v = get_option('cool_json_option_0');
					$v2 = get_option('cool_json_option_1');

					$address = get_post_meta( get_the_ID(), '_cmb2_drag_and_drop', false );

          $data = json_decode($v, TRUE);
					$data2 = json_decode($v2, TRUE);
          //print_r($data ) . '</br>';
					//print_r($data2 ) . '</br>';
					//print_r($address);
					//print_r(array_chunk($data,3));

?>


        <div class="facet-container">
          <div class="left">

            <ul id="sortable" class="facet-list">
              <li id="image-0" data-post-id="1" class="facet"><p><a  data-popup-open="popup-0"  onclick="save_cool_options()" >Open</a></p>image_0</li>
              <li id="image-1" data-post-id="2" class="facet"><p><a  data-popup-open="popup-1"  onclick="save_cool_options()" >Open</a></p>image_1</li>
              <li id="image-2" data-post-id="3" class="facet"><p><a  data-popup-open="popup-2"  onclick="save_cool_options()" >Open</a></p>image_2</li>
              <li id="image-3" data-post-id="4" class="facet"><p><a  data-popup-open="popup-3"  onclick="save_cool_options()" >Open</a></p>image_3</li>
              <li id="image-4" data-post-id="5" class="facet"><p data-popup-open="popup-4" ><a   onclick="save_cool_options()" >Open</a></p>image_4</li>

            </ul>
						<div id="display"></div>

						<p id="console"></p>

						<p><a   onclick="save_cool_options()" id="nbs-ajax-save">Save Options</a></p>

						<p><a    id="nbs-reset-field">Reset Field</a></p>

						<p><a   onclick="get_cool_options()" id="nbs-ajax-get">Click Here to Get Options</a></p>

          </div>




					<div style="width: 600px; height: 300px;position: relative;"  id="userFacets" class="right facet-list">
							<?php
									 $cool_options = get_option('cool_json_option_1');
									 $data_array = json_decode($cool_options, TRUE);
									 //$boxes = array_unique($data_array[0]['boxes_1']);
									 $id = $data_array[0]['id_1'];
									 $pos_left = $data_array[0]['PosLeft_1'];
									 $pos_top = $data_array[0]['PosTop_1'];
									 if ( ! empty($id) ) {



									 //print_r( $cool_options );
									//print_r(array_unique($boxes));
									//$boxes_array_column_top = array_column($boxes, 'top');
									//$boxes_array_column_left = array_column($boxes, 'left');
									foreach ($id as $xkey => $xvalue) {
													if( ! empty( $xvalue )) {
													//print_r($pos_top[$xkey])	;

													//	if(  $xvalue%2 != 0 ) {   left:'.$xvalue['left'].'px;top:'.$xvalue['top'].'px;
															$box_field = '<li data-popup-open="popup-'.$xkey.'" id="'.$xvalue.'" class=" moved-item facet ui-sortable-handle ui-draggable ui-draggable-handle" style="top: '.$pos_top[$xkey].'; left: '.$pos_left[$xkey].'; display: list-item; position: relative;" >
																	 <a data-popup-open="popup-'.$xkey.'" >Open</a>

																	 <p>'.$xvalue.'</p>
															</li>';
												//	}

												//print_r($xvalue);
												print $box_field;

											}
										}
								}
										?>
					</div>
			</div>
					<?php
					 $cool_options = get_option('cool_json_option_1');
	  			 $data_array = json_decode($cool_options, TRUE);
					// $boxes = array_unique($data_array[0]['boxes_1']);
					// $test = $data_array[0]['boxes_1'];
					//print_r( $test );
					//print_r(array_unique($boxes));
					//$boxes_array_column_top = array_column($boxes, 'top');
				//	$boxes_array_column_left = array_column($boxes, 'left');
					/*
					foreach ($test as $box_key => $box) {
						if(  $box_key%2 != 0){
								print_r($box['top']);
								if(isset($box['top'])) {
									$box_field =
										'<li id="'.$box.'" class="facet ui-sortable-handle moved-item ui-draggable ui-draggable-handle" style="display: list-item; position: relative;left: '.$box['top'].'px;" >
												 <p><a  onclick="save_cool_options()" data-popup-open="popup-'.$box_key.'" >Open</a></p>'.$box.'
										</li>';
							}
							 print $box_field;
						}
  			}
				*/


				//print_r($test)	;

				?>




					<?php $variable = array('name_0', 'name_1', 'name_2', 'name_3', 'name_4', 'name_5');
					if ( ! empty($id) ) {
						array_multisort($id);
						foreach ($id as $key => $value):

							$field =  '<div class="popup" data-popup="popup-'.$key.'">
														<div class="popup-inner">
															<p><a data-popup-close="popup-'.$key.'" href="#">Close</a></p>
																	<div class="form-group">
																		<label for = "name">'.$value.'</label>
																		<input type="text" name = "'.$value.'" class = "form-control input-name-'.$key.'" placeholder="Enter Your Name" />
																	</div>

															<a class="popup-close" data-popup-close="popup-'.$key.'" href="#">x</a>
														</div>
												</div> ';

							print $field;
					 endforeach;
				}


     }


}

new CMB2_Drag_and_Drop_Field('', '');
