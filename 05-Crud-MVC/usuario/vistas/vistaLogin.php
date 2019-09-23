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