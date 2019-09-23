<?php 
    // Inicalizar Objeto Sesion
    session_start();

    if (isset($_SESSION['logged_in_user_name'])) {
        unset($_SESSION['logged_in_user_id']);
        unset($_SESSION['logged_in_user_name']);
        unset($_SESSION['logged_in_user_role']);
    }    

    $mensaje = "";
    if (isset($_POST) && !empty($_POST)) {
        
        include('database.php');
        $cliente = new Database();
        $nombre = $_POST['usuario'];
        $password = $_POST['password'];
        $res = $cliente->ValidUser($nombre, $password);
        
        if($res){
            // initializar Variables de Sesion
            $_SESSION['logged_in_user_id'] = session_id();
            $_SESSION['logged_in_user_name'] = $nombre;
            $_SESSION['logged_in_user_role'] = 'Administrador';
            
            // Ir aVentana Personal
            header('location: index.php');
        }
        $mensaje = "Los Datos NO correponden a un Usuario Valido";
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Validación de Usuario</title>
    </head>

    <body >


        <h1>Validación de Usuario</h1>
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
                        <?php 
                            if ($mensaje!='') { 
                        ?>
                                <div style="background-color:yellow;height:50px;text-align: center;line-height:50px;">
                                    <h4 style="color:red;">
                                        <?php echo $mensaje ?>
                                    </h4>
                                </div>
                        <?php 
                            }    
                        ?>
                    </td>
                </tr>
            </table>
        </form>
    </body>

</html>