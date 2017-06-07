<?php /* template name: agencias */ ?>
<?php get_header() ?>
  <section class="titulo-interno">
    <div class="container">
      <h1><?php the_title() ?></h1>
    </div>
  </section>
  <section class="conteudo-interno">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <?php get_template_part('parts/content', 'pesquisaAvancada'); ?>
        </div>
        <div class="col-md-8">
          <?php get_template_part('parts/content', 'listAgencias') ?>
        </div>
      </div>
    </div>
  </section>
<?php get_footer() ?>
