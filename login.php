<?php session_start(); 
unset($_SESSION['key']);
unset($_SESSION['check']);
if(isset($_SESSION['key'])){
	echo $_SESSION['key'];
}else{
	echo 'Chưa khởi tạo session key'.'<br>';
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<script
	src="https://code.jquery.com/jquery-3.4.1.js"
	integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
	crossorigin="anonymous"></script>

</head>
<body>
	<?php 
	$user=[];

	$obj1=new stdClass;
	$obj1->username="touyen";
	$obj1->password="touyen123";
	$user[]=$obj1;
	
	$obj1=new stdClass;
	$obj1->username="admin";
	$obj1->password="admin";
	$user[]=$obj1;
	// var_dump($user);
	if (isset($_POST['submit'])) {
		$un= $_POST['username'];
		echo "<h3>Username: $un</h3>";
		$pw = $_POST['password'];
		echo "<h3>Password: $pw</h3>";
		foreach ($user as $uyen) {
			if ($uyen->username==$un && $uyen->password==$pw) {
				$_SESSION['key'] = $un;
				$_SESSION['check']="0";
				header("Location: trangchu.php");
			}
		}
		$error="sai mat khau hoac ten dang nhap";

	}
	?>
	<h1>Form Login</h1>
	<form method="POST" action="login.php">
		<div class="form-group">
			<label>Username</label>
			<input type="text" class="form-control" name="username" placeholder="Nhập Username">
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="password" class="form-control" name="password" placeholder="Nhập Password">
		</div>
		<input type="submit" name="submit" class="btn btn-success" value="Login">
	</form>
	


</body>
</html>