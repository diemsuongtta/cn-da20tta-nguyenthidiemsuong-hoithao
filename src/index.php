<?php
include("header.php");
session_start();
include("ketnoi.php");

// Check if presentation_id is set in the POST request to handle deletion
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_presentation'])) {
        $presentation_id = $_POST['presentation_id'];

        // Delete the presentation from the database
        $sql = "DELETE FROM presentations WHERE id = $presentation_id";

        try {
            $ket_qua = mysqli_query($ketnoi, $sql);

            if ($ket_qua) {
                // Redirect to index.php after successful deletion
                header("Location: index.php");
                exit();
            } else {
                echo "Error deleting presentation: " . mysqli_error($ketnoi);
            }
        } catch (mysqli_sql_exception $e) {
            echo "Error: " . $e->getMessage();
        }
    } elseif (isset($_POST['edit_presentation'])) {
        $presentation_id = $_POST['presentation_id'];

        // Redirect to a new page for editing, passing the presentation ID as a parameter
        header("Location: index.php?edit_id=" . $presentation_id);
        exit();
    }
}
$sql = "SELECT presentations.*, nguoithamdu.TenNguoiThamDu 
        FROM presentations 
        LEFT JOIN nguoithamdu ON presentations.id = nguoithamdu.MaNguoiThamDu";

$result = mysqli_query($ketnoi, $sql);



// Check for errors in the query
if (!$result) {
    echo "Error in SQL query: " . mysqli_error($ketnoi);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Presentations</title>
</head>

<body>
    <div class="accordion-label noidung" id="accordionLabel">
        <h2 style="text-align: center; cursor: pointer;" onclick="toggleAccordion()">HỘI THẢO</h2>
        <div class="accordion-label"><h2 style="text-align: center;">PHÒNG 1 (KHÓA 1): PHÒNG B21.201</h2></div>

        <?php
        // Display existing presentations
        if ($result && mysqli_num_rows($result) > 0) {
            echo '<div class="accordion noidung" id="accordionContent">';
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<div>";
                echo "<p><strong>Tiêu đề:</strong> " . $row["tieu_de"] . "<br>";
                echo "<strong>Người trình bày:</strong> " . $row["nguoi_trinh_bay"] . "<br>";
                echo "<strong>Thời gian bắt đầu:</strong> " . $row["thoi_gian_bat_dau"] . "<br>";
                echo "<strong>Phòng:</strong> " . $row["MaPhong"] . "<br>";
                echo "<strong>Người tham dự:</strong>";
                echo isset($row["TenNguoiThamDu"]) ? $row["TenNguoiThamDu"] : "";
                echo "<br>";

                // Form with Edit and Delete buttons for each presentation
        ?>
                <form action="index.php" method="post">
                    <input type="hidden" name="presentation_id" value="<?php echo $row["id"]; ?>">
                    <a href="them.php"><button type="button">Thêm</button></a>
                    <a href="sua.php?edit_id=<?php echo $row['id']; ?>"><button type="button">Sửa</button></a>

                    <button type="submit" name="delete_presentation">Xóa</button>
                </form>
        <?php
                echo "</p>";
                echo "</div>";
            }
            echo '</div>';
        } else {
            echo "No presentations available.";
        }
        ?>
    </div>

    <script>
        document.querySelector(".accordion-label").addEventListener("click", function () {
            var accordion = document.querySelector(".accordion");
            if (accordion.style.display === "none" || accordion.style.display === "") {
                accordion.style.display = "block";
            } else {
                accordion.style.display = "none";
            }
        });
        function toggleAccordion() {
            var accordionContent = document.getElementById("accordionContent");
            if (accordionContent.style.display === "none" || accordionContent.style.display === "") {
                accordionContent.style.display = "block";
            } else {
                accordionContent.style.display = "none";
            }
        }
    </script>

    <!-- Rest of your HTML content -->
</body>

</html>