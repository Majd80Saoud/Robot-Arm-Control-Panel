<?php
include "db.php"; 


$query = "SELECT * FROM pose WHERE status = 1";
$result = mysqli_query($conn, $query);

$poses = [];

while ($row = mysqli_fetch_assoc($result)) {
  $poses[] = $row; 
}


echo json_encode($poses);
?>
