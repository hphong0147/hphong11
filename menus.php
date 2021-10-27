<body>
<form id="form1" name="form1" method="get">
	<table width="660" border="1" style="text-align: center">
  <tbody>
    <tr style="font-size: 14px; font-weight: bold">
      <td>STT</td>
      <td>Danh mục</td>
      <td>Trạng thái</td>
      <td><a href="index.php?key=tlt">Thêm</a></td>
    </tr>
<?php
	$sl="select * from nn_menus order by idMenu";
	$kq=mysqli_query($link,$sl);
	$stt=1;
	while($d=mysqli_fetch_array($kq))
	{
?>
	<tr>
      <td><?php echo $stt++; ?></td>
      <td><?php echo $d["TieuDe"]; ?></td>
      <td><?php if($d['AnHien']) echo "Hiện"; else echo "Ẩn"; ?></td>
      <td><a href="process.php?xoatl=<?php echo $d['idMenu']; ?>" onclick="return confirm('Bạn muốn xóa sản phẩm này?')";>Xóa</a>/<a href="index.php?&key=tls&idCL=<?php echo $d['idMenu']; ?>">Sửa</a></td>
    </tr>
<?php } ?>
  </tbody>
</table>

</form>
	
</body>