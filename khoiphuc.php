<?php 
session_start(); 
if (!isset($_SESSION['key'])) {
	header("Location: login.php");
}
$_SESSION['check']="0";
header("Location:trangchu.php");

?>