<?php
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');

$file_name1 = $_FILES['up_file']['name'][0];
$tmp_path = $_FILES['up_file']['tmp_name'][0];
$upload_path = '../work_files/';
if (is_uploaded_file($tmp_path)) {
  if (move_uploaded_file($tmp_path, $upload_path.$file_name1)) {
    chmod($upload_path.$file_name1, 0644);
  } else {
    echo $file_name1."Error:アップロードに失敗しました。";
  }
} else {
  echo $file_name1."Error:画像が見つかりません。";
}
$file_name2 = $_FILES['up_file']['name'][1];
$tmp_path = $_FILES['up_file']['tmp_name'][1];
$upload_path = '../work_files/';
if (is_uploaded_file($tmp_path)) {
  if (move_uploaded_file($tmp_path, $upload_path.$file_name2)) {
    chmod($upload_path.$file_name2, 0644);
  } else {
    echo $file_name2."Error:アップロードに失敗しました。";
  }
} else {
  echo $file_name2."Error:画像が見つかりません。";
}
try{
    $pdo = new PDO($dsn, $user, $password);
    $myInput1 = $file_name1;
    $myInput2 = $file_name2;
    $sql = "INSERT INTO work_info(work_name,thumbnail) VALUES (:work_name,:thumbnail)";
    $stmt = $pdo->prepare($sql);
    $params = array(':work_name' => $myInput1,':thumbnail' => $myInput2);
    $stmt->execute($params);
    echo "{$myInput1}と{$myInput2}を格納しました";
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>




