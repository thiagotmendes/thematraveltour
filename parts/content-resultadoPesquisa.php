<?php
global $query_string;

$query_args = explode("&", $query_string);
if(isset($_GET['cidade']) && !empty($_GET['cidade'])){
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

echo $total_results;

if($search->have_posts()):
  echo "<div class='row'>";
  while($search->have_posts()): $search->the_post();
    ?>
      <div class="col-md-4">
        <?php the_title() ?>
      </div>
    <?php
  endwhile;
  echo "</div>";
else:
  echo "Nenhum post encontrado";
endif;
?>
