<?php if ( is_user_logged_in() ): ?>
    <div class="divide-30"></div>

    <footer id="footer" class="small-12 left bg-primary">
      <div class="row">
        <div class="small-12 columns">
          <h4 class="font-bold no-margin small-12 left"><a href="<?php echo home_url(); ?>" class="white left" title="Página principal"><i class="fi-torsos-all"></i> <span>Monitor Solidário</span></a> <span class="right font-small"><a href="#" class="white">O que é o monitor solidário?</a></span></h4>
          <p class="font-small no-margin">Projeto desenvolvido para fins acadêmicos</p>
        </div>
      </div>
    </footer>
    <div id="ajax-loading" class="small-12">
      <div class="d-table-cell small-12 text-center">
        <img src="<?php echo get_template_directory_uri();?>/images/loading.gif" alt="">
      </div>
    </div>

    <div id="search-content" class="small-12 hide">
      <div class="row">
        <div class="divide-30"></div>
        <header class="divide-20 column">
          <h5 class="success font-bold">Resultado da busca</h5>
        </header>
        <div class="smal-12 columns search-result"></div>
      </div>
    </div>
<?php else: ?>
    <div class="reveal" id="get-pass" data-reveal>
      <h4 class="font-bold primary">Recuperar senha</h4>
      <form id="recovery-pass">
        <p class="font-small">Digite seu e-mail e receba sua nova senha</p>
        <p>
          <input type="email" class="small-12 left" title="Seu email" placeholder="Digite seu email" required>
        </p>
        <p class="no-margin">
          <button class="button success" type="submit">Enviar</button>
        </p>
      </form>
      <button class="close-button" data-close aria-label="Close reveal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
<?php endif; ?>

    <script src="<?php echo get_template_directory_uri();?>/bower_components/jquery/dist/jquery.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/bower_components/what-input/what-input.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/bower_components/foundation-sites/dist/foundation.js"></script>
    <script src="<?php echo get_template_directory_uri();?>/js/app.js"></script>
    <?php wp_footer(); ?>
  </body>
</html>