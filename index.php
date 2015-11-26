<!doctype html>
<html class="no-js" lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitor Solidário</title>

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="fonts/foundation-icons.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  <body>

    <header class="top-bar bg-primary">
      <div class="row">
        <div class="top-bar-left">
          <h3 class="font-bold no-margin"><a href="#" class="white" title="Página principal"><i class="fi-torsos-all"></i> <span>Monitor Solidário</span></a></h3>
        </div>

        <div class="top-bar-right">
          <ul class="menu bg-primary">
            <li><input type="email" placeholder="Seu email" class="small-12 medium-4"></li>
            <li><input type="password" placeholder="Sua senha" class="small-12 medium-4"></li>
            <li><button type="button" class="success button">Entrar</button></li>
          </ul>
        </div>
      </div>
    </header>

    <div id="main-sign" class="small-12 left rel full-height">
      <div class="mask"></div>
      <div class="green-bar hide-for-small-only"></div>

      <div class="reveal" id="how-to" data-reveal>
        <h3 class="font-bold primary">Bem vindos ao monitor solidário</h3>
        <p class="lead">Veja como é fácil contribuir</p>
        <p>1. Grave seu vídeo</p>
        <p>2. Faça uma conta no <b>Youtube</b> e publique-os</p>
        <p>3. Faça sua conta no monitor solidário</p>
        <p>4. A partir da sua conta você poderá colar os links das vídeo aulas e compartilhar com todos</p>
        <p class="lead">Simples assim!</p>

        <button class="close-button" data-close aria-label="Close reveal" type="button">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="row">

        <div class="small-12 medium-6 large-4 columns about-monitor">
          <div class="divide-60 hide-for-small-only"></div>
          <header class="white text-center">
            <h1><span class="fi-comment-video"></span></h1>
            <h5 class="white font-bold">No monitor solidário você cria seu conteúdo em vídeo e compartilha com uma comunidade de pessoas interessadas em assistí-los!</h5>
            <h5><a href="#" class="font-bold warning" data-open="how-to">Saiba como funciona!</a></h5>
          </header>
        </div>

        <div class="small-12 medium-6 large-4 columns about-monitor">
          <form action="" class="bg-primary small-12 left">
            <div class="row">
              <header class="divide-20 text-center">
                <h5 class="white font-bold">Abra uma conta gratuitamente!</h5>
              </header>
              <div class="small-3 columns">
                <label for="nome" class="text-right">Nome</label>
              </div>
              <div class="small-9 columns">
                <input type="text" id="nome" placeholder="Seu nome">
              </div>

              <div class="small-3 columns">
                <label for="email" class="text-right">E-mail</label>
              </div>
              <div class="small-9 columns">
                <input type="email" id="email" placeholder="Seu e-mail">
              </div>

              <div class="small-3 columns">
                <label for="instituicao" class="text-right">Instituição</label>
              </div>
              <div class="small-9 columns">
                <input type="text" id="instituicao" placeholder="Onde você estuda?">
              </div>

              <div class="small-3 columns">
                <label for="senha" class="text-right">Senha</label>
              </div>
              <div class="small-9 columns">
                <input type="password" id="senha" placeholder="Defina sua senha de acesso">
              </div>

              <div class="small-12 columns text-center">
                <div class="divide-20"></div>
                <button class="button success new-member no-margin d-iblock">Realizar cadastro</button>
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
    

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/what-input/what-input.js"></script>
    <script src="bower_components/foundation-sites/dist/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
