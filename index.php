<?php


// 🔐 Cierre de sesión antes de mostrar cualquier vista
if (isset($_GET["route"]) && $_GET["route"] === "exit") {
    session_unset();
    session_destroy();

    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }

    header("Location: index.php"); // o login.php si lo tienes separado
    exit;
}
require_once "app/controladores/plantilla.controlador.php";
if($_SERVER["REQUEST_METHOD"]==="POST" &&
    isset($_GET["route"], $_get["action"])&&
    $_GET["route"]== "login" &&
    $_GET["action"]== "verify"
){
    $controller = new LoginController();
    $controller->ctrVerifyUser();
    exit;
}


$plantilla = new ControladorPlantilla();
$plantilla-> ctrPlantilla();



