<?php

 session_start();   // strat the session 

 session_unset();
 
 session_destroy();

 header('location:index.php');
 
  exit();