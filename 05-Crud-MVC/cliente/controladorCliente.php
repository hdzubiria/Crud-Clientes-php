<?php

    // Validar Si ya hay Sesion
    session_start();
    if (!isset($_SESSION['logged_in_user_id'])) {
        header('location: ../usuario/controladorUsuario.php');
    }
    
    // Cargar e Instanciar el MODELO
    require_once("modeloCliente.php");
    $modelo = new Cliente();
    
    // Asignar permisos segun el rol
    $perms = $modelo->FillPerms($_SESSION['logged_in_user_role']);
    
    if (isset($_GET['Accion'])) {
        $AccionCRUD = $_GET['Accion'];
        
        // Validar si tiene o no permisos
        if(!$perms[$AccionCRUD]) {
            $AccionCRUD = "NotPerms";
        }
        
        switch ($AccionCRUD) {
            case "Create":
                $mensaje = "";
                if (isset($_POST) && !empty($_POST)) {
                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $telefono = $_POST['telefono'];
                    $direccion = $_POST['direccion'];
                    $correo = $_POST['correo'];
                    $res = $modelo->create($nombres,$apellidos,$telefono,$direccion,$correo);
                    if ($res) {
                        $mensaje = "Se inserto el Nuevo Cliente - ".$nombres." ".$apellidos;
                    } else {
                        $mensaje = "No fue Posible Crera el Nuevo Cliente";
                    }
                }
                require_once("vistas/vistaCreate.php");
                break;
            case "ReadAll":
                $datos = $modelo->read();
                require_once("vistas/vistaRealAll.php");
                break;
            case "Update":
                $mensaje = "";
                if (isset($_POST) && !empty($_POST)) {
                    $nombres = $_POST['nombres'];
                    $apellidos = $_POST['apellidos'];
                    $telefono = $_POST['telefono'];
                    $direccion = $_POST['direccion'];
                    $correo = $_POST['correo'];
                    $id=intval($_POST['id_cliente']);
        
                    $res = $modelo->update($nombres, $apellidos, $telefono, $direccion, $correo,$id);
        
                    if ($res) {
                        $mensaje = "Datos Actualizados con Exito";
                    } else {
                        $mensaje = "No fue Posible Actualizar el Cliente";
                    }
                }
                else{
                    if (isset($_GET['id'])){
                        $id=intval($_GET['id']);
                    }
                }
                $datos = $modelo->read_singlerecord($id);
                require_once("vistas/vistaUpdate.php");
                break;

            case "Delete":
                if (isset($_GET['id'])){
                    $id=intval($_GET['id']);
                    $res = $modelo->delete($id);
                    if($res){
                        $datos = $modelo->read();
                        require_once("vistas/vistaRealAll.php");
                    }
                    else {
                        require_once("vistas/vistaDelete.php");
                    }
                }
                break;
            case "NotPerms":
                require_once("vistas/vistaNOTPerms.php");
                break;

        }
    }


?>