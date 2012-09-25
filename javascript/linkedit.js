JQ = jQuery.noConflict();

JQ(document).ready(function() {
	// Find the select box, named differently on the update and add forms
	var sel = JQ('select[id="DataObjectManager_Popup_DetailForm_LinkType"]');

	if (sel.attr('id') == undefined) {
		sel = JQ('#DataObjectManager_Popup_AddForm_LinkType');
	}




	// hide either the internal or external link editing box
	if (sel.val() == 'Internal') {
		JQ('#URL').toggle();
	}  else {
		JQ('.autocomplete_holder').toggle();
	};

	// toggle boxes on drop down change
	sel.change(function(e) {
  		JQ('#URL').toggle();
  		JQ('.autocomplete_holder').toggle();
	});

});