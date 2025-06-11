<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="app/vistas/assets/img/favicon.png" rel="icon">
  <link href="app/vistas/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="app/vistas/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="app/vistas/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="app/vistas/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 7 2025 with Bootstrap v5.3.5
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  

  <!-- ======= Header ======= -->
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
    <?php
    session_start();

// Verificamos si el usuario ya está logueado
if (isset($_SESSION["usuario"])) {
    // Usuario autenticado, mostramos el contenido principal
    include "app/vistas/modulos/sidebar.php";
    include "app/vistas/modulos/header.php";
    include "app/vistas/modulos/main.php";
    include "app/vistas/modulos/footer.php";
} else {
    // Usuario no autenticado, mostramos el formulario de inicio de sesión
    include "app/vistas/modulos/inicio.sesion.php";

    // Si el formulario fue enviado, intentamos hacer login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!LoginController::ctrVerifyUser()) {
            echo "<p style='color:red;'>Credenciales incorrectas</p>";
        } else {
            // Redirigimos al index para refrescar la vista con sesión iniciada
            header("Location: index.php");
            exit();
        }
    }
}
    
    
    ?>
  <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="app/vistas/modulos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Template Main JS File -->
  <script src="app/vistas/modulos/js/main.js"></script>

</body>

</html>