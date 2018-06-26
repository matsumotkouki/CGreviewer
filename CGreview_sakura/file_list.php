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
        <title>作品一覧</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link rel="stylesheet" href="./assets/css/index.css">
        <div type="hidden"id="php-val"style="display:none;"></div>
    </head>

    <body>
        <header>
            <ul class="gnav">
                    <li>
                        <a class="hoverText" href="file_list.php"><p>作品一覧</p></a>
                    </li>
                    <li>
                        <!--http://nasuna.hateblo.jp/entry/2017/09/20/183139 -->
                        <a class="hoverText" href="user_data.php?sample1=<?php echo $_SESSION["NAME"] ;?>"><p>マイページ</p></a>
                    </li>
                    <li>
                        <a class="hoverText" href="logout.php"><p>ログアウト</p></a>
                    </li>
                </ul>
        </header>
        <div class="wrapper">
            <p>ようこそ<u><?php echo $_SESSION["NAME"] ;?></u>さん
            </p>  <!-- ユーザー名をechoで表示 -->
            <h1>作品一覧</h1>
            <div id="list_target"></div>
        </div>
        <script type="text/javascript">
            window.addEventListener("load", function () {
                $.ajax({
                    type: 'POST',
                    url: './assets/php/test2_list_get.php',
                    dataType: "json",
                })
                //whileでlist_createを呼び出して作品を表示?
                .done(function(data, status, jqXHR){
                    data_length = data.length;
                    //表示される作品の個数
                    data_half = data_length/3;
                    var mod = 0;
                    var thum = 1;
                    var na = 2;
                    console.log(data_half);
                    while(data_half > 0){
                        list_create(data[mod],data[thum],data[na]);
                        data_half = data_half-1;
                        mod = mod+3;
                        thum=thum+3;
                        na=na+3;
                    }
                })
                .fail(function(jqXHR, status, error){
                    $("#list_data").html("エラーです");
                    console.log(status);
                })
                .always(function(jqXHR, status){
                    console.log(status);
                });
            });
        </script>
        <script type="text/javascript" src="the_work_load.js"></script>
    </body>
</html>