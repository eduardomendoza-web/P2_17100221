<?php 
require 'database.php';
if(!empty($_POST))
{
    $idusuario=$_POST['idUsuariox'];
    $sqldel="DELETE FROM cusuario2 WHERE idUsuario=:IDUSUARIO";
    $stmtx= $conn->prepare($sqldel);
    $stmtx->bindParam(':IDUSUARIO',$idusuario);

    if($stmtx->execute()) {
        header("Location: lista_usuario.php");
    }else {
        echo "Error al eliminar";
    }

}





    if(empty($_REQUEST['id'])){
        header("Location: lista_usuario.php");
    }else
    {
        $idusuario=$_REQUEST['id'];
        $sql="SELECT nombre,login FROM cusuario2 WHERE idUsuario= :idusuario";
        $stmt= $conn->prepare($sql);
        $stmt->bindParam(':idusuario',$idusuario);
        $stmt->execute();

        while($resultado = $stmt ->fetch())
        {
            $nombre=$resultado['nombre'];
            $email=$resultado['login'];
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/estilo_eliminar.css">
    <title>Eliminar</title>
</head>
<body>
    <section>
        <div class="data_delete"> 
            <h2>¿Está seguro de eliminar el registro?</h2>
            <p>Nombre: <span><?php echo $nombre; ?></span></p>
            <p>email: <span><?php echo $email; ?></span></p>

            <form method="post"action="">
                <input type="hidden" name="idUsuariox" value = "<?php echo $idusuario; ?>">

                <a href="lista_usuario.php" class ="btn_cancel">Cancelar</a>
                <input type="submit" value="Aceptar" class="btn_ok">
            </form>
        </div>
    </section>
</body>
</html>