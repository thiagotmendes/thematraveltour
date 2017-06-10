<div class="box-pesquisa">
  <h3> Pesquisar por: </h3>
  <form class="" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
    <div class="form-group">
      <label for="agencia"> Agência </label>
      <input type="text" name="s" id="s" value="<?php echo $_GET['s'] ?>" class="form-control" id="" placeholder="">
    </div>
    <div class="form-group">
      <label for="cidade"> Cidade </label>
      <input type="text" name="cidade" value="<?php echo $_GET['cidade'] ?>" class="form-control" id="" placeholder="">
    </div>
    <div class="form-group">
      <label for="Estado"> Estado </label>
      <select name="estado" class="form-control">
        <option></option>
        <?php
        $estados = array(
          'Acre' => 'AC',
          'Alagoas' =>	'AL',
          'Amapá' =>	'AP',
          'Amazonas' =>	'AM',
          'Bahia' =>	'BA',
          'Ceará' =>	'CE',
          'Distrito Federal' =>	'DF',
          'Espírito Santo' =>	'ES',
          'Goiás' =>	'GO',
          'Maranhão' =>	'MA',
          'Mato Grosso' =>	'MT',
          'Mato Grosso do Sul' =>	'MS',
          'Minas Gerais' =>	'MG',
          'Pará' =>	'PA',
          'Paraíba' =>	'PB',
          'Paraná' =>	'PR',
          'Pernambuco' =>	'PE',
          'Piauí' =>	'PI',
          'Rio de Janeiro' =>	'RJ',
          'Rio Grande do Norte' =>	'RN',
          'Rio Grande do Sul' =>	'RS',
          'Rondônia' =>	'RO',
          'Roraima' =>	'RR',
          'Santa Catarina' =>	'SC',
          'São Paulo' =>	'SP',
          'Sergipe' =>	'SE',
          'Tocantins' =>	'TO'
        );
        foreach ($estados as $esta => $sigla) {
          if ($sigla == $_GET['estado']) {
            ?>
            <option value="<?php echo $sigla ?>" selected> <?php echo $esta ?> </option>
            <?php
          } else {
            ?>
            <option value="<?php echo $sigla ?>"> <?php echo $esta ?> </option>
            <?php
          }
        }
        ?>
      </select>
    </div>
    <button type="submit" class="btn btn-success">
      <i class="fa fa-search" aria-hidden="true"></i>  Pesquisar
    </button>
  </form>
</div>
