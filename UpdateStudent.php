<?php
include 'library/DBConnection.php';


$sql = "SELECT a.id, a.name, a.surname, a.address, a.phoneNumber, a.dob, a.collegeId, b.nameC, a.bachelorId, c.nameB, a.gender FROM (student a LEFT JOIN collegebrach b ON a.collegeid = b.id) LEFT JOIN bachelorprogram c ON a.bachelorid = c.id WHERE a.id=".$_GET['id'];

$result = $conn->query($sql);


if($result->num_rows==0){
    header("Location: index.php");
}

$row=$result->fetch_assoc();
$bachName = $row['nameB'];
$collName = $row['nameC'];
$gender = $row['gender'];


?>

<!DOCTYPE html>
<html>
<head>
<title>Update Student</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

</head>
<body>
    <?php include 'NavBar.php' ?>
    <?php 

        if(!isset($_SESSION['id'])) {
            header("Location: index.php");
        }
    ?>
    <div class="container">
        
        <h1>Update Student</h1>
        <form action="EditStudent.php" method="POST">
            <input type="hidden" value="<?=$_GET['id']?>" name="id">
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $row['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Student Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" aria-describedby="surnameHelp" value="<?= $row['surname']?>">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" aria-describedby="addressHelp" value="<?= $row['address'] ?>">
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" aria-describedby="phoneNumberHelp" value="<?= $row['phoneNumber'] ?>">
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="text" class="form-control" id="dob" name="dob" aria-describedby="dobHelp" value="<?= $row['dob'] ?>">
            </div>
            
            <div class="mb-3">
                <label for="collegeId" class="form-label">College Branch</label>

                <select class="form-select" aria-label="collegeId" name="collegeId" id="collegeId">

                    <?php

                        $sql = "SELECT id, nameC FROM collegebrach";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_assoc()){
                            if($collName == $row['nameC'])
                            {
                            echo "<option selected='selected' value='".$row['id']."'>".$row['nameC']."</option>";
                            }
                            else
                            {
                            echo "<option value='".$row['id']."'>".$row['nameC']."</option>";
                            }                            
                        }


                    ?>

                </select>

           </div>
            <div class="mb-3">
                <label for="bachelorId" class="form-label">Bachelor Program</label>

                <select class="form-select" aria-label="bachelorId" name="bachelorId" id="bachelorId">

                    <?php

                        $sql = "SELECT id, nameB FROM bachelorprogram";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_assoc()){
                            if($bachName == $row['nameB'])
                            {
                            echo "<option selected='selected' value='".$row['id']."'>".$row['nameB']."</option>";
                            }
                            else
                            {
                            echo "<option value='".$row['id']."'>".$row['nameB']."</option>";
                            }                            
                        }


                    ?>

                </select>

           </div>

            <label class="form-label"> Gender </label>
            <br>
            <input type="radio" name="gender" value="Male" <?php echo ($gender == 'Male') ?  "checked" : "" ;  ?>/> Male
            <input type="radio" name="gender" value="Female" <?php echo ($gender == 'Female') ?  "checked" : "" ;  ?> /> Female
            <br><br>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>