<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD	XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

    include("ketnoi.php");
    $user=$_POST["tendn"];//nhận giá trị từ ô nhập liệu Tên đăng nhập của file dangnhap.php
    $pass=$_POST["matkhau"];//nhận giá trị từ ô nhập liệu Mật khẩu của file dangnhap.php
    $sql="select * from nguoidung where username='".$user ."' and password ='". $pass."'";
    
    // câu lệnh SQL -> kiểm tra tên đăng nhập và mật khẩu có trùng với tài khoản nguoi_dung trong csdl không
    $kq=mysqli_query($ketnoi ,$sql) ;    // thực thi câu lệnh SQL 
    if (mysqli_fetch_array($kq))
    {
        $_SESSION["nguoidung"]=$user;
        echo ("<script language=javascript>
        alert('Đăng nhập thành công');
        window.location='index.php';
        </script> ");
    }
    else
    {
    echo ("<script language=javascript>
    alert('Sai tên đăng nhập hoặc mật khẩu');
    window.location='dangnhap.php';
    </script> ");
    }


?>
</body>
</html>