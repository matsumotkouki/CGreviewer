<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

try{
    //DBに接続する
    $pdo = new PDO($dsn, $user, $password);
    //データの呼び出し
    $sql = "SELECT work_name,thumbnail,student_number FROM work_info INNER JOIN student_info ON work_info.student_id = student_info.student_id";
    //queryメソッドの使用
    $stmt = $pdo->query($sql);
    //サムネイルと作品の表示？
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $row[] = $result["work_name"];
        $row[] = $result["thumbnail"];
        $row[] = $result["student_number"];

    }
    echo json_encode($row);
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>