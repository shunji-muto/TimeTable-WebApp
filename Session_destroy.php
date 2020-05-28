<!--
/*******************************************************************
*** File Name : Session_destroy.php
*** Designer : 増田　毅
*** Date : 2018.06.12
*** Function : セッションの切断を行いログイン画面に遷移する
*******************************************************************/
-->
<?php
session_start();
$_SESSION = array();
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '',time() - 3600, '/');
}
session_destroy();
header('Location: http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF']).'/LoginAccount.php');
?>