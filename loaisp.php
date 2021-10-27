<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<p>
<form id="form1" name="form1" method="get">
<input type="hidden" name="key" value="lt"/>
	<p>
    <label for="idCL">Danh mục:</label>
    <select name="idCL" id="idCL"  onChange="form1.submit()">
    <?php
 include("connect.php");
 $sl="select * from nn_chungloai order by idCL";
 $kq=mysqli_query($link,$sl);
 $idCL=0;
 $kt=0;
 while($d=mysqli_fetch_array($kq))
 {
	 if($idCL==0) $idCL=$d['idCL'];
 ?>
      <option value="<?php echo $d['idCL'];?>" <?php if(isset($_GET['idCL'])&&$_GET['idCL']==$d['idCL']){echo "selected='selected'";$kt=1;}?>><?php echo $d['TenCL'];?></option>
 <?php }?>
    </select>
  </p>
</form>
	</p>
<p>
<table width="660" border="1" style="text-align: center">
  <tbody>
    <tr style="font-size: 14px; font-weight: bold">
      <td>STT</td>
      <td>Tên</td>
      <td>Trạng Thái</td>
      <td><a href="index.php?key=ltt">Thêm</a></td>
    </tr>
    <?php
	  $stt=1;
	  if($kt) $idCL=$_GET['idCL'];
	  $sl2="select * from nn_loaisp where idCL='$idCL'";
	  $kq2=mysqli_query($link,$sl2);
	  while($d2=mysqli_fetch_array($kq2))
	  {
	?>
    <tr>
      <td><?php echo $stt++;?></td>
      <td><?php echo $d2['TenLoai'];?></td>
      <td><?php if($d2['AnHien']) echo "Hiện";else echo "Ẩn";?></td>
      <td><a href="process.php?xoalt=<?php echo $d2['idLoai']; ?>&idCL=<?php echo $idCL ?>" onclick="return confirm('Bạn muốn xóa sản phẩm này?')";>Xóa</a>/<a href="index.php?key=lts&idLoai=<?php echo $d2['idLoai'] ?>&idCL=<?php echo $idCL ?>">Sửa</a></td>
    </tr>
<?php } ?>
  </tbody>
</table>

</p>
</body>
</html>