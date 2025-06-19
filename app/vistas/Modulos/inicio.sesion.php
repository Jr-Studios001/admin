
      <form method="post" action="" class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Iniciar Sesion</h5>
                    <p class="text-center small">Ingresa tu Correo y Contraseña para Iniciar Sesion</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate>

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Ingresa Tu Correo</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="email" name="email" class="form-control" required placeholder="Correo electrónico">
                        <div class="invalid-feedback">Por favor entra tu correo.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Contraseña</label>
                      <input type="password" name="password" class="form-control" required placeholder="Contraseña">
                      <div class="invalid-feedback">Por favor entra tu contraseña!</div>
                    </div>

                    <form class="row g-3 needs-validation" action= "index.php?route=inicio.sesion&action=verify"  method="post" novalidate></form> 
                    <?php 
                    require_once "app/controladores/login.controller.php";
                    
                    ?>
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Recuerdame</label>
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Ingresar</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">No tienes una cuenta? <a href="index.php?r=registro">Crea una cuenta</a></p>
                    </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>