<!DOCTYPE html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <title>Listado de Clientes</title>
  </head>

  <body>
      <h1>Listado de Clientes </h1>
      <a href="controladorCliente.php?Accion=Create">Adicionar Clientes</a>
      <br>
      <br>
      <table border="1">
          <thead>
              <th>Nombres</th>
              <th>Teléfono</th>
              <th>Direccion</th>
              <th>Correo</th>
              <th>Acciones</th>
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
                          <td>
                              <a href="controladorCliente.php?Accion=Update&id=<?php echo $id;?>">Actualizar</a>
                              <br>
                              <a href="controladorCliente.php?Accion=Delete&id=<?php echo $id;?>">Borrar</a>
                          </td>
                      </tr>
              <?php
                  }
              ?>

          </tbody>
              
      </table>
      <br>
      <br>
  </body>
</html>