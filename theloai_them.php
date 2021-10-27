<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="process.php">
<p>
<label for="TenCL" style="width: auto">Tên thể loại:</label>
<input type="text" name="TenCL" id="TenCL">
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
	<input type="submit" value="Thêm" id="themtl" name="themtl"> &nbsp;&nbsp;<input class="button" type="button" onclick="window.location.replace('index.php?key=tl')" value="Hủy" />
</p>
</form>
