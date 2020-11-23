<?php

$age_data = ['0'=>'一般',
             '1'=>'管理者'

            ];
// ②配列のデータをoptionタグに整形
foreach($age_data as $age_data_key => $age_data_val){
    $age_data .= "<option  name=kanri_flg value=". $age_data_key;
    $age_data .= "'>". $age_data_val. "</option>";
}


?>




<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ブックマーク登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="select.php">ブックマーク一覧</a>
    <a class="navbar-brand" href="logout.php">ログアウト</a>
    </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form action="insert.php" method="post">
  <div class="jumbotron">
   <fieldset>
    <legend>フリーアンケート</legend>
     <label>本の名前：<input type="text" name="bookname"></label><br>
     <label>本のURL：<input type="url" name="bookurl" value="https://"></label><br>
     <textArea name="bookcomment" rows="4" cols="40"></textArea><br>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>



</body>
</html>
