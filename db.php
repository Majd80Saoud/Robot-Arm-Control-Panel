<?php
$servername = "localhost";
$username = "root";        // عدّله إذا كان مختلفًا
$password = "";            // عدّله إذا فيه كلمة مرور
$database = "all";         // اسم قاعدة البيانات

$conn = mysqli_connect($servername, $username, $password, $database);

// التحقق من الاتصال
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>