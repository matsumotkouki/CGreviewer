<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

try{
    $pdo = new PDO($dsn, $user, $password);
    $stmt = $pdo->prepare("select file_name from test2_workinfo where workid  = ? ");
    $stmt->bindValue(1,1);
    $stmt->execute();
    $result = $stmt->fetch();
    echo $result[0];   
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>