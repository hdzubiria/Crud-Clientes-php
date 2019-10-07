<?php

    require_once '../core/conexion.php';

    class Usuario extends Conexion
    {

        public function Validar_Usuario($Usuario,$Password) {
            $sql = "Call ValidarUsuario('$Usuario','$Password');";
            $data = mysqli_query($this->conn,$sql);
            $record = mysqli_fetch_object($data);
            if ($record) {
                return $record;
            }
            else {
                return false;
            }
        }

    }
?>