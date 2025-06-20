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

// ✅ Incluir el controlador de login
require_once "app/controladores/login.controller.php";
require_once "app/controladores/rol.controller.php";

// ✅ Procesar formularios ANTES de enviar HTML
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Registro de usuario
    if (isset($_POST["registro_nombre"])) {
        echo "Se está ejecutando el registro...";
        $respuesta = LoginController::ctrRegistrarUsuario();
        if ($respuesta === "ok") {
            $_SESSION["registro_ok"] = "Registro exitoso. Ahora puedes iniciar sesión.";
        } else {
            $_SESSION["registro_error"] = "Hubo un problema al registrar el usuario.";
        }
        header("Location: index.php");
        exit();
    }

    if (isset($_GET["r"]) && $_GET["r"] === "asignarRol" && $_SERVER["REQUEST_METHOD"] === "POST") {
    $usuario_id = $_POST["usuario_id"];
    $rol_id = $_POST["rol_id"];

    $respuesta = RolController::ctrAsignarRol($usuario_id, $rol_id);

    if ($respuesta === "ok") {
        $_SESSION["mensaje_rol"] = "Rol asignado correctamente.";
    } else {
        $_SESSION["mensaje_rol"] = "Error al asignar el rol.";
    }
    // 🔄 Actualizar el rol en la sesión si es el usuario actual
    if (isset($_SESSION["usuario"]) && $_SESSION["usuario"]["id"] == $usuario_id) {
        $stmtRol = $pdo->prepare("
            SELECT r.nombre_rol 
            FROM usuario_roles ur
            JOIN roles r ON r.id = ur.rol_id
            WHERE ur.usuario_id = :usuario_id
            LIMIT 1
        ");
        $stmtRol->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
        $stmtRol->execute();

        $nuevoRol = $stmtRol->fetchColumn();
        $_SESSION["usuario"]["rol"] = $nuevoRol ?: "sin rol";
    }

    header("Location: index.php?r=roles");
    exit();
}

    // Login de usuario
    if (LoginController::ctrVerifyUser()) {
        header("Location: index.php");
        exit();
    } else {
        $_SESSION["login_error"] = "Credenciales incorrectas.";
        header("Location: index.php");
        exit();
    }
}

// ✅ Mostrar contenido según si está logueado
if (isset($_SESSION["usuario"])) {
    include "app/vistas/modulos/sidebar.php";
    include "app/vistas/modulos/header.php";
    include "app/vistas/modulos/main.php";
    include "app/vistas/modulos/footer.php";

} else {

    // 👇 Si viene de ?r=registro, mostrar solo el formulario de registro
    if (isset($_GET["r"]) && $_GET["r"] === "registro") {
        include "app/vistas/modulos/registrate.php";

        // Mostrar mensaje de registro si existe
        if (isset($_SESSION["registro_error"])) {
            echo "<p style='color:red'>" . $_SESSION["registro_error"] . "</p>";
            unset($_SESSION["registro_error"]);
        }
        if (isset($_SESSION["registro_ok"])) {
            echo "<p style='color:green'>" . $_SESSION["registro_ok"] . "</p>";
            unset($_SESSION["registro_ok"]);
        }

    } else {
        // Si no pidió registro, mostrar login
        include "app/vistas/modulos/inicio.sesion.php";

        if (isset($_SESSION["login_error"])) {
            echo "<p style='color:red'>" . $_SESSION["login_error"] . "</p>";
            unset($_SESSION["login_error"]);
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