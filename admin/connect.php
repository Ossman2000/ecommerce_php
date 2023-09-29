<?php

$dsn = 'mysql:host=127.0.0.1;dbname=shop1;charset=utf8';
$user = 'root';
$pass ='';
$option = array(
	 PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
);

try{
	$con = new PDO($dsn, $user, $pass, $option);
	$con-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo '';
}

catch(PDOException $e ) {
echo 'failed to connect' . $e ->getMessage();
}