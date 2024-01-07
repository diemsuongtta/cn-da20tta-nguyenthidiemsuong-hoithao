<?php session_start();
if (!isset($_SESSION["nguoidung"])) {
    echo "<script language=javascript>
alert('Bạn không có quyền trên trang này!'); window.location='dangky.php';
</script>";
}
?>

<?php
include("header.php");
?>

<style>
    .tde{
        color: white;
        font-size: 20px;
    }

    .tt {
        font-size:20px;
        text-align: center;
    }

    .ha img {
        display: block;
        margin: 0 auto;
    }

</style>


    <table align="center" width="100%">
        <tr bgcolor="#89B9AD">
            <td class="tde" align="right"> Xin chào, <?php echo $_SESSION["nguoidung"]; ?> &nbsp;&nbsp; <a href="thoat.php">Thoát</a></td>
        </tr>
        <tr>
            <td style="font-weight: bold; text-align: center; color:brown; font-size: 20px;"  >THÔNG TIN CỦA BẠN</td>
        </tr>
        <?php include("ketnoi.php");
        $user = $_SESSION["nguoidung"];
        $sql = "select * from nguoidung where username='" . $user . "'";
        $kq = mysqli_query($ketnoi, $sql);
        while ($row = mysqli_fetch_array($kq)) {
            echo "<tr>";
            echo "<td class='tt'>Họ và tên: " . $row["ho_ten"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='tt'>Giới tính: ";
            if ($row["gioi_tinh"] == 0)
                echo "Nam";
            else echo "Nữ";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='tt'>Thuộc quốc tịch: " . $row["quoc_gia"] . "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='tt'>Ảnh đại diện: </td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td class='ha'> <img src= '" . $row["hinh_dai_dien"] . "' width='300' height='300'></td>";
            echo "</tr>";
        }
        ?>


    </table>

<?php
include("footer.php");
?>