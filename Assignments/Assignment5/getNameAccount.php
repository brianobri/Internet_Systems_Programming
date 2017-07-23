<?php
session_start();

$phone = $_GET["phone"];

if (array_key_exists($phone, $_SESSION['arr'])) 
{
      print $_SESSION['arr'][$phone];
}
else
{
	print '{"lname": "", "mi": "", "fname": "", "account": ""}';
}
  
?>