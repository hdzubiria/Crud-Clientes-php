#  Pasos del Refactoring

1. Refactoring de Conexión - Reconstruir la Conexxion a BD para poderla reusar en Cada Modelo
    1. Extraer lógica de conexion del modelo existente - Cliente
    
        - Crear Archivo de Configuración
        - Crear Clase conexion
    
    2. Crear Estructura de Controlador

        - Crear Carpeta del Controlador
        - Crear ModeloCliente ( Hereder de Conexión)
        - Crear Controlador Cliente
        - Incluir el llamado al controlador de usuarios en el Login.

            ---

            header('location:cliente/controladorCliente.php?Accion=ReadAll');

            --- 

    3. Crear CRUD - read en el controlador

            
        - Cambiar en el modelo para que la funcion read retorne un arreglo

            ---

            $ret = array();
            while ($row = mysqli_fetch_object($data)) {
                $ret[] = $row;
            }
            return $ret;

            ---
        - Mover vista Index como vistas/vistaReadAll.php
        - cambiar el while por un foreach()

            ---

            foreach ( $datos as $row)

            ---
    4. Implmentar cada accion del CRUD



