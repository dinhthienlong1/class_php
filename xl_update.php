<?php
include './LongDB2.php';
$customer = [
  'ten'    => $_POST['ten'],
  'ngay_sx'           => $_POST['ngay_sx'],
  'id_sp'  => $_POST['id_sp'], // khoa chinh quan trong
];
capnhat_sp($customer);
header("<location:san_pham2.php");
