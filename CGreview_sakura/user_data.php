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
        <title>ユーザーページ</title>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <link rel="stylesheet" href="./assets/css/index.css">
        <script type="text/javascript">
            var urlPrm = new Object;
            // 変数urlSearchにURLの?の後ろを&で区切ったものを配列にして代入
            var urlSearch = location.search.substring(1).split('&');
            // for文でrairがある限りループさせる
            for(i=0;urlSearch[i];i++){
            // 変数kvにurlSearchを=で区切り配列に分割する
              var kv = urlSearch[i].split('=');
            　// 最初に定義したオブジェクトurlPrmに連想配列として格納
              urlPrm[kv[0]]=kv[1];
            //https://qiita.com/tonkatu_tanaka/items/99d167ded9330dbc4019
            }
            console.log(urlPrm.sample1);
            var list = urlPrm.sample1;
        </script>
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
                <div id = "work_title">
                    <h1>作品一覧</h1><div id="list_target"></div>
                    <script>
                        if(<?php echo $_SESSION["NAME"] ;?>==1632999){
                        <h1>他のユーザーの作品に投稿したコメント一覧</h1><div id="comment_target"></div>
                        }
                    </script>
                        <h1>自分の作品に投稿されたコメント一覧</h1><div id=""></div>

                </div>
            </div>
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
                    console.log(data[na]);
                    while(data_half > 0){
                        if(data[na] == urlPrm.sample1)
                        list_create(data[mod],data[thum],data[na]);
                        data_half = data_half-1;
                        mod = mod+3;
                        thum=thum+3;
                        na=na+3;
                        console.log(data[na]);
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
        <script type="text/javascript">
            window.addEventListener("load", function () {
                $.ajax({
                    type: 'POST',
                    url: './assets/php/test2_review_get.php',
                    dataType: "json",
                })
                .done(function(data, status, jqXHR){
                    data_len = data.length;
                    //表示される作品の個数
                    data_ha = data_len/4;
                    var date = 0;
                    var review = 1;
                    var stu_num = 2;
                    var id_work = 3;
                    console.log(data_ha);
                    console.log(data[date]);
                    console.log(data[review]);
                    console.log(data[stu_num]);
                    while(data_ha > 0){
                        if(data[stu_num] == urlPrm.sample1){
                        comment_create(data[date],data[review],data[stu_num],data[id_work]);
                        }
                        data_ha = data_ha-1;
                        date = date+4;
                        review=review+4;
                        stu_num=stu_num+4;
                        id_work=id_work+4;
                        console.log(data[date]);
                        console.log(data[review]);
                        console.log(data[stu_num]);
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
        <script type="text/javascript" src="comment_load.js"></script>
    </body>
</html>