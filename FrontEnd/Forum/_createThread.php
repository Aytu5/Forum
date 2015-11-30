<?php
    session_start();

    if(!isset($_POST["subject"]) || !isset($_POST["body"])){
        echo "error :(";
        die();
    }else if(!isset($_SESSION["user"])){
        echo "You must be logged in to create a thread";
        die();
    }

    $servername = "classdb.it.mtu.edu";
    $username = "cs3425gr";
    $password = "cs3425gr";
    $dbname = "ajdavid";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 ?>
