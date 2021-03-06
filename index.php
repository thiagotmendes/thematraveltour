<?php get_header() ?>
<section class="titulo-interno">
  <div class="container">
    <h1>
      <?php
      if(is_home()){
        $idBlog =  get_option( 'page_for_posts' );
        echo get_the_title($idBlog);
      }
      ?>
    </h1>
  </div>
</section>

<section>
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <?php if (have_posts()): ?>
          <?php while(have_posts()): the_post() ?>
            <article class="blocos-noticias">
              <figure>
                <a href="<?php the_permalink() ?>">
                  <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
                </a>
              </figure>
              <h2> <?php the_title() ?> </h2>
              <div class="prevs">
                <time>
                  <i class="fa fa-calendar" aria-hidden="true"></i> <?php the_time('j \d\e F \d\e Y') ?>
                </time>
                -
                <i class="fa fa-comment-o" aria-hidden="true"></i>
                <span><i class="flaticon-chat"></i></span>
                <?php comments_number( 'Nenhum comentário', '1 Comentário', '% Comentários' ); ?>
              </div>
              <p> <?php the_excerpt_limit(30) ?> </p>
              <div class="row">
                <div class="col-md-4 col-md-offset-4">
                  <a href="<?php the_permalink() ?>" class="btn btn-success btn-block">
                    Saiba mais
                  </a>
                </div>
              </div>
            </article>
          <?php endwhile ?>
        <?php else: ?>
          Nenhum post encontrado
        <?php endif; ?>
        <?php wp_pagination() ?>
      </div>
      <div class="col-md-4">
        <?php get_sidebar() ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer() ?>
