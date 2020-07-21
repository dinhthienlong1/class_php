<?php 
include "./LongDB2.php";

 $id = lay_sp($_GET["id_sp"]);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAP NHAT SAN PHAM</title>
</head>
<body>
    <form action="xl_update.php" method="POST">
    <br>
        
         <input type="hidden" value="<?= $id["id_sp"] ?>" name="id_sp"/> 
        <br>
        <label>customerName</label>
         <input type="text" value="<?= $id["ten"] ?>" name="ten"/> 

        <br>
        <label>ngay sx</label>
        <input type="text" value="<?= $id["ngay_sx"] ?>" name="ngay_sx"/>
        <br>
        <button type="submit">CAP NHAT</button>
        <a href="san_pham2.php">back</a>
    </form>
    
</body>
</html>