<!-- /***********************************************
      *** File Name   : EditTimetable.php
      ***Designer     : Kaiho Wakayama         : 2018.6.5
      ***Function     : Data Fetch from Database


<!	***********************************************/ -->
<!Doctype html>
<html>
<head>
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
  <?php include ('header.php'); ?>
  <div class="container">
    <?php
    session_start();
    $cflag=true;
    $host = '172.21.33.42';
    $user = 'test';
    $password = 'password';
    $table = 'classData';
    $dsn = 'mysql:host = $host; dbname=schedule; charset=utf8';
    $date=$_POST["week"];
    $time=$_POST["period"];


    try{
    $db=new PDO($dsn,$user,$password);
    $statement = $db->prepare("SELECT * FROM classData WHERE week=$date and period=$time");
    $statement->execute();
       }catch(PDOException $e){
       echo "error:".$e->getMessage();
       }finally{
       }

    $_SESSION[check] = 1;
    $_SESSION[week] = $date;
    $_SESSION[period] = $time;
       ?>
      <h1>classes</h1><br>
        <div class="list">
	   <?php while($row = $statement->fetch(PDO::FETCH_BOTH)){ ?>
            <form name="Form2" method="POST" action="EditTimetable.php">
            Class:<?php echo $row['name'] ?><!--　-->Teacher: <?php echo $row['teacher'] ?>
            <input type="hidden" name="newclassweek" value="<?php echo $row['week'] ?>">
            <input type="hidden" name="classid"      value="<?php echo $row['classid'] ?>">
            <input type="hidden" name="newclassperiod" value="<?php echo $row['period'] ?>">
	    <input type="hidden" name="classname" value="<?php echo $row['name'] ?>">
            <input type="submit" value="Add" class="login">
                        </form><br>
    <?php } ?>
    </div>
    <a href="MakeNewClass.php">MakeNewClass</a>
  </div>
    <?php include ('footer.html'); ?>
  </body>
</html>
