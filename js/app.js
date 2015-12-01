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
	$(document).on('submit', '#add-user', function(event) {
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
					//console.log(data);
				}
			});
		} else {
			alert("Usuário ou senha em branco");
		}
	});

	//Enviar video
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
					alert('Vídeo publicado com sucesso! Aguarde a aprovação da moderação.');
					location.reload();
				}
			}
		});

	});

	//recuperar senha
	$(document).on('submit', '#recovery-pass', function(event) {
		event.preventDefault();
		var user_email = $(this).find('input[type="email"]').val();

		$.ajax({
			data: {
				action: 'ms_recovery_pass',
				email_recovery: user_email
			},
			success: function(data) {
				if(data == "false") {
					alert("O e-mail não está cadastrado");
				} else {
					alert(data);
					location.reload();
				}
			}
		});
	});

	//buscar video
	$(document).on('keyup', '.search-input > input', function(event) {
		event.preventDefault();
		var key = $(this).val();
		$('a.close-search, #search-content').removeClass('hide');

		$.ajax({
			data: {
				action: 'ms_search_term',
				keyword: key
			},
			success: function(data) {
				$('.search-result').html(data);
			}
		});
	});

	//fechar busca
	$(document).on('click', 'a.close-search', function(event) {
		event.preventDefault();
		$(this).addClass('hide');
		$('#search-content').addClass('hide');
		$('.search-input > input').val('');
	});	
	
})();
