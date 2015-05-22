$(document).ready(function() {

	var page = 1;

	function loadData(callback) {
		$('#table-container').html('Cargando contenido...');
		callback = callback || function(){};
		$.ajax({
			url: method,
			type: "POST",
			data: {'page': page},
			success: function(response){
				var data = JSON.parse(response);
				$('#table-container').html('');
				$.each(data, function(k,v) {
					$('#table-container').append($('<p>').text(JSON.stringify(v)));
				});
				callback();
			}
		});
	}

	function updatePageRange() {
		var start = ((page - 1) * limit) + 1;
		var end = page * limit;
		$('.page-range').text(start + " a " + end);
	}

	loadData();

	$('#back-button').click(function() {
		$('.button').attr('disabled', true);
		page--;
		loadData(function() {
			$('#next-button').attr('disabled', false);
			if(page > 1) $('#back-button').attr('disabled', false);
			updatePageRange();
		});
	});

	$('#next-button').click(function() {
		$('.button').attr('disabled', true);
		page++;
		loadData(function() {
			$('.button').attr('disabled', false);
			updatePageRange();
		});
	});

});