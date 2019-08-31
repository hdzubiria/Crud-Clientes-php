<?php 
    if (isset($_GET['id'])){
        include('database.php');
        $cliente = new Database();
        $id=intval($_GET['id']);
        $res = $cliente->delete($id);
        if($res){
            header('location: index.php');
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Borrar Datos</title>
    </head>
    <body>
        <h1>Error al eliminar el registro</h1>
        <a href="index.php">Regresar</a>
    </body>
</html>