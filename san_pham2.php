<?php
include "./LongDB2.php";

$longdb2 = new LongDB2([
    'host' => 'localhost',
    'db' => 'long',
    'user' => 'root',
    'pass' => '',
]);

$row_per_page = 5; // so dong hien thi o 1 trang
$page = isset($_GET['page']) ? $_GET['page'] : 1; // trang hien tai

$tong_so_trang = $longdb2->lay_tong_so_trang($row_per_page); // tong so trang
$dssp = $longdb2->lay_dssp($page, $row_per_page); // danh sach san pham cua trang hien tai

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
<a href="them.php">THEM MOI ngay sx</a>
    <h1>CLASS SÀI NEW</h1>
    <table>
        <thead>
            <tr>
                <th>id_sp</th>
                <th>ten</th>
                <th>ngay_sx</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($dssp as $sp) {
                echo "<tr>";
                echo "<td>" . $sp['id_sp'] . "</td>";
                echo "<td>" . $sp['ten'] . "</td>";
                echo "<td>" . $sp['ngay_sx'] . "</td>";
                echo "<td><a href='update.php?id_sp=".$sp["id_sp"]."'>cap nhat</a></td>";
                echo "<td><a href='xoa_date.php?id_sp=".$sp["id_sp"]."'>xoa</a></td>";
                echo "</tr>";
            }
            ?>

        </tbody>
    </table>

    <ul>
        <?php
        for ($ipage = 1; $ipage <= $tong_so_trang; $ipage++) {
            $class = ($page == $ipage)?"red":"";
        ?>
            <li><a class="<?=$class?>" href="san_pham2.php?page=<?=$ipage?>"><?= $ipage ?></a></li>
        <?php
        }
        ?>
    </ul>
</body>

</html>