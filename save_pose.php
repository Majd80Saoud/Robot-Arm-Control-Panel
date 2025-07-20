<?php
include "db.php";

// استقبال البيانات بصيغة JSON من الطلب
$data = json_decode(file_get_contents("php://input"), true);

// التأكد أن البيانات موجودة وفيها 6 قيم
if (isset($data["motors"]) && count($data["motors"]) === 6) {
    $s1 = (int)$data["motors"][0];
    $s2 = (int)$data["motors"][1];
    $s3 = (int)$data["motors"][2];
    $s4 = (int)$data["motors"][3];
    $s5 = (int)$data["motors"][4];
    $s6 = (int)$data["motors"][5];

    // إدخال القيم في الجدول مع status = 1
    $query = "INSERT INTO pose (servo1, servo2, servo3, servo4, servo5, servo6, status)
              VALUES ($s1, $s2, $s3, $s4, $s5, $s6, 1)";

    if (mysqli_query($conn, $query)) {
        echo "Pose saved successfully.";
    } else {
        echo "Error saving pose: " . mysqli_error($conn);
    }
} else {
    echo "Invalid input data.";
}
?>