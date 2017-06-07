<?php get_header() ?>
  <?php if (have_posts()): ?>
    <?php while(have_posts()): the_post()  ?>
      <section class="titulo-interno">
        <div class="container">
          <h1><?php the_title() ?></h1>
        </div>
      </section>
      <div class="container">
        <article class="conteudo-interno">
          <?php the_content() ?>
        </article>
      </div>
    <?php endwhile ?>
  <?php endif; ?>
<?php get_footer() ?>
