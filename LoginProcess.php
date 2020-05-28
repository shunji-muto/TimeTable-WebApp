<!--
/*******************************************************************
*** File Name : LoginProcess.php
*** Designer : 増田　毅
*** Date : 2018.06.12
*** Function : ログイン処理を行い、idとパスワードをdbに照会する
*******************************************************************/
-->
<?php

require_once("connect.php");
session_start();
$id = $_POST['id'];
$pass = $_POST['pass'];

if(ctype_alnum($id)==FALSE || ctype_alnum($pass)==FALSE){
    $_SESSION['flag']='invalidchar';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'LoginAccount.php');
    exit;
}

if(strlen($id)>10 || strlen($pass)>20){//入力が長すぎる場合
    $_SESSION['flag']='invalidlen';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'LoginAccount.php');
    exit;
}
if($id == NULL){
    $_SESSION['flag']='falseId';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'LoginAccount.php');
    print('idが未登録です');
}
try {
/***********************************************
      ***Function Name: db_connect()
      ***Designer     : 小泉圭吾
      ***Data         : 2018.6.5
      ***Function     : データベースに接続する
      ***Return       : オブジェクトを返す
***********************************************/
    $db = db_connect('schedule');
    $stt = $db->query("SELECT *
                       FROM individual
                       WHERE id = '" . $id . "'
                        ");
    $row = $stt->fetch(PDO::FETCH_ASSOC);
    //$a = $row['pass'];
    $db = NULL;//初期化
}catch(PDOException $e) {
    die("エラーが発生しました: {$e->getMessage()}");
}


if($row['id'] == NULL){
    $_SESSION['flag']='falseId';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'LoginAccount.php');
    //print('idが未登録です');
}else if($row['pass'] != $pass){
    $_SESSION['flag']='falsePass';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'LoginAccount.php');
    //print('passが違います。');
}

//print("ようこそ".$id."さん、ログインに成功しました。");
if($row['id'] == $id && $row['pass'] == $pass){
    $_SESSION['id'] = $id;
    $_SESSION['status'] = 1;
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'ShowTimetable.php');
}
?>
