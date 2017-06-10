<?php /* template name: Home */ ?>
<?php get_header() ?>
  <?php
  if (is_front_page()) {
  ?>
    <section class="banner">
      <div class="container">
        <ul class="banner-home">
          <?php
          if( have_rows('banner') ):
            while( have_rows('banner') ): the_row();
              $image = get_sub_field('imagem');
              $link = get_sub_field('link');
              $target = get_sub_field('target');
              ?>
              <li><img src="<?php echo $image['url'] ?>" alt=""></li>
              <?php
            endwhile;
          endif;
          ?>
        </ul>
      </div>
    </section>
  <?php
  }
  ?>

  <div class="container ">
    <div class="row">
      <div class="col-md-4">
        <?php get_template_part('parts/content', 'pesquisaAvancada'); ?>
      </div>
      <div class="col-md-8">
        <?php get_template_part('parts/content', 'listAgencias') ?>
      </div>
    </div>
  </div>

<?php get_footer() ?>
