<?php
require ('functions/includes.php');
require ('functions/wp_bootstrap_menuwalker.php');
//require ('functions/custom_post_type.php');

global $diretorio;

$diretorio = get_template_directory();

/********************************************************/
/* suporte ao woocommerce                               */
/********************************************************/
global $woocommerce;

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

require_once('functions/adicionais-woocommerce.php');



/* ----------------------------------------------------- */
/* Escondendo a versão do Wordpress */
/* ----------------------------------------------------- */
remove_action('wp_head', 'wp_generator');
/* ----------------------------------------------------- */
/* Abilitando suporte ao gerenciador de menus */
/* ----------------------------------------------------- */
register_nav_menus(
  array(
    'menu_topo'   => 'Menu navegação',
    'menu_rodape' => 'Rodape'
  )
);
/*
Modo de uso:
<?php wp_nav_menu( array('theme_location'=>'menu_topo','menu_class'=>'menu') ); ?>
*/
/* ----------------------------------------------------- */
/* Abilitando suporte a imagens destacadas */
/* ----------------------------------------------------- */
if ( function_exists( 'add_theme_support' ) ) add_theme_support( 'post-thumbnails' );
//add_image_size('thumb-custom-1', 640, 326, true);
//add_image_size('thumb-custom-2', 66, 66, true);
/*
Modo de uso:
<?php the_post_thumbnail('thumbnail'); ?>

/* ----------------------------------------------------- */
/* Registrando uma sidebar */
/* ----------------------------------------------------- */
if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Sidebar',
        'id'  => 'sidebar',
        'before_widget' => '<div class="panel panel-bos widget">',
        'after_widget' => '</div>',
        'before_title' => '<div class="panel-heading"><h3 class="panel-title">',
        'after_title' => '</h3></div>',
    )
);

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Rodape',
        'id'  => 'rodape',
        'before_widget' => '<div class="col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<div class=""><h3 class="title-rodape">',
        'after_title' => '</h3></div>',
    )
);

if ( function_exists('register_sidebar') )
    register_sidebar(array(
        'name' => 'Loja',
        'id'  => 'loja',
        'before_widget' => '<div class="col-md-3">',
        'after_widget' => '</div>',
        'before_title' => '<div class=""><h3 class="title-rodape">',
        'after_title' => '</h3></div>',
    )
);

/*
Modo de uso:
<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Lateral') ) :?>
    <p class="msg-info">Gerencie seus Widgets pelo painel administrativo do Wordpress.</p>
<?php endif; ?>
*/
/* ----------------------------------------------------- */
/* Resumo com limite de palavras customizada */
/* ----------------------------------------------------- */
function the_excerpt_limit($limit) {
    $excerpt = explode(' ', get_the_excerpt(), $limit);
    if (count($excerpt)>=$limit) {
        array_pop($excerpt);
        $excerpt = implode(" ",$excerpt).'...';
    } else {
        $excerpt = implode(" ",$excerpt);
    }
        $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
        echo $excerpt;
}
/*
Modo de uso:
<?php the_excerpt_limit(20); ?>
*/
function wp_pagination($pages = '', $range = 9)
{
  global $wp_query;
  $query = $query ? $query : $wp_query;
  $big = 999999999;
  $max_num_pages = $query->max_num_pages;

  $paginate = paginate_links(
      array(
          'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
          'type'      => 'array',
          'total'     => $max_num_pages,
          'format'    => '?paged=%#%',
          'current'   => max( 1, get_query_var('paged') ),
          'prev_text' => __('&laquo;'),
          'next_text' => __('&raquo;'),
      )
  );
  if ( $max_num_pages > 1 && $paginate ) {
      echo '<ul class="pagination pagination-lg">';
      foreach ( $paginate as $page ) {
          echo '<li>' . $page . '</li>';
      }
      echo '</ul>';
  }
}

function title_page(){
  if ( is_single() ) {
    bloginfo('name'); echo " | "; single_post_title();
  }elseif ( is_home() || is_front_page() ) {
    bloginfo('name'); echo ' | ';
    bloginfo('description');
  }elseif ( is_page() ) {
    single_post_title('');
  }elseif ( is_search() ) {
    bloginfo('name');
    echo ' | Search results for ' . wp_specialchars($s);
  }elseif ( is_404() ) {
    bloginfo('name');
    print ' | Not Found';
  }else {
    bloginfo('name');
    wp_title('|');
  }
}
