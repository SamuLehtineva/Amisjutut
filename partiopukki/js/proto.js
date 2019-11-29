/* when the DOM is ready */
jQuery(document).ready(function() {
	/* grab important elements */
	var sortInput = jQuery('#sort_order');
	var submit = jQuery('#autoSubmit');
	var messageBox = jQuery('#message-box');
	var list = jQuery('.sortable-list');
	/* create requesting function to avoid duplicate code */
	var request = function() {
		jQuery.ajax({
			beforeSend: function() {
				messageBox.text('Updating the sort order in the database.');
			},
			complete: function() {
				messageBox.text('Database has been updated.');
			},
			data: 'sort_order=' + sortInput[0].value + '&ajax=' + submit[0].checked + '&do_submit=1&byajax=1', //need [0]?
			type: 'post',
		});
	};
	
	
	
	
	/* worker function */
	var fnSubmit = function(save) {
		var sortOrder = [];
		list.children('li').each(function(){
			sortOrder.push(jQuery(this).data('id'));
		});
		sortInput.val(sortOrder.join(','));
		console.log(sortInput.val());
		if(save) {
			request();
		}
	};
	/* store values */
	list.children('li').each(function() {
		var li = jQuery(this);
		li.data('id',li.attr('title')).attr('title','');
	});

	list.disableSelection();
	/* ajax form submission */
	jQuery('#dd-form').bind('submit',function(e) {
		if(e) e.preventDefault();
		fnSubmit(true);
	});
	
	
	
	$( function() {
    $( "#sortable-list, #sortable-list1" ).sortable({
      connectWith: ".connectedSortable"
    }).disableSelection();
  } );
});
 