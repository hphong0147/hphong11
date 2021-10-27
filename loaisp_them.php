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
 $sl="select * from nn_chungloai order by ThuTu";
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
<p>
  <label for="TenLoai">Loại sản phẩm: </label>
  <input type="text" name="TenLoai" id="TenLoai">
</p>
<p>
<label for="ThuTu">Thứ tự:</label>
<input type="text" name="ThuTu" id="ThuTu">
</p>
<p>
   <label for="AnHien">Trạng thái:</label>
   <select name="AnHien" id="AnHien">
     <option value="1">Hiện</option>
     <option value="0">Ẩn</option>
   </select>
 </p>
<p>
	<input type="submit" value="Thêm" id="themlt" name="themlt"> &nbsp;&nbsp;<input class="button" type="button" onclick="window.location.replace('index.php?key=lt')" value="Hủy" />
</p>
</form>
</body>
</html>