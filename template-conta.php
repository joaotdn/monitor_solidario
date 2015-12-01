<?php
/**
  * Template Name: Minha conta
  * @package WordPress
  */
if ( is_user_logged_in() ) {
  global $current_user;
  get_currentuserinfo();
}
get_header();
?>

    <div id="main-page" class="small-12 left">
      <div class="divide-30"></div>
      <div class="row">
        <header class="divide-20 column user-header">
          <h3 class="font-bold primary">
            <span class="fi-torso"></span> <span>Sua conta, <?php echo $current_user->display_name; ?></span>
          </h3>
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
                  <label for="video-embed" class="no-margin">Link do vídeo no Youtube</label>
                  <input type="url" name="video-embed" id="video-embed" class="small-12 left" title="Link do vídeo no Youtube" placeholder="Cole aqui o link do vídeo no Youtube" required>
                </p>

                <p class="no-margin">
                  <button type="submit" class="button success no-margin" title="Enviar vídeo">Enviar vídeo</button>
                </p>
              </form>
            </div>

            <div class="tabs-panel" id="panel2">

              <nav id="last-videos" class="small-12 left">
                <ul class="horizontal menu">
<?php
 $args = array(
    'posts_per_page' => -1,
    'orderby' => 'date',
    'author' => $current_user->ID
);
$the_query = new WP_Query( $args );

if ( $the_query->have_posts() ) :  while ( $the_query->have_posts() ) : $the_query->the_post();
    global $post;
?>
                  <li>
                    <a href="<?php the_permalink(); ?>" class="d-table th">
                      <div class="d-table-cell small-12 text-center">
                        <span class="fi-video"></span>
                        <h6 class="font-bold small-12 left">
                          <?php the_title(); ?>
                        </h4>
                      </div>
                    </a>
                  </li>

<?php
    endwhile; wp_reset_postdata(); endif;
?>
                </ul>
              </nav>

            </div>

            <div class="tabs-panel" id="panel3">
              <form action="" class="small-12 left user-account">
                <p>
                  <label for="nome" class="no-margin">Seu nome</label>
                  <input type="text" name="nome" id="nome" class="small-12 left" title="Seu nome" disabled="disabled" value="<?php echo $current_user->display_name; ?>">
                </p>

                <p>
                  <label for="email" class="no-margin">Seu e-mail</label>
                  <input type="email" name="email" id="email" class="small-12 left" title="Seu e-mail" disabled="disabled" value="<?php echo $current_user->user_email; ?>">
                </p>

                <p>
                  <label for="instituicao" class="no-margin">Instituição de ensino</label>
                  <input type="text" name="instituicao" id="instituicao" class="small-12 left" title="Instituição de ensino" disabled="disabled" value="UNIPE">
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
<?php
$popularpost = new WP_Query( array( 'posts_per_page' => 10, 'meta_key' => 'wpb_post_views_count', 'orderby' => 'meta_value_num', 'order' => 'DESC'  ) );
while ( $popularpost->have_posts() ) : $popularpost->the_post();
?>
            <li>
              <a href="<?php the_permalink(); ?>"><span class="fi-play"></span> <?php the_title(); ?></a>
            </li>
<?php
endwhile;

wp_reset_query();
?>
          </ul>
        </div>

      </div>
    </div>

<?php
get_footer();
?>
