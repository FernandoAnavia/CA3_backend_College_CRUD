<?php
//connect to the database
include 'library/DBConnection.php';
$error = [];

$id = $_POST["id"];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

if ($password === $confirmPassword){
        //encrypt the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    } 


if(!isset($password) || empty($password)){
        $error['password'] = 'password is required';
}
if(!isset($confirmPassword) || empty($confirmPassword)){
        $error['confirmPassword'] = 'confirmPassword is required';
}


if(empty($error)){
    //set up the sql string with prepared statements
    $sql = "UPDATE user 
            SET password=? 
            WHERE id=?";
            


    $stmt = $conn->prepare($sql);

    //the variables are at your own choice, 
    //they do not require to be the exact same as the columns in the database
    $stmt->bind_param("si", $hashedPassword, $id);


    //execute the statement
    $stmt->execute();
    //close the connection
    $conn->close();
    //redirect back to Pub list page
    header("Location: UserList.php");
} else {
    require_once('UserList.php');
}



?>