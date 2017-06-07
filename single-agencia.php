<?php get_header() ?>
<div class="wrapper-content">
  <?php
  if (have_posts()):
    while(have_posts()): the_post();
      ?>
      <div class="barra-menu-interno">
        <div class="container">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active">
              <a href="#info" aria-controls="home" role="tab" data-toggle="tab">
                Informações Gerais
              </a>
            </li>
            <?php
            if( have_rows('links_adicionais') ):
              while ( have_rows('links_adicionais') ) : the_row();
                ?>
                <li role="presentation">
                  <a href="#<?php echo the_sub_field('nome'); ?>" aria-controls="profile" role="tab" data-toggle="tab">
                    <?php echo the_sub_field('nome'); ?>
                  </a>
                </li>
                <?php
              endwhile;
            endif;
            ?>
          </ul>
        </div>
      </div>

      <div class="container">
        <!-- Tab panes -->
        <div class="tab-content">

          <div role="tabpanel" class="tab-pane active" id="info">
            <h1 class="titulo-agencia"> <?php the_title() ?> </h1>
            <div class="row">
              <div class="col-md-3">
                <?php the_post_thumbnail( 'high', array( 'class' => 'img-responsive' ) ); ?>
              </div>
              <div class="col-md-9">
                <div class="row">
                  <div class="col-md-7">
                    <?php
                    if (get_field('cnpj')) {
                      echo "<p>";
                        echo "CNPJ ".get_field('cnpj');
                      echo "</p>";
                    }
                    if(get_field('email')){
                      echo "<p>";
                      echo ' <i class="fa fa-envelope-o" aria-hidden="true"></i> ';
                      echo get_field('email');
                      echo ' <i class="fa fa-phone" aria-hidden="true"></i> ';
                      echo get_field('telefone');
                      echo "</p>";
                    }
                    ?>

                    <p>
                      <?php if (get_field('endereco')): ?>
                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                        <?php echo get_field('endereco'); ?> -
                        <?php echo get_field('num'); ?> -
                        <?php echo get_field('bairro'); ?> -
                        <?php echo get_field('cidade'); ?>/<?php echo get_field('uf'); ?>
                      <?php endif; ?>
                    </p>
                  </div>
                  <div class="col-md-5">
                    <button type="button" name="button" class="btn btn-primary"> Entrar em contato </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="well well-sm caixa-servico">
              <!-- TABELA DE SERVIÇOS -->
              <div class="row">
                <div class="col-md-6">
                  <h3> Serviços </h3>
                  <ul>
                    <?php
                    $servicos = get_terms( 'servicos-agencia' );
                    foreach ($servicos as $serv) {
                      echo "<li>".$serv->name."</li>";
                    }
                    ?>
                  </ul>
                </div>
                <div class="col-md-6">
                  <h3> Linguas </h3>
                  <ul>
                    <?php
                    $linguas = get_terms( 'lingua-agencia' );
                    foreach ($linguas as $ling) {
                      echo "<li>".$ling->name."</li>";
                    }
                    ?>
                  </ul>
                </div>
              </div>
              <!-- /TABELA DE SERVIÇOS -->
            </div>
          </div>
          <?php
          if( have_rows('links_adicionais') ):
            while ( have_rows('links_adicionais') ) : the_row();
              ?>
              <div role="tabpanel" class="tab-pane" id="<?php echo the_sub_field('nome'); ?>">
                <?php echo the_sub_field('codigo'); ?>
              </div>
              <?php
            endwhile;
          endif;
        ?>
        </div>
      </div>
      <?php
    endwhile;
  else:
    echo "Nenhuma agência encontrada";
  endif;
  ?>

</div>
<?php get_footer() ?>
