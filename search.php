<?php get_header() ?>
  <section class="titulo-interno">
    <div class="container">
      <h1> Resultado </h1>
    </div>
  </section>
  <section>
    <div class="container">
      <article class="conteudo-interno">
        <div class="row">
          <div class="col-md-4">
            <?php get_template_part('parts/content', 'pesquisaAvancada') ?>
          </div>
          <div class="col-md-8">
            <?php
            global $query_string;

            $query_args = explode("&", $query_string);

            if(isset($_GET['cidade']) && !empty($_GET['cidade']) && isset($_GET['estado']) && empty($_GET['estado'])){
              $search_query = array(
                'post_type' => 'agencia',
                'tax_query' => array(
                  array(
                    'meta_key' => 'cidade',
                    'meta_value' => $_GET['cidade'],
                    'compare' => '='
                  ),
                ),
              );
            } elseif(isset($_GET['cidade']) && empty($_GET['cidade']) && isset($_GET['estado']) && !empty($_GET['estado'])){
              $search_query = array(
                'post_type' => 'agencia',
                'tax_query' => array(
                  array(
                    'meta_key' => 'uf',
                    'meta_value' => $_GET['estado'],
                    'compare' => '='
                  ),
                ),
              );
            } elseif(isset($_GET['cidade']) && !empty($_GET['cidade']) && isset($_GET['estado']) && !empty($_GET['estado'])){
              $search_query = array(
                'post_type' => 'agencia',
                'meta_query' => array(
                  'relation'		=> 'AND',
                  array(
                    'meta_key' => 'uf',
                    'meta_value' => $_GET['estado'],
                    'compare' => '='
                  ),
                  array(
                    'meta_key' => 'cidade',
                    'meta_value' => $_GET['cidade'],
                    'compare' => '='
                  ),
                ),
              );
            } else {
              $search_query = array();
            }



            if( strlen($query_string) > 0 ) {
              foreach($query_args as $key => $string) {
                $query_split = explode("=", $string);
                $search_query[$query_split[0]] = urldecode($query_split[1]);
              } // foreach
            } //if

            $search = new WP_Query($search_query);
            $total_results = $wp_query->found_posts;

            if($search->have_posts()):
              echo "<div class='row'>";
              while($search->have_posts()): $search->the_post();
                ?>
                <div class="col-md-12 item-teste">
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
                          <?php echo get_field('cidade'); ?>/<?php echo get_field('uf'); ?><br>
                          <i class="fa fa-phone" aria-hidden="true"></i> <?php echo get_field('telefone'); ?> -
                          <i class="fa fa-envelope" aria-hidden="true"></i> <?php echo get_field('email'); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              endwhile;
              echo "</div>";
            else:
              echo "Nenhum post encontrado";
            endif;
            ?>
            <?php
              if (function_exists("pagination")) {
                pagination($agenciasHome->max_num_pages);
              }
            ?>
          </div>
        </div>
      </article>
    </div>
  </section>
<?php get_footer() ?>
