<?php
session_start();
$pagetitle = '';
if (isset($_SESSION['Username'])) {
	
	include 'init.php';

	
	$do = isset($_GET['do']) ? $_GET['do'] : 'Manage';
	
	if ($do == 'Manage') {
	
		// code...
	
	} elseif( $do == 'Add'){

	}

} else {

	header('Location: index.php');
	exit();
}
	?>
