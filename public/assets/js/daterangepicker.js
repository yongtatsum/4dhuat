(function(window, $) {
	$(function() {

		if(jQuery().daterangepicker) {
			$('#daterange').daterangepicker({
				locale: {
					format: 'DD/MM/YYYY'
				},
			}, function(start, end, label) {
				
			});

		}
            
	});
} (window, jQuery));
