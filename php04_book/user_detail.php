<?php

$id = $_GET['id'];


//【重要】
//insert.phpを修正（関数化）してからselect.phpを開く！！
require_once("funcs.php");
$pdo = db_conn();




//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=" . $id);
$status = $stmt->execute();


//３．データ表示
$view = "";
if ($status == false) {
    sql_error($status);
} else {

    $result = $stmt->fetch();
    // while ($result = $stmt->fetch()) {
    //     //GETデータ送信リンク作成
    //     // <a>で囲う。
    //     $view .= '<p>';
    //     $view .= '<a href="delete.php.?id=' . $result["id"] . '">';
    //     $view .= $result["indate"] . "：" . $result["name"];
    //     $view .= '</a>';
    //     $view .= '</p>';
    // }
}


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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ユーザーデータ個別表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">データ登録</a>
                </div>
            </div>
        </nav>
    </header>

<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<form action="user_update.php" method="post">
  <div class="jumbotron">
   <fieldset>
    <legend>ユーザー登録</legend>
     <label>名前：<input type="text" name="name" value=<?=$result['name']?>></label><br>
     <label>ID：<input type="text" name="lid" value=<?=$result['lid']?>></label><br>
     <label>PW：<input type="password" name="lpw" value=<?=$result['lpw']?>></label><br>
     <label>権限：
     <select name='kanri_flg' value=<?=$result['kanri_flg']?>>
      <?php // ③optionタグを出力
      echo $age_data ?>
      </select>
      <input type="hidden" name="id" value=<?=$result['id']?>>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>


</body>

</html>