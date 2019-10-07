<?php

    class Conexion 
    {
        protected $conn;
        private $dbhost;
        private $user;
        private $password;
        private $database;
        private $charset;

        function __construct() {

            $db_cfg = require_once '../config/database.php';
            $this->dbhost=$db_cfg["host"];
            $this->user=$db_cfg["user"];
            $this->password=$db_cfg["pass"];
            $this->database=$db_cfg["database"];
            $this->charset=$db_cfg["charset"];

            $this->connectar_bd();

            // Ajustar el Conjunto de Caracteres 
            $sql = "SET NAMES '".$this->charset."'";
            mysqli_query($this->conn,$sql);

        }

        private function connectar_bd()
        {
            $this->conn = mysqli_connect($this->dbhost,$this->user,$this->password,$this->database);
            if (mysqli_connect_error()) {
                die("Fallo la conexion a la bas de datos".mysqli_connect_error().mysqli_connect_errorno());
            }
        }

    }
?>