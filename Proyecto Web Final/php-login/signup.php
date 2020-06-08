    <?php
    require 'database.php';
    $message='';
    
    if(!empty($_POST['nombre']) && !empty($_POST['apPaterno']) && !empty($_POST['apMaterno']) && !empty($_POST['email']) && !empty($_POST['password'])) {
        $sql= "INSERT INTO cusuario2 (nombre,apPaterno,apMaterno,login,password) VALUES (:nombre, :apPaterno, :apMaterno, :email, :password)";
        $stmt= $conn->prepare($sql);
        $stmt->bindParam(':nombre',$_POST['nombre']);
        $stmt->bindParam(':apPaterno',$_POST['apPaterno']);
        $stmt->bindParam(':apMaterno',$_POST['apMaterno']);
        $stmt->bindParam(':email',$_POST['email']);
        $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password',$password);

        if($stmt->execute()) {
            $message ='Se asignó correctamente el usuario';
        }else {
            $message= 'A ocurrido un error creando su contraseña';
        }
    }
    //Condigo anterior
    /*if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql= "INSERT INTO users (email,password) VALUES (:email, :password)";
        $stmt= $conn->prepare($sql);
        $stmt->bindParam(':email',$_POST['email']);
        $password= password_hash($_POST['password'], PASSWORD_BCRYPT);
        $stmt->bindParam(':password',$password);

        if($stmt->execute()) {
            $message ='Se asignó correctamente el usuario';
        }else {
            $message= 'A ocurrido un error creando su contraseña';
        }
    }*/
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>

    <?php if(!empty($message)): ?>
    <p>  <?= $message?></p>
<?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Ingresar</a></span>
   
    <form action="signup.php" method="post"> 
    <input type="text" name="nombre" placeholder="Ingrese su Nombre">
    <input type="text" name="apPaterno" placeholder="Ingresa su apellido Paterno">
    <input type="text" name="apMaterno" placeholder="Ingresa su apellido Materno">


     <input type="text" name="email" placeholder="Ingresa tu email">
     <input type="password" name="password" placeholder="Ingresa tu contraseña" >
     <input type="password" name="confirm_password" placeholder="Confirmar contraseña" >
     <input type="submit" value="Enviar">
     
    </form>
</body>
</html>