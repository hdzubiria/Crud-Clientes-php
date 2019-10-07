<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <title>Listado de Clientes</title>
  </head>

  <body>
    <h1>Listado de Clientes </h1>

    <?php if($perms["Create"]) { ?>
        <a href="controladorCliente.php?Accion=Create">Adicionar Clientes</a>
        <br>
        <br>
    <?php } ?>
    
    <table border="1">
        <thead>
            <th>Nombres</th>
            <th>Teléfono</th>
            <th>Direccion</th>
            <th>Correo</th>
            <?php if($perms["Update"] or $perms["Delete"]) { ?>
                <th>Acciones</th>
            <?php } ?>  
        </thead>

        <tbody>

            <?php
                foreach ( $datos as $row) {
                    $id = $row->id;
                    $nombres = $row->nombres." ".$row->apellidos;
                    $telefono = $row->telefono;
                    $direccion = $row->direccion;
                    $email = $row->correo;
            ?>

                    <tr>
                        <td><?php echo $nombres; ?></td>
                        <td><?php echo $telefono; ?></td>
                        <td><?php echo $direccion; ?></td>
                        <td><?php echo $email; ?></td>
                        <?php if($perms["Update"] or $perms["Delete"]) { ?>
                            <td>
                        <?php } ?>

                            <?php if($perms["Update"]) { ?>
                                <a href="controladorCliente.php?Accion=Update&id=<?php echo $id;?>">Actualizar</a>
                            <?php } ?>
                                <br>
                            <?php if($perms["Delete"]) { ?>
                                <a href="controladorCliente.php?Accion=Delete&id=<?php echo $id;?>">Borrar</a>
                            <?php } ?>

                        <?php if($perms["Update"] or $perms["Delete"]) { ?>
                            </td>
                        <?php } ?>
                    </tr>
            <?php
                }
            ?>

        </tbody>
            
    </table>
    <br>
    <br>
    <footer>
        Usuario Conectado: <?php  echo $_SESSION['logged_in_user_name'].' - '.$_SESSION['logged_in_user_role'];?>
    </footer>
  </body>
</html>