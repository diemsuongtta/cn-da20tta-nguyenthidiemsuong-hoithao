<?php
session_start();

// Kiểm tra nếu đã đăng nhập và có thông tin người dùng trong session
if (isset($_SESSION['user_id'])) {
    // Hiển thị chào mừng và nút đăng xuất
    echo '<p align="center">Chào mừng, ' . $_SESSION['user_id'] . '!</p>';
    echo '<p align="center"><a href="dangxuat.php">Thoát đăng nhập</a></p>';
} else {
    // Hiển thị biểu mẫu đăng nhập nếu chưa đăng nhập
    include("header.php");
    echo '<h1 align="center">ĐĂNG NHẬP QUẢN TRỊ</h1>';
    echo '<form action="xuly_dangnhapQT.php" name="dangnhap" method="post">';
    echo '<table align="center" border="0">';
    echo '<tr><td>Tên đăng nhập:</td><td> <input type="text" name="tendn" /></td></tr>';
    echo '<tr><td>Mật khẩu:</td><td><input type="password" name="matkhau" /> </td></tr>';
    echo '<tr>';
    echo '<td><input style="color:#FF3366;" type="submit" name="dn" value="Đăng nhập"/></td>';
    echo '<td align="center"><input style="color:#FF3366;" type="reset" name="ll" value="Làm lại" /></td>';
    echo '</tr>';
    echo '</table>';
    echo '</form>';
}
?>
