<?php
include 'library/DBConnection.php';


$sql = "SELECT a.id, a.nameB, a.collegeId, b.nameC, a.Duration from bachelorprogram a left join collegebrach b on a.collegeId = b.id WHERE a.id=" . $_GET['id'];

$result = $conn->query($sql);


if($result->num_rows==0){
    header("Location: BachelorList.php");
}

$row=$result->fetch_assoc();
$collName = $row['nameC'];
$Duration = $row['Duration'];

?>

<!DOCTYPE html>
<html>
<head>
<title>Update Bachelor</title>
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
        
        <h1>Update Bachelor</h1>
        <form action="EditBachelor.php" method="POST">
            <input type="hidden" value="<?=$_GET['id']?>" name="id">
            <div class="mb-3">
                <label for="name" class="form-label">Bachelor Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $row['nameB'] ?>">
                <span class="text-danger">
                    <?= isset($error['name']) ? $error['name'] : ''?> 
                </span>
            </div>

            <div class="mb-3">
                <label for="collegeId" class="form-label">College Branch</label>

                <select class="form-select" aria-label="collegeId" name="collegeId" id="collegeId">

                    <?php

                        $sql = "SELECT id as idC, nameC FROM collegebrach";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_assoc()){
                            if($collName == $row['nameC'])
                            {
                            echo "<option selected='selected' value='".$row['idC']."'>".$row['nameC']."</option>";
                            }
                            else
                            {
                            echo "<option value='".$row['idC']."'>".$row['nameC']."</option>";
                            }                            
                        }


                    ?>

                </select>

           </div>            


            <div class="mb-3">
                <label for="Duration" class="form-label">Duration</label>
                <input type="text" class="form-control" id="Duration" name="Duration" aria-describedby="DurationHelp" value="<?= $Duration ?>">
                <span class="text-danger">
                    <?= isset($error['Duration']) ? $error['Duration'] : ''?> 
                </span>
            </div>
            
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>