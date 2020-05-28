<!--
/*******************************************************************
*** File Name : MakeAccount.php
*** Designer : 増田　毅
*** Date : 2018.07.01
*** Function : 新規ユーザー登録の入力を行う。
*******************************************************************/
-->
<!DOCTYPE html>
<html>
<head>
  <title>新規アカウント登録</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <?php include ('header.php'); ?>
  <div class="container">
  <form method="POST" action="MakeAccountProcess.php" autocomplete="off">
  <h2>Sign up</h2>
  <input type="text" name="id" size="30" maxlength="30" placeholder="ID" />
<br><br>
  <input type="password" name="pass" size="30" maxlength="30" placeholder="Password" />
<br><br>
  <input type="password" name="confpass" size="30" maxlength="30" placeholder="Repeat password " />
  <br>
  <p>
    <input class="login" type="submit" value="Sign up" />
  </p>
  </form>
    <!--
    <a href='Session_destroy.php'>Session_destroy</a>
    <a href='/ClassSchedule/'>index</a>
  -->
<?php
//session_start();
if(isset($_SESSION['flag'])){

    if($_SESSION['flag']=='invalidchar')print('英数字を入力してください');
    if($_SESSION['flag']=='falsePass')print('パスワードが違います');
    if($_SESSION['flag']=='existId')print('IDは登録済みです');
    if($_SESSION['flag']=='unequalPass')print('確認用パスワードが間違っています');
    if($_SESSION['flag']=='invalidlen')print('idは10文字以内、passwordは20文字以内で入力してください');
    $_SESSION['flag']='';
}
?>
<br>
</div>
<?php include ('footer.html'); ?>
</body>
</html>
