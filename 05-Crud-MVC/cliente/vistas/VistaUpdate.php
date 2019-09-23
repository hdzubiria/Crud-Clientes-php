<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Actualizar Cliente</title>
</head>

<body>
    <h1>Actualizar Cliente</h1>
    <a href="controladorCliente.php?Accion=ReadAll">Regresar</a>
    <br><br>

    <form method="post" action="controladorCliente.php?Accion=Update">
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input id="nombre" name="nombres" type="text" value="<?php echo $datos->nombres;?>"></td>
                <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $datos->id;?>">
            </tr>
            <tr>
                <td> Apellido:</td>
                <td><input id="apellido" name="apellidos" type="text" value="<?php echo $datos->apellidos;?>"></td>
            </tr>
            <tr>
                <td> Teléfono:</td>
                <td><input id="telefono" name="telefono" type="text" value="<?php echo $datos->telefono;?>"></td>
            </tr>
            <tr>
                <td> direccion:</td>
                <td><input id="direccion" name="direccion" type="text" value="<?php echo $datos->direccion;?>"></td>
            </tr>
            <tr>
                <td> Correo:</td>
                <td><input id="Correo" name="correo" type="text" value="<?php echo $datos->correo;?>"></td>
            </tr>
            <tr>
                <th><input type="submit" name="Grabacion" id="Grabacion" value="Actualizar Datos"></th>
            </tr>
        </table>
    </form>

    <div>
        <h3 style="color:green"><?php echo $mensaje ?></h3>
    </div>

</body>

</html>