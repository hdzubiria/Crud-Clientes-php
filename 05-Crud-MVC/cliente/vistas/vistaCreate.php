<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <title>Adicionar Cliente</title>
    </head>

    <body>
        <h1>Adicionar Cliente</h1>
        <a href="controladorCliente.php?Accion=ReadAll">Regresar</a>
        <br><br>

        <form method="post" action="controladorCliente.php?Accion=Create">
            <table>
                <tr>
                    <td>Nombre:</td>
                    <td><input name="nombres" id="nombres" type="text"></td>
                </tr>
                <tr>
                    <td> Apellido:</td>
                    <td><input name="apellidos" id="apellidos" type="text"></td>
                </tr>
                <tr>
                    <td> Teléfono:</td>
                    <td><input name="telefono" id="telefono" type="text"></td>
                </tr>
                <tr>
                    <td> direccion:</td>
                    <td><input name="direccion" id="direccion" type="text"></td>
                </tr>
                <tr>
                    <td> Correo:</td>
                    <td><input name="correo"  id="correo" type="text"></td>
                </tr>
                <tr>
                    <th><input type="submit" name="Grabacion" id="Grabacion" value="Grabar Datos"></3h>
                </tr>
            </table>
        </form>

        <div>
            <h3 style="color:green"><?php echo $mensaje ?></h3>
        </div>

    </body>

</html>