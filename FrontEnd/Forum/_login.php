<?php
    session_start();

    if(!isset($_POST["password"]) || !isset($_POST["username"])){
        echo "error :(";
        die();
    }

	// Basci stuff, DB connection constants
    $servername = "classdb.it.mtu.edu";
    $username = "cs3425gr";
    $password = "cs3425gr";
    $dbname = "ajdavid";

	// Connect to DB
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmnt = $conn->prepare("select * from users where username = :username");
    $stmnt->execute(array(":username" => $_POST["username"]));
    $stmnt->setFetchMode(PDO::FETCH_BOTH);
    $resultSet = $stmnt->fetchAll();
    if(sizeof($resultSet) != 1){
        echo "account does not exist or password is incorrect";
        $conn->rollBack();
        die();
    }
    $salt = $resultSet[0]["salt"];
    echo $resultSet[0]["passwd"]."<br/>";
    echo crypt($_POST["password"],$salt)."<br/>";
    if($resultSet[0]["passwd"] == crypt($_POST["password"],$salt)){
        echo "login succesful";
        $_SESSION["user"] = $_POST["username"];
		header('Location: http://classdb.it.mtu.edu/~ajdavid/HW9/');
    }else{
        echo "login failed";
    }

 ?>
