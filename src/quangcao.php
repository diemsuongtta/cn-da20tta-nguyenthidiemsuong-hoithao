<?php
include("header.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Chèn ảnh vào hai bên của web PHP</title>
</head>
<body>
    <style>
        #left-ad {
            position: fixed;
            bottom: 24px;
            left: 10px;
        }

        #right-ad {
            position: fixed;
            bottom: 24px;
            right: 10px;
        }

        @media(max-width: 1024px) {
            .ads-container {
                display: none!important;
            }
        }
    </style>

    <div class="ads-container">
        <img id="left-ad" src="https://example.com/images/left-ad.jpg" alt="Quảng cáo bên trái">
        <img id="right-ad" src="https://example.com/images/right-ad.jpg" alt="Quảng cáo bên phải">
    </div>
</body>
</html>