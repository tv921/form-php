<?php
include_once 'connect.php';
// Kiểm tra xem form đã được gửi đi chưa
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Nhận thông tin sản phẩm từ form
    $product_id = $_POST['product-id'];
    $product_name = $_POST['product-name'];
    $product_price = $_POST['product-price'];
    $note = $_POST['test'];

    // Xử lý file hình ảnh
    if (isset($_POST["submit"])) {
        // Kiểm tra xem người dùng đã chọn file hay chưa
        if ($_FILES["fileanh"]["error"] == UPLOAD_ERR_OK) {
            $target_dir = "uploads/";  // Thư mục lưu file
            $file_name = basename($_FILES["fileanh"]["name"]);
            $target_file = $target_dir . uniqid() . "_" . $file_name;  // Thêm tiền tố để tránh trùng tên
            $uploadOk = 1; 
    
            // Lấy định dạng file và kiểm tra
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowedTypes = array("jpg", "png", "jpeg", "gif", "pdf");
    
            // Kiểm tra định dạng file
            if (!in_array($fileType, $allowedTypes)) {
                echo "Chỉ cho phép các định dạng JPG, JPEG, PNG, GIF, PDF.";
                $uploadOk = 0;
            }
    
            // Kiểm tra kích thước file (giới hạn 5MB)
            if ($_FILES["fileanh"]["size"] > 5000000) { // 5MB
                echo "Kích thước file quá lớn.";
                $uploadOk = 0;
            }
    
            // Kiểm tra xem file đã tồn tại chưa
            if (file_exists($target_file)) {
                echo "File đã tồn tại.";
                $uploadOk = 0;
            }
    
            // Nếu tất cả các kiểm tra đều ổn, tiến hành upload
            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["fileanh"]["tmp_name"], $target_file)) {
                    // Sử dụng htmlspecialchars để tránh XSS
                    echo "File " . htmlspecialchars($file_name) . " đã được upload thành công.";

                    // Lưu thông tin sản phẩm vào bảng 'product'
                    $sql_product = "INSERT INTO product (id_product, product_name, price) VALUES ('$product_id','$product_name', '$product_price')";

                    if ($conn->query($sql_product) === TRUE) {
                    // Lấy ID sản phẩm vừa được thêm vào
                    $product_id = $conn->insert_id;
            
                    // Lưu thông tin ảnh vào bảng 'picture'
                    $sql_picture = "INSERT INTO picture (id_picture, note, duong_dan) VALUES ('$product_id', '$note', '$target_file')";
            
                    if ($conn->query($sql_picture) === TRUE) {
                        echo " Sản phẩm và hình ảnh đã được lưu vào cơ sở dữ liệu thành công.";
                    } else {
                        echo "Lỗi: " . $conn->error;
                    }
                    } else {
                    echo "Lỗi: " . $conn->error;
                    }
                } else {
                    echo "Có lỗi xảy ra khi upload file.";
                }
            }
            
        } else {
            echo "Vui lòng chọn một file hợp lệ.";
        }
    }
}
// Đóng kết nối
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem ảnh:</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }
        .submit-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <form action="xemanh.php" method="post" enctype="multipart/form-data">
        <input type="submit" class="submit-btn" value="Xem ảnh" name="submit">
    </form>
</body>
</html>

