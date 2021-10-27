<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<style>
.pae{ color:#00F;}
.container {
  width: 500px;
  margin: auto;
  text-align: center;
}
.pagination {
  width: 400px;
  margin-left: 50px;
}
.pagination a {
  display: block;
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
  transition: background-color .3s;
}
 
.pagination a.active {
    background-color: #4CAF50;
    color: white;
}
 
.pagination a:hover:not(.active) {
  background-color: #ddd;
}
</style>

<body>
<form id="form1" name="form1" method="get">
<input type="hidden" name="key" value="sp"/>
<p>
   <label for="idCL">Danh Mục Sản Phẩm:</label>
   <select name="idCL" id="idCL" onchange="form1.submit()">
<?php
	include("connect.php");
	$sl="select * from nn_chungloai order by idCL";
	$kq=mysqli_query($link,$sl);
	$idCL=0;
    while($d=mysqli_fetch_array($kq)){
	if($idCL==0) $idCL=$d['idCL'];
 ?>
     <option value="<?php echo $d['idCL'];?>" <?php if(isset($_GET['idCL'])&&$_GET['idCL']==$d['idCL']){echo "selected='selected'";$idCL=$_GET['idCL'];}?>><?php echo $d['TenCL'];?></option>
 <?php }?>
    </select>
</p>
<p>
   <label for="idLoai">Các Loại Sản Phẩm:</label>
   <select name="idLoai" id="idLoai" onchange="form1.submit()">
   <?php 
 	$sl1="select * from nn_loaisp where idCL=$idCL order by ThuTu";
 	$kq1=mysqli_query($link,$sl1);
 	$idLoai=0;
 	while($d=mysqli_fetch_array($kq1)){
	 if($idLoai==0)$idLoai=$d['idLoai']; 
	?>
      <option value="<?php echo $d['idLoai'];?>" <?php if(isset($_GET['idLoai'])&&$_GET['idLoai']==$d['idLoai']){ echo "selected='selected'"; $idLoai=$_GET['idLoai'];  
	  }?>><?php echo $d['TenLoai'];?></option>
 <?php }?>
    </select>
  </p>
</form>
<table width="1000" border="1" style="text-align: center">
  <tbody>
    <tr style="font-size: 14px; font-weight: bold">
      <td>STT</td>
      <td>Tên sản phẩm</td>
      <td>Giá</td>
      <td>Mô tả</td>
      <td>Ảnh</td>
      <td>Ngày </td>
      <td>Trạng thái</td>
      <td><a href="index.php?key=spt&idCL=<?php echo $idCL;?>&idLoai=<?php echo $idLoai;?>">Thêm</a></td>
    </tr>
<?php
	  $sl2="select * from nn_sanpham where idLoai=$idLoai";
	  $kq2=mysqli_query($link,$sl2);
	  
	  //Tong san pham:
	  $tongsp=mysqli_num_rows($kq2);
	  
	  //Tinh tong so trang:
	  $sd=6;
	  $sn=5;
	  $tst=ceil($tongsp/$sd);
	  $tsn=ceil($tst/$sn);
	  //Tinh trang hien tai:
	  if(isset($_GET['page']))
	  {
	  $page=$_GET['page'];
	  $nhom=ceil($page/$sn);
	  }else if(isset($_GET['nhom']))
{
	$nhom=$_GET['nhom'];
	$page=ceil($nhom-1)*$sn+1;
}else $nhom=$page=1;
	  
	  //Tinh vi tri lay tin theo trang hien tai($page):
	  $vitri=($page-1)*$sd;
	  
	  //Viet truy van lay tin theo vi tri:
	  $sl3="select * from nn_sanpham where idLoai=$idLoai order by idSP DESC limit $vitri, $sd"; //cau truy van cho ra tong san pham theo loai tin
	  $kq3=mysqli_query($link,$sl3);
	  
	  $stt=$vitri+1;
	  while($d3=mysqli_fetch_array($kq3))
	  {
?>
    <tr>
      <td><?php echo $stt++;?></td>
      <td><?php echo $d3['TenSP']; ?></td>
      <td><?php echo $d3['Gia']; ?></td>
      <td><?php echo $d3['MoTa']; ?></td>
      <td><img src="./sanpham/<?php echo $d3['UrlHinh'];?>" width="70" height="93"/></td>
      <td><?php echo date("d-m-Y h:i:s",strtotime($d3['NgayDang']));?></td>
      <td><?php if($d3['AnHien']) echo "Hiện"; else echo "Ẩn";?></td>
      <td><a href="process.php?xoasp=<?php echo $d3['idSP']; ?>&idCL=<?php echo $idCL;?>&idLoai=<?php echo $idLoai;?>" onclick="return confirm('Bạn muốn xóa sản phẩm này?')";>Xóa</a>/<a href="index.php?key=sps&idSP=<?php echo $d3['idSP'] ?>&idCL=<?php echo $idCL ?>&idLoai=<?php echo $idLoai ?>&page=<?php echo $page ?>">Sửa</a></td>
    </tr>
<?php } ?>
  </tbody>
</table>

	
    
    <div class="container">
  
 
  <div class="pagination">
    
    
    <?php

if($nhom>1)
{
	?>
    <a  href="index.php?key=sp&idCL=<?php echo $idCL;?>&idLoai=<?php echo $idLoai;?>&page=<?php echo $i;?>&nhom=<?php echo $nhom-1 ?>">&laquo;</a>

    
<?php } ?>
<?php 
$dau=($nhom-1)*$sn+1;
$cuoi=($nhom*$sn);
if($cuoi>$tst)$cuoi=$tst;
for($i=$dau;$i<=$cuoi;$i++)
{
	
	?>
	<u><a <?php if($page==$i) echo "class= 'active'"; ?> href="?key=sp&idCL=<?php echo $idCL;?>&idLoai=<?php echo $idLoai;?>&page=<?php echo $i;?>"><?php echo $i ?></a></u>
<?php }  ?>
<?php
if($nhom<$tsn)
{
	?>
    <a href="index.php?key=sp&idCL=<?php echo $idCL;?>&idLoai=<?php echo $idLoai;?>&page=<?php echo $i;?>&nhom=<?php echo $nhom+1 ?>">&raquo;</a>
   
<?php } ?>
</div>
</div>
</body>
</html>