<?php
session_start();
class LongDB2
{
    private  $host = '127.0.0.1';
    private  $db   = 'test';
    private  $user = 'root';
    private  $pass = '';
    private  $port = "3306";
    private  $charset = 'utf8mb4';
    private  $dsn;
    private  $pdo;
    function __construct($params)
    {
        $this->host = $params['host'];
        $this->db = $params['db'];
        $this->user = $params['user'];
        $this->pass = $params['pass'];
        $this->dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db . ";charset=" . $this->charset . ";port=" . $this->port;

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        


        $this->pdo = new PDO($this->dsn, $this->user, $this->pass, $options);
    }
    

    public  function lay_tong_so_trang($row_per_page)
    {
        $stmt = $this->pdo->prepare("SELECT count(*) FROM san_pham");
        $stmt->execute([]);
        $number_of_rows = $stmt->fetchColumn(); //lay 1 gia tri tra ve
        return ceil($number_of_rows / $row_per_page); // lam tron len
    }

    public  function lay_dssp($page, $row_per_page)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM san_pham ORDER BY id_sp DESC LIMIT ?, ?");
        $offset = ($page - 1) * $row_per_page;
        $stmt->execute([$offset, $row_per_page]);
        return $stmt->fetchAll();
    }
}
function them_date($date)
{
    $pdo = new PDO('mysql:host=localhost;dbname=long', 'root', '');
    $rs = $pdo->prepare('INSERT INTO san_pham (ten,ngay_sx) VALUES (?,?)')->execute([$date['ten'], $date['ngay_sx']]);
    return $pdo->lastInsertId();
}
function xoa_date($id_sp)
{
    // Create a new PDO instanace
    $pdo = new PDO('mysql:host=localhost;dbname=long', 'root', '');
    $pdo->prepare('DELETE FROM san_pham WHERE id_sp = ?;')->execute([$id_sp]);
}

function capnhat_sp($customer)
{
    $pdo = new PDO('mysql:host=localhost;dbname=long', 'root', '');
    $ngay = null;
    if(!empty($customer['ngay_sx'])){
        $ngay = DateTime::createFromFormat('d/m/Y', $customer['ngay_sx']);
        if($ngay == false){
            $ngay = null;
        }else{
            $ngay =  $ngay->format('Y-m-d');
        }
    }
    $params = [$customer['ten'], $ngay, $customer['id_sp']];
    $pdo->prepare('UPDATE san_pham SET  ten = ?, ngay_sx = ? WHERE id_sp = ?;')->execute($params);
}

function lay_sp($id_sp)
    {
        // Create a new PDO instanace
        $pdo = new PDO('mysql:host=localhost;dbname=long', 'root', '');
        $stmt = $pdo->prepare('SELECT id_sp, ten, ngay_sx FROM san_pham WHERE id_sp = ?;');
        $stmt->setFetchMode(PDO::FETCH_ASSOC); // tra ve mang
        $stmt->execute([$id_sp]); // chay nhung van chua tra ve du lieu
        $id = $stmt->fetch(); // tra ve 1 ket qua
        return $id;
    }