<!-- /***********************************************
      *** File Name   : EditTimetable.php
      ***Designer     : 長谷川智大
      ***Data         : 2018.7.17
      ***Function     : 時間割作成、変更画面の表示
***********************************************/ -->

<!-- /***********************************************
      ***Function Name: db_connect
      ***Designer     : 小泉圭吾
      ***Data         : 2018.6.5
      ***Function     : 変更した授業を個人時間割に格納
      ***Return       : なし
***********************************************/ -->

<?php
session_start();
require("Updateclass.php");
$Id=$_SESSION['id'];
$name='schedule';
//$user='test';
//$pass='password';
//$host='172.21.33.42';
//$type='mysql';
//$dsn="$type:dbname=$name;host=$host;charset=utf8";
$flag = 0;
$myclass = array();
$myid = array();
//$pdo = new PDO($dsn,$user,$pass);
$pdo = db_connect($name);
$sql = "select * from individual where id='".$Id."'";
$stmt = $pdo -> prepare($sql);
$stmt -> execute();
$rec = $stmt -> fetch();
$meter = 2;
       for($n = 0 ; $n < 36 ; $n ++){
        $myclass[] = $rec[$meter];
        $myids[] = $rec[$meter];
        $meter ++;
        }
        //遷移前の画面の判定
        //check = 0　→　AddNewClass.php からの遷移
        //check = 1　→　seach.php からの遷移
if($_SESSION[check]==0){
    $newclassweek = $_POST["week"];
    $newclassperiod = $_POST["period"];
    $newmeter = $newclassweek * 10 + $newclassperiod;
    $flag = 1;
    $classid = $_POST["classid"];
    $newclassname=$_POST["classname"];
    $_SESSION[week] = null;
    $_SESSION[period] = null;
    $_SESSION[name] = null;
    }else if($_SESSION[check]==1){
    $newclassweek = $_POST["newclassweek"];
    $newclassperiod = $_POST["newclassperiod"];
    $newmeter = $newclassweek * 10 + $newclassperiod;
    $classid = $_POST["classid"];
    $newclassname=$_POST["classname"];
    $flag = 1;
}
$myid = $_SESSION['myid'];
$myclass = $_SESSION['myclass'];
if($flag == 1){
$classplus = ($newclassperiod - 1 ) * 6 + $newclassweek - 1;
$myclass[$classplus] = $newclassname;
$myid[$classplus] = $classid;
}
$classdata =$myclass[0];
$classids = $myid[0];
for($n = 1 ; $n <= 35 ; $n++){
$classdata = $classdata . ",".$myclass[$n];
}
for($n = 1 ; $n <= 35 ; $n++){
$classids = $classids . ",".$myid[$n];
}
$_SESSION['myid'] = $myid;
$_SESSION['myclass'] = $myclass;
$_SESSION['classdata'] = $classdata;
$_SESSION['classids'] = $classids;
?>
<!DOCTYPE html>
<html>
        <head>
                <meta charset = 'UTF-8' >
         <title>EditTimetable</title>
         <link rel="stylesheet" href="stylesheet.css">
  </head>
    <body>
        <?php include ('header.php'); ?>
        <div class="container">
        <h2><!--style = "position:absolute;left:40px;  top:30px;"の削除--><b><u>Timetable</u></b></h2>
    <style>
        body{font-family:"arial";}
        table{border-collapse:collapse;  
              border:1px solid black;
              font-size:12px;}
        th,td{width:160px; 
              height:50px;
              border:1px solid black;}/*85から160,50へ変更*/
        th{   background:white;}
        td{   text-align:center;}
    </style>
    <!--<table style = "position:absolute;left:40px;  top:120px;">-->
    <!--授業時間割の表示-->
        <table>
        <tr><th>&nbsp;</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>
              <?php
$pdoind = db_connect($name);
$sqlind = "select * from individual where id='".$Id."'";
$stmtind = $pdoind -> prepare($sqlind);
$stmtind -> execute();
$recind = $stmtind -> fetch(PDO::FETCH_BOTH);
$meter = 0;

        for($period = 1 ; $period <= 6 ; $period++){
        print'<tr><th>'.$period.'</th>';
            for($week = 1 ; $week <= 6 ; $week++){
                print('<th>');
                //新規授業の時間割への表示
                if($myclass[$meter]!=null){
                print $myclass[$meter];
                //既存授業の時間割への表示
                }else if($recind[$meter+2]!=null){
                //$pdoclass = new PDO($dsn,$user,$pass);
                $pdoclass = db_connect($name);
                $sqlclass = 'select * from classData';
                $stmtclass = $pdoclass->prepare($sqlclass);
                $stmtclass -> execute();
                while($recclass = $stmtclass -> fetch(PDO::FETCH_ASSOC)){
                        if($recind[$meter+2] == ($recclass['classid'])){
                            print $recclass['name'];
                            break;
                        }
                }
                $pdoclass =null;
                }
                //Addclassの表示
                if($myclass[$meter] == null){   ?>
        <form name = "Form1"  method = "POST" action = "search.php">
                <input type = "hidden" name = "period" value = "<?php echo $period?>">
                <input type = "hidden" name = "week"   value = "<?php echo $week?>">
                <input type = "submit"                 value = "変更" ></form>
        <?php
                                           }
                                           print'</th>';
                                           $meter++;
                }
            print'</tr>'."\n";
}

?>
    </table>
    <br>
    <div class="save">
      <form method = "POST" action = "catch.php"><!--style = "position:absolute;  left:30%;  top:800px"の削除 -->
          <!--セーブするかしないかをflagの値で処理変更-->
        <input type = "submit" value = "保存" class="login">
        <input type = "hidden" name = "flag" value = "<?php echo 0?>">
      </form>

      <form method = "POST" action = "catch.php">
        <input type = "submit"  value = "保存せず戻る" class="login">
        <input type = "hidden" name = "flag" value = "<?php echo 1?>">
      </form>
    </div>
  </div>
  <?php include ('footer.html'); ?>
        </body>
</html>