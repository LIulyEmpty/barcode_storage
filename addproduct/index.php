<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        input[type="text"], textarea, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h2>Thêm Sản Phẩm</h2>
    <form action="add_product.php" method="post">
        <label for="image">Chọn hình ảnh:</label>
        <input type="file" name="image" id="image" accept="image/*" required>
        <input type="text" name="name" placeholder="Tên sản phẩm" required>
        <input type="text" name="barcode" placeholder="Barcode" id="" required>
        <textarea name="description" placeholder="Mô tả sản phẩm" required></textarea>
        <input type="number" name="price" placeholder="Giá sản phẩm" step="0.01" required>
        
        <label for="category">Danh mục sản phẩm:</label>
        <select name="category" required>
            <option value="">--- Chọn danh mục ---</option>

            <!-- B alphabet -->
            <option value="bieu_tuong">Biểu tượng</option>
            <option value="binh_hoa">Bình hoa / Hoa giả</option>
            <option value="binh_nuoc">Bình nước / Cốc nước</option>
            <option value="bong_bay">Bóng bay / Bóng bay số</option>
            <option value="bom_toc">Bờm tóc</option>

            <!-- C alphabet -->
            <option value="cau_tuyet">Cầu tuyết</option>
            <option value="cham_soc_ca_nhan">Chăm sóc cá nhân</option>

            <!-- D alphabet -->
            <option value="day_boc_toc">Dây buộc tóc</option>
            <option value="cac_loai_day">Dây kẽm / Dây thừng / Thân thép</option>
            <option value="dong_ho">Đồng hồ</option>

            <!-- G alphabet -->
            <option value="gau_bong">Gấu bông</option>
            <option value="giay_goi_qua">Giấy gói quà</option>
            <option value="guong_luoc">Gương / Lược</option>

            <!-- H alphabet -->
            <option value="hop_qua">Hộp quà</option>
            <option value="blind_box">Hộp mù / Túi mù</option>

            <!-- K alphabet -->
            <option value="kep_toc">Kẹp tóc</option>
            <option value="kinh_mat">Kính mắt</option>

            <!-- L alphabet -->
            <option value="moc_dan">Len / Móc đan</option>

            <!-- M alphabet -->
            <option value="moc_khoa_bong">Móc khóa bông</option>
            <option value="moc_khoa_nhua">Móc khóa nhựa</option>
            <option value="mo_hinh">Mô hình</option>

            <!-- N alphabet -->
            <option value="nen">Nến / Nến phụt</option>
            <option value="ruy_bang">Nơ / Ruy băng</option>

            <!-- S alphabet -->
            <option value="slam">Slam / Con dẻo / Squishy</option>
            <option value="sticker">Sticker</option>

            <!-- T alphabet -->
            <option value="the_bai">Thẻ bài</option>
            <option value="thiep_chuc_mung">Thiệp chúc mừng</option>
            <option value="trang_suc">Trang sức</option>
            <option value="cac_loai_tranh">Tranh đính đá / Tranh cát</option>
            <option value="trang_tri_nha_cua">Trang trí nhà cửa</option>
            <option value="tui_qua">Túi quà</option>
            <option value="tui_vi">Túi ví</option>
        </select>
        
        <input type="submit" value="Thêm Sản Phẩm">
    </form>

</body>
</html>