<?php
    require 'database.php';
    
    session_start();

    if(!isset($_SESSION['rol'])){
        header('location: login.php');
    }else{
        if($_SESSION['rol'] != 1){
            header('location: login.php');
        }
    }

    if(isset($_GET['cerrar_sesion'])){
        session_unset(); 
    
        // destroy the session 
        session_destroy(); 
        header('location: login.php');
    }

 
    

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body>
    <h1>Administrador</h1>
   <?php 

    $db = new Database();
	$query = $db->connect()->prepare("Select * From Usuario WHERE TipoUsuario = 0");
	$query->execute(); 
   ?>
   
   <form method="POST" class="formulario" >
   <table>
        <tr>
            <th>usuario</th>
        </tr>
        <tr>
            <td>
                <select name="usuario">
                <?php 
                    while($fila=$query->fetch())
                    {
                        $idUsuario = $fila['idUsuario'];
                        $usuario = $fila['Usuario'];
                        echo "<option value=$usuario>$usuario</option>";
                    }
                        
                    

                ?>
                </select>
            </td>
        </tr>
   </table>
        <input type="submit" value="Buscar Citas" class="button">

   </form>    
   </body>
</html>