<?php

    require_once '../core/conexion.php';

    class Cliente extends Conexion
    {

        public function read() 
        {
            $sql = "Call ObtenerClientes();";
            $data = mysqli_query($this->conn,$sql);
            $ret = array();
            while ($row = mysqli_fetch_object($data)) {
                $ret[] = $row;
            }
            return $ret;
        }
        
        public function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico)
        {
            $sql = "Call CrearCliente('$nombres','$apellidos','$telefono','$direccion','$correo_electronico');";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }            
        }
        
        public function read_singlerecord($id) {
            $sql = "Call ObtenerCliente($id);";
            $data = mysqli_query($this->conn,$sql);
            $record = mysqli_fetch_object($data);
            return $record;
        }
        
        public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id) {
            $sql = "Call ActualizarCliente('$nombres','$apellidos','$telefono','$direccion','$correo_electronico',$id);";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }
        
        public function delete($id) {
            $sql = "Call BorrarCliente($id);";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }


    }
?>