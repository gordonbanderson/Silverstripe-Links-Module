/*jslint white: true */
(function($) {
	$(document).ready(function() {
		// Find the select box, named differently on the update and add forms
		var sel = $('#Form_ItemEditForm_LinkType');

		// hide either the internal or external link editing box depending on which link type the link is
		// (internal or external)
		if(sel.val() == 'Internal') {
			$('#Form_ItemEditForm_URL_Holder').hide();
		} else {
			$('#Form_ItemEditForm_InternalPageID_Holder').hide();
		}

		// toggle boxes on drop down change
		sel.change(function(e) {
			if(sel.val() == 'Internal') {
				$('#Form_ItemEditForm_URL_Holder').hide();
				$('#Form_ItemEditForm_InternalPageID_Holder').show();
			} else {
				$('#Form_ItemEditForm_URL_Holder').show();
				$('#Form_ItemEditForm_InternalPageID_Holder').hide();
			}
		});
	});
})(jQuery);
