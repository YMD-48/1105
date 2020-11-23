<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function db_conn(){
    try {
        //ID MAMP ='root'
        //Password:MAMP='root',XAMPP=''
        //$pdo = new PDO('mysql:dbname=gs_db2;charset=utf8;host=localhost:8889','root','root');
        
        $db_name = "gs_db2";    //データベース名
        $db_id   = "root";      //アカウント名
        $db_pw   = "root";      //パスワード：XAMPPはパスワード無しに修正してください。
        $db_host = "localhost:8889"; //DBホスト
        $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host, $db_id, $db_pw);
        return $pdo;

    
    
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
      }
    
}



function sql_error($stmt){

    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
    
}



//リダイレクト関数: redirect($file_name)
function redirect($file_name){
    
    header("Location:" . $file_name);
    exit();

}