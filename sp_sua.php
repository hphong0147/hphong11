<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="get" action="">
<input type="hidden" name="key" value="sps"/>
<p>
 <label for="idCL">Danh mục:</label>
 <select name="idCL" id="idCL" onChange="form1.submit()">
	<?php 
	$idCL=$_GET['idCL'];
	$page=$_GET['page'];
	$ss="select * from nn_chungloai";
	$ks=mysqli_query($link,$ss);
	while($ds=mysqli_fetch_array($ks))
	{
	?>
	 <option value="<?php echo $ds['idCT'];?>" <?php if(isset($_GET['idCL'])&&$_GET['idCL']==$ds['idCL']) echo "selected='selected'" ?> ><?php echo $ds['TenCL'];?></option>
	<?php } ?>
	</select>
</p>
</form>
<form id="form2" name="form2" enctype="multipart/form-data" method="post" action="process.php">
<p>
    <label for="idLoai">Loại sản phẩm:</label>
    <select name="idLoai" id="idLoai" onChange="form1.submit()">
	<?php 
	$idLoai=$_GET['idLoai'];
	$sl="select * from nn_loaisp where idCL=$idCL";
	$kl=mysqli_query($link,$sl);
	while($dl=mysqli_fetch_array($kl))
	{
	?>
	 <option value="<?php echo $dl['idLoai'];?>" <?php if(isset($_GET['idLoai'])&&$_GET['idLoai']==$dl['idLoai']) echo "selected='selected'" ?> ><?php echo $dl['TenLoai'];?></option>
	<?php } ?>
	</select>
  </p>
<?php
 if(isset($_GET['idSP']))
 {
 $idSP=$_GET['idSP'];
 $slp="select * from nn_sanpham where idSP=$idSP";
 $kqp=mysqli_query($link,$slp);
 $dp=mysqli_fetch_array($kqp);
 ?>
<p>
    <label for="TenSP">Tên sản phẩm:</label>
    <input type="text" name="TenSP" id="TenSP" value="<?php echo $dp['TenSP']; ?>"/>
</p>
<p>
    <label for="Gia">Giá:</label>
    <input type="text" name="Gia" id="Gia" value="<?php echo $dp['Gia']; ?>"/>
</p>
<p>
    <label for="MoTa">Mô tả:</label>
    <textarea name="MoTa" id="MoTa" class="ckeditor"><?php echo $dp['MoTa']; ?></textarea>
</p>
<p>
    <label for="ufile">Chọn Hình:</label>
    <input type="file" name="ufile" id="ufile" /> <img src="../upload/sanpham/<?php echo $dp['UrlHinh']; ?>" width="70" height="93"/>
</p>
<p>
    <label for="AnHien">Trạng thái:</label>
    <select name="AnHien" id="AnHien">
    	<option value="1">Hiện</option>
      <option value="0" <?php if($dp['AnHien']==0) echo "selected='selected'"; ?>>Ẩn</option>
    </select>
</p>
<p>
	<input type="hidden" name="idCL" value="<?php echo $idCL;?>"/>
	<input name="idSP" type="hidden" value="<?php echo $idSP;?>"/>
	<input type="submit" value="Sửa" id="suasp" name="suasp"> 
	&nbsp;&nbsp;<input class="button" type="button" onclick="window.location.replace('index.php?key=sp&idCL=<?php echo $idCL;?>&idLoai=<?php echo $idLoai;?>&page=<?php echo $page;?>')" value="Hủy" />
</p>
<?php } ?>
</form>

</body>
</html>