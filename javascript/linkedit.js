/*jslint white: true */
(function($) {
	$(document).ready(function() {

		$('#Form_ItemEditForm_LinkType').entwine({
			onchange: function(e) {
				var sel = $(e.target);
				console.log(sel);
				if(sel.val() == 'Internal') {
					$('#URL').addClass('hide');
					$('#InternalPageID').removeClass('hide');
				} else {
					$('#URL').removeClass('hide');
					$('#InternalPageID').addClass('hide');
				}
			},
			onmatch: function(e) {
				var sel = $(e.target);

				// hide either the internal or external link editing box depending on which link type the link is
				// (internal or external)
				if(sel.val() == 'Internal') {
					$('#URL').addClass('hide');
				} else {
					$('#InternalPageID').addClass('hide');
				}
			}
			
		});

		// this is run first time only, to prime the form
		var sel = $('#Form_ItemEditForm_LinkType');

		// hide either the internal or external link editing box depending on which link type the link is
		// (internal or external)
		if(sel.val() == 'Internal') {
			$('#URL').addClass('hide');
		} else {
			$('#InternalPageID').addClass('hide');
		}
	});
})(jQuery);