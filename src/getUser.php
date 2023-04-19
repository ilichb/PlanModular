<?php
include('./db.php');

$query = "SELECT * FROM users";

$resultUsers = mysqli_query($conn, $query);

while($row = mysqli_fetch_array($resultUsers)){
    echo $row['email'];
}
?>