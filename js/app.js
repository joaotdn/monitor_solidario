$(document).foundation();

//Requisições com ajax
(function() {
	
	$.ajaxSetup({
		url: getData.ajaxDir,
		type: 'GET',
		dataType: 'html',
		beforeSend: function() {
			$('#ajax-loading').addClass('show');
		},
		complete: function() {
			$('#ajax-loading').removeClass('show');
		},
		erro:function(x) {
			alert('Erro: ' + x.statusText);
		}
	});

	//Cadastrar usuário
	$('#add-user').on('submit', function(event) {
		event.preventDefault();
		var data_form = $(this).serialize();

		$.ajax({
			data: {
				action: 'ms_add_user',
				user_data: data_form
			},
			success: function(data) {
				console.log(data);
			}
		});
	});
	
})();
