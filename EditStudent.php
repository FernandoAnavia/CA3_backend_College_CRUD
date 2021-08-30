<?php
//connect to the database
include 'library/DBConnection.php';

//set up the sql string with prepared statements


$sql = "UPDATE student 
        SET name=?, 
            surname=?, 
            address=?, 
            phoneNumber=?, 
            dob=?,
            collegeId=?, 
            bachelorId=?, 
            gender=? 
        WHERE id=?";




$stmt = $conn->prepare($sql);

//the variables are at your own choice, 
//they do not require to be the exact same as the columns in the database
$stmt->bind_param("ssssssssi", $name, 
$surname, $address, $phoneNumber, 
$dob, $collegeId, $bachelorId, $gender, $id);


//set up the variables
$id = $_POST["id"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$address = $_POST["address"];
$phoneNumber = $_POST["phoneNumber"];
$dob = $_POST["dob"];
$collegeId = $_POST["collegeId"];
$bachelorId = $_POST["bachelorId"];
$gender = $_POST["gender"];


//execute the statement
$stmt->execute();
//close the connection
$conn->close();
//redirect back to index page
header("Location: index.php");


?>