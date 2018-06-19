<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

try{
    $pdo = new PDO($dsn, $user, $password);
    $myInput0 =  date("Y-m-d H:i:s");
    $myInput1 = $_POST['word1'];
    $myInput2 = $_POST['word2'];
    $myInput3 = $_POST["word3"];
    $myInput4 = $_POST['word4'];
    $myInput5 = $_POST["word5"];
    $myInput6 = $_POST["word6"];
    $sql2="SELECT work_info.work_id FROM work_info WHERE(((work_info.work_name)='$myInput6'));"; 
    $stmt2 = $pdo->prepare($sql2);
    $stmt2->execute();
    $result = $stmt2->fetch();
    $sql = "INSERT INTO part_info(part_date,contributor,part_review,posix,posiy,posiz,work_id) VALUES (:part_date,:contributor,:part_review,:posix,:posiy,:posiz,:work_id)";
    $stmt = $pdo->prepare($sql);
    $params = array(':part_date' => $myInput0,':contributor' => $myInput1, ':part_review' => $myInput2, ':posix' => $myInput3, ':posiy' => $myInput4, ':posiz' => $myInput5, ':work_id' => $result[0]);
    $stmt->execute($params);
    echo $result[0];
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>