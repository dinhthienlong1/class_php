<?php

session_start();
var_dump($_SESSION);
setcookie('ngon_ngu', 'tieng-viet', time() + 10);
$thong_bao = "";
if (isset($_SESSION['user'])) {
    header('location: index.php');
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        if ($_POST['username'] == 'long' && $_POST['password'] == '123') {
            $_SESSION['user'] = [
                'username' => $_POST['username'],
                'password' => $_POST['password']
            ];
            header('location: index.php');
        } else {
            $thong_bao = "tai khoan mat khau khong chinh xacs";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1 {
            color: red;
        }
    </style>
</head>

<body>
    


    <?php
    if (!empty($thong_bao)) {
        echo "<h1>" . $thong_bao . "</h1>";
    }
    ?>
    <form action="dang_nhap.php" method="POST">
        <label for="">username</label>
        <input type="text" name="username" id="" class="form-control">
        <br>
        <label for="">password</label>
        <input type="password" name="password" id="" class="form-control">
        <input type="submit" value="Dang nhap">
    </form>
</body>

</html>