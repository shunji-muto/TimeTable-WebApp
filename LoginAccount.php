<!--
/*******************************************************************
*** File Name : LoginAccount.php
*** Designer : 増田　毅
*** Date : 2018.06.12
*** Function : ログイン画面を表示する
*******************************************************************/
-->
<!DOCTYPE html>
<html>
<head>
  <title>ログイン画面</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <?php include ('header.php'); ?>
  <div class = "container">
    <form method="POST" action="LoginProcess.php" autocomplete="off">
    <h2>Sign in</h2>
    <input type="text" name="id" size="30" maxlength="30" placeholder="Username"  />
    <p>
    <input type="password" name="pass" size="30" maxlength="30"  placeholder="Password"/>
    </p>
    <p>
    <input class="login" type="submit" value="Login" />
    </p>
    <a href='MakeAccount.php'>Sign up</a>
    </form>

    <br><br>
<?php
//session_start();
if(isset($_SESSION['flag'])){
    if($_SESSION['flag']=='falseId')print('idが未登録です');
    if($_SESSION['flag']=='falsePass')print('パスワードが違います');
    if($_SESSION['flag']=='regist')print('登録しました');
    if($_SESSION['flag']=='invalidlen')print('idは10文字以内、passwordは20文字以内で入力してください');
    if($_SESSION['flag']=='invalidchar')print('英数字を入力してください');
    $_SESSION['flag']='';
}
?>
</div>
<?php include ('footer.html'); ?>
</body>
</html>
