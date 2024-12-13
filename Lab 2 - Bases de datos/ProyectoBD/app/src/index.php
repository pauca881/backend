<?php
require_once("services/conexionDB.php");
require_once('./class/mySqlUsuarioRepository.php');
require_once('./class/Usuario.php');

//Creo conexion a la BD, y nuevo repositorio
$conexionDB = new ConexionDB();
$usuarioRepository = new mySqlUsuarioRepository($conexionDB);

// Verifica si el formulario se ha enviado con el método post
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //si se ha enviado con el botón cuyo nombre es agregar
     if(isset($_POST['agregar'])){

        $nombre = $_POST['nombre'];
        $email = $_POST['email'];

        $usuario = new Usuario($nombre, $email);
        //Devuelve true si la función agregarUsuario se ejecuta correctamente
        if($usuarioRepository->agregarUsuario($usuario->getNombre(), $usuario->getEmail())){
            echo "Usuario agregado correctamente";
        }
        else { echo "Error al agregar usuario"; }
    }
}

$usuarios = $usuarioRepository->obtenerUsuarios();
$conexionDB->desconectar();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador de Usuarios</title>
</head>
<body>

<h3>Administrador de Usuarios</h3>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        
        </tr>
    </table>

    <?php foreach ($usuarios as $user) { ?>

        <tr>
            <td><?php  echo $user['id'];?></td>
            <td><?php  echo $user['nombre'];?></td>
            <td><?php  echo $user['email'];?></td>
        </tr>


    <?php } ?>

    <h2>Agregar usuario</h2>
    <form method="post" action="index.php">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre"><br>

        <label for="email">Email:</label>
        <input type="text" name="email" id="email"><br>

        <input type="submit" value="Agregar usuario">
        

</body>
</html>


<!-- 
echo "Hola mundo";

$cliente = new ConexionDB();
$clientes = $cliente->getInfo();

foreach ($clientes as $cliente){
    echo $cliente['nombre']."<br>";
}


foreach ($clientes as $cliente){
    echo json_encode($cliente);
} -->