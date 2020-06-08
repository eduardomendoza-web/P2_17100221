<?php
    session_start();

    require 'database.php';
    if (isset($_SESSION['user_id'])) {
        $records= $conn->prepare('SELECT * FROM cusuario2 WHERE idUsuario= :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results= $records->fetch(PDO::FETCH_ASSOC);

        $user=null;

        if(count($results)> 0) {
            $user=$results;
        }
    }
/*
    if (isset($_SESSION['user_id'])) {
        $records= $conn->prepare('SELECT id,email,password FROM users WHERE id= :id');
        $records->bindParam(':id', $_SESSION['user_id']);
        $records->execute();
        $results= $records->fetch(PDO::FETCH_ASSOC);

        $user=null;

        if(count($results)> 0) {
            $user=$results;
        }
    }*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php require 'partials/header.php' ?>
   
    <?php if(!empty($user)): ?>
        <br> Bienvenido. <?= $user['nombre'] ?>
        <br>Ha ingresado correctamente
        <a href="logout.php">Salir</a>
        <br></br>
        <br></br>
        <div class="pdf">
            <table>
            <tr>
                <th><img src="/PROYECTO WEB/pdf/imagen2.png" alt=""></th>
                <th><a href="/PROYECTO WEB/pdf/Concertino_in_D_Mozart_VN_PF.pdf" target="_blank"> Concertino in D Mozart</a></th>
            </tr>  
            </table>

            <table>
            <tr>
                <th><img src="/PROYECTO WEB/pdf/imagen2.png" alt=""></th>
                <th><a href="/PROYECTO WEB/pdf/Concertino_in_D_Mozart_VN_PF.pdf" target="_blank"> Vivaldi</a></th>
            </tr>  
            </table>
            <table>
            <tr>
                <th><img src="/PROYECTO WEB/pdf/imagen2.png" alt=""></th>
                <th><a href="/PROYECTO WEB/pdf/Concertino_in_D_Mozart_VN_PF.pdf" target="_blank">Beethoven</a></th>
            </tr>  
            </table><table>
            <tr>
                <th><img src="/PROYECTO WEB/pdf/imagen2.png" alt=""></th>
                <th><a href="/PROYECTO WEB/pdf/Concertino_in_D_Mozart_VN_PF.pdf" target="_blank"> Saint Saens</a></th>
            </tr>  
            </table><table>
            <tr>
                <th><img src="/PROYECTO WEB/pdf/imagen2.png" alt=""></th>
                <th><a href="/PROYECTO WEB/pdf/Concertino_in_D_Mozart_VN_PF.pdf" target="_blank"> Dvorak</a></th>
            </tr>  
            </table><table>
            <tr>
                <th><img src="/PROYECTO WEB/pdf/imagen2.png" alt=""></th>
                <th><a href="/PROYECTO WEB/pdf/Concertino_in_D_Mozart_VN_PF.pdf" target="_blank"> Coreli</a></th>
            </tr>  
            </table><table>
            <tr>
                <th><img src="/PROYECTO WEB/pdf/imagen2.png" alt=""></th>
                <th><a href="/PROYECTO WEB/pdf/Concertino_in_D_Mozart_VN_PF.pdf" target="_blank"> Handel</a></th>
            </tr>  
            </table>
        </div>

        
        
    <?php else: ?>

        <h1>Por favor ingrese</h1>

        <a href="login.php">Ingresar</a> o
        <a href="signup.php">Registrarse</a>
    <?php endif; ?>    
</body>
</html>