<?php

class Conexion {

    static public function conectar() {
        try {
            $link = new PDO("mysql:host=localhost;dbname=prueba_db", "root", "");
            $link->exec("set names utf8");
            $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $link;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

}

// app/modelos/login.modelo.php
class LoginModel {

    public static function mdlRegistrarUsuario($datos) {
        try {
            $conexion = new PDO("mysql:host=localhost;dbname=prueba_db", "root", ""); // ⚠️ Ajusta esto
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)");
            $stmt->bindParam(":nombre", $datos["nombre"]);
            $stmt->bindParam(":email", $datos["email"]);
            $stmt->bindParam(":password", $datos["password"]);


            if ($stmt->execute()) {
                return "ok";
            } else {
                return "error";
            }
        } catch (PDOException $e) {
            return "error: " . $e->getMessage();
        }
    }
}
