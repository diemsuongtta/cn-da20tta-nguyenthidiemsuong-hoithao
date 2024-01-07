<?php
session_start();

include("ketnoi.php");

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['presentation'])) {
    $presentation = $_GET['presentation'];

    $sql = "DELETE FROM presentations WHERE presentation = $presentation";

    try {
        $ket_qua = mysqli_query($ketnoi, $sql);

        if ($ket_qua) {
            header("Location: index.php");
            exit();
        } else {
            echo "Error deleting presentation: " . mysqli_error($ketnoi);
        }
    } catch (mysqli_sql_exception $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}

mysqli_close($ketnoi);
?>
