<?php
session_start();
include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['them'])) {
    // Retrieve form data
    $tieu_de = mysqli_real_escape_string($ketnoi, $_POST['tieu_de']);
    $nguoi_trinh_bay = mysqli_real_escape_string($ketnoi, $_POST['nguoi_trinh_bay']);
    $thoi_gian_bat_dau = mysqli_real_escape_string($ketnoi, $_POST['thoi_gian_bat_dau']);
    $phong = mysqli_real_escape_string($ketnoi, $_POST['phong']);
    $TenNguoiThamDu = isset($_POST['TenNguoiThamDu']) ? mysqli_real_escape_string($ketnoi, $_POST['TenNguoiThamDu']) : "";
    $MaVaiTro = isset($_POST['MaVaiTro']) ? mysqli_real_escape_string($ketnoi, $_POST['MaVaiTro']) : "";




    // You can add additional validation and sanitization here

    // Insert data into the presentations table
    $insert_sql = "INSERT INTO presentations (tieu_de, nguoi_trinh_bay, thoi_gian_bat_dau, MaPhong) 
                   VALUES ('$tieu_de', '$nguoi_trinh_bay', '$thoi_gian_bat_dau', '$phong')";
    $inser_sql = "INSERT INTO nguoithamdu (TenNguoiThamDu, MaVaiTro) 
                    VALUES ('$TenNguoiThamDu', '$MaVaiTro')";
    try {
        $insert_result = mysqli_query($ketnoi, $insert_sql);

        if ($insert_result) {
            echo "Bài thuyết trình đã được thêm thành công!";
        } else {
            echo "Error adding presentation: " . mysqli_error($ketnoi);
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}

mysqli_close($ketnoi);
?>
