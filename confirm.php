<!--*******************************************************************
*** File Name : confirm.php
*** Designer : 武藤　駿嗣
*** Date : 2018.06.19
*** Function : 入力フォームに抜けがないか確認し、表示する処理

*******************************************************************/
-->
<?php
session_start();

        $_SESSION[name] = $_POST["name"];
        $_SESSION[teacher] = $_POST["teacher"];
        $_SESSION[room] = $_POST["room"];
        $_SESSION[week] = $_POST["week"];
        $_SESSION[period] = $_POST["period"];

        $date=$_SESSION[week];
        $time=$_SESSION[period];


        $name    = $_POST["name"];
        $teacher = $_POST["teacher"];
        $room    = $_POST["room"];
        $check   = 0;

        $name = htmlspecialchars($name, ENT_QUOTES);
        $teacher = htmlspecialchars($teacher, ENT_QUOTES);
        $room = htmlspecialchars($room, ENT_QUOTES);

        $errormsg = array();

        if($name == null){
                 $errors['name'] = "授業名を入れてください";
                 $check=1;
                 }
        if($teacher == null){
                 $errors['teacher'] = "教授名を入れてください";
                 $check=1;
                 }
        if($room == null){
                 $errors['room']= "教室名を入れてください";
                 $check=1;
                 }
        if($name != null && $teacher != null && $room != null ){
                  header( "Location: ./AddNewClass.php" ) ;
                  }

?>
 <head>
<title>confirm</title>
<link rel="stylesheet" href="stylesheet.css">
</head>


<body>
  <?php include ('header.php'); ?>
    <div class="container">

<?php
echo "<ul style = 'text-align:left;'>";
foreach($errors as $message){
    echo "<li>";
    echo $message;
    echo "</li>";
}
echo "</ul>";
?>


<form name="Form1" method="POST" action="confirm.php" onsubmit="return formCheck()">
<table class = "table4" border=1>

<table border="1" width="650" cellspacing="0" cellpadding="5" bordercolor="#333333">
 <tr>
 <th bgcolor="#FFFFF0"><font color="#333333">授業名</font></th>
 <th bgcolor="#FFFFFF" align="left" width="550"><font color="#333333"><input type="text" name="name" value="<?php if(isset($name)){ echo $name; } ?>"></font></th>
 </tr>

 <tr>
 <th bgcolor="#FFFFF0"><font color="#333333">教授名</font></th>
 <th bgcolor="#FFFFFF" align="left" width="550"><font color="#333333"><input type="text" name="teacher" value="<?php if(isset($teacher)){ echo $teacher; } ?>"></font></th>
 </tr>

 <tr>
 <th bgcolor="#FFFFF0"><font color="#333333">教室名</font></th>
 <th bgcolor="#FFFFFF" align="left" width="550"><font color="#333333"><input type="text" name="room" value="<?php if(isset($room)){ echo $room; } ?>"></font></th>
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

</form>

<tr><td colspan=2><input type="submit"  value="登録する"><input type="reset"  value="リセット"></td></tr>

</table>
</form>
</div>
<?php include ('footer.html'); ?>
</body>