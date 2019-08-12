<?php 
session_start();
if(!isset($_SESSION['key'])){
	header('Location:login.php');
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h1>Trang Thêm Thông tin sản phẩm</h1>
	
	<form action="themprocess.php" method="POST">
		<div class="form-group">
			<label>Mã Sản Phẩm</label>
			<input type="number" class="form-control" name="masp"  >
		</div>
		<div class="form-group">
			<label>Tên Sản phẩm</label>
			<input type="text" class="form-control" name="tensp" >
		</div>
		<div class="form-group">
			<label>Giá Sản Phẩm</label>
			<input type="number" class="form-control" name="gia" >
		</div>
		<div class="form-group">
			<label>Số lượng</label>
			<input type="number" class="form-control" name="sl" >
		</div>
		<div class="form-group">
			<label>Ngày</label>
			<input type="text" class="form-control" name="day" >
		</div>
		<div class="form-group">
			<label>Trạng thái</label>
			<input type="number" class="form-control" name="tt" >
		</div>
		<button type="submit" class="btn btn-primary" name="submit">Thêm</button>
	</form>
</body>
</html>