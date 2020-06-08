<?php
    require 'database.php';
    $message='';
    
    if(!empty($_POST['nombre']) && !empty($_POST['apPaterno']) && !empty($_POST['apMaterno']) && !empty($_POST['email'])) {
        $sql= "UPDATE cusuario2
        SET nombre = :nombre, apPaterno = :apPaterno, apMaterno = :apMaterno, login = :email
        WHERE idUsuario=:idusuarioS";
               //echo $sql;
               $iduserX =$_GET['id'];
               echo $iduserX;
               
        $stmt= $conn->prepare($sql);
        $stmt->bindParam(':idusuarioS',$iduserX);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':apPaterno',$_POST['apPaterno']);
        $stmt->bindParam(':apMaterno',$_POST['apMaterno']);
        $stmt->bindParam(':email',$_POST['email']);
        $stmt->execute();
        //$password= password_hash($_POST['password'], PASSWORD_BCRYPT);
        //$stmt->bindParam(':password',$password);

        

        if($stmt->execute()) {
            $message ='Se asignó correctamente el usuario';
        }else {
            $message= 'A ocurrido un error creando su contraseña';
        }
    }

  
    //Mostrar Datos Valida que el ID no valla vacio
    if(empty($_GET['id'])){
        header('Location: lista_usuario.php');
    }

    $iduser =$_GET['id'];
    $sql2="SELECT idUsuario,nombre,apPaterno,apMaterno,login FROM cusuario2 WHERE idUsuario=:idusuario";
    $stmt2= $conn->prepare($sql2);
    $stmt2->bindParam(':idusuario',$iduser);
    $stmt2->execute();

    //----------CONTAR FILAS--------------//
    $iduser3 = $_GET['id'];
    $sql3 = "SELECT COUNT(*) FROM cusuario2 WHERE idUsuario=:idusuario"; 
    $result3 = $conn->prepare($sql3); 
    $result3->bindParam(':idusuario',$iduser3);
    $result3->execute(); 
    $number_of_rows = $result3->fetchColumn(); 
    //echo $number_of_rows;
    

    //SIRVE PARA QUE SI CAMBAIN EL ID NOS REDIRIGA A LA LISTA DE USUARIOS

    //-----------------------------------//

    if($number_of_rows==0)
    {
        header('Location: lista_usuario.php');
    }
    else
    {
        while($data = $stmt2->fetch())
        {
            $iduser =$data['idUsuario'];
            $nombre =$data['nombre'];
            $apPaterno =$data['apPaterno'];
            $apMaterno =$data['apMaterno'];
            $login =$data['login'];
           
        }
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
    <p>  <?= $message?></p>
<?php endif; ?>
    
    <h1>Actualizar Usuario</h1>
    <!--<span>o <a href="login.php">Ingresar</a></span>-->
   
    <form action="" method="post"> 
    <input type="hidden" name="idUsuariox" value = "<?php echo $iduser; ?>">

    <input type="text" name="nombre" placeholder="Ingrese su Nombre" value = "<?php echo $nombre; ?>">
    <input type="text" name="apPaterno" placeholder="Ingresa su apellido Paterno" value = "<?php echo $apPaterno; ?>">
    <input type="text" name="apMaterno" placeholder="Ingresa su apellido Materno" value = "<?php echo $apMaterno; ?>">


     <input type="text" name="email" placeholder="Ingresa tu email" value = "<?php echo $login; ?>">
     <!--<input type="password" name="password" placeholder="Ingresa tu contraseña" >
     <input type="password" name="confirm_password" placeholder="Confirmar contraseña" >-->
     <input type="submit" value="Enviar">
     
    </form>
</body>
</html>