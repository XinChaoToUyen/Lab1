<?php 

session_start();
if(!isset($_SESSION['key'])){
	header('Location:login.php');
	
}
$data=$_SESSION['data'];
// $_SESSION['data']=$data;
if (!isset($_REQUEST['masp'])) {
	header("location: trangchu.php");
}
else{
	foreach ($data as $row) {
		if($row->MaSP==$_REQUEST['masp']){
			$row->TenSP=$_REQUEST['tensp'];
			$row->GiaSP=$_REQUEST['gia'];
			$row->SoLuong=$_REQUEST['sl'];
			$row->NgayTao=$_REQUEST['day'];
			$row->TrangThai=$_REQUEST['tt'];
			break;

		}

	}
	$_SESSION['data']=$data;
	header("location:trangchu.php");
}

?>