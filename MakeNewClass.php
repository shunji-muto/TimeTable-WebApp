<!--*******************************************************************
*** File Name : MakeNewClass.php
*** Designer : 武藤 駿嗣
*** Date : 2018.07.01
*** Function : 入力フォームを設けそこに新規授業情報を入力してもらう為のページ

*******************************************************************/
-->


<?php
session_start();
$date=$_SESSION[week];
$time=$_SESSION[period];
?>
<html>
 <head>
<title>MakeNewClass</title>
  <link rel="stylesheet" href="stylesheet.css">
</head>


<body>
  <?php include ('header.php'); ?>
  <div class="container">



<form name="Form1" method="POST" action="confirm.php" enctype="multipart/form-data">
<table class = "table4" border=1>

<table border="1" width="650" cellspacing="0" cellpadding="5" bordercolor="#333333">
 <tr>
 <th bgcolor="#FFFFF0"><font color="#333333">授業名</font></th>
 <th bgcolor="#FFFFFF" align="left" width="550"><font color="#333333"><input type="text" name="name" ></font></th>
 </tr>

 <tr>
 <th bgcolor="#FFFFF0"><font color="#333333">教授名</font></th>
 <th bgcolor="#FFFFFF" align="left" width="550"><font color="#333333"><input type="text" name="teacher" ></font></th>
 </tr>

 <tr>
 <th bgcolor="#FFFFF0"><font color="#333333">教室名</font></th>
 <th bgcolor="#FFFFFF" align="left" width="550"><font color="#333333"><input type="text" name="room"  ></font></th>
 </tr>
<tr>
 <th bgcolor="#FFFFF0"><font color="#333333">曜日</font></th>
 <th bgcolor="#FFFFFF" align="left" width="550"><font color="#333333">

      <input type="radio" name="week" value="1" <?php if($date == 1){print "checked";}?> > 月曜日
      <input type="radio" name="week" value="2" <?php if($date == 2){print "checked";}?> > 火曜日
      <input type="radio" name="week" value="3" <?php if($date == 3){print "checked";}?> > 水曜日
      <input type="radio" name="week" value="4" <?php if($date == 4){print "checked";}?> > 木曜日
      <input type="radio" name="week" value="5" <?php if($date == 5){print "checked";}?> > 金曜日
      <input type="radio" name="week" value="6" <?php if($date == 6){print "checked";}?> > 土曜日

     </font></th>
 </tr>
<tr>
 <th bgcolor="#FFFFF0"><font color="#333333">時限</font></th>
 <th bgcolor="#FFFFFF" align="left" width="550"><font color="#333333">

      <input type="radio" name="period" value="1" <?php if($time == 1){print "checked";}?> > 一限
      <input type="radio" name="period" value="2" <?php if($time == 2){print "checked";}?> > 二限
      <input type="radio" name="period" value="3" <?php if($time == 3){print "checked";}?> > 三限
      <input type="radio" name="period" value="4" <?php if($time == 4){print "checked";}?> > 四限
      <input type="radio" name="period" value="5" <?php if($time == 5){print "checked";}?> > 五限
      <input type="radio" name="period" value="6" <?php if($time == 6){print "checked";}?> > 六限

     </font></th>
 </tr>

<tr><td colspan=2><input type="submit"  value="登録する" class="login"><input type="reset" value="リセット" class="login"></td></tr>
</table>
</table>
</form>
</div>
  <?php include ('footer.html'); ?>
</body>