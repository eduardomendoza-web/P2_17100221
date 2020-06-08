<?php 
    require 'database.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet"  href="assets/css/estilo_lista.css">

    <title>Lista de Usuarios</title>
</head>
<body>
<header>
        <a href="/PROYECTO WEB/Inicio.html">Academia de Música Zazei</a>
    </header>

    <h1>Lista Usuarios</h1>
    
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>ApPaterno</th>
            <th>ApMaterno</th>
            <th>login</th>
            <th>Acciones</th>
        </tr>
            <?php 
                $slq="SELECT idUsuario,nombre,apPaterno,apMaterno,login FROM cusuario2 ";
                $records= $conn->prepare($slq);
                $records->execute();

                while($resultado = $records ->fetch())
                {
                    

            ?>
                    <tr>
                        <td><?php echo $resultado["idUsuario"]?></td>
                        <td><?php echo $resultado["nombre"]?></td>
                        <td><?php echo $resultado["apPaterno"]?></td>
                        <td><?php echo $resultado["apMaterno"]?></td>
                        <td><?php echo $resultado["login"]?></td>
                        <td>
                            <a class="link_edit" href="editar_usuario.php?id=<?php echo $resultado["idUsuario"]?>">Editar</a>
                            <a class="link_delete" href="eliminar_confirmar_usuario.php?id=<?php echo $resultado["idUsuario"]?>">Eliminar</a>
                         </td>

                    </tr>
        <?php 
                }
        ?>        
                


            

        
    </table>
 
   
</body>
</html>