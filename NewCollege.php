
<?php 

include 'NavBar.php';
    
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
?>
    <div class="container">
        
        <h1>Insert College Details</h1>
        <form action="InsertCollege.php" class="needs-validatio" novalidate method="POST">
            <div class="mb-3">
                <label for="nameC" class="form-label">College Name</label>
                <input type="text" class="form-control" id="nameC" name="nameC" aria-describedby="nameCHelp" value="<?php if(isset($nameC)){ echo $nameC;}  ?>" >
                <!-- show error to user  -->
                <span class="text-danger">
                    <?= isset($error['nameC']) ? $error['nameC'] : ''?> 
                </span>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= (isset($address)) ? $address : NULL ?>" aria-describedby="authorHelp">
                <span class="text-danger"><?= isset($error['address']) ? $error['address'] : '' ?> </span>
           </div>

           <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?= (isset($phoneNumber)) ? $phoneNumber : NULL ?>" aria-describedby="authorHelp">
                <span class="text-danger"><?= isset($error['phoneNumber']) ? $error['phoneNumber'] : '' ?> </span>
           </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>