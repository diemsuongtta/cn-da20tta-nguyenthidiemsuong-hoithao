<?php
session_start();

// Hủy toàn bộ phiên làm việc
session_destroy();

// Chuyển hướng về trang đăng nhập sau khi đăng xuất
header("Location: dangnhapQT.php");
exit();
?>
