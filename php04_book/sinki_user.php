<?php

$age_data = ['0'=>'一般'
             

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
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[End] -->
<form action="user_register.php" method="post">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
     <label>名前：<input type="text" name="name"></label><br>
     <label>ID：<input type="text" name="lid"></label><br>
     <label>PW：<input type="password" name="lpw"></label><br>
     <label>権限：
     <select name='kanri_flg'>
      <?php // ③optionタグを出力
      echo $age_data ?>
      </select>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>