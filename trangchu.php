<?php 
session_start(); 
if (!isset($_SESSION['key'])) {
	header("Location: login.php");
}

// var_dump($_SESSION['data']);

// $check="0";
// echo $check;
// echo $_SESSION['check'];
if ($_SESSION['check']=="0") {
	$data=[];

	$obj1=new stdClass;
	$obj1->MaSP=1;
	$obj1->TenSP="Computer";
	$obj1->GiaSP=15000.00;
	$obj1->SoLuong=15;
	$obj1->NgayTao=20190801;
	$obj1->TrangThai=1;
	// Gán vào mảng data[]
	$data[]=$obj1;
	$obj1=new stdClass;
	$obj1->MaSP=2;
	$obj1->TenSP="Computer";
	$obj1->GiaSP=18000.00;
	$obj1->NgayTao=20190802;
	$obj1->TrangThai=0;
	$data[]=$obj1;

	$obj1=new stdClass;
	$obj1->MaSP=3;
	$obj1->TenSP="Bag";
	$obj1->GiaSP=30000.00;
	$obj1->SoLuong=10;
	$obj1->NgayTao=20190803;
	$obj1->TrangThai=0;
	// Gán vào mảng data[]
	$data[]=$obj1;
	$obj1=new stdClass;
	$obj1->MaSP=4;
	$obj1->TenSP="Water";
	$obj1->GiaSP=30000.00;
	$obj1->SoLuong=10;
	$obj1->NgayTao=20300807;
	$obj1->TrangThai=0;
	// Gán vào mảng data[]
	$data[]=$obj1;
	$obj1=new stdClass;
	$obj1->MaSP=5;
	$obj1->TenSP="Keyboard";
	$obj1->GiaSP=30000.00;
	$obj1->SoLuong=10;
	$obj1->NgayTao=20190804;
	$obj1->TrangThai=0;
	// Gán vào mảng data[]
	$data[]=$obj1;

	$_SESSION['data']=$data;
	$_SESSION['check']="1";
	$_SESSION['sort']="0";

}
// echo $_SESSION['check'];
$data=$_SESSION['data'];
//tim theo ten
if(isset($_GET['ten'])){
	$check=false;
	$ten= $_GET['ten'];
	foreach($data as $row){
		if($ten==$row->TenSP){
			$data1[]=$row;
			$check=true;
		}
	}
	if($check){
		$data=$data1;
		$_SESSION['data']=$data1;
		
	}
}
//tim theo gia
if(isset($_GET['gia'])){
	$check=false;
	$ten= $_GET['gia'];
	foreach($data as $row){
		if($ten==$row->GiaSP){
			$data1[]=$row;
			$check=true;
		}
	}
	if($check){
		$data=$data1;
		$_SESSION['data']=$data1;


	}
}
//tim theo ngay
//yyyymmdd
//Ngay search
//20190805 > 20190831
if(isset($_GET['daystart']) && $_GET['dayend']){
	//$check=false;
	$day1= $_GET['daystart'];
	$day2= $_GET['dayend'];
	$dayS=(int)str_replace("-","",$day1);
	$dayE=(int)str_replace("-","",$day2);

	// echo $dayS;
	// echo $dayE;
	$check=false;
	foreach ($data as $row) {
		if($row->NgayTao>=$dayS&&$row->NgayTao<=$dayE){
			$data1[]=$row;
			$check=true;
		}
	}
	if($check){
		$data=$data1;
		$_SESSION['data']=$data1;
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chủ</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<!-- <h1>Đây là trang chủ</h1> -->
	<h2>Xin chào <span style="color: red"><?php echo $_SESSION['key']  ?></span></h2>
	<button type="button" class="btn btn-warning" onclick="clearSession()">Đăng xuất</button>
	<button type="button" class="btn btn-info" onclick="addinfo()">Thêm</button>
	<button type="button" class="btn btn-info" onclick="restore()">Khôi phục</button>
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
					<td scope="row"><?php echo number_format($row->GiaSP )?></td>
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
	<button type="button" class="btn btn-warning" onclick="sapxeptheogia()">Sắp xếp theo giá</button>
	<form method="GET"action="trangchu.php">
		
		<div class="form-row" style="margin-top: 20px">
			
			<div class="col">
				<input type="text" class="form-control" placeholder="nhập tên" name="ten">
			</div>
			<button type="submit" class="btn btn-success">Tim</button> 
		</div>
	</form>
	<form method="GET" action="trangchu.php">
		
		<div class="form-row" style="margin-top: 20px">
			
			<div class="col">
				<input type="number" class="form-control" placeholder="nhập giá sản phẩm" name="gia">
			</div>
			<button type="submit" class="btn btn-success">Tìm</button>
		</div>
	</form>
	
	<form method="GET"action="trangchu.php">
		<div class="form-row" style="margin-top: 20px">
			<div class="col">
				<input type="date" class="form-control" placeholder="nhập ngày bắt đầu" name="daystart">
			</div>
			<div class="col">
				<input type="date" class="form-control" placeholder="nhập ngày kết thúc" name="dayend">
			</div>
			<button type="submit" class="btn btn-success">Tìm</button>
		</div>
	</form>
	
</body>
</html>
<!-- JavaJscript -->
<script type="text/javascript">
	function clearSession(){
		sessionStorage.removeItem('key'); // unset('$_SESSION['key']')
		window.location = 'login.php'; // header('Location: login.php')
	}
	function addinfo(){
		window.location='them.php';
	}
	function sapxeptheoten(){
		var sort=<?php echo $_SESSION['sort'] ?>;
		// alert(sort);
		window.location='sapxeptenprocess.php?sort='+sort;
	}
	function sapxeptheogia(){
		var sort=<?php echo $_SESSION['sort'] ?>;
		window.location='sapxeptheogia.php?sort='+sort;
	}
	function restore(){
		window.location='khoiphuc.php';
	}
</script>