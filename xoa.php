<?php 

session_start();
if(!isset($_SESSION['key'])){
	header('Location:login.php');
	
}
$data=$_SESSION['data'];
if (!isset($_REQUEST['maxoa'])) {
	header("location: trangchu.php");
}
else{
	// var_dump($data);
	foreach ($data as $key=>$row) {
		if($row->MaSP==$_REQUEST['maxoa']){
			// echo $key;
			unset($data[$key]);

		}

	}
	// echo "<br>";
	// var_dump($data);
	$_SESSION['data']=$data;
	header("location:trangchu.php");
}
?>