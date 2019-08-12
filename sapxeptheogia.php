<?php 
session_start();
if (!isset($_SESSION['key'])) {
	header('location:trangchu.php');
}
$data=$_SESSION['data'];
if(!isset($_SESSION['key'])){
	header('location:trangchu.php');
}
$data=$_SESSION['data'];
if (!isset($_GET['sort'])) {
	header("location:trangchu.php");
}
else{
	$s=$_GET['sort'];
	// var_dump($data);
// sort($data);
	if ($s=="0") {
		$_SESSION['sort']="1";
		usort($data, function ($a, $b)
		{
			return -strcmp($a->GiaSP, $b->GiaSP);	
		// z->a
		});

	}
	else{
		$_SESSION['sort']="0";
		usort($data, function ($a, $b)
		{
			return strcmp($a->GiaSP, $b->GiaSP);	
		// a->z
		});
	}
	$_SESSION['data']=$data;
	// echo "<br>";
	// var_dump($data);
}

header('location:trangchu.php');

?>
