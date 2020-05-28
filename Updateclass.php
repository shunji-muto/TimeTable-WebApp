<!-- //File Name :Updateclass.php
//Designer  :Keigo Koizumi
//Date      : 2018.6.12
//Function  : Updating individual's schedule, -->
<?php
session_start();
require("connect.php");
//***Function Name     :db_connect()
//***Designer          :Keigo Koizumi
//***Date              :2018.6.13
//***Function          :Connecting database 
//***Return            :Object to connect database,
$pdo=db_connect('schedule');
//***Function Name     :Updateclass()
//***Designer          :Keigo Koizumi
//***Date              :2018.6.12
//***Function          :Searching classdata from database with classid and
//                      updating schedule,
//***Return            :None
function Updateclass($Classid){
//process of deviding the sequence of classid into respective classid
$series=explode(",",$Classid);
for($k=0;$k<36;$k++){
}
//print"for";
for($i=0;$i<36;$i++){
    if($series[$i]!=null){
//process of searching objective classdata
//print" loop";
    try{
        $pdo=db_connect('schedule');
        if($pdo==null){
//print" 123";
}
        $pdo->begintransaction();
        //print" transaction";
        $sql1='select * from classData where classid = :classid';
        //print" aaa";
        $stmh1=$pdo->prepare($sql1);
//print"ccc";
        $stmh1->bindValue(':classid',$series[$i],PDO::PARAM_STR);
        $stmh1->execute();
        //print" execute";
        $row=$stmh1->fetch(PDO::FETCH_BOTH);
        //print"  fetch";
        //print" $row[teacher]";
        //print" $row[classid]";
        //print" $row[room]";
        //print" $row[name]";
        $pdo->commit();
        $pdo=null;
       }
    catch(PDOException $e1){
       $pdo->rollback();
       print"error".$e1->getMessage();
}
//process of updating individual's schedule
$pdo=db_connect('schedule');
//print" initiate";
    try{
        $pdo=db_connect('schedule');
        $pdo->begintransaction();
        //print" $row[teacher]";
        //print" $row[classid]";
        //print" $row[room]";
        //print" $row[name]";
	//print" $row[week]";
	//print" $row[period]";
        $id=$row[week]*10+$row[period];
        switch ($id){
	     case 11:
              $sql11="update individual set mon1='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh11=$pdo->prepare($sql11);
              $stmh11->execute();
	      break;
             case 12:
              $sql12="update individual set mon2='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh12=$pdo->prepare($sql12);
              $stmh12->execute();
	      break;
	     case 13:
              $sql13="update individual set mon3='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh13=$pdo->prepare($sql13);
              $stmh13->execute();
	      break;
	     case 14:
              $sql14="update individual set mon4='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh14=$pdo->prepare($sql14);
              $stmh14->execute();
	      break;
	     case 15:
              $sql15="update individual set mon5='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh15=$pdo->prepare($sql15);
              $stmh15->execute();
	      break;
	     case 16:
              $sql16="update individual set mon6='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh16=$pdo->prepare($sql16);
              $stmh16->execute();
	      break;
	     case 21:
              $sql21="update individual set tue1='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh21=$pdo->prepare($sql21);
              $stmh21->execute();
	      break;
	     case 22:
              $sql22="update individual set tue2='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh22=$pdo->prepare($sql22);
              $stmh22->execute();
	      break;
	     case 23:
              $sql23="update individual set tue3='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh23=$pdo->prepare($sql23);
              $stmh23->execute();
	      break;
	     case 24:
              $sql24="update individual set tue4='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh24=$pdo->prepare($sql24);
              $stmh24->execute();
	      break;
	     case 25:
              $sql25="update individual set tue5='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh25=$pdo->prepare($sql25);
              $stmh25->execute();
	      break;
	     case 26:
              $sql26="update individual set tue6='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh26=$pdo->prepare($sql26);
              $stmh26->execute();
	      break;
	     case 31:
              $sql31="update individual set wed1='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh31=$pdo->prepare($sql31);
              $stmh31->execute();
	      break;
	     case 32:
              $sql32="update individual set wed2='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh32=$pdo->prepare($sql32);
              $stmh32->execute();
	      break;
	     case 33:
              $sql33="update individual set wed3='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh33=$pdo->prepare($sql33);
              $stmh33->execute();
	      break;
	     case 34:
              $sql34="update individual set wed4='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh34=$pdo->prepare($sql34);
              $stmh34->execute();
	      break;
             case 35:
              $sql35="update individual set wed5='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh35=$pdo->prepare($sql35);
              $stmh35->execute();
	      break;
	     case 36:
              $sql36="update individual set wed6='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh36=$pdo->prepare($sql36);
              $stmh36->execute();
	      break;
	     case 41:
              $sql41="update individual set thu1='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh41=$pdo->prepare($sql41);
              $stmh41->execute();
	      break;
	     case 42:
              $sql42="update individual set thu2='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh42=$pdo->prepare($sql42);
              $stmh42->execute();
	      break;
	     case 43:
              $sql43="update individual set thu3='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh43=$pdo->prepare($sql43);
              $stmh43->execute();
	      break;
	     case 44:
              $sql44="update individual set thu4='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh44=$pdo->prepare($sql44);
              $stmh44->execute();
	      break;
	     case 45:
              $sql45="update individual set thu5='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh45=$pdo->prepare($sql45);
              $stmh45->execute();
	      break;
	     case 46:
              $sql46="update individual set thu6='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh46=$pdo->prepare($sql46);
              $stmh46->execute();
	      break;
	     case 51:
              $sql51="update individual set fri1='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh51=$pdo->prepare($sql51);
              $stmh51->execute();
	      break;
	     case 52:
              $sql52="update individual set fri2='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh52=$pdo->prepare($sql52);
              $stmh52->execute();
	      break; 
	     case 53:
              $sql53="update individual set fri3='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh53=$pdo->prepare($sql53);
              $stmh53->execute();
	      break;
	     case 54:
              $sql54="update individual set fri4='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh54=$pdo->prepare($sql54);
              $stmh54->execute();
	      break;
	     case 55:
              $sql55="update individual set fri5='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh55=$pdo->prepare($sql55);
              $stmh55->execute();
	      break;
	     case 56:
              $sql56="update individual set fri6='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh56=$pdo->prepare($sql56);
              $stmh56->execute();
	      break;
	     case 61:
              $sql61="update individual set sat1='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh61=$pdo->prepare($sql61);
              $stmh61->execute();
	      break;
	     case 62:
              $sql62="update individual set sat2='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh62=$pdo->prepare($sql62);
              $stmh62->execute();
	      break;
	     case 63:
              $sql63="update individual set sat3='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh63=$pdo->prepare($sql63);
              $stmh63->execute();
	      break;
	     case 64:
              $sql64="update individual set sat4='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh64=$pdo->prepare($sql64);
              $stmh64->execute();
	      break;
	     case 65:
              $sql65="update individual set sat5='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh65=$pdo->prepare($sql65);
              $stmh65->execute();
	      break;
	     case 66:
              $sql66="update individual set sat6='".$row[classid]."' where id='".$_SESSION[id]."'";
              $stmh66=$pdo->prepare($sql66);
              $stmh66->execute();
	      break;
	     }
        print" execution";
        $pdo->commit();
        //print" update";
        $pdo=null;
        $row=array();
        }
        catch(PDOException $s){
         $pdo->rollback();
         print"error:".$s->getMessage();
         //sleep(2);
         //header("location:ShowTimetable.php");
        }
    }
}
}
?>
