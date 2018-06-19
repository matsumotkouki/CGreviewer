<?php
session_start();
header('Content-Type: text/html; charset=UTF-8');
// 接続情報
require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');
// インプット値
$num = (string)filter_input(INPUT_POST, 'num');
$pass = (string)filter_input(INPUT_POST, 'pass');

try {
  // DB接続
  $pdo = new PDO($dsn, $user, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  // SQL発行
  $stmt = $pdo->prepare("SELECT * FROM student_info WHERE student_number = ? AND password = ?");
  $stmt->bindValue(1, $num);
  $stmt->bindValue(2, $pass);
  $stmt->execute();
  // 結果の取得
  if($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                    // 入力したIDのユーザー名を取得
					$id = $row['student_number'];
                    $sql = "SELECT * FROM student_info WHERE student_number = $id";  //入力したIDからユーザー名を取得
                    $stmt = $pdo->query($sql);
                    foreach ($stmt as $row) {
                        $row['student_number'];  // ユーザー名
                    }
                    $_SESSION["NAME"] = $row['student_number'];
                    header("Location: file_list.php");  // メイン画面へ遷移
                    exit();  // 処理終了
               
  }else{
    echo "学生番号かパスワードが間違えています";
  }
}
 catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            //$errorMessage = $sql;
            // $e->getMessage() でエラー内容を参照可能（デバック時のみ表示）
            // echo $e->getMessage();
 }
?>