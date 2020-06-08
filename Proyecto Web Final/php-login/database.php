<?php
/*$server='192.185.131.135';
$username='javierc1_Javier';
$password='12345';
$database='javierc1_WEB';
*/
$server='192.185.131.135';
$username='javierc1_Javier';
$password='12345';
$database='javierc1_apseguros';
try{
    $conn= new PDO("mysql:host=$server;dbname=$database;",$username,$password);
} catch(PDOException $e) {
    die('Connected failed: ' .$e->getMessage());
}



?>