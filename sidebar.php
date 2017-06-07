<div class="clearfix"></div>
<?php
// Inserindo uma área de Widgets
if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar') ) :?>
  <p>Gerencie seus Widgets pelo painel administrativo do Wordpress.</p>
<?php
endif;
?>
