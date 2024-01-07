<?php
include("header.php");
session_start();
include("ketnoi.php");

// Check if edit_id is set in the GET request
if (isset($_GET['edit_id'])) {
    $edit_id = $_GET['edit_id'];

    // Retrieve presentation details for editing
    $sql = "SELECT * FROM presentations WHERE id = $edit_id";
    $result = mysqli_query($ketnoi, $sql);

    // Check for errors in the query
    if (!$result) {
        echo "Error in SQL query: " . mysqli_error($ketnoi);
        exit();
    }

    // Fetch presentation details
    $presentation = mysqli_fetch_assoc($result);

    // Check if the form is submitted for updating
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve updated data from the form
        $updated_title = $_POST['updated_title'];
        $updated_speaker = $_POST['updated_speaker'];
        $updated_start_time = $_POST['updated_start_time'];
        $updated_room = $_POST['updated_room'];

        // Update the presentation in the database
        $update_sql = "UPDATE presentations 
                       SET tieu_de = '$updated_title', 
                           nguoi_trinh_bay = '$updated_speaker', 
                           thoi_gian_bat_dau = '$updated_start_time', 
                           MaPhong = '$updated_room' 
                       WHERE id = $edit_id";

        try {
            $update_result = mysqli_query($ketnoi, $update_sql);

            if ($update_result) {
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
} else {
    echo "Invalid request. Missing edit_id parameter.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Sửa</title>
</head>

<body>
    <h2>Chỉnh Sửa</h2>

    <?php
    // Display the form with current presentation details
    if (isset($presentation)) {
    ?>
         <form action="sua.php?edit_id=<?php echo $edit_id; ?>" method="post">
        <label for="updated_title">Tiêu Đề:</label>
        <input type="text" name="updated_title" value="<?php echo $presentation['tieu_de']; ?>" required><br>

        <label for="updated_speaker">Người Trình Bày:</label>
        <input type="text" name="updated_speaker" value="<?php echo $presentation['nguoi_trinh_bay']; ?>" required><br>

        <label for="updated_start_time">Thời gian:</label>
        <input type="datetime-local" name="updated_start_time" value="<?php echo date('Y-m-d\TH:i', strtotime($presentation['thoi_gian_bat_dau'])); ?>" required><br>

        <label for="updated_room">Phòng:</label>
        <input type="text" name="updated_room" value="<?php echo $presentation['MaPhong']; ?>" required><br>

        <button type="submit">Lưu </button>
        </form>
    <?php
    } else {
        echo "Presentation not found.";
    }
    ?>

</body>

</html>
