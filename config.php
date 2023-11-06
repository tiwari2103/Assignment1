<?php 
    $server ="localhost";
    $user = "root";
    $pass = "";
    $db = "mysql";

    $conn = new PDO("mysql:host=$server;dbname=$db",$user,$pass);
?>
