<?php
//1. POSTデータ取得
require_once('funcs.php');
$id   = $_GET["id"];

$pdo = db_conn();

$stmt = $pdo->prepare('DELETE FROM gs_user_table WHERE id=:id');

$stmt->bindValue(':id', $id, PDO::PARAM_INT);      //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //実行


//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    sql_error($stmt);
}else{
    //*** function化する！*****************
    redirect('user.php');
}
?>
