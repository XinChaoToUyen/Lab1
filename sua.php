<?php 
session_start();
if(!isset($_SESSION['key'])){
	header('Location:login.php');
	
}
$data=$_SESSION['data'];
// $_SESSION['data']=$data;
if (!isset($_GET['masua'])) {
	header("location: trangchu.php");
}
else{
	$masp=$_GET['masua'];
	echo $masp;
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
	<h1>Trang Sửa Thông tin sản phẩm</h1>
	<?php 
		foreach ($data as $row) {
			if($masp==$row->MaSP){
				$choose=$row;
				break;
			}
		}
	 ?>
	<form action="suaprocess.php" method="POST">
		<div class="form-group">
			<label>Mã Sản Phẩm</label>
			<input type="number" class="form-control" name="masp" value="<?= $choose->MaSP ?>" readonly>
		</div>
		<div class="form-group">
			<label>Tên Sản phẩm</label>
			<input type="text" class="form-control" name="tensp" value="<?= $choose->TenSP ?>">
		</div>
		<div class="form-group">
			<label>Giá Sản Phẩm</label>
			<input type="number" class="form-control" name="gia" value="<?= $choose->GiaSP ?>">
		</div>
		<div class="form-group">
			<label>Số lượng</label>
			<input type="number" class="form-control" name="sl" value="<?= $choose->SoLuong ?>">
		</div>
		<div class="form-group">
			<label>Ngày</label>
			<input type="text" class="form-control" name="day" value="<?= $choose->NgayTao ?>">
		</div>
		<div class="form-group">
			<label>Trạng thái</label>
			<input type="text" class="form-control" name="tt" value="<?= $choose->TrangThai ?>">
		</div>
		<button type="submit" class="btn btn-primary" name="submit">Cập nhật</button>
	</form>
</body>
</html>