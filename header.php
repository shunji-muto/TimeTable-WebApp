<!--
/*******************************************************************
*** File Name : header.php
*** Designer : 増田　毅
*** Date : 2018.07.05
*** Function : ヘッダーを表示する
*******************************************************************/
-->
<!DOCTYPE html>
<header>
  <div class="container2">
    <div class="header-left">
      <img class="logo pc" src="logo.png">
    </div>
    <div class="header-right">
      <?php
      session_start();
      if(isset($_SESSION['status'])){
        if($_SESSION['status']==1){
      ?>
      <a href="Session_destroy.php">ログアウト</a>
      <?php
        }
      }else{
      ?>
      <a href="MakeAccount.php">新規登録</a>
      <a href="LoginAccount.php">ログイン</a>
      <?php
      }
      ?>
    </div>
  </div>
</header>
