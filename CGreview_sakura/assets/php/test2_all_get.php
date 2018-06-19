<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

try{
    $pdo = new PDO($dsn, $user, $password);
    $myInput1=$_POST['word1'];
    $sql = "SELECT 
    avg(modeling),
    count(modeling=5 or null),
    count(modeling=4 or null),
    count(modeling=3 or null),
    count(modeling=2 or null),
    count(modeling=1 or null),
    avg(material), 
    count(material=5 or null),
    count(material=4 or null),
    count(material=3 or null),
    count(material=2 or null),
    count(material=1 or null)
    FROM work_info INNER JOIN all_info ON work_info.work_id = all_info.work_id WHERE (((work_info.work_name)='$myInput1'));";
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