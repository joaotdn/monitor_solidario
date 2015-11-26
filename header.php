<?php
if ( is_user_logged_in() ) {
  global $current_user;
  get_currentuserinfo();
  $page_conta = get_page_by_title('Minha conta');
}
?>
<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | <?php is_home()?bloginfo('description'):wp_title(''); ?></title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/fonts/foundation-icons.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/app.css">
    <script>
      //<![CDATA[
      var getData = {
        'urlDir':'<?php bloginfo('template_directory');?>/',
        'ajaxDir':'<?php echo stripslashes(get_admin_url()).'admin-ajax.php';?>'
      }
      //]]>
    </script>
    <?php wp_head(); ?>
  </head>
  <body>

    <header class="top-bar bg-primary">

      <div class="row">
      <?php if ( !is_user_logged_in() ): ?>
        <div class="small-12 columns">
          <div class="top-bar-left">
            <h3 class="font-bold no-margin"><a href="<?php echo home_url(); ?>" class="white" title="Página principal"><i class="fi-torsos-all"></i> <span>Monitor Solidário</span></a></h3>
          </div>

          <div class="top-bar-right">
            <ul class="menu bg-primary user-login-data">
              <li><input type="email" placeholder="Seu email" class="small-12 medium-4"></li>
              <li><input type="password" placeholder="Sua senha" class="small-12 medium-4"></li>
              <li><button type="button" class="success button sign-user">Entrar</button></li>
            </ul>
          </div>
        </div>
      <?php else: ?>
        <div class="small-12 columns">
          <div class="top-bar-left">
            <ul class="menu bg-primary">
              <li><h1 class="font-bold no-margin left"><a href="<?php echo home_url(); ?>" class="white" title="Página principal"><i class="fi-torsos-all"></i></a></h1></li>
              <li class="search-input"><input type="search" placeholder="O que você procura?"></li>
            </ul>
          </div>

          <div class="top-bar-right">
            <div class="divide-10"></div>
            <ul class="menu bg-primary white">
              <li>Olá <?php echo $current_user->display_name; ?></li>
              <li class="search-input"><a href="<?php echo get_page_link($page_conta->ID); ?>" class="success button">Publique um vídeo!</a></li>
              <li><a href="<?php echo wp_logout_url( home_url() ); ?>" class="left white">Sair</a></li>
            </ul>
          </div>
        </div>
      <?php endif; ?>

      </div>

    </header>