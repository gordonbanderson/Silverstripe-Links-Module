/*jslint white: true */
(function($) {
	$(document).ready(function() {
		// Find the select box, named differently on the update and add forms
		var sel = $('#Form_ItemEditForm_LinkType');

		// hide either the internal or external link editing box depending on which link type the link is
		// (internal or external)
		if(sel.val() == 'Internal') {
			$('#URL').addClass('hide');
		} else {
			$('#InternalPageID').addClass('hide');
		}

		// toggle boxes on drop down change
		sel.change(function(e) {
			if(sel.val() == 'Internal') {
				$('#URL').addClass('hide');
				$('#InternalPageID').removeClass('hide');
			} else {
				$('#URL').removeClass('hide');
				$('#InternalPageID').addClass('hide');
			}
		});
	});
})(jQuery);