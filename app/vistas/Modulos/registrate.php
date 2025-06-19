<!-- app/vistas/modulos/registrate.php -->
<section class="register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
        <div class="card mb-3">
          <div class="card-body">
            <div class="pt-4 pb-2">
              <h5 class="card-title text-center pb-0 fs-4">Regístrate</h5>
              <p class="text-center small">Ingresa algunos datos para registrarte</p>
            </div>

            <!-- ✅ SOLO UN FORMULARIO -->
            <form class="row g-3 needs-validation" method="post" novalidate>
              <div class="col-12">
                <label for="registro_email" class="form-label">Correo electrónico</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="email" name="registro_email" class="form-control" required placeholder="Correo electrónico">
                  <div class="invalid-feedback">Por favor entra tu correo.</div>
                </div>
              </div>

              <div class="col-12">
                <label for="registro_usuario" class="form-label">Nombre de usuario</label>
                <input type="text" name="registro_nombre" class="form-control" required placeholder="Nombre de usuario">
                <div class="invalid-feedback">Por favor entra un nombre de usuario.</div>
              </div>

              <div class="col-12">
                <label for="registro_password" class="form-label">Contraseña</label>
                <input type="password" name="registro_password" class="form-control" required placeholder="Contraseña">
                <div class="invalid-feedback">Por favor entra una contraseña.</div>
              </div>

              <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Registrar</button>
              </div>

              <div class="col-12 text-center">
                <p class="small mb-0">¿Ya tienes cuenta? <a href="index.php">Inicia sesión</a></p>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
