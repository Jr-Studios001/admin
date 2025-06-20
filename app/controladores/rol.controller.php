<?php
require_once "app/vistas/Modulos/conexion.php";

class RolController {

    public static function ctrAsignarRol($usuario_id, $rol_id) {
        $pdo = Conexion::conectar();

        // Eliminar el rol anterior si existe
        $stmt = $pdo->prepare("DELETE FROM usuario_roles WHERE usuario_id = :usuario_id");
        $stmt->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
        $stmt->execute();

        // Insertar el nuevo rol
        $stmt = $pdo->prepare("INSERT INTO usuario_roles (usuario_id, rol_id) VALUES (:usuario_id, :rol_id)");
        $stmt->bindParam(":usuario_id", $usuario_id, PDO::PARAM_INT);
        $stmt->bindParam(":rol_id", $rol_id, PDO::PARAM_INT);

        return $stmt->execute() ? "ok" : "error";
    }
}
