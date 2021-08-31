<?php

include 'library/DBConnection.php';

$error=[];

// https://www.php.net/manual/en/function.filter-input.php
// https://www.php.net/manual/en/filter.filters.php

//sanitizing is removing anything not adhering to the filter
//filter_input (TYPE OF INPUT, INPUT NAME , FILTER NAME/TYPE - see on PHP.net)
$name = filter_input(INPUT_POST, 'nameC',  FILTER_SANITIZE_STRING);
$address = filter_input(INPUT_POST, 'address',  FILTER_SANITIZE_STRING);
$phoneNumber = filter_input(INPUT_POST, 'phoneNumber',  FILTER_SANITIZE_STRING);

//make input required
//checks to see if the $name is set (should be) or if it is empty
//if it is initialize the error array with a message
if(!isset($name) || empty($name)){
        $error['name'] = 'Publisher name is required';
}
if(!isset($address) || empty($address)){
        $error['address'] = 'Address is required';
}
if(!isset($phoneNumber) || empty($phoneNumber)){
        $error['phoneNumber'] = 'Phone Number is required';
}
//if there are no errors and error array is empty
//send to database
if(empty($error)){
        //prepare and bind
        //everything has to be the exact same as it is in the database
        $sql = "INSERT INTO collegeBrach (nameC, addressC, phoneNumberC) 
        VALUES (?,?,?)";

        //prepared statement
        $stmt = $conn->prepare($sql);

        //the variables are at your own choice, 
        //they do not require to be the exact same as the columns in the database
        $stmt->bind_param("sss", $name, $address, $phoneNumber);

        //send to database
        $stmt->execute();
        $conn->close();

        header("Location: CollegeList.php");
}else{ 
        //if there are errors draw the NewPublisher.php page
        //drawing the page rather than redirecting will let us
        //acces the $error array and all the variables set at the
        //top of the page
        require_once('NewCollege.php');
}




?>