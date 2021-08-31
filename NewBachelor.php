
<?php 

include 'NavBar.php';
include 'library/DBConnection.php'; 
    
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>
    <div class="container">
        
        <h1>Insert Bachelor Details</h1>
        <form action="InsertBachelor.php" class="needs-validatio" novalidate method="POST">
            <div class="mb-3">
                <label for="nameB" class="form-label">Bachelor Name</label>
                <input type="text" class="form-control" id="nameB" name="nameB" aria-describedby="nameBHelp" value="<?php if(isset($nameB)){ echo $nameB;}  ?>" >
                <!-- show error to user  -->
                <span class="text-danger">
                    <?= isset($error['nameB']) ? $error['nameB'] : ''?> 
                </span>
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
                <label for="Duration" class="form-label">Duration</label>
                <input type="text" class="form-control" id="Duration" name="Duration" value="<?= (isset($Duration)) ? $Duration : NULL ?>" aria-describedby="authorHelp" placeholder="numbers only">
                <span class="text-danger"><?= isset($error['Duration']) ? $error['Duration'] : '' ?> </span>
           </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>