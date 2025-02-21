<?php 
require_once('./class/listUsuarios.php');ç
require_once('./class/listTareas.php');ç
require_once('./services/conexionDb.php');ç
$listUsuarios = new listUsuarios();
$listTareas = new listTareas();
$conexionDB = new conexionDb();
$usuariosDisponibles = $listUsuarios->getUsuarios($conexion);
$listadoTareas = $listTareas->getTareas($conexionDB->getConexion());
$listadoTareasSinAsignar = $listTareas->getTareasSinAsignar($conexionDB->getConexion(), false);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de tareas y usuarios</title>
</head>
<body>
    
<h1>Gestión de tareas y usuarios</h1>

<form action="procesar_tarea.php" method="post">
    <label for="tarea">Tarea:</label>   
    <input type="text" id="descripcion" name="descripcion" required>
    <select name="usuario_id" id="usuario_id">
        <option value="">Seleccione usuario</option>
        <?php 
        foreach ($usuariosDisponibles as $usuario){
            echo '<option value="'.$usuario->getId().'">'.$usuario->getNombre().'</option>';

        }
    ?>
    </select>
    

</form>

</body>
</html>
