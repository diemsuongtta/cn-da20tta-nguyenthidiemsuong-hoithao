<?php
include("header.php");
session_start();
include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $presentation_id = $_POST['presentation_id'];
    $new_title = $_POST['title'];
    $new_speaker = $_POST['speaker'];

    // Cập nhật thông tin trong bảng presentations
    $sql = "UPDATE presentations SET tieu_de = '$new_title', nguoi_trinh_bay = '$new_speaker' WHERE id = $presentation_id";

    try {
        $ket_qua = mysqli_query($ketnoi, $sql);

        if ($ket_qua) {
            // Redirect to index.php after successful update
            header("Location: index.php");
            exit();
        } else {
            echo "Error updating presentation: " . mysqli_error($ketnoi);
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
