
<?php 

include 'NavBar.php';
include 'library/DBConnection.php'; 

if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>
    <div class="container">
        
        <h1>Insert Student details</h1>


        <form action="InsertStudent.php" class="needs-validation" id="studentForm"  method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?php if(isset($name)){ echo $name;}  ?>" >
                <!-- show error to user  -->
                <span class="text-danger" id='nameError'>
                    <?= isset($error['name']) ? $error['name'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="surname" class="form-label">Student Surname</label>
                <input type="text" class="form-control" id="surname" name="surname" value="<?= (isset($surname)) ? $surname : NULL ?>" aria-describedby="surnameHelp">
                <span class="text-danger" id='surnameError'><?= isset($error['surname']) ? $error['surname'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= (isset($address)) ? $address : NULL ?>" aria-describedby="addressHelp">
                <span class="text-danger" id='addressError'><?= isset($error['address']) ? $error['address'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?= (isset($phoneNumber)) ? $phoneNumber : NULL ?>" aria-describedby="phoneNumberHelp">
                <span class="text-danger" id='phoneNumberError'><?= isset($error['phoneNumber']) ? $error['phoneNumber'] : '' ?> </span>
           </div>
           <div class="mb-3">
                <label for="dob" class="form-label">Date Of Birth</label>
                <input type="text" class="form-control" id="dob" name="dob" value="<?= (isset($dob))? $dob : NULL ?>" aria-describedby="dobHelp" placeholder="yyyy-mm-dd">
                <span class="text-danger" id="publishedError"><?= isset($error['dob']) ? $error['dob'] : '' ?> </span>
           </div>
            <div class="mb-3">
                <label for="collegeId" class="form-label">College Branch</label>

                <select class="form-select" aria-label="collegeId" name="collegeId" id="collegeId">

                    <?php

                        $sql = "SELECT id, nameC FROM collegebrach";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['nameC']."</option>";
                        }

                    ?>

                </select>





                <span class="text-danger"><?= isset($error['collegeid']) ? $error['collegeid'] : '' ?> </span>
           </div>


           <div class="mb-3">
                <label for="bachelorId" class="form-label">Bachelor Program</label>
                <select class="form-select" aria-label="bachelorId" name="bachelorId" id="bachelorId">
                    <?php

                        $sql = "SELECT id, nameB FROM bachelorprogram";
                        $result = $conn->query($sql);
                        while($row=$result->fetch_assoc()){
                            echo "<option value='".$row['id']."'>".$row['nameB']."</option>";
                        }


                    ?>


                </select>

                <span class="text-danger"><?= isset($error['bachelorId']) ? $error['bachelorId'] : '' ?> </span>
           </div>

           <label class="form-label"> Gender </label>
            <br>
            <input type="radio" name="gender" value="Male"/> Male
            <input type="radio" name="gender" value="Female"/> Female
            <br><br>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>



   
</body>
</html>
<script>


</script>