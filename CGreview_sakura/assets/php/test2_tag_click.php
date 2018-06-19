<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

try{
    $pdo = new PDO($dsn, $user, $password);
    $myInput0 =  date("Y-m-d H:i:s");
    $myInput1 = $_POST['word1'];
    $myInput2 = $_POST['word2'];
    $myInput3 = $_POST["word3"];
    $sql = "SELECT part_info.part_date, part_info.contributor, part_info.part_review FROM part_info WHERE (((part_info.posix)=$myInput1) AND ((part_info.posiy)=$myInput2));";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetch(PDO::FETCH_NUM);
    echo json_encode($result);
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>