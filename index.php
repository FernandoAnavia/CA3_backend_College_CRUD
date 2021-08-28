<?php 
include 'library/DBConnection.php';


if(empty($_GET['searchInput'])){
    $sql = "SELECT a.id, a.name, a.surname, a.address, a.phoneNumber, a.dob, a.collegeId, b.nameC, a.bachelorId, c.nameB, a.gender FROM (student a LEFT JOIN collegebrach b ON a.collegeid = b.id) LEFT JOIN bachelorprogram c ON a.bachelorid = c.id";
} else {

    $searchInput = filter_input(INPUT_GET, 'searchInput',  FILTER_SANITIZE_STRING);
    $searchType  = filter_input(INPUT_GET, 'searchType',  FILTER_SANITIZE_STRING);

    if( $searchType == 'name' || 
        $searchType == 'surname' || 
        $searchType == 'address' || 
        $searchType == 'phoneNumber' || 
        $searchType == 'dob' || 
        $searchType == 'collegeId' || 
        $searchType == 'bachelorId' || 
        $searchType == 'gender'){

        $sql = "SELECT a.id, a.name, a.surname, a.address, a.phoneNumber, a.dob, a.collegeId, b.nameC, a.bachelorId, c.nameB, a.gender FROM (student a LEFT JOIN collegebrach b ON a.collegeid = b.id) LEFT JOIN bachelorprogram c ON a.bachelorid = c.id WHERE $searchType LIKE '%$searchInput%'";
    } else {
        echo 'Search Type doesn\'t exist!';
        $sql = "SELECT a.id, a.name, a.surname, a.address, a.phoneNumber, a.dob, a.collegeId, b.nameC, a.bachelorId, c.nameB, a.gender FROM (student a LEFT JOIN collegebrach b ON a.collegeid = b.id) LEFT JOIN bachelorprogram c ON a.bachelorid = c.id";
    }
}


$result = $conn->query($sql);

include 'NavBar.php';


?>
    <div class="container">
    
    <h1>Book Store </h1>
        <form action='' method="GET">
            <div class="row ">
                <div class="col-5">
                    <div class="input-group mb-3">
                    

<select class="form-select" id="inputGroupSelect04" name="searchType" aria-label="Example select with button addon">
    <option selected>Choose...</option>
    <option value="name">Name</option>
    <option value="author">Surname</option>
    <option value="publisher">Address</option>
    <option value="name">Phone Number</option>
    <option value="author">Date of Birthday</option>
    <option value="publisher">College Branch</option>
    <option value="name">Bachelor Program</option>
    <option value="author">Gender</option>
</select>
<input class="form-control" type="text" name="searchInput">
<button class="btn btn-outline-secondary" type="submit" id="submit">Search</button>
                    </div>
                </div>
            </div>       
                    
   
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">DOB</th>
                    <th scope="col">College</th>
                    <th scope="col">Bachelor</th>
                    <th scope="col">Gender</th>
                    <?php 
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                        echo '<th scope="col"><a class="btn btn-success" href="NewStudent.php" role="new">New</a></th>';
                        }
                    ?>
                  
                <tr>
            </thead>
            <tbody>
            <?php 
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<th scope='row'>".$row['id']."</th>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['surname']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['phoneNumber']."</td>";
                        echo "<td>".$row['dob']."</td>";
                        echo "<td>".$row['nameC']."</td>";
                        echo "<td>".$row['nameB']."</td>";
                        echo "<td>".$row['gender']."</td>";
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                            echo "<td><a class='btn btn-primary' href='UpdateStudent.php?id=".$row['id']."' role='update'>Update</a></td>";
                            echo "<td><a class='btn btn-danger' href='DeleteStudent.php?id=".$row['id']."' role='delete'>Delete</a></td>";
                        }
                        echo "</tr>";
                    } 
                }
            ?>
            </tbody>
        </table>
    </div>
            
</body>
</html>
