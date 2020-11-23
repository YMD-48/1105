<?php


require_once("funcs.php");

$bookname   = $_POST["bookname"];
$bookurl  = $_POST["bookurl"];
$bookcomment = $_POST["bookcomment"]; 
$id    = $_POST["id"]; 

$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET bookname = :bookname,bookurl = :bookurl,bookcomment=:bookcomment,bookdate=sysdate() WHERE id= :id ;");
$stmt->bindValue(':bookname', $bookname, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookcomment', $bookcomment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)

$status = $stmt->execute();



//４．データ登録処理後
if($status==false){
    //*** function化する！*****************
    sql_error($stmt);
    // $error = $stmt->errorInfo();
    // exit("SQLError:".$error[2]);
}else{
    //*** function化する！*****************
    ///redirect('select.php');
    header("Location: select.php");
    // exit();
};






?>