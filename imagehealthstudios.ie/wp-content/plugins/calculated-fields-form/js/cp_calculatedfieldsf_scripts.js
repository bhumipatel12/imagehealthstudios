jQuery(
	function(){
		window['cp_calculatedfieldsf_insertForm'] = function (result) {
			if( typeof result != 'undefined' && result )
			{
				send_to_editor('[CP_CALCULATED_FIELDS_RESULT]');
			}
			else
			{
				send_to_editor('[CP_CALCULATED_FIELDS]');
			}
		};

		window['cp_calculatedfieldsf_insert_results_list'] = function (result) {
			send_to_editor('[CP_CALCULATED_FIELDS_RESULT_LIST formid=""]');
		};

		window['cp_calculatedfieldsf_insertVar'] = function() {
			send_to_editor('[CP_CALCULATED_FIELDS_VAR name=""]');
		};
	}
);