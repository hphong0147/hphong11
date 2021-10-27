<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
if(isset($_GET['idCL']))
{
	$idCL=$_GET['idCL'];
	$sl="select * from nn_chungloai where idCL='$idCL'";
	$kq=mysqli_query($link,$sl);
    $d=mysqli_fetch_array($kq);
?>
<form id="form1" name="form1" method="post" action="process.php">
<p>
<label for="TenCL" style="width: auto">Tên thể loại:</label>
<input type="text" name="TenCL" id="TenCL" value="<?php echo $d['TenCL']; ?>">
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
  <input type="submit" value="Sửa" id="suatl" name="suatl">
  <input type="hidden" value="<?php echo $idCL; ?>" id="idCL" name="idCL"> &nbsp;&nbsp;
  <input class="button" type="button" onclick="window.location.replace('index.php?key=tl')" value="Hủy" />
</p>
</form>
<?php } ?>
</body>
	</html>
	
