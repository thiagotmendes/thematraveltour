<div class="row scroll">
  <?php
  if(is_front_page()){
    $argAgenciaHome = array(
      'post_type' => 'agencia',
      'meta_key'		=> 'destaque_home',
      'meta_value'	=> '1',
      'posts_per_page' => -1
    );
  } else {
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $argAgenciaHome = array(
      'post_type' => 'agencia',
      'posts_per_page' => 1,
      'paged' => $paged
    );
  }


  $agenciasHome = new wp_query($argAgenciaHome);

  if($agenciasHome->have_posts()):
    while($agenciasHome->have_posts()): $agenciasHome->the_post();
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
  else:
    echo "Nenhuma agencia encontrada";
  endif;
  ?>

<?php if (function_exists("pagination")) {
    pagination($agenciasHome->max_num_pages);
} ?>

  <?php
  //wp_reset_postdata();
  ?>
</div>
