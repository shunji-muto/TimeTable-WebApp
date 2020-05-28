<!--*******************************************************************
*** File Name : AddNewClass.php
*** Designer : 武藤　駿嗣
*** Date : 2018.07.01
*** Function : 入力された授業情報を授業DBに追加する

*******************************************************************/
-->

<?php

$dsn = 'mysql:dbname=schedule;host=172.21.33.42;charset=utf8';
$usr ='test';
$passwd='password';
session_start();

   require_once("connect.php");
   $pdo=db_connect("schedule");

   $st = $pdo->prepare("INSERT INTO classData VALUES(?,?,?,?,?,?)");
   $st->execute(array("",$_SESSION[name], $_SESSION['teacher'], $_SESSION['room'], $_SESSION['week'], $_SESSION['period']));


$db = NULL;

        //$_SESSION[name] = null;
        $_SESSION[teacher] = null;
        $_SESSION[room] = null;
        //$_SESSION[week] = null;
        //$_SESSION[period] = null;
        $_SESSION[check] = 0;

$dbh = new PDO($dsn,$usr,$passwd);

$dbh -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

$sql = 'SELECT * FROM classData';

$stmt = $dbh->query($sql);

$stmt -> execute();

$count = $stmt->rowCount();

$dbh = null;

?>

<html>
<head><title>AddNewClass</title>
    <link rel="stylesheet" href="stylesheet.css">
    </head>
<body>
      <?php include ('header.php'); ?>
    <div class="container">
<h1>登録完了！</h1>
    <form name = "Form1"  method = "POST" action = "EditTimetable.php">
        <input type = "hidden" name = "period" value = "<?php echo $_SESSION['period']?>">
        <input type = "hidden" name = "week"   value = "<?php echo $_SESSION['week']?>">
        <input type = "hidden" name = "classname"   value = "<?php echo $_SESSION[name]?>">
        <input type = "hidden" name = "classid"   value = "<?php echo $count ?>">
        <input type = "submit" value = "次へ">
    </form>
        </div>
<?php include ('footer.html'); ?>
</body>
</html>
