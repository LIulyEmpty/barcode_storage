<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <?php
            // Bật báo lỗi
            error_reporting(E_ALL);
            ini_set('display_errors', 1);

            // Thông tin kết nối cơ sở dữ liệu
            $servername = "127.0.0.1:3304";
            $username_db = "root";         // Tên người dùng MySQL
            $password_db = "";             // Mật khẩu MySQL
            $dbname = "barcodedata";       // Tên cơ sở dữ liệu

            // Tạo kết nối
            $conn = new mysqli($servername, $username_db, $password_db, $dbname);

            // Kiểm tra kết nối
            if ($conn->connect_error) {
                die("Kết nối thất bại: " . $conn->connect_error);
            }

            // Lấy danh mục từ tham số GET
            $category_filter = isset($_GET['category']) ? $_GET['category'] : '';

            // Xây dựng câu lệnh SQL
            if ($category_filter) {
                $sql = "SELECT * FROM products WHERE category = '$category_filter' ORDER BY created_at DESC";
            } else {
                $sql = "SELECT * FROM products ORDER BY created_at DESC";
            }

            // Thực thi truy vấn
            $result = $conn->query("SELECT * FROM products");

            // Hiển thị form lọc theo danh mục
            ?>
            <form method="get">
                <label for="category_select">Chọn danh mục:</label>
                <select name="category" id="category_select" onchange="this.form.submit()">
                    <option value="">--- Tất cả ---</option>
                    <option value="bieu_tuong" <?php echo isset($_GET['category']) && $_GET['category'] == 'bieu_tuong' ? 'selected' : ''; ?>>Biểu tượng</option>
                    <option value="binh_hoa" <?php echo isset($_GET['category']) && $_GET['category'] == 'binh_hoa' ? 'selected' : ''; ?>>Bình hoa / Hoa giả</option>
                    <option value="binh_nuoc" <?php echo isset($_GET['category']) && $_GET['category'] == 'binh_nuoc' ? 'selected' : ''; ?>>Bình nước / Cốc nước</option>
                    <option value="bong_bay" <?php echo isset($_GET['category']) && $_GET['category'] == 'bong_bay' ? 'selected' : ''; ?>>Bóng bay / Bóng bay số</option>
                    <option value="bom_toc" <?php echo isset($_GET['category']) && $_GET['category'] == 'bom_toc' ? 'selected' : ''; ?>>Bờm tóc</option>
                    <option value="cau_tuyet" <?php echo isset($_GET['category']) && $_GET['category'] == 'cau_tuyet' ? 'selected' : ''; ?>>Cầu tuyết</option>
                    <option value="cham_soc_ca_nhan" <?php echo isset($_GET['category']) && $_GET['category'] == 'cham_soc_ca_nhan' ? 'selected' : ''; ?>>Chăm sóc cá nhân</option>
                    <option value="day_boc_toc" <?php echo isset($_GET['category']) && $_GET['category'] == 'day_boc_toc' ? 'selected' : ''; ?>>Dây buộc tóc</option>
                    <option value="cac_loai_day" <?php echo isset($_GET['category']) && $_GET['category'] == 'cac_loai_day' ? 'selected' : ''; ?>>Dây kẽm / Dây thừng / Thân thép</option>
                    <option value="dong_ho" <?php echo isset($_GET['category']) && $_GET['category'] == 'dong_ho' ? 'selected' : ''; ?>>Đồng hồ</option>
                    <option value="gau_bong" <?php echo isset($_GET['category']) && $_GET['category'] == 'gau_bong' ? 'selected' : ''; ?>>Gấu bông</option>
                    <option value="giay_goi_qua" <?php echo isset($_GET['category']) && $_GET['category'] == 'giay_goi_qua' ? 'selected' : ''; ?>>Giấy gói quà</option>
                    <option value="guong_luoc" <?php echo isset($_GET['category']) && $_GET['category'] == 'guong_luoc' ? 'selected' : ''; ?>>Gương / Lược</option>
                    <option value="hop_qua" <?php echo isset($_GET['category']) && $_GET['category'] == 'hop_qua' ? 'selected' : ''; ?>>Hộp quà</option>
                    <option value="blind_box" <?php echo isset($_GET['category']) && $_GET['category'] == 'blind_box' ? 'selected' : ''; ?>>Hộp mù / Túi mù</option>
                    <option value="kep_toc" <?php echo isset($_GET['category']) && $_GET['category'] == 'kep_toc' ? 'selected' : ''; ?>>Kẹp tóc</option>
                    <option value="kinh_mat" <?php echo isset($_GET['category']) && $_GET['category'] == 'kinh_mat' ? 'selected' : ''; ?>>Kính mắt</option>
                    <option value="moc_dan" <?php echo isset($_GET['category']) && $_GET['category'] == 'moc_dan' ? 'selected' : ''; ?>>Len / Móc đan</option>
                    <option value="moc_khoa_bong" <?php echo isset($_GET['category']) && $_GET['category'] == 'moc_khoa_bong' ? 'selected' : ''; ?>>Móc khóa bông</option>
                    <option value="moc_khoa_nhua" <?php echo isset($_GET['category']) && $_GET['category'] == 'moc_khoa_nhua' ? 'selected' : ''; ?>>Móc khóa nhựa</option>
                    <option value="mo_hinh" <?php echo isset($_GET['category']) && $_GET['category'] == 'mo_hinh' ? 'selected' : ''; ?>>Mô hình</option>
                    <option value="nen" <?php echo isset($_GET['category']) && $_GET['category'] == 'nen' ? 'selected' : ''; ?>>Nến / Nến phụt</option>
                    <option value="ruy_bang" <?php echo isset($_GET['category']) && $_GET['category'] == 'ruy_bang' ? 'selected' : ''; ?>>Nơ / Ruy băng</option>
                    <option value="slam" <?php echo isset($_GET['category']) && $_GET['category'] == 'slam' ? 'selected' : ''; ?>>Slam / Con dẻo / Squishy</option>
                    <option value="sticker" <?php echo isset($_GET['category']) && $_GET['category'] == 'sticker' ? 'selected' : ''; ?>>Sticker / Sticker cuộn</option>
                    <option value="the_bai" <?php echo isset($_GET['category']) && $_GET['category'] == 'the_bai' ? 'selected' : ''; ?>>Thẻ bài</option>
                    <option value="thiep_chuc_mung" <?php echo isset($_GET['category']) && $_GET['category'] == 'thiep_chuc_mung' ? 'selected' : ''; ?>>Thiệp chúc mừng</option>
                    <option value="trang_suc" <?php echo isset($_GET['category']) && $_GET['category'] == 'trang_suc' ? 'selected' : ''; ?>>Trang sức</option>
                    <option value="cac_loai_tranh" <?php echo isset($_GET['category']) && $_GET['category'] == 'cac_loai_tranh' ? 'selected' : ''; ?>>Tranh đính đá / Tranh cát</option>
                    <option value="trang_tri_nha_cua" <?php echo isset($_GET['category']) && $_GET['category'] == 'trang_tri_nha_cua' ? 'selected' : ''; ?>>Trang trí nhà cửa</option>
                    <option value="tui_qua" <?php echo isset($_GET['category']) && $_GET['category'] == 'tui_qua' ? 'selected' : ''; ?>>Túi quà</option>
                    <option value="tui_vi" <?php echo isset($_GET['category']) && $_GET['category'] == 'tui_vi' ? 'selected' : ''; ?>>Túi / Ví</option>
                </select>
            </form>

            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="" style="width: 100%; height: auto;">

            <?php
            // Kiểm tra kết quả truy vấn
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                    echo "<img src='" . htmlspecialchars($row['image_path']) . "' alt='Image' style='width:200px;'><br>";
                    echo "Mã Vạch: " . htmlspecialchars($row['barcode']) . "<br>";
                    echo "Mô Tả: " . htmlspecialchars($row['description']) . "<br>";
                    echo "Giá: " . htmlspecialchars($row['price']) . " VNĐ<br>";
                    echo "Danh Mục: " . htmlspecialchars($row['category']) . "<br><hr>";
                }
            } else {
                echo "Không có sản phẩm nào.";
            }

            // Đóng kết nối
            $conn->close();
        ?>
        <button>
            <a href="add_product.php">Add product</a>
        </button>
    </body>
</html>