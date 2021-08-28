<?php
//connect to the database
include 'library/DBConnection.php';

//set up the sql string with prepared statements
$sql = "UPDATE book 
        SET name=?, 
            author=?, 
            publisher=?, 
            isbn=?, 
            published_date=? 
        WHERE id=?";


$stmt = $conn->prepare($sql);

//the variables are at your own choice, 
//they do not require to be the exact same as the columns in the database
$stmt->bind_param("sssssi", $name, 
$author, $publisher, $isbn, 
$published_date, $id);

//set up the variables
$id = $_POST["id"];
$name = $_POST["name"];
$author = $_POST["author"];
$publisher = $_POST["publisher"];
$isbn = $_POST["isbn"];
$published_date = $_POST["published_date"];

//execute the statement
$stmt->execute();
//close the connection
$conn->close();
//redirect back to index page
header("Location: index.php");


?>