<?php
define('THEME_VERSION', '1.0');

add_theme_support('post-thumbnails');
set_post_thumbnail_size( 242, 220, true );

/**
 * Configure funções para campos personalizados da aplicação
 */
define( 'USE_LOCAL_ACF_CONFIGURATION', true ); // apenas conf. local
add_filter('acf/settings/path', 'plandd_acf_path');
function plandd_acf_path( $path ) {
	   // update path
	   $path = get_stylesheet_directory() . '/includes/acf/';
	   // return
	   return $path;
}
add_filter('acf/settings/dir', 'plandd_acf_dir');
function plandd_acf_dir( $dir ) {
	   // update path
	   $dir = get_stylesheet_directory_uri() . '/includes/acf/';
	   // return
	   return $dir;
}
/**
 * Framework para personalização de campos
 * (custom meta post)
 */
include_once( get_stylesheet_directory() . '/includes/acf/acf.php' );
include_once( get_stylesheet_directory() . '/includes/acf-repeater/acf-repeater.php' );
//define( 'ACF_LITE' , true );
//include_once( get_stylesheet_directory() . '/includes/acf/preconfig.php' );

/**
 * Indica ao administrador a quantidade de videos pendentes
 */
function show_pending_number( $menu ) {
    $type = "post";
    $status = "pending";
    $num_posts = wp_count_posts( $type, 'readable' );
    $pending_count = 0;
    if ( !empty($num_posts->$status) )
        $pending_count = $num_posts->$status;

    // build string to match in $menu array
    $menu_str = 'edit.php?post_type=' . $type;

    // loop through $menu items, find match, add indicator
    foreach( $menu as $menu_key => $menu_data ) {
        if( $menu_str != $menu_data[2] )
            continue;
        $menu[$menu_key][0] .= " <span class='update-plugins count-$pending_count'><span class='plugin-count'>" . number_format_i18n($pending_count) . '</span></span>';
    }
    return $menu;
}
add_filter( 'add_menu_classes', 'show_pending_number');

/**
 * Acesso ao painel apenas para admin
 */
add_action( 'init', 'blockusers_init' );

function blockusers_init() {
	if(is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX )) {
		wp_redirect( home_url() );
		exit;
	}
}

/**
 * Oculta barra do wordpress para não admin
 */
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  show_admin_bar(false);
	}
}
add_action('after_setup_theme', 'remove_admin_bar');

/**
 * Cadastra usuarios
 */
add_action('wp_ajax_nopriv_ms_add_user', 'ms_add_user');
add_action('wp_ajax_ms_add_user', 'ms_add_user');

function ms_add_user() {
	$user = $_GET['user_data'];
	$params = array();
	parse_str($user, $params);

	$valNome = false;
	$valEmail = false;
	$valInstituicao = false;
	$valSenha = false;
	
	//valida nome
	if(array_key_exists('nome', $params) && !empty($params['nome'])) {
		$nome = filter_var($params['nome'],FILTER_SANITIZE_STRING);
		if(!$nome || strlen($nome) > 300 || strlen($nome) < 4) {
			print('error'); //nome inválido
			exit();
		} else {
			$valNome = true;
		}
	} else {
		print('error'); // o nome é obrigatório
		exit();
	}

	//valida email
	if(array_key_exists('email', $params) && !empty($params['email'])) {
		$email = filter_var($params['email'],FILTER_VALIDATE_EMAIL);
		if($email) {
			$valEmail = true;
		}
	} else {
		print('error'); // o email é obrigatório
		exit();
	}

	//valida instituição
	if(array_key_exists('instituicao', $params) && !empty($params['instituicao'])) {
		$instituicao = filter_var($params['instituicao'],FILTER_SANITIZE_STRING);
		if(!$instituicao || strlen($instituicao) > 300) {
			print('error'); //instituicao inválido
			exit();
		} else {
			$valInstituicao = true;
		}
	} else {
		print('error'); // o instituicao é obrigatório
		exit();
	}

	//valida senha
	if(array_key_exists('senha', $params) && !empty($params['senha'])) {
		$senha = filter_var($params['senha'],FILTER_SANITIZE_STRING);
		if(!$senha || strlen($senha) > 300 || strlen($senha) < 4) {
			print('error'); //senha inválido
			exit();
		} else {
			$valSenha = true;
		}
	} else {
		print('error'); // o senha é obrigatório
		exit();
	}


}

?>