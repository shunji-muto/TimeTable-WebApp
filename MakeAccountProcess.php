<!--
/*******************************************************************
*** File Name : MakeAccountProcess.php
*** Designer : 増田　毅
*** Date : 2018.06.12
*** Function : アカウント登録の処理を行う。
*******************************************************************/
-->
<?php
require_once("connect.php");

session_start();

$id = $_POST['id'];
$pass = $_POST['pass'];
$confpass = $_POST['confpass'];


if(ctype_alnum($id)==FALSE || ctype_alnum($pass)==FALSE){//無効な文字列が入力された時
    $_SESSION['flag']='invalidchar';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/MakeAccount.php');
    exit;
}

if(strlen($id)>10 || strlen($pass)>20){
    $_SESSION['flag']='invalidlen';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/MakeAccount.php');
    exit;
}

if($pass != $confpass){//確認用のパスワードが違うとき
    $_SESSION['flag']='unequalPass';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/MakeAccount.php');
    exit;
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


if($row['id'] == NULL){//登録できる。
    $_SESSION['flag']='regist';

    //ここで登録処理
    try {
        $db = db_connect('schedule');
        $stt = $db -> prepare("INSERT INTO individual (id, pass) VALUES (:id, :pass)");
        $stt->bindParam(':id', $id, PDO::PARAM_STR);
        $stt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stt->execute();
        $db = NULL;//初期化
    }catch(PDOException $e) {
        die("エラーが発生しました: {$e->getMessage()}");
    }

    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/LoginAccount.php');
}else{
    $_SESSION['flag']='existId';
    header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/MakeAccount.php');
    exit;
    //print('登録済みです。');
}

?>
