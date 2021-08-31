<?php
//connect to the database
include 'library/DBConnection.php';
$error = [];

$id = filter_input(INPUT_POST, 'id',  FILTER_SANITIZE_STRING);
$username = filter_input(INPUT_POST, 'username',  FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email',  FILTER_SANITIZE_STRING);
$role = filter_input(INPUT_POST, 'role',  FILTER_SANITIZE_STRING);


if(!isset($username) || empty($username)){
        $error['username'] = 'Username is required';
}
if(!isset($email) || empty($email)){
        $error['email'] = 'Email is required';
}
if(!isset($role) || empty($role)){
        $error['role'] = 'role is required';
}

if(empty($error)){
    //set up the sql string with prepared statements
    $sql = "UPDATE user 
            SET username=?, 
                email=?, 
                role=? 
            WHERE id=?";


    $stmt = $conn->prepare($sql);

    //the variables are at your own choice, 
    //they do not require to be the exact same as the columns in the database
    $stmt->bind_param("sssi", $username, $email, $role, $id);

    //set up the variables
    $id = $_POST["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $role = $_POST["role"];

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