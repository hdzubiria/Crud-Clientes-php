<?php
    // Inicializar Objeto Sesion
    session_start();
    if (isset($_SESSION['logged_in_user_id'])) {
        unset($_SESSION['logged_in_user_id']);
        unset($_SESSION['logged_in_user_name']);
        unset($_SESSION['logged_in_user_role']);
    }
    
    $mensaje = "";
    if (isset($_POST) && !empty($_POST)) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        require_once("modeloUsuario.php");
        $modelo = new Usuario();
        $res = $modelo->Validar_Usuario($usuario,$password);

        if ($res) {
            // initializar Variables de Sesion
            $_SESSION['logged_in_user_id'] = session_id();
            $_SESSION['logged_in_user_name'] = $usuario;
            $_SESSION['logged_in_user_role'] = 'Administrador';

            // header('location: index.php');
            header('location:../cliente/controladorCliente.php?Accion=ReadAll');

        } else {
            $mensaje = "No fue Posible Conectarse, Revise los Datos!!";
        }
    }
    require_once("vistas/vistaLogin.php");

?>