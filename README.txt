# Wordpress-CMB2-Drag-and-Drop-Clone-type-field
<p style="text-align: left; padding: 20px;">
CMB2 Drag and Drop field type which allows drag and drop between two different containers and display output of predefined options. You could add as many options as you like, after drag and drop item will be cloned back and process starts again,
</p>
<img src="https://github.com/Freelancer-Martin/Wordpress-CMB2-Drag-and-Drop-Clone-type-field/blob/master/screenshot.png"/>
<ul>
<li>  Contributors: Freelancer Martin </li>
<li> Homepage: http://developerforwebsites.com </li>
<li> Tags: CMB2 Field Type: Drag and Drop(Clone) </li>
<li> Requires at least: 3.8.0 </li>
<li> Tested up to: 4.9.1 </li>
<li> Stable tag: 1.0.0 </li>
<li> License: GPLv2 or later </li>
<li> License URI: http://www.gnu.org/licenses/gpl-2.0.html </li>
</ul>

<h3>Contribution</h3>

<p style="text-align: left; padding: 20px;">Development occurs on Github, and all contributions welcome. </p>


<h3>Installation</h3>
<p>If including the library in your plugin or theme:</p>
<ul>
<li>  Upload or Intall the entire /cmb2-drag-and-drop directory to the /wp-content/plugins/ directory. </li>
<li>  Upload the entire plugin directory to the /wp-content/plugins/ directory.</li>
<li> Activate WDS CMB2 Customizer through the 'Plugins' menu in WordPress.</li>
<li>  Copy (and rename if desired) example-functions.php into to your theme or plugin's directory. </li>
<li> Every option added are displayed as item and popup ids, add has many you like (Examples Below:
<pre>

    'options' => array(
      'image-0' => 'Image 0',
      'image-1' => 'Image 1',
      'image-3' => 'Image 3',
      'image-4' => 'Image 4',

    ),

    </pre>)
  will be displayed in first container box  and can be used as setting boxes.
  </li>

<li> Edit to only include the fields you need and rename the functions (CMB2 directory should be left unedited in order to easily update the library).</li>
<li> Profit. </li>
</ul>
  <h3>Features</h3>
<p style="text-align: left; padding: 20px;">
CMB2 Drag and Drop field type allows you to add many drag and drop elements ass you like. Just add extra options under cmb2 tab and all elements are displayed in first box. After dragging one element to second box , the same element is cloned in first box and dragged element will be included to second box and will receive unique ID. With this Id all elements are displayed as they are. Plugin work basic at the moment, in future there will be some extra stuff.
</p>


 <h3>Example Code Usage for displaying settings Back-end</h3>
<pre>
$cmb_demo->add_field( array(
    'name' => 'Drag and Drop field',
    //'desc' => 'Custom Address Field',
    'id'   => '_cmb2_drag_and_drop',
    'type' => 'cmb2_drag_and_drop',

    'options' => array(
      'image-0' => 'Image 0',
      'image-1' => 'Image 1',
      'image-2' => 'Image 2',
      'image-3' => 'Image 3',

    ),


) );
  </pre>
<h3>Code Example to display List in front end</h3>
<p> Because field type uses ajax for save you have to use other way to display settings, as example Below
<pre>
$cool_options = get_option('drag_and_drop_option');
			$data_array = json_decode($cool_options, TRUE);
			print_r($data_array);
			while ( have_posts() ) :
</pre>
