<?php
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lưu Thông Tin Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }
        .product-form {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .product-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
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

<div class="product-form">
    <h2>Lưu Thông Tin Sản Phẩm</h2>
    <form action="xuly.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="product-id">ID Sản Phẩm:</label>
            <input type="text" id="product-id" name="product-id" required>
        </div>
        <div class="form-group">
            <label for="product-name">Tên Sản Phẩm:</label>
            <input type="text" id="product-name" name="product-name" required>
        </div>
        <div class="form-group">
            <label for="product-price">Giá:</label>
            <input type="number" id="product-price" name="product-price" min="0" step="0.01" required>
        </div>
        <div class="form-group">
            <label for="product-image">Hình Ảnh Sản Phẩm:</label>
            <input type="file" name="fileanh" id="fileanh">
            <p>Ghi chú:</p>
            <input type="text" name="test" id="ghichu">
        </div>
        <button type="submit" class="submit-btn" name="submit">Lưu</button>
    </form>
</div>

</body>
</html>
