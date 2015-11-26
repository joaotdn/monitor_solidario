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
				if(data == 'Usuário cadastrado com sucesso') {
					alert(data);
					location.reload();
				} else {
					alert(data);
				}
				
			}
		});
	});

	//loga o usuário
	$(document).on('click', '.sign-user', function(event) {
		event.preventDefault();
		var user_name = $('.user-login-data').find('input[type="email"]').val(),
		    user_pass = $('.user-login-data').find('input[type="password"]').val();

		if(user_name != "" && user_pass != "") {
			$.ajax({
				data: {
					action: 'ms_user_login',
					user_login: user_name,
					user_senha: user_pass
				},
				success: function(data) {
					if(data === 'false') {
						alert('Usuário ou senha inválidos. Tente novamente.');
					} else{
						location.reload();
					}
				}
			});
		} else {
			alert("Usuário ou senha em branco");
		}
	});

	//
	$(document).on('submit', '.send-video', function(event) {
		event.preventDefault();
		var data_form = $(this).serialize();

		$.ajax({
			data: {
				action: 'ms_send_video',
				data_post: data_form
			},
			success: function(data) {
				if(data === 'false') {
					alert('Esse vídeo já existe!');
				} else{
					alert('Vídeo publicado com sucesso!');
					location.reload();
				}
			}
		});

	});
	
})();
