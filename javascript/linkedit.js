/*jslint white: true */
(function($) {
	$(document).ready(function(){
		var linkType = $('#Form_ItemEditForm_LinkType').val();

		if(linkType == 'Internal') {
			$('#Form_ItemEditForm_URL_Holder').hide();
			$('#Form_ItemEditForm_InternalPageID_Holder').show();
		} else {
			$('#Form_ItemEditForm_URL_Holder').show();
			$('#Form_ItemEditForm_InternalPageID_Holder').hide();
		}

		$('#Form_ItemEditForm_LinkType').change(function(e) {
			var newType = $('#Form_ItemEditForm_LinkType').val();
			if(newType == 'Internal') {
				$('#Form_ItemEditForm_URL_Holder').hide();
				$('#Form_ItemEditForm_InternalPageID_Holder').show();
			} else {
				$('#Form_ItemEditForm_URL_Holder').show();
				$('#Form_ItemEditForm_InternalPageID_Holder').hide();			}
		})
	})
})(jQuery);
