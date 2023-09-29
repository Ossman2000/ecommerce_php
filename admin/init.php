<?php
include 'connect.php';
              //routes


$tpl =  'INCLUDES/templates/'; //templates directory
$css = 'LAYOUT/CSS/';
$js = 'LAYOUT/JS/'; //js directory
$func ='INCLUDES/functions/';
include $func . 'functions.php';
include $tpl . 'header.php';


if (!isset($noNavbar)) {include $tpl . 'nb.php';}

