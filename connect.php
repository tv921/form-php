<?php
// Thiết lập thông tin kết nối
$servername = "localhost";  // Tên server MySQL
$username = "root";         // Tên đăng nhập MySQL
$password = "";             // Mật khẩu MySQL
$dbname = "csdl_sanpham"; // Tên cơ sở dữ liệu đã tạo

// Kết nối đến MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
?>