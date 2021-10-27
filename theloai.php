<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Thể loại</title>
</head>

<body>
<form id="form1" name="form1" method="get">
	<table width="660" border="1" style="text-align: center">
  <tbody>
    <tr style="font-size: 14px; font-weight: bold">
      <td>STT</td>
      <td>Danh mục</td>
      <td>Trạng thái</td>
      <td><a href="index.php?key=tlt">Thêm Danh Mục</a></td>
    </tr>
<?php
	$sl="select * from nn_chungloai order by idCL";
	$kq=mysqli_query($link,$sl);
	$stt=1;
	while($d=mysqli_fetch_array($kq))
	{
?>
	<tr>
      <td><?php echo $stt++; ?></td>
      <td><?php echo $d["TenCL"]; ?></td>
      <td><?php if($d['AnHien']) echo "Hiện"; else echo "Ẩn"; ?></td>
      <td><a href="process.php?xoatl=<?php echo $d['idCL']; ?>" onclick="return confirm('Bạn muốn xóa sản phẩm này?')";>Xóa</a>/<a href="index.php?&key=tls&idCL=<?php echo $d['idCL']; ?>">Sửa</a></td>
    </tr>
<?php } ?>
  </tbody>
</table>

</form>
	
</body>
</html>