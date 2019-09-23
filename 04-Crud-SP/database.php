<?php
    class Database 
    {
        private $conn;
        private $dbhost="localhost";
        private $user="root";
        private $password="";
        private $database="facturacion";

        //:3306

        // private $conn;
        // private $dbhost="remotemysql.com";
        // private $user="dhtVYfspZy";
        // private $password="my4EkfYVQX";
        // private $database="dhtVYfspZy";


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

        public function Validar_Usuario($Usuario,$Password) {
            $sql = "Call ValidarUsuario('$Usuario','$Password');";
            $data = mysqli_query($this->conn,$sql);
            $record = mysqli_fetch_object($data);
            if ($record) {
                return true;
            }
            else {
                return false;
            }
        }


        public function read() 
        {
            $sql = "Call ObtenerClientes();";
            $data = mysqli_query($this->conn,$sql);
            return $data;
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