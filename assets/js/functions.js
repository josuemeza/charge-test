$(document).ready(function() {

	$.ajax({
		url: method + '/' + page,
		type: "POST",
		success: function(response){
			var data = JSON.parse(response);
			$('#table-container').html('');
			$.each(data, function(k,v) {
				$('#table-container').append($('<p>').text(JSON.stringify(v)));
			});
			callback();
		}
	});

});