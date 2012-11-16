JQ = jQuery.noConflict();

/*jslint white: true */
(function($) {

	$(document).ready(function() {
		// Find the select box, named differently on the update and add forms
		var sel = $('select[id="DataObjectManager_Popup_DetailForm_LinkType"]');

		if (sel.attr('id') == undefined) {
			sel = $('#DataObjectManager_Popup_AddForm_LinkType');
		}




		// hide either the internal or external link editing box
		if (sel.val() == 'Internal') {
			$('#URL').toggle();
		}  else {
			$('.autocomplete_holder').toggle();
		};

		// toggle boxes on drop down change
		sel.change(function(e) {
	  		$('#URL').toggle();
	  		$('.autocomplete_holder').toggle();
		});

	});

})(jQuery);
