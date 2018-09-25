<?php
function save_cool_options() {
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


add_action( 'wp_ajax_save_cool_options', 'save_cool_options' );


function example_ajax_request() {

    // The $_REQUEST contains all the data sent via ajax
    if ( isset($_REQUEST) ) {

        $fruit = $_REQUEST['example_1'];

        // Let's take the data that was sent and do something with it
        //if ( $fruit == 'Banana' ) {
            //$fruit = 'example_1';
        //}

        // Now we'll return it to the javascript function
        // Anything outputted will be returned in the response
        echo $fruit;

        // If you're debugging, it might be useful to see what was sent in the $_REQUEST
        // print_r($_REQUEST);

    }

    // Always die in functions echoing ajax content
   die();
}
