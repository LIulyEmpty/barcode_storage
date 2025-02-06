<?php
$servername = "127.0.0.1:3304"; // Thay đổi nếu cần
$username_db = "root";
$password_db = "";
$dbname = "barcodedata";

$conn = new mysqli($servername, $username_db, $password_db, $dbname);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image'])) {
    // Kiểm tra lỗi tải lên
    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
        die("Lỗi tải lên: " . $_FILES['image']['error']);
    }

    // Tạo tên tệp mới và đường dẫn
    $targetDir = "image_storage/";
    $fileName = basename($_FILES["image"]["name"]);
    $targetFilePath = $targetDir . $fileName;

    // Di chuyển tệp tải lên vào thư mục đích
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
        // Lưu URL hình ảnh vào cơ sở dữ liệu
        $image_path = $targetFilePath;
        $name = $_POST['name'];
        $barcode = $_POST['barcode'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        $stmt = $conn->prepare("INSERT INTO products (image_path, name, barcode, description, price, category) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Lỗi chuẩn bị câu lệnh: " . $conn->error);
        }

        $stmt->bind_param("ssssds", $image_path, $name, $barcode, $description, $price, $category);

        if ($stmt->execute()) {
            header("Location: index.php");
            exit();
        } else {
            echo "Lỗi thực thi: " . $stmt->error;
        }

        $stmt->close();
    } else {
        die("Lỗi trong việc di chuyển tệp.");
    }
}
$conn->close();
?>