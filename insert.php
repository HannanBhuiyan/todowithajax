<?php
require 'db.php';
$number = count($_POST['name']);

if($number >= 1){

    for($i = 0; $i < $number; $i++){

        $sql = "INSERT INTO `todos`(`name`) VALUES ('".$_POST["name"][$i]."')";
        mysqli_query($conn, $sql);
    }
    echo "data inser succes";
}
else {
    echo 'Enter name';
}