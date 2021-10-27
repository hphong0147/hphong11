<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="1200" border="1" style="text-align: center">
  <tbody>
    <tr style="font-size: 14px; font-weight: bold">
      <td>STT</td>
      <td>Họ tên</td>
      <td>Email</td>
      <td>Điện thoại</td>
      <td>Giới tính</td>
      <td>Ngày sinh</td>
      <td>Địa chỉ</td>
    </tr>
<?php
	  include("connect.php");
	  $sl="select * from nn_nguoidung order by idNguoiDung";
	  $kq=mysqli_query($link,$sl);
	  $stt=1;
	  while($d=mysqli_fetch_array($kq))
	  {
?>
    <tr>
      <td><?php echo $stt++; ?></td>
      <td><?php echo $d['HoTen']?></td>
      <td><?php echo $d['Email']?></td>
      <td><?php echo $d['DienThoai']?></td>
      <td><?php if($d['GioiTinh']) echo "Nam";else echo "Nữ";?></td>
      <td><?php echo $d['NgaySinh']?></td>
      <td><?php echo $d['DiaChi']?></td>
    </tr>
<?php } ?>
  </tbody>
</table>

	
</body>	
</html>