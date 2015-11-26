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
        <div class="small-12 columns">
          <div class="top-bar-left">
            <ul class="menu bg-primary">
              <li><h1 class="font-bold no-margin left"><a href="#" class="white" title="Página principal"><i class="fi-torsos-all"></i></a></h1></li>
              <li class="search-input"><input type="search" placeholder="O que você procura?"></li>
            </ul>
          </div>

          <div class="top-bar-right">
            <div class="divide-10"></div>
            <ul class="menu bg-primary white">
              <li>Olá João</li>
              <li class="search-input"><button type="button" class="success button">Publique um vídeo!</button></li>
            </ul>
          </div>
        </div>
      </div>
    </header>

    <div id="main-page" class="small-12 left">
      <div class="divide-30"></div>
      <div class="row">
        <header class="divide-20 column user-header">
          <h2 class="font-bold primary">
            <span class="fi-torso"></span> <span>Sua conta, João</span>
          </h2>
        </header>

        <div id="last-posts" class="small-9 columns user-page">
          <ul class="tabs" data-tabs id="example-tabs">
            <li class="tabs-title is-active"><a href="#panel1" class="success" aria-selected="true">Publicar vídeo</a></li>
            <li class="tabs-title"><a href="#panel2">Seus vídeos</a></li>
            <li class="tabs-title"><a href="#panel3">Sua conta</a></li>
          </ul>

          <div class="tabs-content" data-tabs-content="example-tabs">
            <div class="tabs-panel is-active" id="panel1">
              <form action="" class="small-12 left send-video">
                <p>
                  <label for="video-title" class="no-margin">Título do vídeo</label>
                  <input type="text" name="video-title" id="video-title" class="small-12 left" title="Título do vídeo" placeholder="Digite um título para o vídeo" required>
                </p>

                <p>
                  <label for="video-embed" class="no-margin">Emdebar vídeo do Youtube</label>
                  <textarea name="video-embed" id="video-embed" rows="5" class="small-12 left" title="Emdebar vídeo do youtube" placeholder="Cole aqui o código embed do vídeo" required></textarea>
                </p>

                <p class="no-margin">
                  <button type="submit" class="button success no-margin" title="Enviar vídeo">Enviar vídeo</button>
                </p>
              </form>
            </div>

            <div class="tabs-panel" id="panel2">

              <nav id="last-videos" class="small-12 left">
                <ul class="horizontal menu">
                  <li>
                    <a href="#" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          Título do vídeo aqui
                        </h4>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          Título do vídeo aqui
                        </h4>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          Título do vídeo aqui
                        </h4>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          Título do vídeo aqui
                        </h4>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          Título do vídeo aqui
                        </h4>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          Título do vídeo aqui
                        </h4>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          Título do vídeo aqui
                        </h4>
                      </div>
                    </a>
                  </li>

                  <li>
                    <a href="#" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          Título do vídeo aqui
                        </h4>
                      </div>
                    </a>
                  </li>
                </ul>
              </nav>

            </div>

            <div class="tabs-panel" id="panel3">
              <form action="" class="small-12 left user-account">
                <p>
                  <label for="nome" class="no-margin">Seu nome</label>
                  <input type="text" name="nome" id="nome" class="small-12 left" title="Seu nome" disabled="disabled">
                </p>

                <p>
                  <label for="email" class="no-margin">Seu e-mail</label>
                  <input type="email" name="email" id="email" class="small-12 left" title="Seu e-mail" disabled="disabled">
                </p>

                <p>
                  <label for="instituicao" class="no-margin">Instituição de ensino</label>
                  <input type="text" name="instituicao" id="instituicao" class="small-12 left" title="Instituição de ensino" disabled="disabled">
                </p>

                <p>
                  <label for="password" class="no-margin">Senha</label>
                  <input type="password" name="password" id="password" class="small-12 left" title="Senha" value="0000000000">
                </p>

                <p class="no-margin">
                  <button type="submit" class="button success no-margin" title="Enviar vídeo">Redefinir senha</button>
                </p>
              </form>
            </div>
          </div>
        </div>

        <div id="user-bar" class="small-3 columns">
          <ul id="popular" class="no-bullet">
            <li>
              <h4 class="success font-bold no-margin">Mais vistos</h4>
            </li>
            <li>
              <a href="#"><span class="fi-play"></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
            </li>
            <li>
              <a href="#"><span class="fi-play"></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
            </li>
            <li>
              <a href="#"><span class="fi-play"></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
            </li>
            <li>
              <a href="#"><span class="fi-play"></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
            </li>
            <li>
              <a href="#"><span class="fi-play"></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
            </li>
            <li>
              <a href="#"><span class="fi-play"></span> Lorem ipsum dolor sit amet, consectetur adipisicing elit</a>
            </li>
          </ul>
        </div>

      </div>
    </div>
    
    <div class="divide-30"></div>

    <footer id="footer" class="small-12 left bg-primary">
      <div class="row">
        <div class="small-12 columns">
          <h4 class="font-bold no-margin small-12 left"><a href="#" class="white left" title="Página principal"><i class="fi-torsos-all"></i> <span>Monitor Solidário</span></a> <span class="right font-small"><a href="#" class="white">O que é o monitor solidário?</a></span></h4>
          <p class="font-small no-margin">Projeto desenvolvido para fins acadêmicos</p>
        </div>
      </div>
    </footer>
    

    <script src="bower_components/jquery/dist/jquery.js"></script>
    <script src="bower_components/what-input/what-input.js"></script>
    <script src="bower_components/foundation-sites/dist/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
