  
<?php
include "./LongDB2.php";
$id = $_GET["id_sp"];
xoa_date($id);
header("location:san_pham2.php");