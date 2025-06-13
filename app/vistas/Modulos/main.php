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
            <div class="breadcrumb">
              <div class="breadcrumb-item active">
                <?php
                echo"<h1>bienvenido de nuevo "  . $_SESSION["usuario"]["nombre"] ."</h1>";
                //if (isset($_SESSION["usuario"])) {
                  //echo"bienvenido de nuevo "  . $_SESSION["usuario"]["nombre"];
                //}
                ?>
              </div>
              
            </div>
            
          </div>
          
        </div>
        
      </div>
    </section>

</main>