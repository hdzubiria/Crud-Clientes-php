<?php 
    
    // Inicializar Objeto Sesion
    session_start();
    if (isset($_SESSION['logged_in_user_id'])) {
        unset($_SESSION['logged_in_user_id']);
        unset($_SESSION['logged_in_user_name']);
        unset($_SESSION['logged_in_user_role']);
    }        
        
    include("database.php");
    $clientes = new Database();
    $mensaje = "";

    if (isset($_POST) && !empty($_POST)) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $res = $clientes->Validar_Usuario($usuario,$password);

        if ($res) {

            // initializar Variables de Sesion
            $_SESSION['logged_in_user_id'] = session_id();
            $_SESSION['logged_in_user_name'] = $usuario;
            $_SESSION['logged_in_user_role'] = 'Administrador';

            header('location: index.php');
        } else {
            $mensaje = "No fue Posible Actualizar el Cliente";
        }
    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Validación de Usuario</title>
</head>

    <body>
        <h1>VALIDAR USUARIO</h1>
        <form method="POST">
            <table>
                <tr>
                    <td><label for="usuario">Usuario:</label></td>
                    <td><input type="text" name="usuario"></td>
                </tr>
                <tr>
                    <td><label for="password">Contraseña:</label></td>
                    <td><input type="password" name="password"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <center> <input type="submit" value="Ingresar"></center>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <h2>
                            <?php echo $mensaje ?>
                        </h2>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>