<?php
    include "credentials.php";
    
    $conn = mysqli_connect($servername,$user,$password,$dbname);
    if(!$conn){
        die('Problema de conexão BD: ' . mysqli_connect_error());
    }
    else{
        echo "tudo ok!";
    }

    // sql to create table
    /*$sql = "CREATE TABLE MyGuests (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
    )";

    $firstname = mysqli_real_escape_string($conn,$_POST["firstname"]);
    $lastname = mysqli_real_escape_string($conn,$_POST["lastname"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);

    $sql = "INSERT INTO MyGuests
            (firstname, lastname, email) 
            VALUES ('". $firstname ."', '". $lastname ."', '".$email."')";

    if(!mysqli_query($conn,$sql))
        die("Erro sql: " . mysqli_error($conn));
    else   
        echo "Tudo ok com o BD";
    
    mysqli_close($conn);*/
        
?>