<?php
$servername = "127.0.0.1:3304";
$username_db = "root";         // Tên người dùng MySQL của bạn
$password_db = "";             // Mật khẩu MySQL của bạn
$dbname = "barcodedata";       // Tên cơ sở dữ liệu của bạn

// Tạo kết nối
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Lấy thông tin sản phẩm từ form
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image'])) {
    $image = $_FILES['image']['tmp_name'];
    $name = $_POST['name'];
    $barcode = $_POST['barcode'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    # Đọc nội dung hình ảnh
    $imageData = file_get_contents($image);

    // Chuẩn bị và ràng buộc
    $stmt = $conn->prepare("INSERT INTO products (image, name, barcode, description, price, category) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("bsssds", $imageData, $name, $barcode, $description, $price, $category);    
  
    // Thực thi câu lệnh
    if ($stmt->execute()) {
        header("Location: /Barcode/fetch_products.php");
        exit();
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng câu lệnh
    $stmt->close();
}
$conn->close();
?>