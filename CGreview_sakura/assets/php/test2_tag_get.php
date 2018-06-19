<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

try{
    $pdo = new PDO($dsn, $user, $password);
    $myInput1=$_POST['word1'];
    $sql="SELECT part_info.posix, part_info.posiy, part_info.posiz FROM work_info INNER JOIN part_info ON work_info.work_id = part_info.work_id WHERE (((work_info.work_name)='$myInput1'));";
    $stmt = $pdo->query($sql);
    $result = $stmt->fetchALL(PDO::FETCH_NUM);
    echo json_encode($result);
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>