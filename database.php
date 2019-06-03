<?php
    class Database 
    {
        private $conn;
        private $dbhost="localhost";
        private $user="root";
        private $password="";
        private $database="facturacion";

        function __construct() {
            $this->connect_db();
        }

        public function connect_db()
        {
            $this->conn = mysqli_connect($this->dbhost,$this->user,$this->password,$this->database);
            if (mysqli_connect_error()) {
                die("Fallo la conexion a la bas de datos".mysqli_connect_error().mysqli_connect_errorno());
            }
        }

        public function read() 
        {
            $sql = "SELECT * FROM clientes";
            $data = mysqli_query($this->conn,$sql);
            return $data;
        }

        public function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico)
        {
            $sql = "INSERT INTO clientes(nombres,apellidos,telefono,direccion,correo) ";
            $sql = $sql."VALUES ('$nombres','$apellidos','$telefono','$direccion','$correo_electronico')";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }            
        }


        public function read_singlerecord($id) {
            $sql = "SELECT * FROM clientes where id='$id'";
            $data = mysqli_query($this->conn,$sql);
            $record = mysqli_fetch_object($data);
            return $record;
        }

        public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id) {
            $sql = "UPDATE clientes SET nombres='$nombres',apellidos='$apellidos',telefono='$telefono',direccion='$direccion',correo='$correo_electronico' ";
            $sql =$sql." WHERE id=$id";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }

        public function delete($id) {
            $sql = "DELETE FROM clientes where id='$id'";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }
    }
?>