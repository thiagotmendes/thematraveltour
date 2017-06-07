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
              <?php the_content() ?>
            </article>
          <?php endwhile ?>
        <?php else: ?>
          Nenhum post encontrado
        <?php endif; ?>

        <div class="footer-single">
          <?php $tag_single = get_the_tags( $post->ID ); ?>
          <?php if (!empty($tag_single)): ?>
            <hr>
            <div class="tags">
              <?php the_tags( 'Tags: ', ', ', '<br />' ); ?>
            </div>
            <hr>
          <?php endif ?>

          <div class="author">
            <div class="row">
              <div class="col-md-2 img-author">
                <?php $email = get_the_author_email();
                $grav_url = "http://www.gravatar.com/avatar.php?gravatar_id=".md5($email). "&default=".urlencode($GLOBALS['defaultgravatar'] );
                $usegravatar = get_option('woo_gravatar');?>
                <img src="<?php echo $grav_url; ?>" alt=""/>
              </div>
              <div class="col-md-10">
                <h4 class="nome-author"><a href = "<?php the_author_url ();?>" itemprop="url"><?php the_author(); ?></a></h4>
                <?php the_author_description();?>
              </div>
            </div>
          </div>
          <hr>
          <?php comments_template(); ?>
        </div>
      </div>
      <div class="col-md-4">
        <?php get_sidebar() ?>
      </div>
    </div>
  </div>
</section>
<?php get_footer() ?>
