<?php
//connect to the database
include 'library/DBConnection.php';
$error = [];

$name = filter_input(INPUT_POST, 'name',  FILTER_SANITIZE_STRING);
$collegeId = filter_input(INPUT_POST, 'collegeId',  FILTER_SANITIZE_STRING);
$duration = filter_input(INPUT_POST, 'Duration',  FILTER_SANITIZE_STRING);


if(!isset($name) || empty($name)){
        $error['name'] = 'Bachelor name is required';
}
if(!isset($collegeId) || empty($collegeId)){
        $error['collegeId'] = 'College is required';
}
if(!isset($duration) || empty($duration)){
        $error['duration'] = 'duration is required';
}

if(empty($error)){
    //set up the sql string with prepared statements
    $sql = "UPDATE bachelorprogram 
            SET nameB=?, 
                collegeId=?, 
                duration=? 
            WHERE id=?";


    $stmt = $conn->prepare($sql);

    //the variables are at your own choice, 
    //they do not require to be the exact same as the columns in the database
    $stmt->bind_param("sssi", $name, $collegeId, $duration, $id);

    //set up the variables
    $id = $_POST["id"];
    $name = $_POST["name"];
    $collegeId = $_POST["collegeId"];
    $duration = $_POST["Duration"];

    //execute the statement
    $stmt->execute();
    //close the connection
    $conn->close();
    //redirect back to Pub list page
    header("Location: BachelorList.php");
} else {
    require_once('NewBachelor.php');
}



?>