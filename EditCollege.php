<?php
//connect to the database
include 'library/DBConnection.php';
$error = [];

$name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address',  FILTER_SANITIZE_STRING);
$phoneNumber = filter_input(INPUT_POST, 'phoneNumber',  FILTER_SANITIZE_STRING);


if(!isset($name) || empty($name)){
        $error['name'] = 'Publisher name is required';
}
if(!isset($address) || empty($address)){
        $error['address'] = 'Address is required';
}
if(!isset($phoneNumber) || empty($phoneNumber)){
        $error['phoneNumber'] = 'phoneNumber is required';
}

if(empty($error)){
    //set up the sql string with prepared statements
    $sql = "UPDATE collegebrach 
            SET nameC=?, 
                addressC=?, 
                phoneNumberC=? 
            WHERE id=?";


    $stmt = $conn->prepare($sql);

    //the variables are at your own choice, 
    //they do not require to be the exact same as the columns in the database
    $stmt->bind_param("sssi", $name, $address, $phoneNumber, $id);

    //set up the variables
    $id = $_POST["id"];
    $address = $_POST["address"];
    $name = $_POST["name"];
    $phoneNumber = $_POST["phoneNumber"];

    //execute the statement
    $stmt->execute();
    //close the connection
    $conn->close();
    //redirect back to Pub list page
    header("Location: CollegeList.php");
} else {
    require_once('NewCollege.php');
}



?>