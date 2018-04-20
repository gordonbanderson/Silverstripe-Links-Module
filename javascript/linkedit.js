/*jslint white: true */
(function($) {
	$.entwine(function($) {
		$('#Form_ItemEditForm_LinkType').entwine({
			onmatch: function(e) {
				if(this.val() == 'Internal') {
					$('#Form_ItemEditForm_URL_Holder').hide();
				} else {
					$('#Form_ItemEditForm_InternalPageID_Holder').hide();
				}
				this._super();
			},
			onchange: function(e) {
				if(this.val() == 'Internal') {
					$('#Form_ItemEditForm_URL_Holder').hide();
					$('#Form_ItemEditForm_InternalPageID_Holder').show();
				} else {
					$('#Form_ItemEditForm_URL_Holder').show();
					$('#Form_ItemEditForm_InternalPageID_Holder').hide();
				}
			}
		});
	});
})(jQuery);
