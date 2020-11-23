<?php

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ取得SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    //var_dump($result);
    $view .= "<p><a href=user_detail.php?id=".$result["id"].">";
    $view .= '<br>登録ID：'.$result['id'].'<br>ユーザー名:'.$result['name'].'<br>ユーザーID:'.$result['lid'];
    $view .= '<a href="user_delete.php.?id=' . $result["id"] . '">';
    $view .= '<br><button>削除</button>';
    $view .= '</a>';
    $view .= "</p>";

    

  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>【管理者用】ユーザー一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="kanri_index.php">ブックマーク登録</a>
      <a class="navbar-brand" href="kanri_user_register.php">ユーザー登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
    <h2>【管理者用】ユーザー一覧</h2>
    <div class="container jumbotron">

    <?= $view ?>
    </div>
</div>
<!-- Main[End] -->

</body>
</html>




