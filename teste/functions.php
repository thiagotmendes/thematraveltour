<?php
require ('functions/includes.php');
require ('functions/wp_bootstrap_menuwalker.php');
//require ('functions/custom_post_type.php');
require ('functions/custom-wpadmin.php');

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
    'menu_bar'    => 'Minha conta',
    'menu_cart'   => 'Carrinho',
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
        'before_widget' => '<div class="col-md-3 navegacao">',
        'after_widget' => '</div>',
        'before_title' => '<div class=""><h5 >',
        'after_title' => '</h5></div>',
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
    global $query;
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

/* ----------------------------------------------------- */
/* Dimensões personalzidas de imagens */
/* ----------------------------------------------------- */
set_post_thumbnail_size( 500, 300, true ); // 50 pixels wide by 50 pixels tall, crop mode

add_image_size( 'garrafa_carrossel', 160, 200, true);
add_image_size( 'garrafa', 600, 800, true);
add_image_size( 'garrafa_mini', 300, 375, true);
add_image_size( 'blog_mini', 350, 210, true);
add_image_size( 'slides', 2000, 600, true);
add_image_size( 'destaque', 2000, 360, true);


/* ----------------------------------------------------- */
/* Advanced custom fields options */
/* ----------------------------------------------------- */

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(
      array(
        'page_title' => 'Dados Gerais',
        'position' => '50.0',
        'menu_slug' => 'dados_gerais',
      )
    );
    acf_add_options_page(array('page_title' => 'Slider', 'position' => '50.2','menu_slug' => 'slider'));

}

/* ----------------------------------------------------- */
/* Sidebar */
/* ----------------------------------------------------- */

add_action( 'widgets_init', 'my_register_sidebars' );


function my_register_sidebars() {

    /* Register dynamic sidebar 'new_sidebar' */
    register_sidebar(
        array(
        'id' => 'nsidebar',
        'name' => __( 'Blog Sidebar' ),
        'description' => __( 'A short description of the sidebar.' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>'
        )
    );

    /* Repeat the code pattern above for additional sidebars. */
}
