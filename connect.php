<?php
//**************************************************************************
//***File Name         :connect.php
//***Designer          :Keigo Koizumi
//***Date              :2018.6.13
//***Function          :Connecting database,
//**************************************************************************

//**************************************************************************
//***Function Name     :db_connect()
//***Designer          :Keigo Koizumi
//***Date              :2018.6.13
//***Function          :Set all parameters which need to connect database
//                      and try to connect,
//***Return            :Object to connect database,
//***************************************************************************
function db_connect($name){
$db_user='test';
$db_pass='password';
$db_host='172.21.33.42';
$db_type='mysql';
$dsn="$db_type:dbname=$name;host=$db_host;charset=utf8";
try{
	$pdo=new PDO($dsn,$db_user,$db_pass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//print 'connect!';
	
}catch(PDOException $e){
        die('error:'.$e->getMessage());
}
return $pdo;
}
?>