<?php
include "db.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];

    $query = "UPDATE pose SET status = 0 WHERE ID = $id";

    if (mysqli_query($conn, $query)) {
        echo "Pose with ID $id has been removed.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>