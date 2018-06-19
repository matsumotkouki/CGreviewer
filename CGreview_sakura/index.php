<?php
session_start();

 //ログイン状態チェック
 if (!isset($_SESSION["NAME"])) {
    header("Location: logout.php");
    exit;
    }
?>
<html>
<head>
<meta charset="UTF-8">
  <script src="./assets/js/three.min.js"></script>
  <script src="./assets/js/OrbitControls.js"></script>
  <script src="./assets/js/MTLLoader.js"></script>
  <script src="./assets/js/OBJLoader.js"></script>
  <title>評価</title>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
  <link rel="stylesheet" href="./assets/css/index.css">
  <script src = "./assets/js/index.js"></script>
<style>
	*{padding:0px; margin:0px}
	div#canvas_frame{
	width: 600px;
	height: 400px;
	overflow:hidden;
	}
</style>
<script type="text/javascript">
var urlPrm = new Object;
var urlSearch = location.search.substring(1).split('&');
for(i=0;urlSearch[i];i++){
  var kv = urlSearch[i].split('=');
  urlPrm[kv[0]]=kv[1];
}
var list = urlPrm.sample1;
tes(list);
</script>
<script type="text/javascript" src="index.js"></script>
</head>

<body>
<header>
	<ul class="gnav">
		
		<li>
      		<a class="hoverText" href="file_list.php"><p>作品一覧</p></a>
    	</li>
        <li>
      		<a class="hoverText" href="logout.php"><p>ログアウト</p></a>
    	</li>
		
	</ul>
</header>
<div class="wrapper">
	<div class="work_info">
		<div id = "work_title"><h1 id="work_read">タイトル読込</h1></div>
		<div id="canvas_frame"></div>
		<div id="add_button"></div>
	</div>
	<hr/>
	<div id = "allReview_fo">
		<form id = "submitForm" method="post" name="hoge" action="test1_all.php">
			<table border = "2">
				<div id="target_id"></div>
				<tr>
					<th>モデリング : </th>
					<td><input id = "word_id1" type="number" name="example2" value="3" min="1" max="5"></td>
				</tr>
				<tr>
					<th>マテリアル : </th>
					<td><input id = "word_id2" type="number" name="example2" value="0" min="0" max="0"></td>
				</tr>
			</table>
			<input type="reset" value="Clear" />
			<input type="submit" id="submit_all" value="Submit" onclick="koshin()" />
		</form>
	</div>
	<div id="partReview_form"></div>
	<hr/>
	<h2>全体評価</h2>
	<div id="all_create_target"></div>
	<h2>部分評価</h2>
	<div id = "ajax_test"></div>
	<div id = "answer1"></div>
</div>
</body>
</html>