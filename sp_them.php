<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style type="text/css">
    .name{
        margin-right: 10px;
    }

</style>
</head>

<body>
<form style="margin-left:500px;" id="form1" name="form1" method="get" action="">
<input type="hidden" name="key" value="spt"/>
<p>
 <label class="name" for="idCL">Danh mục:</label>
 <select style="margin-left:23px;" name="idCL" id="idCL" onchange="form1.submit()">
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
</form>
<form style="margin-left:500px;" id="form2" name="form2" enctype="multipart/form-data" method="post" action="process.php">
<p>
    <label class="name" for="idLoai">Loại sản phẩm:</label>
    <select name="idLoai" id="idLoai">
     <?php 
	$idCL=$_GET['idCL'];
 $sl="select * from nn_loaisp where idCL=$idCL order by ThuTu";
 $kq=mysqli_query($link,$sl);
		$idLoai=0;
$kt=0;
 while($d=mysqli_fetch_array($kq)){
	  ?>
      <option value="<?php echo $d['idLoai'];?>" <?php if(isset($_GET['idLoai'])&&$_GET['idLoai']==$d['idLoai']){echo "selected='selected'";$kt=1;}?>><?php echo $d['TenLoai'];?></option>
 <?php }?>
    </select>
  </p>
<p>
    <label class="name" for="Gia">Tên sản phẩm:</label>
    <input style="margin-left:3px; margin-top: 10px;" type="text" name="TenSP" id="TenSP" />
</p>
<p>
    <label class="name" for="Gia">Giá:</label>
    <input style="margin-left:62px;margin-top: 10px;" type="text" name="Gia" id="Gia" />
</p>
<p>
    <label class="name" for="MoTa">Mô tả:</label>
    <textarea style="margin-left:51px;margin-top: 10px;" name="MoTa" id="MoTa" class="ckeditor"></textarea>
</p>
<p>
    <label class="name" for="ufile">Chọn Hình:</label>
    <input style="margin-left:24px;margin-top: 10px;" type="file" name="ufile" id="ufile" />
</p>
<p>
    <label class="name" for="AnHien">Trạng thái:</label>
    <select style="margin-left:28px;margin-top: 10px;" name="AnHien" id="AnHien">
    	<option value="1">Hiện</option>
        <option value="0">Ẩn</option>
    </select>
</p>
<p>
	<input type="hidden" name="idCL" value="<?php echo $idCL;?>"/>
	<input style="margin-left:80px; margin-top:30px;" type="submit" value="Thêm" id="themsp" name="themsp"> &nbsp;&nbsp;<input class="button" type="button" onclick="window.location.replace('index.php?key=sp&idCL=<?php echo $idCL;?>&idLoai=<?php echo $idLoai;?>')" value="Hủy" />
</p>
</form>

</body>
</html>