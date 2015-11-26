<?php
global $current_user;
global $post;
get_currentuserinfo();

$page_conta = get_page_by_title('Minha conta');

get_header();
?>
    <div id="main-page" class="small-12 left">
      <div class="divide-30"></div>
      <div class="row">

        <div id="last-posts" class="small-9 columns">
          <header class="divide-20">
            <p class="font-small"><time>Vídeo publicado em <?php the_time( 'd \d\e F \d\e Y' ); ?> por <a href="#"><?php the_author(); ?></a></time></p>
            <h4 class="font-bold"><?php the_title(); ?></h4>
          </header>
          <figure class="flex-video">
            <?php echo get_field('ms_video',$post->ID); ?>
          </figure>
          
          <nav id="share-video" class="small-12 text-center left callout secondary">
            <p class="font-small primary no-margin">Compartilhe esse vídeo</p>
            <h1 class="no-margin">
              <a href="#" class="left"><i class="fi-social-facebook"></i></a>
              <a href="#" class="left"><i class="fi-social-twitter"></i></a>
              <a href="#" class="left"><i class="fi-social-google-plus"></i></a>
            </h1>
          </nav>

        </div>

        <div id="user-bar" class="small-3 columns">
          <ul class="no-bullet">
            <li><a href="<?php echo home_url(); ?>"><span class="fi-home"></span> <span>Início</span></a></li>
            <li><a href="<?php echo get_page_link($page_conta->ID); ?>"><span class="fi-torso"></span> <span>Minha conta</span></a></li>
            <li><a href="#"><span class="fi-video"></span> <span>Meus vídeos</span></a></li>
          </ul>

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