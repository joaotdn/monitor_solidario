<?php
define('THEME_VERSION', '1.1');

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
define( 'ACF_LITE' , true );
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
 * logar usuários
 */
add_action('wp_ajax_nopriv_ms_user_login', 'ms_user_login');
add_action('wp_ajax_ms_user_login', 'ms_user_login');

function ms_user_login() {
	$login = $_GET['user_login'];
	$pass = $_GET['user_senha'];

	if(!empty($login) && !empty($pass)) {
		//$login = filter_var($login,FILTER_SANITIZE_STRING);
		//$pass = filter_var($pass,FILTER_SANITIZE_STRING);

		$creds = array();
	    $creds['user_login'] =  $login;
	    $creds['user_password'] = $pass;
	    $creds['remember'] = true;

	    $user_login = wp_signon( $creds, false );
	    if ( is_wp_error($user_login) )
	        echo $user_login->get_error_message();
	} else {
		print('false');
		exit();
	}

	//echo $login . "-" . $pass;

	exit();
}

/**
 * Cadastra usuarios
 */
add_action('wp_ajax_nopriv_ms_add_user', 'ms_add_user');
add_action('wp_ajax_ms_add_user', 'ms_add_user');

function ms_add_user() {
	global $wpdb;
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
		print('Nome inválido'); // o nome é obrigatório
		exit();
	}

	//valida email
	if(array_key_exists('email', $params) && !empty($params['email'])) {
		$email = filter_var($params['email'],FILTER_VALIDATE_EMAIL);
		if($email) {
			$valEmail = true;
		}
	} else {
		print('E-mail inválido'); // o email é obrigatório
		exit();
	}

	//valida instituição
	if(array_key_exists('instituicao', $params) && !empty($params['instituicao'])) {
		$instituicao = filter_var($params['instituicao'],FILTER_SANITIZE_STRING);
		if(!$instituicao || strlen($instituicao) > 300) {
			print('Instituição inválida'); //instituicao inválido
			exit();
		} else {
			$valInstituicao = true;
		}
	} else {
		print('Instituição inválida'); // o instituicao é obrigatório
		exit();
	}

	//valida senha
	if(array_key_exists('senha', $params) && !empty($params['senha'])) {
		$senha = filter_var($params['senha'],FILTER_SANITIZE_STRING);
		if(!$senha || strlen($senha) > 300 || strlen($senha) < 4) {
			print('Senha inválida'); //senha inválido
			exit();
		} else {
			$valSenha = true;
		}
	} else {
		print('Senha inválida'); // o senha é obrigatório
		exit();
	}

	if($valNome && $valEmail && $valInstituicao && $valSenha) {
		$user_id = username_exists( $email );

		if( !$user_id ) {
			//O usuário não existe, crie
			$wpdb->insert( 
		      'wp_users',
		      array(
		        "user_login" => $email,
		        "user_pass" => md5($senha),
		        "user_email" => $email,
		        'display_name' => $nome,
		        //"first_name" => $instituicao
		      )
		    );
		    $wpdb->insert_id;

		    $creds = array();
		    $creds['user_login'] =  $email;
		    $creds['user_password'] = $senha;
		    $creds['remember'] = true;

		    $user_login = wp_signon( $creds, false );
		    if ( is_wp_error($user_login) )
		        echo $user_login->get_error_message();

		} else {
			print('O usuário já está cadastrado.');
			exit();
		}

	} else {
		print('Não foi possível cadastrar este usuário.');
		exit();
	}

	print('Usuário cadastrado com sucesso');
	exit();
}

/**
 * Cadastra videos
 */
add_action('wp_ajax_nopriv_ms_send_video', 'ms_send_video');
add_action('wp_ajax_ms_send_video', 'ms_send_video');

function ms_send_video() {
	global $current_user;
	$_post = $_GET['data_post'];
	$params = array();
	parse_str($_post, $params);

	$video_id = wp_insert_post( array(
        "post_title" => $params['video-title'],
        "post_type" => 'post',
        "post_status" => "pending",
        "post_author" => $current_user->ID
    ));
    update_field('ms_video', $params['video-embed'], $video_id);

	exit();
}

//recuperar senha
add_action('wp_ajax_nopriv_ms_recovery_pass', 'ms_recovery_pass');
add_action('wp_ajax_ms_recovery_pass', 'ms_recovery_pass');

function ms_recovery_pass() {
	$user_email = $_GET['email_recovery'];
	$user = get_user_by( 'login', $user_email );
	
	if($user && !user_can( $user->ID , 'manage_options' )) {
		$email = $user_email->user_email;
		$_user_email = explode('@', $email);
		$new_pass = uniqid();

		if(wp_update_user( array( 'ID' => $user->ID, 'user_pass' => $new_pass ) )) {
			if(wp_mail( $user_email, '[Monitor solidário] - Sua nova senha', 'Sua nova senha é ' . $new_pass))
				echo 'Sua nova senha foi enviada para ' . $_user_email[0] . '@***.***';
		}
	} else {
		echo "false";
		exit();
	}

	echo "true";
	exit();
}

/**
 * Busca por videos
 */
add_action('wp_ajax_nopriv_ms_search_term', 'ms_search_term');
add_action('wp_ajax_ms_search_term', 'ms_search_term');

function ms_search_term() {
	$term = $_GET['keyword'];
	
	$the_query = new WP_Query( array( 's' => $term, 'post_type' => 'post', 'posts_per_page' => 12, 'orderby' => 'date', 'post_status' => 'publish' ) );
  	if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
    	?>
		<figure class="small-12 left">
			<h5 class="font-bold no-margin"><a href="<?php the_permalink(); ?>" class="primary"><span class="fi-video"></span> <span><?php the_title(); ?></span></a><h5>
		</figure>
    	<?php
    endwhile; wp_reset_postdata(); endif;

	exit();
}

//mais lidas
function wpb_set_post_views($postID) {
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

function wpb_track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;    
    }
    wpb_set_post_views($post_id);
}
add_action( 'wp_head', 'wpb_track_post_views');

function wpb_get_post_views($postID){
    $count_key = 'wpb_post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

?>