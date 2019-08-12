<?php 

session_start();
if(!isset($_SESSION['key'])){
	header('Location:login.php');
	
}
$data=$_SESSION['data'];
// $_SESSION['data']=$data;

// var_dump($data);
if (isset($_REQUEST['submit'])) {
	$row=new stdClass;
	$row->MaSP=$_REQUEST['masp'];
	$row->TenSP=$_REQUEST['tensp'];
	$row->GiaSP=$_REQUEST['gia'];
	$row->SoLuong=$_REQUEST['sl'];
	$row->NgayTao=$_REQUEST['day'];
	$row->TrangThai=$_REQUEST['tt'];

$data[]=$row;
// var_dump($data);


	
	$_SESSION['data']=$data;
	header("location:trangchu.php");


	
}
else {
	header("location:them.php");
}?>