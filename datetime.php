<?php
$string = "28/02/2020";

$string_datetime =  DateTime::createFromFormat('d/m/Y',$string);
var_dump($string_datetime->format('Y-m-d'));
'insert into sanpham(ngay_sx) values(\'2020-02-28\');';