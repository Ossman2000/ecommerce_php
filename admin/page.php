<?php 
  
$do = isset($_GET['do']) ? $_GET['do'] : 'Manage'; 
//if g=page is main
if (isset($_GET['do'])) {
	$do=$_GET['do'];
}  else{

	$do='manage';
}


if($do=='manage'){
	echo 'welcome you are in manage category' ;
	echo '<a href="page.php?do=add">add new category+</a>';

}elseif ($do=='add') {
	echo 'welcome you are in add category' ;
	
} elseif ($do=='insert') {
	echo 'welcome you are in insert category' ;
}
else{
	echo 'error' ;
}