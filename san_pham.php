<?php
include "./LongDB.php";
LongDB::khoi_tao([
    'host' => 'localhost',
    'db' => 'long',
    'user' => 'root',
    'pass' => '',
]);

$row_per_page = 5; // so dong hien thi o 1 trang
$page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hien tai

$tong_so_trang = LongDB::lay_tong_so_trang($row_per_page); // tong so trang
$dssp = LongDB::lay_dssp($page, $row_per_page); // danh sach san pham cua trang hien tai

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        ul li{
            display: inline-block;
        }
        ul li a{
            padding: 10px;
            border: 1px gray solid;
            background-color: yellow;
        }
        .red{
            color: red;
            font-weight: bold;
            font-size: 1.2em; /*phong to hon font thuong*/
        }
    </style>
     <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>CLASS SÀI STATIC</h1>
    <table>
        <thead>
            <tr>
                <th>id_sp</th>
                <th>ten</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dssp as $sp) {
                echo "<tr>";
                echo "<td>" . $sp['id_sp'] . "</td>";
                echo "<td>" . $sp['ten'] . "</td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

    <ul>
        <?php
        for ($ipage = 1; $ipage <= $tong_so_trang; $ipage++) {
            $class = ($page == $ipage) ? "red" : "";
        ?>
            <li><a class="<?= $class ?>" href="san_pham.php?page=<?= $ipage ?>"><?= $ipage ?></a></li>
        <?php
        }
        ?>
    </ul>
   
    <?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    echo date('\B\â\y \g\i\ờ \l\à \:  H \h i \p');
    ?>
    
</body>

</html>