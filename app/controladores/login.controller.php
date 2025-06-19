<?php

require_once "app/vistas/Modulos/conexion.php"; // Incluye tu clase de conexión

class LoginController {

    public static function ctrRegistrarUsuario() {
        if (
            isset($_POST["registro_nombre"]) &&
            isset($_POST["registro_email"]) &&
            isset($_POST["registro_password"])
        ) {
            $datos = [
                "nombre" => $_POST["registro_nombre"],
                "email" => $_POST["registro_email"],
                "password" => password_hash($_POST["registro_password"], PASSWORD_DEFAULT)
            ];

            return LoginModel::mdlRegistrarUsuario($datos);
        }
        return false;
    }

    static public function ctrVerifyUser() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (isset($_POST["email"]) && isset($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];

            $pdo = Conexion::conectar();
            $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE email = :email");
            $stmt->bindParam(":email", $email, PDO::PARAM_STR);
            $stmt->execute();

            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($usuario && $password === $usuario["password"]) {
                // Guardamos el login en la sesión
                $_SESSION["usuario"] = $usuario;
                return true;
            } else {
                return false;
            }
        }

        return false;
    }
}
?>
