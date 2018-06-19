<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

try{
    $pdo = new PDO($dsn, $user, $password);
    $myInput1 = $_POST['word1'];
    $myInput2 = $_POST['word2'];;
    $myInput3 = $_POST["word3"];
    $sql2="SELECT work_info.work_id FROM work_info WHERE(((work_info.work_name)='$myInput3'));"; 
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();
    $result = $stmt2->fetch();
    $sql = "INSERT INTO all_info(modeling, material,work_id) VALUES (:modeling, :material,:work_id)";
    $stmt = $pdo->prepare($sql);
    $params = array(':modeling' => $myInput1, ':material' => $myInput2, ':work_id' => $result[0]);
    $stmt->execute($params);
    echo $result[0];
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>