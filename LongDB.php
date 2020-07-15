<?php
class LongDB{
    private static $host = '127.0.0.1';
    private static $db   = 'test';
    private static $user = 'root';
    private static $pass = '';
    private static $port = "3306";
    private static $charset = 'utf8mb4';
    private static $dsn;
    private static $pdo;
    public static function khoi_tao($params){
        self::$host = $params['host'];
        self::$db = $params['db'];
        self::$user = $params['user'];
        self::$pass = $params['pass'];
        self::$dsn = "mysql:host=".self::$host.";dbname=".self::$db.";charset=".self::$charset.";port=".self::$port;

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

       
        self::$pdo = new PDO(self::$dsn, self::$user, self::$pass, $options);
    }

    public static function lay_tong_so_trang($row_per_page){
        $stmt = self::$pdo->prepare("SELECT count(*) FROM san_pham");
        $stmt->execute([]); 
        $number_of_rows = $stmt->fetchColumn(); //lay 1 gia tri tra ve
        return ceil($number_of_rows/$row_per_page); // lam tron len
    }

    public static function lay_dssp($page, $row_per_page){
        $stmt = self::$pdo->prepare("SELECT * FROM san_pham LIMIT ?, ?");
        $offset = ($page-1)*$row_per_page;
        $stmt->execute([$offset, $row_per_page]); 
        return $stmt->fetchAll();
    }
}