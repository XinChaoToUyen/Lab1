<?php 
session_start(); 
if (!isset($_SESSION['key'])) {
	// header("Location: login.php");
}

// var_dump($_SESSION['data']);

// $check="0";
// echo $check;
echo $_SESSION['check'];
if ($_SESSION['check']=="0") {
	$data=[];

	$obj1=new stdClass;
	$obj1->MaSP=1;
	$obj1->TenSP="Máy tính";
	$obj1->GiaSP=15000.00;
	$obj1->SoLuong=15;
	$obj1->NgayTao=20190801;
	$obj1->TrangThai=1;
	// Gán vào mảng data[]
	$data[]=$obj1;

	$obj1=new stdClass;
	$obj1->MaSP=2;
	$obj1->TenSP="Tủ lạnh";
	$obj1->GiaSP=30000.00;
	$obj1->SoLuong=10;
	$obj1->NgayTao=20190807;
	$obj1->TrangThai=0;
	// Gán vào mảng data[]
	$data[]=$obj1;

	$_SESSION['data']=$data;

	$_SESSION['check']="1";
}
echo $_SESSION['check'];
$data=$_SESSION['data'];
// echo $check;
var_dump($_SESSION['data']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<h1>Đây là trang sắp xếp theo tên</h1>
	<h2>Xin chào <span style="color: red"><?php echo $_SESSION['key']  ?></span></h2>
	<button type="button" class="btn btn-warning" onclick="clearSession()">Reload the list</button>
	<button type="button" class="btn btn-dark" onclick="addinfo()">Thêm</button>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">STT</th>
				<th scope="col">Tên SP</th>
				<th scope="col">Giá SP</th>
				<th scope="col">...</th>
				<th scope="col">Tác vụ</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($data as $row) {?>
				<tr>
					<td scope="row"><?php echo $row->MaSP ?></td>
					<td scope="row"><?php echo $row->TenSP ?></td>
					<td scope="row"><?php echo $row->GiaSP ?></td>
					<td scope="col">
						<a href="chitiet.php?masp=<?=$row->MaSP?>">...</a>
					</td>
					<td scope="col">
						<a href="sua.php?masua=<?=$row->MaSP?>" class="badge badge-warning">Sửa</a>
						<a href="xoa.php?maxoa=<?=$row->MaSP ?>" class="badge badge-danger">Xóa</a>
					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
	<!-- <select class="custom-select">
		<option selected>Chọn cách sắp xếp</option>
		<option value="1"><a href="sapxeptheoten.php">Sắp xếp theo tên SP</a></option>
		<option value="2">Sắp xếp theo giá SP</option>
	</select> -->
	<button type="button" class="btn btn-danger" onclick="sapxeptheoten()">Sắp xếp theo tên</button>

	

</body>
</html>