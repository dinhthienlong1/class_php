<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (isset($_SESSION['user'])) {
        echo "Xin chao" . $_SESSION['user']['username'];
        echo "<br/><a href='dang_xuat.php'>dang xuat</a>";
    } else {
    ?>
        <a href="dang_nhap.php">dang nhap</a>
    <?php
    }
    ?>
</body>

</html>