<?php
include './LongDB2.php';

$ngay_sx = DateTime::createFromFormat('d/m/Y', $_POST['ngay_sx'])->format('Y-m-d');
$date1 = [
  'ten' => $_POST['ten'],
  'ngay_sx' => $ngay_sx

];
them_date($date1);
header("location:san_pham2.php");
