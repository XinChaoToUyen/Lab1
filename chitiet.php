<?php 
session_start();
if(!isset($_SESSION['key'])){
	header('Location:login.php');
	
}
$data=$_SESSION['data'];

if (!isset($_GET['masp'])) {
	header("location: trangchu.php");
}
else{
	$masp=$_GET['masp'];
	echo $masp;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Trang chi tiết sản phẩm</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
	<h1>Đây là trang  chi tiết sản phẩm</h1>
	<table class="table">
		<thead class="thead-dark">
			<tr>
				<th scope="col">Mã SP</th>
				<th scope="col">Tên SP</th>
				<th scope="col">Giá SP</th>
				<th scope="col">Số lượng</th>
				<th scope="col">Ngày tạo</th>
				<th scope="col">Trạng thái</th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach($data as $row) {
				if ($masp==$row->MaSP) {
					?>
					<tr>
						<td scope="row"><?=$row->MaSP ?></td>
						<td scope="row"><?=$row->TenSP ?></td>
						<td scope="row"><?=$row->GiaSP ?></td>
						<td scope="row"><?=$row->SoLuong?></td>
						<td scope="row"><?=$row->NgayTao?></td>
						<td scope="row"><?php echo $row->TrangThai?></td>
					</tr>
				<?php }} ?>
			</tbody>
		</table>
		<button type="button" class="btn btn-info" onclick="comeback()">Quay lại trang chủ</button>
	</body>
	</html>
	<script type="text/javascript">
		function comeback(){
			window.location='trangchu.php';
		}
	</script>