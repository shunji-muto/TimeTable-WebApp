<!-- /***********************************************
      *** File Name   : ShowTimetable.php
      ***Designer     : 長谷川智大
      ***Data         : 2018.7.17
      ***Function     : 時間割画面を表示する
***********************************************/ -->


<!-- /***********************************************
      ***Function Name: db_connect
      ***Designer     : 小泉圭吾
      ***Data         : 2018.6.5
      ***Function     : データベースに接続する
      ***Return       : オブジェクトを返す
***********************************************/ -->

<?php
$name = 'schedule';
//$dsn = 'mysql:host = "172.21.33.42"; dbname=$name; charset=utf8';
//$user = 'test';
//$pass = 'password';
require("connect.php");
session_start();
$Id = $_SESSION['id'];
$_SESSION[check]=3;
?>
<!DOCTYPE html>
<html>
        <head>
                <meta charset = 'UTF-8'>
                <title>ShowTimetable</title>
                <link rel="stylesheet" href="stylesheet.css">
        </head>
<body>
         <?php include ('header.php'); ?>
        <div class="container">
                <!--
    <h2 style="position:absolute; left:40px;  top:30px;">
                -->
          <h2>
        Timetable
                </h2>
                                                <!--
                                                <form action = "LoginAccount.php">
                <button style="position:absolute;  right:50px;  top:50px;"
                        form = ""
                        onclick = "php:location.href = 'Session_destroy.php';">
                Logout</button></form>
                                                -->
                <!--br\u3092\u524A\u9664 -->
 <style>
        body{ font-family:"arial";}
        table{border-collapse:collapse;
              border:1px solid black;
              font-size:12px; }
        th,td{width:160px;
              height:50px;
              border:1px solid black;}/*85\u304B\u3089160,50\u3078\u5909\u66F4*/
        th{   background:white;}
        td{   text-align:center;}
        </style>
<!--    <table style="position:absolute;  left:40px;  top:120px;">-->
            <!--授業時間割の表示-->
            <table>
        <tr><th>&nbsp;</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>
              <?php
//$pdoind = new PDO($dsn,$user,$pass);
$pdoind = db_connect($name);
$sqlind = "select * from individual where id='".$Id."'";
$stmtind = $pdoind -> prepare($sqlind);
$stmtind -> execute();
$recind = $stmtind -> fetch(PDO::FETCH_BOTH);
$meter = 2;
        for($period = 1 ; $period <= 6 ; $period++){
        print'<tr><th>'.$period.'</th>';
            for($week = 1 ; $week <= 6 ; $week++){
                print('<th>');
                //登録授業の表示
                if($recind[$meter] != null){
                    //$pdoclass = new PDO($dsn,$user,$pass);
                    $pdoclass = db_connect($name);
                    $sqlclass = 'select * from classData';
                    $stmtclass = $pdoclass->prepare($sqlclass);
                    $stmtclass -> execute();
                    while($recclass = $stmtclass -> fetch(PDO::FETCH_ASSOC)){
                        if($recind[$meter] == ($recclass['classid'])){
                        print $recclass['name']."<br>";
                        print $recclass['teacher']."<br>";
                        print $recclass['room']."<br>";
                        break;
                        }
                    }
                $pdoclass =null;
                }
                print'</th>';
                $meter++;
            }
            print'</tr>'."\n";
}
$pdoind =null;
?>
    </table>
    <br><!-- br\u30924\u3064\u524A\u9664-->
        <!--編集画面への遷移-->
    <form action = "EditTimetable.php">
        <button class="login"
                form = ""
                onclick = "php:location.href = 'EditTimetable.php';"><!--style = "position:absolute;  left:45%;   top:800px"\u3092\u524A\u9664-->
            編集</button>
    </form>
        </div>
        <?php include ('footer.html'); ?>
        </body>
</html>