<?php


require_once("funcs.php");

$id = $_POST["id"]; 
$name = $_POST['name'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$kanri = $_POST['kanri_flg'];
$life= 0;

$pdo = db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_user_table SET name = :name, lid= :lid, lpw= :lpw, kanri_flg= :kanri_flg, life_flg= :life_flg WHERE id= :id ;");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();



//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    sql_error($stmt);
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    ///redirect('select.php');
    header("Location: user.php");
    // exit();
};






?>