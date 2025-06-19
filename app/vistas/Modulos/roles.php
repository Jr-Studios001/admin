
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Agregar rol</h5>

              <form method="POST" action="users?action=save">
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Nombre</label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="inputText">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputPassword" class="col-sm-2 col-form-label">Rol del usuario</label>
                  <div class="col-sm-10">
                    <input type="password" name="password" class="form-control" id="inputPassword">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                  <button type="reset" class="btn btn-secondary">Limpiar</button>
                </div>
              </form><!-- End Form -->

            </div>
          </div>

        </div>
      </div>
    </section>
