<?php
    include_once 'connect.php';  
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị hình ảnh từ thư mục</title>
    <style>
        .gallery {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            justify-items: center;
        }
        .gallery img {
            width: 100%;
            height: auto;
            max-width: 250px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .gallery-item {
            text-align: center;
            max-width: 250px;
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .product-name {
            font-size: 16px;
            font-weight: bold;
            margin: 10px 0;
        }
        .product-price {
            color: #f00;
            font-size: 14px;
        }
    </style>
</head>
<body>

<h1>Thư viện hình ảnh</h1>
<div class="gallery">
    <?php 
     // Truy vấn dữ liệu sản phẩm từ cơ sở dữ liệu
     $query = "SELECT product_name, price, duong_dan, note FROM product, picture
     WHERE id_product=id_picture;";
     #$query = "SELECT product_name, price FROM product";
     $result = $conn->query($query); 
     if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $imagePath = $row['duong_dan'];
            echo '<div class="gallery-item">';
            echo '<img src="' . htmlspecialchars($imagePath) . '" alt="' . htmlspecialchars($row['note']) . '">';
            echo '<div class="product-name">' . $row['product_name'] . '</div>';
            echo '<div class="product-price">' . number_format($row['price'], 0, ',', '.') . ' VND</div>';
            echo '</div>';
        }
    } else {
        echo "Không có sản phẩm nào.";
    }
    ?>
</div>
</body>
</html>
