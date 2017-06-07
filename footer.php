    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h4> Horário de atendimento </h4>
            <i class="fa fa-clock-o" aria-hidden="true"></i>
            <?php echo esc_attr( get_option( 'po_horario', '' ) ) ?>
          </div>
          <!-- contato -->
          <div class="col-md-3">
            <h4> Contato </h4>
            <i class="fa fa-envelope-o" aria-hidden="true"></i>
            <?php echo esc_attr( get_option( 'po_email', '' ) ) ?>
          </div>
          <!-- Endereço -->
          <div class="col-md-3">
            <h4> Endereço </h4>
            <address class="">
              <i class="fa fa-map-marker" aria-hidden="true"></i>  <?php echo esc_attr( get_option( 'po_endereco', '' ) ) ?>
            </address>
          </div>
          <!-- social -->
          <div class="col-md-2">
            <h4> Social </h4>
            <ul class="social">
              <li><a href="<?php echo esc_attr( get_option( 'po_facebook', '' ) ) ?>"><i class="fa fa-facebook-official" aria-hidden="true"></i></a></li>
              <li><a href="<?php echo esc_attr( get_option( 'po_linkedin', '' ) ) ?>"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="<?php echo esc_attr( get_option( 'po_Instagram', '' ) ) ?>"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
      <section>
        <div class="container">
          &copy; <?php echo date('Y') ?> - <?php echo bloginfo('name') ?> - Todos os direitos reservados
        </div>
      </section>
    </footer>

    <?php wp_footer() ?>
  </body>
</html>
