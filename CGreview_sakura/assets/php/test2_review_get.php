<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

try{
    //DBに接続する
    $pdo = new PDO($dsn, $user, $password);
    //データの呼び出し
    $sql = "SELECT part_date,part_review,contributor,work_name FROM part_info INNER JOIN work_info ON work_info.work_id = part_info.work_id ";
    //queryメソッドの使用
    $stmt = $pdo->query($sql);
    //サムネイルと作品の表示？
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $row[] = $result["part_date"];
        $row[] = $result["part_review"];
        $row[] = $result["contributor"];
        $row[] = $result["work_name"];
    }
    echo json_encode($row);
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>