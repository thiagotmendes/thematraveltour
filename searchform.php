<h4> Pesquisar destino </h4>
<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get" accept-charset="utf-8" id="searchform" role="search">
  <div class="input-group">
    <input type="text" name="s" id="s" value="<?php the_search_query(); ?>" class="form-control" placeholder="Pesquisar por ..." />
      <span class="input-group-btn">
        <button class="btn btn-success" type="submit"> <i class="glyphicon glyphicon-search"></i> </button>
      </span>
    </div>
</form>
