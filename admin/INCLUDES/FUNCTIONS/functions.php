<?php


//title function that echo the page title 
function gettitle(){
	global $pagetitle;
	if (isset($pagetitle)) {
		echo $pagetitle ;

		
	}else{
		echo 'default' ;
	}
}

//homeredirect function  

function redirectHome($theMsg,$url=null,$seconds = 3){
	if ($url===null) {
		$url='index.php';
		
	}else{
		if (isset($_SERVER['HTTP_REFERER'])&& $_SERVER['HTTP_REFERER']!=='') {
					$url=$_SERVER['HTTP_REFERER'];
			
		}else{
			$url='index.php';
		}

	}

	echo $theMsg ;

echo "<div class='alert alert-info'>You will be Redirected to $url After $seconds seconds.</div>";;
	
	header("refresh:$seconds;url=index.php");

	exit();
}
//function to check database

function checkItem($select,$from,$value){
	global $con;
	$statement = $con->prepare("SELECT $select FROM $from WHERE $select = ? ");
	$statement->execute(array($value));
	$count=$statement->rowCount();
	return $count;


}

function countItems($item, $table){

global $con;
	$stmt2 =$con->prepare("SELECT COUNT($item) FROM $table");

	$stmt2->execute();

	return $stmt2->fetchColumn();
	
}	
function getLatest($select , $table , $order ,$limit = 5){

	global $con;
	$getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
	$getStmt->execute();
	$rows = $getStmt->fetchAll();
	return $rows;
}