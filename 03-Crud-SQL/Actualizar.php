<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:index.php");
	}
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Actualizar Cliente</title>
</head>

<body>
    <h1>Actualizar Cliente</h1>
    <a href="index.php">Regresar</a>
    <br><br>

    <?php 
        include("database.php");
        $clientes = new Database();
        $mensaje = "";

        if (isset($_POST) && !empty($_POST)) {
            $nombres = $_POST['nombres'];
            $apellidos = $_POST['apellidos'];
            $telefono = $_POST['telefono'];
            $direccion = $_POST['direccion'];
            $correo = $_POST['correo'];
            $id_cliente=intval($_POST['id_cliente']);

            $res = $clientes->update($nombres, $apellidos, $telefono, $direccion, $correo,$id_cliente);

            if ($res) {
                $mensaje = "Datos Actualizados con Exito";
            } else {
                $mensaje = "No fue Posible Actualizar el Cliente";
            }
        }

        $datos_cliente=$clientes->read_singlerecord($id);
    ?>


    <form method="post">
        <table>
            <tr>
                <td>Nombre:</td>
                <td><input id="nombre" name="nombres" type="text" value="<?php echo $datos_cliente->nombres;?>"></td>
                <input type="hidden" id="id_cliente" name="id_cliente" value="<?php echo $datos_cliente->id;?>">
            </tr>
            <tr>
                <td> Apellido:</td>
                <td><input id="apellido" name="apellidos" type="text" value="<?php echo $datos_cliente->apellidos;?>"></td>
            </tr>
            <tr>
                <td> Teléfono:</td>
                <td><input id="telefono" name="telefono" type="text" value="<?php echo $datos_cliente->telefono;?>"></td>
            </tr>
            <tr>
                <td> direccion:</td>
                <td><input id="direccion" name="direccion" type="text" value="<?php echo $datos_cliente->direccion;?>"></td>
            </tr>
            <tr>
                <td> Correo:</td>
                <td><input id="Correo" name="correo" type="text" value="<?php echo $datos_cliente->correo;?>"></td>
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