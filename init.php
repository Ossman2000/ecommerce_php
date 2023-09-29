<?php
include 'admin/connect.php';
              //routes

$sessionUser='';

if(isset($_SESSION['user'])){
    $sessionUser=$_SESSION['user'];
}

$tpl =  'INCLUDES/templates/'; //templates directory
$css = 'LAYOUT/CSS/';
$js = 'LAYOUT/JS/'; //js directory
$func ='INCLUDES/functions/';
include $func . 'functions.php';
include $tpl . 'header.php';




