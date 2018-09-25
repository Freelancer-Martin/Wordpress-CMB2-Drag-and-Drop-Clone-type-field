jQuery(document).ready(function($) {
	// get the last DIV which ID starts with ^= "klon"
	var $div = $('li[id^="image"]:first');

	// Read the Number from that DIV's ID (i.e: 3 from "klon3")
	// And increment that number by 1
	var num = parseInt( $div.prop("id").match(/\d+/g), 10 ) +1;

	// Clone it and assign the new ID (i.e: from num 4 to ID "klon4")
	var $klon = $div.clone().prop('id', 'image'+num );
	var cities = [];
	var ItemArray = [];
	var positionionsLeft = [];
	var positionionsTop = [];
	$(function() {
	$('#allFacets').sortable({
		connectWith: '.right',
		delay: 150,
		helper: "clone",
		placeholder: 'placeholder',
		start: function(e, ui) {
			ui.item.show(); // force jquery ui to display the original
		}
	});


	$('#sortable').sortable({
	connectWith: '.right',
	delay: 150,
	helper: "clone",
	placeholder: 'placeholder',

	update: function(event, ui) {

	// $('#console').html('<b>posts[id] = pos:</b><br>');

	 $('#userFacets').children().each(function(i) {
			 var id = $(this).attr('id')
					 ,order = $(this).index() + 1;

			 // Instead of echoing this, build a real array
			 //$('#console').html($('#console').html(id) + '<br>');

			 // Then do an ajax request to send the array
			 // Update order fields from posts in db
			 /*
			 $.ajax('url', {
					 data: //posts array
			 });
			 */
	 });

	}
	});
	$('#userFacets').sortable({
		connectWith: '.right',
		delay: 150,
		helper: "clone",
		placeholder: 'placeholder',
		receive: function(e, ui) {
		//	ui.item.addClass("remove-field").appendTo(this);
			//ui.item.appendTo(this).attr('id', 'value');
			//ui.item.clone().appendTo(this);
			ui.item.clone().draggable({ axis: "x,y", containment: "#userFacets", grid: [ 1, 1 ] , snapMode: "inner" /*,  revert: "invalid" */  }).appendTo(this);;
			//ui.item.after( $klon.text('image'+num));
/*
			ui.item.each(function(idx) {
				//$('#userFacets').mousedown(function(){
				//cities.includes($(this).attr('id'));
				positionions.push($(this).position());

			  console.log( position );
			//  });
			});
*/
			//ui.item.toArray();
			//ui.item.clone().appendTo(this); // append a copy
			//console.log(ui.item.push(array));
			ui.sender.sortable("cancel"); // return the original
		}
	}).on("dblclick", ".right", function() {
		$(this).remove();
	});
	$('.moved-item').draggable({ axis: "x,y", containment: "#userFacets", grid: [ 1, 1 ] , snapMode: "inner", scroll: false,
/*
    stop: function (event, ui) {
        positions[this.id] = ui.position
        localStorage.positions = JSON.stringify(positions)
    } /*,  revert: "invalid" */

	 });


	$('#nbs-ajax-save').on('mousedown', function(e) {

		var b = $('#userFacets').find('li');
			$(b).each(function(e, ui) {
			//	positionions.push($(this).position());
				if (! cities.includes( $(this).attr('id') )  )	{
					  cities.push($(this).attr('id'));


						//var ItemArray = [cities, positionions];
						//console.log( ItemArray );
				}



				if (! positionionsLeft.push(  $(this).css('left') ) )	{

						positionionsLeft.push(  $(this).css('left') );
				//	var includeArray = NewCities.include(pushArray);

					//console.log( position );
				}


				if (! positionionsTop.push( $(this).css('top') ) )	{

						positionionsTop.push( $(this).css('top') );
				//	var includeArray = NewCities.include(pushArray);

					//console.log( position );
				}

		});

	});


	});

	//==================================  popup =====================================================

	//----- OPEN
$('[data-popup-open]').on('click', function(e) {//on('click', $('#userFacets').values, function(){
	var targeted_popup_class = jQuery(this).attr('data-popup-open');
	$('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

	e.preventDefault();
});

//----- CLOSE
$('[data-popup-close]').on('click', function(e) {
	var targeted_popup_class = jQuery(this).attr('data-popup-close');
	$('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

	e.preventDefault();
});


//----- CLOSE
$('#nbs-reset-field').on('click', function(e) {
	$( '.ui-draggable-handle' ).remove();
});

//==================================  ajax  =====================================================


    $('#nbs-ajax-get').click(function(){

        var mydata = {
            action: "get_cool_options",
        };


        // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php

        $.ajax({
            type: "POST",
            url: ajaxurl,

            dataType: "json",
            data: mydata,
            success: function (data, textStatus, jqXHR) {
                var name = data.name_0;


				$('#display').html('<p>Name: '+name+' </p>');

            },
            error: function (errorMessage) {

                console.log(errorMessage);
            }

        });

    });


		$('#userFacets').click(function(){
				//$('#userFacets').find('.facet').sortable({
				//	update: function(event, ui) {
				function disp( divs ) {
						var a = [];
						for ( var i = 0; i < divs.length; i++ ) {
						a.push( divs[ i ].innerHTML );
						}
							$('#display').html( "span" ).text( a.join( " " ) );
						}
						var b = $( "#userFacets" ).find( 'p' );
					//	var c = disp( b.toArray().reverse() );
					//	console.log(a);
				//	}
	});


	$('#nbs-reset-field').on('click', $('#nbs-reset-field').values, function(){

			cities = [];
			positionions = [];

	});


		//var var_popup_field = $('#_cmb2_drag_and_drop_address_1').value();
  //  $('#userFacets').on('mousedown', $('#userFacets').values, function(){
		$('#nbs-ajax-save').on('click', $('#nbs-ajax-save').values, function(){
				//var var_popup_field = $('_cmb2_drag_and_drop_address_1').value();
				var mydata_1 = {
						'action': 'save_cool_options',
						'name_0': $('.input-name-0').val(),
						'name_1': $('.input-name-1').val(),
						'name_2': $('.input-name-2').val(),
						'name_3': $('.input-name-3').val(),
						'name_4': $('.input-name-4').val(),
						'name_5': $('.input-name-5').val(),
						id_1: cities,
						PosLeft_1: positionionsLeft,
						PosTop_1: positionionsTop,
				};




				$.ajax({
						type: "POST",
						url: ajaxurl,

						dataType: "json",
						data: mydata_1,
						success: function (data, textStatus, jqXHR) {

				if(data === true)
					$('#display').html('<p>Options Saved!</p>');

						},

						error: function (errorMessage) {

								console.log(errorMessage);
						}

				});







    });






});
