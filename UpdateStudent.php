<?php
include 'library/DBConnection.php';


$sql = "SELECT * FROM book WHERE id=".$_GET['id'];

$result = $conn->query($sql);


if($result->num_rows==0){
    header("Location: index.php");
}

$row=$result->fetch_assoc();


?>

<!DOCTYPE html>
<html>
<head>
<title>Update Book</title>
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
        
        <h1>Update book</h1>
        <form action="EditBook.php" method="POST">
            <input type="hidden" value="<?=$_GET['id']?>" name="id">
            <div class="mb-3">
                <label for="name" class="form-label">Book Name</label>
                <input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp" value="<?= $row['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control" id="author" name="author" aria-describedby="authorHelp" value="<?= $row['author']?>">
            </div>
            <div class="mb-3">
                <label for="publisher" class="form-label">Publisher</label>
                <input type="text" class="form-control" id="publisher" name="publisher" aria-describedby="publisherHelp" value="<?=$row['publisher'] ?>">
            </div>
            <div class="mb-3">
                <label for="isbn" class="form-label">ISBN</label>
                <input type="text" class="form-control" id="isbn" name="isbn" aria-describedby="isbnHelp" value="<?= $row['isbn']?>">
            </div>
            <div class="mb-3">
                <label for="published_date" class="form-label">Published Date</label>
                <input type="text" class="form-control" id="published_date" name="published_date" aria-describedby="published_dateHelp" value="<?= $row['published_date']?>">
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

    

   
</body>
</html>