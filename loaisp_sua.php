<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="process.php">
<p>
    <label for="idCL">Danh mục:</label>
	<select name="idCL" id="idCL" >
	<?php 
	$idCL=$_GET['idCL'];
	$ss="select * from nn_chungloai";
	$ks=mysqli_query($link,$ss);
	while($ds=mysqli_fetch_array($ks))
	{
	?>
	 <option value="<?php echo $ds['idCT'];?>" <?php if(isset($_GET['idCL'])&&$_GET['idCL']==$ds['idCL']) echo "selected='selected'" ?> ><?php echo $ds['TenCL'];?></option>
	<?php } ?>
	</select>
</p>
<?php
 if(isset($_GET['idLoai']))
 {
 $idLoai=$_GET['idLoai'];
 $sl="select * from nn_loaisp where idLoai=$idLoai";
 $kq=mysqli_query($link,$sl);
 $d=mysqli_fetch_array($kq)
 ?>
<p>
  <label for="TenLoai">Loại sản phẩm: </label>
  <input type="text" name="TenLoai" id="TenLoai" value="<?php echo $d['TenLoai']; ?>">
</p>
<p>
<label for="ThuTu">Thứ tự:</label>
<input type="text" name="ThuTu" id="ThuTu" value="<?php echo $d['ThuTu']; ?>">
</p>
<p>
   <label for="AnHien">Trạng thái:</label>
   <select name="AnHien" id="AnHien">
     <option value="1">Hiện</option>
     <option value="0" <?php if($d['AnHien']==0) echo "selected='selected'"; ?>>Ẩn</option>
   </select>
 </p>
<p>
  <input type="submit" value="Sửa" id="sualt" name="sualt">
  <input type="hidden" value="<?php echo $idCL; ?>" id="idCL" name="idCL">
	<input type="hidden" value="<?php echo $idLoai; ?>" id="idLoai" name="idLoai">&nbsp;&nbsp;
  <input class="button" type="button" onclick="window.location.replace('index.php?key=lt&idCL=<?php echo $idCL;?>')" value="Hủy" />
</p>
</form>
<?php } ?>
</body>
</html>