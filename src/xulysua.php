<?php
include("header.php");
include("ketnoi.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save_edit'])) {
    // Extract form data
    $presentation_id = $_POST['presentation_id'];
    $tieu_de = mysqli_real_escape_string($ketnoi, $_POST['tieu_de']);
    $nguoi_trinh_bay = mysqli_real_escape_string($ketnoi, $_POST['nguoi_trinh_bay']);
    $thoi_gian_bat_dau = $_POST['thoi_gian_bat_dau'];
    $phong = mysqli_real_escape_string($ketnoi, $_POST['phong']);
    $nguoi_tham_du = mysqli_real_escape_string($ketnoi, $_POST['nguoi_tham_du']);

    // Perform the database update
    $update_sql = "UPDATE presentations 
                   SET tieu_de = '$tieu_de', nguoi_trinh_bay = '$nguoi_trinh_bay', 
                       thoi_gian_bat_dau = '$thoi_gian_bat_dau', MaPhong = '$phong', 
                       TenNguoiThamDu = '$nguoi_tham_du'
                   WHERE id = $presentation_id";

    if (mysqli_query($ketnoi, $update_sql)) {
        echo "Cập nhật bài thuyết trình thành công!";
    } else {
        echo "Lỗi cập nhật bài thuyết trình: " . mysqli_error($ketnoi);
    }
}

// Redirect to sua.php or any other page after handling the form submission
header("Location: sua.php");
exit();

?>
