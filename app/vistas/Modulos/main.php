<main id="main" class="main">
    <div class="pagetitle">
      <h1>Panel de control</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
          <li class="breadcrumb-item active">Panel de control.</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">
        <div class="" >
          <div class="pagetitle">
            <div class="">
              <div class="breadcrumb-item active">
                <?php
                if (isset($_GET["route"])) {
                $allowedRoutes = ["home", "user", "otros","roles",];
                if (in_array($_GET["route"], $allowedRoutes)) {
                    include "app/vistas/modulos/".$_GET["route"].".php";
                } else {
                    include "app/vistas/modulos/404.php";
                  }
                } else {
                  include "app/vistas/modulos/home.php";
                  } 
                ?>
              </div>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
    </section>

</main>