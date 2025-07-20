<?php
include "db.php"; // تأكد أن ملف الاتصال بقاعدة البيانات موجود ومضبوط

// جلب الوضعيات التي لم يتم حذفها (status = 1)
$query = "SELECT * FROM pose WHERE status = 1";
$result = mysqli_query($conn, $query);

$poses = [];

while ($row = mysqli_fetch_assoc($result)) {
  $poses[] = $row; // يحتوي على ID و servo1 إلى servo6 و status
}

// إعادة البيانات بصيغة JSON
echo json_encode($poses);
?>