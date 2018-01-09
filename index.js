jQuery( document ).ready( function( $ ){

var grid1 = new Muuri('.grid-1', {
//  items: '.item',
  itemClass: 'draggable-item',
  itemVisibleClass: 'draggable-item-shown',
  itemPositioningClass: 'foo-item-positioning',

  dragEnabled: true,
  dragContainer: document.body,
  itemPositioningClass: 'foo-item-positioning',
  dragSort: function () {
    return [ grid2]
  }
});



var grid2items = {};
var grid2Hash = {};
var grid2 = new Muuri('.grid-2', {

  itemClass: 'dragged-item2',
  itemVisibleClass: 'dragged-item-shown2',
  //containerClass: 'foo',
  dragEnabled: true,
  dragContainer: document.body,
  dragSort: true,


})




.on('receive', function (data) {
  grid2Hash[data.item._child.id + "-" + data.item._id] = function (item) {
    if (item === data.item) {
      var clone = cloneElem(data.item.getElement());
      data.item._child.setAttribute("data-name" , data.item._child.id + "-" + data.item._id);
      //data.item._child.innerHTML = data.item._child.id + "-" + data.item._id;
      data.fromGrid.add(clone, {index: data.fromIndex});
      data.fromGrid.show(clone);
      //console.log(data);
    }
  };
  grid2.once('dragReleaseStart', grid2Hash[data.item._child.id + "-" + data.item._id]);
})
.on('send', function (data) {
  var listener = grid2Hash[data.item._child.id + "-" + data.item._id];
  if (listener) {
    grid2.off('dragReleaseStart', listener);
  }

})





function cloneElem(elem) {
  var clone = elem.cloneNode(true);
  var att = document.createAttribute("data-grid-id");
  att.value = "Grid ID :" + grid2._id;
  clone.setAttribute('style', 'display:none;');
  clone.setAttribute('class', 'item');
  clone.setAttributeNode(att);

  //clone.children[0].setAttribute('style', '');
  return clone;
}







// ----------------------------------------------------------------------------------       AJAX saves Happens here --------------------------------------------------------------------------------
//var values = new Array('created-homo-cont-1','created-homo-cont-1');
$('#nbs-ajax-save').on('click', $('#grid-2').values, function(){

    var mydata = {
        action: "save_cool_options",

        example_1:   grid2Hash,

    };


    // since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php

    $.ajax({
        type: "POST",
        url: ajaxurl,
        dataType: "json",
        data: mydata,
        success: function (data, textStatus, jqXHR) {

    if(data === true)
      alert('Options Saved!');

        },

        error: function (errorMessage) {

            console.log(errorMessage);
        }

    });

});
/*
$('#nbs-ajax-save').click(function(){

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
            var example_1 = data.name;


            alert(example_1);

        },
        error: function (errorMessage) {

            console.log(errorMessage);
        }

    });

});
*/
});
