<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Bài Thuyết Trình Mới</title>
</head>
<body>
<form action="add_data.php" method="post">
    <h3>Thêm Bài Thuyết Trình Mới</h3>
    <label for="tieu_de">Tiêu Đề Bài Thuyết Trình:</label>
    <input type="text" name="tieu_de" required><br>

    <label for="nguoi_trinh_bay">Người Trình Bày:</label>
    <input type="text" name="nguoi_trinh_bay" required><br>

    <label for="thoi_gian_bat_dau">Thời Gian Bắt Đầu:</label>
    <input type="datetime-local" id="datetime" name="thoi_gian_bat_dau" required><br>

    <?php
    include('ketnoi.php');
    $sql = "SELECT * FROM room";
    $kq = mysqli_query($ketnoi, $sql);

    echo '<label for="phong">Chọn phòng:</label>';
    echo '<select name="phong" id="phong">';
    while ($row = mysqli_fetch_array($kq)) {
        echo '<option value="'.$row["MaPhong"].'" >';
        echo $row['MaPhong'];
        echo '</option>';
    }
    echo('</select>');

    // Fetch participants and their roles from the nguoithamdu table
    $sql_participants = "SELECT * FROM nguoithamdu";
    $result_participants = mysqli_query($ketnoi, $sql_participants);

    echo '<label for="nguoi_trinh_bay">Người Tham Dự:</label>';
    echo '<select name="nguoi_tham_du" id="nguoi_tham_du">';
    while ($row = mysqli_fetch_array($result_participants)) {
        echo '<option value="'.$row["TenNguoiThamDu"].'">';
        echo $row['TenNguoiThamDu'] . ' (' . $row['MaVaiTro'] . ')';
        echo '</option>';
    }
    ?>
    </select>
</form>
        <input type="submit" value="Thêm Bài Thuyết Trình" name="them">
    </form>
</body>
</html>
