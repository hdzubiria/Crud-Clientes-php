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

        public function ValidUser($usuario, $password) 
        {
            $sql = "SELECT * FROM Usuario WHERE nombre='$usuario' AND password='$password'";
            $data = mysqli_query($this->conn,$sql);
            $record = mysqli_fetch_object($data);
            if ($record) {
                return true;
            } else {
                return false;
            }            
        }


        public function read() 
        {
            $sql = "SELECT * FROM Clientes";
            $data = mysqli_query($this->conn,$sql);
            return $data;
        }

        public function create($nombres,$apellidos,$telefono,$direccion,$correo_electronico)
        {
            $sql = "INSERT INTO Clientes(nombres,apellidos,telefono,direccion,correo) ";
            $sql = $sql."VALUES ('$nombres','$apellidos','$telefono','$direccion','$correo_electronico')";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }            
        }

        public function read_singlerecord($id) {
            $sql = "SELECT * FROM Clientes where id='$id'";
            $data = mysqli_query($this->conn,$sql);
            $record = mysqli_fetch_object($data);
            return $record;
        }

        public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico,$id) {
            $sql = "UPDATE Clientes SET nombres='$nombres',apellidos='$apellidos',telefono='$telefono',direccion='$direccion',correo='$correo_electronico' ";
            $sql =$sql." WHERE id=$id";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }

        public function delete($id) {
            $sql = "DELETE FROM Clientes where id='$id'";
            $res = mysqli_query($this->conn,$sql);
            if ($res) {
                return true;
            } else {
                return false;
            }
        }


    }
?>