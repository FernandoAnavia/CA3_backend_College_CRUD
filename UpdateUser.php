<?php
include 'library/DBConnection.php';


$sql = "SELECT * FROM user WHERE id=" . $_GET['id'];

$result = $conn->query($sql);


if($result->num_rows==0){
    header("Location: UserList.php");
}

$row=$result->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
<title>Update User</title>
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
        
        <h1>Update User</h1>
        <form action="EditUser.php" method="POST">
            <input type="hidden" value="<?=$_GET['id']?>" name="id">
            <div class="mb-3">
                <label for="username" class="form-label">User name</label>
                <input type="text" class="form-control" id="username" username="username" aria-describedby="usernameHelp" value="<?= $row['username'] ?>">
                <span class="text-danger">
                    <?= isset($error['username']) ? $error['username'] : ''?> 
                </span>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?=  $row['email'] ?>">
                <span class="text-danger">
                    <?= isset($error['email']) ? $error['email'] : ''?> 
                </span>
            </div>


            <div class="mb-3">
                <label for="role" class="form-label">Role</label>

                <select class="form-select" aria-label="role" name="role" id="role">

                    <?php

                        if($row['role'] == "user")
                        {
                        echo "<option selected='selected' value='user'>user</option>";
                        echo "<option value='admin'>admin</option>";
                        }
                        else
                        {
                        echo "<option value='user'>user</option>";
                        echo "<option selected='selected' value='admin'>admin</option>";
                        }                            

                    ?>

                </select>

           </div>            
            
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>