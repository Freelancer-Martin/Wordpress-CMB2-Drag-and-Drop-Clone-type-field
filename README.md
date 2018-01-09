# Wordpress-CMB2-Drag-and-Drop-Clone-type-field
<p style="text-align: left; padding: 20px;">
CMB2 Drag and Drop field type which allows drag and drop between two different containers and display output of predefined options. You could add as many options as you like, after drag and drop item will be cloned back and process starts again,
</p>
<img src="https://github.com/Freelancer-Martin/Wordpress-CMB2-Drag-and-Drop-Clone-type-field/blob/master/Screen%20Shot%202018-01-09%20at%2015.15.38.png"/>
<ul>
<li>  Contributors: Freelancer Martin </li> 
<li> Homepage: https://developerforwebsites.com </li> 
<li> Tags: CMB2 Field Type: Drag and Drop(Clone) </li> 
<li> Requires at least: 3.8.0 </li> 
<li> Tested up to: 4.9.1 </li> 
<li> Stable tag: 1.0.1 </li> 
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
<li> Every option added (Examples Below: <pre>'options'       => array(
			'option'  => __('Option', 'cmb2'),
			'text'  => __('Text', 'cmb2'),
			'image'  => __('Image', 'cmb2'),
		)</pre>)
  will be displayed in first container box (Image: red Color) and can be used as setting boxes.
  </li> 
  <li>Every box what is dragged to container nr 2 receive unique ID and boxes are displayed same order as (Look @ Image: Green Boxes)  are displayed </li>
<li> Edit to only include the fields you need and rename the functions (CMB2 directory should be left unedited in order to easily update the library).</li> 
<li> Profit. </li> 
</ul>
  <h3>Features</h3>
<p style="text-align: left; padding: 20px;">
CMB2 Drag and Drop field type allows you to add many drag and drop elements ass you like. Just add extra options under cmb2 tab and all elements are displayed in first box. After dragging one element to second box , the same element is cloned in first box and dragged element will be included to second box and will receive unique ID. With this Id all elements are displayed as they are. Plugin work basic at the moment, in future there will be some extra stuff.
</p>
<h3>3rd Party Resources</h3>
<p style="text-align: left; padding: 20px;">
Muuri 
Muuri is a magical JavaScript layout engine that allows you to build all kinds of layouts and make them responsive, sortable, filterable, draggable and/or animated. Comparing to what's out there Muuri is a combination of Packery, Masonry, Isotope and Sortable. Wanna see it in action? Check out the demo on the website.
<p>Visit Framework : <a href="https://github.com/haltu/muuri">Click Here</a> </p>
</p>
 <h3>Example Code Usage for displaying settings Back-end</h3> 
<pre>	$cmb_demo->add_field( array(
		'name'          => __( 'CMB2 Drag and Drop Order', 'cmb2' ),
		//'desc'          => __( 'field description (optional)', 'cmb2' ),
		'id'            => $prefix . '_order',
		'type'          => 'drag_and_drop',
		// 'inline'        => true,
		'options'       => array(
			'option'  => __('Option', 'cmb2'),
			'text'  => __('Text', 'cmb2'),
			'image'  => __('Image', 'cmb2'),
		),
	) );</pre>
<h1>Code Example to display List in front end</h1> 
<pre >
$subject = get_option('example_1');
$item_name = str_replace(array('undefined', '[',']','{','}',':', '"'),"", $subject);
$new_item_name = preg_split("/[\s,]+/", $item_name);
foreach ($new_item_name as $key){
    echo '<a>'.$key.'</a>' . '<br>';
}
</pre>
<h3>Know Issues</h3>
<ul>
<li>If one box exist and is saved and you include extra boxes and save again, first box will disapare</li>
<li>After Ajax Save you have reloade page to see results</li>

</ul>
