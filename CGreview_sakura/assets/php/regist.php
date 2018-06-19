<?php

require('/home/citnn/www/cgpeer/CGreview_sakura/DSN.php');
try{
 $pdo = new PDO($dsn, $user, $password);
 $stmt = $pdo->prepare("INSERT INTO student_info(student_number,password) VALUES (:student_number, :password)");
    $stmt->bindParam(':student_number', $_POST['num'], PDO::PARAM_STR);
    $stmt->bindParam(':password', $_POST['pass'], PDO::PARAM_STR);
    $stmt->execute();
	echo "学生番号とパスワードを格納しました";
    $pdo = null;
}
catch (PDOException $e){
    print('エラーが発生しました。:'.$e->getMessage());
    die();
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>登録完了</title>
</head>
<body>

<a href = "http://citnn.sakura.ne.jp/cgpeer/CGreview_sakura/file_list.html">作品一覧ページへ！</a>
</body>
</html>