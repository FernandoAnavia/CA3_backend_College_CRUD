<?php 
//restrict the page to logged in users
include 'NavBar.php';
if(!isset($_SESSION['id'])){
    header("Location: index.php");
}
//get the publishers
include 'library/DBConnection.php';
$sql = "SELECT a.Id as idB, a.nameB, a.collegeId, b.nameC, a.Duration from bachelorprogram a left join collegebrach b on a.collegeId = b.id";

$result = $conn->query($sql);

?>
    <div class="container">
    
    <h1>Bachelor List </h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bachelor</th>
                    <th scope="col">College</th>
                    <th scope="col">Duration</th>
                    <?php 
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                        echo '<th scope="col"><a class="btn btn-success" href="NewBachelor.php" role="new">New</a></th>';
                        }
                    ?>
                <tr>
            </thead>
            <tbody>
            <?php 
                if($result->num_rows>0){
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<th scope='row'>".$row['idB']."</th>";
                        echo "<td>".$row['nameB']."</td>";
                        echo "<td>".$row['nameC']."</td>";
                        echo "<td>".$row['Duration']."</td>";
                        if(isset($_SESSION) && isset($_SESSION['id'])) {
                            echo "<td><a class='btn btn-primary' href='UpdateBachelor.php?id=".$row['idB']."' role='update'>Update</a></td>";
                            echo "<td><a class='btn btn-danger' href='DeleteBachelor.php?id=".$row['idB']."' role='delete'>Delete</a></td>";
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
