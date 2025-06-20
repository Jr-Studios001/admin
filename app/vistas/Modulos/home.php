<div class="col-12">
  <div class="card">
    <div class="card-body">

      <?php
        // Asegúrate de que la sesión tiene los datos necesarios
      $nombre = $_SESSION["usuario"]["nombre"];
      $rol = $_SESSION["usuario"]["rol"] ?? "sin rol";

      echo "<h1 class='card-title'>Bienvenido, <strong>$rol</strong>, <strong>$nombre</strong></h1>";
      ?>

      <p class="card-text">Selecciona una opción del menú lateral para comenzar.</p>

    </div>
  </div>
</div>
