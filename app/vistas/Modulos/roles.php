<?php
require_once "app/vistas/Modulos/conexion.php";
$pdo = Conexion::conectar();

// Obtener todos los usuarios
$stmtUsuarios = $pdo->query("SELECT id, nombre, email FROM usuarios");
$usuarios = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);

// Obtener todos los roles
$stmtRoles = $pdo->query("SELECT id, nombre_rol FROM roles");
$roles = $stmtRoles->fetchAll(PDO::FETCH_ASSOC);

?>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Asignar Rol a Usuario</h5>

          <!-- Formulario para asignar rol -->
          <form method="POST" action="index.php?r=asignarRol">

            <!-- Usuario -->
            <div class="row mb-3">
              <label for="usuario_id" class="col-sm-2 col-form-label">Usuario</label>
              <div class="col-sm-10">
                <select name="usuario_id" class="form-control" required>
                  <option value="">Selecciona un usuario</option>
                  <?php foreach ($usuarios as $usuario): ?>
                    <option value="<?= $usuario['id'] ?>">
                      <?= $usuario['nombre'] ?> (<?= $usuario['email'] ?>)
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Rol -->
            <div class="row mb-3">
              <label for="rol_id" class="col-sm-2 col-form-label">Rol</label>
              <div class="col-sm-10">
                <select name="rol_id" class="form-control" required>
                  <option value="">Selecciona un rol</option>
                  <?php foreach ($roles as $rol): ?>
                    <option value="<?= $rol['id'] ?>"><?= $rol['nombre_rol'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Botones -->
            <div class="text-center">
              <button type="submit" class="btn btn-primary">Asignar Rol</button>
              <button type="reset" class="btn btn-secondary">Limpiar</button>
            </div>

          </form><!-- End Form -->

        </div>
      </div>

    </div>
  </div>
</section>

