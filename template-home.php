<?php /* template name: Home */ ?>
<?php get_header() ?>
  <?php
  if (is_front_page()) {
  ?>
    <section class="banner">
      <div class="container">
        <div class="banner-home">
          <?php
          if( have_rows('banner') ):
            while( have_rows('banner') ): the_row();
              $image = get_sub_field('imagem');
              $link = get_sub_field('link');
              $target = get_sub_field('target');
              ?>
              <img src="<?php echo $image['url'] ?>" alt="">
              <?php
            endwhile;
          endif;
          ?>
        </div>
      </div>
    </section>
  <?php
  }
  ?>

  <div class="container ">
    <div class="row">
      <div class="col-md-4">
        <div class="box-pesquisa">
          <h3> Pesquisar por: </h3>
        </div>
      </div>
      <div class="col-md-8">
        <div class="row">
          <?php
          $argAgenciaHome = array(
            'post_type' => 'agencia',
            /*'meta_key'		=> 'destaque_home',
    	      'meta_value'	=> '1'*/
          );
          $agenciasHome = new wp_query($argAgenciaHome);
          if($agenciasHome->have_posts()):
            while($agenciasHome->have_posts()): $agenciasHome->the_post();
              ?>
              <div class="col-md-12 ">
                <div class="box-agencia-home">
                  <div class="row">
                    <div class="col-md-3 img-agencia">
                      <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
                      </a>
                    </div>
                    <div class="col-md-9">
                      <div class="desc-agencia">
                        <p class="cidade-agencia"> <?php echo get_field('cidade');   ?> </p>
                        <h3>
                          <a href="<?php the_permalink() ?>">
                            <?php the_title(); ?> 
                          </a>
                        </h3>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo get_field('endereco'); ?> - <?php echo get_field('num'); ?> -
                        <?php echo get_field('cidade'); ?>/<?php echo get_field('uf'); ?> -
                        <i class="fa fa-phone" aria-hidden="true"></i> <?php echo get_field('telefone'); ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            endwhile;
          else:
            echo "Nenhuma agencia encontrada";
          endif;
          ?>
        </div>
      </div>
    </div>
  </div>

<?php get_footer() ?>
