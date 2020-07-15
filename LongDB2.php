<?php
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
        $stmt = $this->pdo->prepare("SELECT * FROM san_pham LIMIT ?, ?");
        $offset = ($page - 1) * $row_per_page;
        $stmt->execute([$offset, $row_per_page]);
        return $stmt->fetchAll();
    }
}
