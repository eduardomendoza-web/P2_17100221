<?php

    session_start();

    if(isset($_SESSION['user_id'])) {
        header('Location: /PROYECTO WEB/php-login');
    }

    require 'database.php';

    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $records= $conn->prepare('SELECT idUsuario,login,password FROM cusuario2 WHERE login=:email');
        $records->bindParam(':email',$_POST['email']);
        $records->execute();
        $results= $records->fetch(PDO::FETCH_ASSOC);

        $message='';

        if(count($results)>0 && password_verify($_POST['password'],$results['password'])) {
            $_SESSION['user_id']=$results['idUsuario'];
            header('Location: /PROYECTO WEB/php-login');
        } else {
            $message='Las credenciales no coinciden';
        }
    }
/*
    if(isset($_SESSION['user_id'])) {
        header('Location: /PROYECTO WEB/php-login');
    }

    require 'database.php';

    if(!empty($_POST['email']) && !empty($_POST['password'])) {
        $records= $conn->prepare('SELECT id,email,password FROM users WHERE email=:email');
        $records->bindParam(':email',$_POST['email']);
        $records->execute();
        $results= $records->fetch(PDO::FETCH_ASSOC);

        $message='';

        if(count($results)>0 && password_verify($_POST['password'],$results['password'])) {
            $_SESSION['user_id']=$results['id'];
            header('Location: /PROYECTO WEB/php-login');
        } else {
            $message='Las credenciales no coinciden';
        }
    }
*/
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

<h1>Ingresar</h1>
    <span>o <a href="signup.php">Registarse</a></span>

    <?php if (!empty($message)) : ?> 
        <p><?= $message ?></p>
    <?php endif?>

<form action="login.php" method="post"> 
<input type="text" name="email" placeholder="Ingresa tu email">
<input type="password" name="password" placeholder="Ingresa tu contraseña" >
<input type="submit" value="Enviar">
</form>

    
</body>
</html>