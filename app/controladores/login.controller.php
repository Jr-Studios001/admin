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

            if ($usuario && password_verify($password, $usuario["password"])) {

                // 🔽 Cargar el rol del usuario
                $stmtRol = $pdo->prepare("
                    SELECT r.nombre_rol 
                    FROM usuario_roles ur
                    JOIN roles r ON r.id = ur.rol_id
                    WHERE ur.usuario_id = :usuario_id
                    LIMIT 1
                ");
                $stmtRol->bindParam(":usuario_id", $usuario["id"], PDO::PARAM_INT);
                $stmtRol->execute();

                $rol = $stmtRol->fetchColumn();

                // Si no tiene rol, establecer uno por defecto
                if (!$rol) {
                    $rol = "sin rol";
                }

                // Agregar el rol a la sesión
                $usuario["rol"] = $rol;
                $_SESSION["usuario"] = $usuario;

                return true;
            }
        }

        return false;
    }

}
?>
