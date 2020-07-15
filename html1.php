<?php
include "./cat.php";
class Cat{
    public $ten;
    public $chung_loai;

    function ten($ten){
        $this->ten=$ten;
    }
    function get_ten(){
        return $this->ten;
    }
    function chung_loai($chung_loai){
        $this->chung_loai=$chung_loai;
    }
    function get_chung_loai(){
        return $this->chung_loai;
    }
    
}