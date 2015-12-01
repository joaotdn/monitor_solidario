<?php
  get_header();
?>

    <div id="main-page" class="small-12 left">
      <div class="divide-30"></div>
      <div class="row">
        <header class="divide-20 column user-header">
          <h2 class="font-bold primary">
            <span class="fi-torso"></span> <span>Vídeos de <?php echo get_the_author_meta( 'display_name', $post->post_author ); ?></span>
          </h2>
        </header>

        <div id="last-posts" class="small-9 columns user-page">
          <nav id="last-videos" class="small-12 left">
            <header class="divide-20">
            </header>

            <ul class="vertical medium-horizontal menu">
            <?php
              if ( have_posts() ) : while ( have_posts() ) : the_post();
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
            <?php  endwhile; endif; ?>
            </ul>
          </nav>
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
