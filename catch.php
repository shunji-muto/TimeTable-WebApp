<?php

function page(){
header("location:ShowTimetable.php");
}

session_start();
require("Updateclass.php");
$flag = $_POST['flag'];
$myclass = array();
$classdata = $_SESSION['classdata'];
$myclassid = array();
$classid = $_SESSION['classids'];
if($flag == 0){
Updateclass($classid);
}
for($i=0;$i<36;$i++){
$_SESSION['myclass'][$i]=null;
$_SESSION['myid'][$i]=null;
}
$_SESSION['classdata']=null;
$_SESSION['classids']=null;
page();
?>
